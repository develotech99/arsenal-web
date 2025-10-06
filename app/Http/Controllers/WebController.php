<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
{
    /**
     * ========================================
     * PÁGINA DE INICIO
     * ========================================
     */
    public function index()
    {
        // Productos destacados (últimos 6 productos con stock disponible)
        $productosDestacados = DB::table('pro_productos as p')
            ->join('pro_categorias as c', 'p.producto_categoria_id', '=', 'c.categoria_id')
            ->join('pro_subcategorias as sc', 'p.producto_subcategoria_id', '=', 'sc.subcategoria_id')
            ->join('pro_marcas as m', 'p.producto_marca_id', '=', 'm.marca_id')
            ->leftJoin('pro_modelo as mo', 'p.producto_modelo_id', '=', 'mo.modelo_id')
            ->leftJoin('pro_calibres as cal', 'p.producto_calibre_id', '=', 'cal.calibre_id')
            ->leftJoin('pro_productos_fotos as f', function($join) {
                $join->on('p.producto_id', '=', 'f.foto_producto_id')
                     ->where('f.foto_principal', '=', true)
                     ->where('f.foto_situacion', '=', 1);
            })
            ->leftJoin('pro_precios as pr', function($join) {
                $join->on('p.producto_id', '=', 'pr.precio_producto_id')
                     ->where('pr.precio_situacion', '=', 1);
            })
            ->select(
                'p.producto_id',
                'p.producto_nombre',
                'p.producto_codigo_barra',
                'c.categoria_nombre',
                'sc.subcategoria_nombre',
                'm.marca_descripcion',
                'mo.modelo_descripcion',
                'cal.calibre_nombre',
                'f.foto_url',
                'pr.precio_venta',
                'pr.precio_especial',
                DB::raw('(SELECT COUNT(*) FROM pro_series_productos WHERE serie_producto_id = p.producto_id AND serie_estado = "disponible" AND serie_situacion = 1) as stock_series'),
                DB::raw('COALESCE((SELECT SUM(mov_cantidad) FROM pro_movimientos WHERE mov_producto_id = p.producto_id AND mov_tipo = "ingreso" AND mov_situacion = 1), 0) - 
                         COALESCE((SELECT SUM(mov_cantidad) FROM pro_movimientos WHERE mov_producto_id = p.producto_id AND mov_tipo = "egreso" AND mov_situacion = 1), 0) as stock_unidades')
            )
            ->where('p.producto_situacion', 1)
            ->havingRaw('(stock_series > 0 OR stock_unidades > 0)')
            ->orderBy('p.producto_id', 'desc')
            ->limit(6)
            ->get();

        return view('web.index', compact('productosDestacados'));
    }

    /**
     * ========================================
     * CATÁLOGO DE PRODUCTOS CON FILTROS
     * ========================================
     */
    public function productos(Request $request)
    {
        $query = DB::table('pro_productos as p')
            ->join('pro_categorias as c', 'p.producto_categoria_id', '=', 'c.categoria_id')
            ->join('pro_subcategorias as sc', 'p.producto_subcategoria_id', '=', 'sc.subcategoria_id')
            ->join('pro_marcas as m', 'p.producto_marca_id', '=', 'm.marca_id')
            ->leftJoin('pro_modelo as mo', 'p.producto_modelo_id', '=', 'mo.modelo_id')
            ->leftJoin('pro_calibres as cal', 'p.producto_calibre_id', '=', 'cal.calibre_id')
            ->leftJoin('pro_productos_fotos as f', function($join) {
                $join->on('p.producto_id', '=', 'f.foto_producto_id')
                     ->where('f.foto_principal', '=', true)
                     ->where('f.foto_situacion', '=', 1);
            })
            ->leftJoin('pro_precios as pr', function($join) {
                $join->on('p.producto_id', '=', 'pr.precio_producto_id')
                     ->where('pr.precio_situacion', '=', 1);
            })
            ->select(
                'p.producto_id',
                'p.producto_nombre',
                'p.producto_codigo_barra',
                'c.categoria_id',
                'c.categoria_nombre',
                'sc.subcategoria_id',
                'sc.subcategoria_nombre',
                'm.marca_id',
                'm.marca_descripcion',
                'mo.modelo_id',
                'mo.modelo_descripcion',
                'cal.calibre_nombre',
                'f.foto_url',
                'pr.precio_venta',
                'pr.precio_especial',
                DB::raw('(SELECT COUNT(*) FROM pro_series_productos WHERE serie_producto_id = p.producto_id AND serie_estado = "disponible" AND serie_situacion = 1) as stock_series'),
                DB::raw('COALESCE((SELECT SUM(mov_cantidad) FROM pro_movimientos WHERE mov_producto_id = p.producto_id AND mov_tipo = "ingreso" AND mov_situacion = 1), 0) - 
                         COALESCE((SELECT SUM(mov_cantidad) FROM pro_movimientos WHERE mov_producto_id = p.producto_id AND mov_tipo = "egreso" AND mov_situacion = 1), 0) as stock_unidades')
            )
            ->where('p.producto_situacion', 1);

        // ========================================
        // APLICAR FILTROS
        // ========================================
        
        // Filtro por búsqueda de texto
        if ($request->filled('buscar')) {
            $buscar = '%' . $request->buscar . '%';
            $query->where(function($q) use ($buscar) {
                $q->where('p.producto_nombre', 'like', $buscar)
                  ->orWhere('m.marca_descripcion', 'like', $buscar)
                  ->orWhere('mo.modelo_descripcion', 'like', $buscar)
                  ->orWhere('p.producto_codigo_barra', 'like', $buscar);
            });
        }

        // Filtro por categoría
        if ($request->filled('categoria')) {
            $query->where('c.categoria_id', $request->categoria);
        }

        // Filtro por subcategoría
        if ($request->filled('subcategoria')) {
            $query->where('sc.subcategoria_id', $request->subcategoria);
        }

        // Filtro por marca
        if ($request->filled('marca')) {
            $query->where('m.marca_id', $request->marca);
        }

        // Filtro por modelo
        if ($request->filled('modelo')) {
            $query->where('mo.modelo_id', $request->modelo);
        }

        // Filtro por disponibilidad de stock
        if ($request->filled('stock')) {
            if ($request->stock === 'disponible') {
                $query->havingRaw('(stock_series > 0 OR stock_unidades > 0)');
            } elseif ($request->stock === 'agotado') {
                $query->havingRaw('(stock_series = 0 AND stock_unidades = 0)');
            }
        }

        // ========================================
        // ORDENAMIENTO
        // ========================================
        switch ($request->input('orden', 'reciente')) {
            case 'nombre_asc':
                $query->orderBy('p.producto_nombre', 'asc');
                break;
            case 'nombre_desc':
                $query->orderBy('p.producto_nombre', 'desc');
                break;
            case 'precio_asc':
                $query->orderBy('pr.precio_venta', 'asc');
                break;
            case 'precio_desc':
                $query->orderBy('pr.precio_venta', 'desc');
                break;
            default: // 'reciente'
                $query->orderBy('p.producto_id', 'desc');
        }

        // Ejecutar query con paginación
        $productos = $query->paginate(12);

        // ========================================
        // DATOS PARA FILTROS
        // ========================================
        
        // Todas las categorías activas
        $categorias = DB::table('pro_categorias')
            ->where('categoria_situacion', 1)
            ->orderBy('categoria_nombre')
            ->get();

        // Subcategorías según categoría seleccionada
        $subcategorias = collect();
        if ($request->filled('categoria')) {
            $subcategorias = DB::table('pro_subcategorias')
                ->where('subcategoria_idcategoria', $request->categoria)
                ->where('subcategoria_situacion', 1)
                ->orderBy('subcategoria_nombre')
                ->get();
        }

        // Todas las marcas activas
        $marcas = DB::table('pro_marcas')
            ->where('marca_situacion', 1)
            ->orderBy('marca_descripcion')
            ->get();

        // Modelos según marca seleccionada
        $modelos = collect();
        if ($request->filled('marca')) {
            $modelos = DB::table('pro_modelo')
                ->where('modelo_marca_id', $request->marca)
                ->where('modelo_situacion', 1)
                ->orderBy('modelo_descripcion')
                ->get();
        }

        return view('web.productos', compact(
            'productos', 
            'categorias', 
            'subcategorias',
            'marcas',
            'modelos'
        ));
    }

    /**
     * ========================================
     * DETALLE DE PRODUCTO
     * ========================================
     */
    public function productoDetalle($id)
    {
        $producto = DB::table('pro_productos as p')
            ->join('pro_categorias as c', 'p.producto_categoria_id', '=', 'c.categoria_id')
            ->join('pro_subcategorias as sc', 'p.producto_subcategoria_id', '=', 'sc.subcategoria_id')
            ->join('pro_marcas as m', 'p.producto_marca_id', '=', 'm.marca_id')
            ->leftJoin('pro_modelo as mo', 'p.producto_modelo_id', '=', 'mo.modelo_id')
            ->leftJoin('pro_calibres as cal', 'p.producto_calibre_id', '=', 'cal.calibre_id')
            ->leftJoin('pro_precios as pr', function($join) {
                $join->on('p.producto_id', '=', 'pr.precio_producto_id')
                     ->where('pr.precio_situacion', '=', 1);
            })
            ->select(
                'p.*',
                'c.categoria_id',
                'c.categoria_nombre',
                'sc.subcategoria_nombre',
                'm.marca_descripcion',
                'mo.modelo_descripcion',
                'cal.calibre_nombre',
                'pr.precio_venta',
                'pr.precio_especial',
                DB::raw('(SELECT COUNT(*) FROM pro_series_productos WHERE serie_producto_id = p.producto_id AND serie_estado = "disponible" AND serie_situacion = 1) as stock_series'),
                DB::raw('COALESCE((SELECT SUM(mov_cantidad) FROM pro_movimientos WHERE mov_producto_id = p.producto_id AND mov_tipo = "ingreso" AND mov_situacion = 1), 0) - 
                         COALESCE((SELECT SUM(mov_cantidad) FROM pro_movimientos WHERE mov_producto_id = p.producto_id AND mov_tipo = "egreso" AND mov_situacion = 1), 0) as stock_unidades')
            )
            ->where('p.producto_id', $id)
            ->where('p.producto_situacion', 1)
            ->first();

        if (!$producto) {
            abort(404, 'Producto no encontrado');
        }

        // Obtener todas las fotos del producto
        $fotos = DB::table('pro_productos_fotos')
            ->where('foto_producto_id', $id)
            ->where('foto_situacion', 1)
            ->orderBy('foto_principal', 'desc')
            ->get();

        return view('web.producto-detalle', compact('producto', 'fotos'));
    }

    /**
     * ========================================
     * PÁGINA NOSOTROS
     * ========================================
     */
    public function nosotros()
    {
        return view('web.nosotros');
    }

    /**
     * ========================================
     * PÁGINA CONTACTO
     * ========================================
     */
    public function contacto()
    {
        return view('web.contacto');
    }

    /**
     * ========================================
     * ENVIAR FORMULARIO DE CONTACTO
     * ========================================
     */
    public function enviarContacto(Request $request)
    {
        // Validar datos
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'telefono' => 'nullable|string|max:20',
            'mensaje' => 'required|string|max:1000|min:10',
            'acepto_politica' => 'required|accepted'
        ], [
            'nombre.required' => 'El nombre es obligatorio',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'El correo electrónico no es válido',
            'mensaje.required' => 'El mensaje es obligatorio',
            'mensaje.min' => 'El mensaje debe tener al menos 10 caracteres',
            'mensaje.max' => 'El mensaje no puede superar los 1000 caracteres',
            'acepto_politica.required' => 'Debes aceptar la política de privacidad',
            'acepto_politica.accepted' => 'Debes aceptar la política de privacidad'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // Aquí puedes:
        // 1. Guardar en base de datos
        // 2. Enviar correo electrónico
        // 3. Notificar por WhatsApp, etc.
        
        // Ejemplo: Guardar en base de datos (opcional)
        /*
        DB::table('contactos')->insert([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'mensaje' => $request->mensaje,
            'created_at' => now(),
        ]);
        */

        // Enviar email (opcional)
        /*
        Mail::to('info@elarsenal.com')->send(new ContactoMail([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'mensaje' => $request->mensaje,
        ]));
        */

        return back()->with('success', 'Mensaje enviado correctamente. Nos pondremos en contacto pronto.');
    }
}