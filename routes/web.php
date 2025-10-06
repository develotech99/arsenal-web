<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\DB;

/**
 * ========================================
 * RUTAS PÚBLICAS DE LA PÁGINA WEB
 * ========================================
 */

// Página de inicio
Route::get('/', [WebController::class, 'index'])->name('web.home');

// Catálogo de productos
Route::get('/productos', [WebController::class, 'productos'])->name('web.productos');

// Detalle de producto
Route::get('/productos/{id}', [WebController::class, 'productoDetalle'])->name('web.producto.detalle');

// Sobre nosotros
Route::get('/nosotros', [WebController::class, 'nosotros'])->name('web.nosotros');

// Contacto
Route::get('/contacto', [WebController::class, 'contacto'])->name('web.contacto');
Route::post('/contacto', [WebController::class, 'enviarContacto'])->name('web.contacto.enviar');

/**
 * ========================================
 * API ROUTES PARA FILTROS DINÁMICOS
 * ========================================
 */
Route::prefix('api')->group(function () {
    
    /**
     * Obtener subcategorías por categoría
     * GET /api/subcategorias/{categoria_id}
     */
    Route::get('/subcategorias/{categoria_id}', function ($categoria_id) {
        $subcategorias = DB::table('pro_subcategorias')
            ->where('subcategoria_idcategoria', $categoria_id)
            ->where('subcategoria_situacion', 1)
            ->orderBy('subcategoria_nombre')
            ->get(['subcategoria_id', 'subcategoria_nombre']);
        
        return response()->json($subcategorias);
    });
    
    /**
     * Obtener modelos por marca
     * GET /api/modelos/{marca_id}
     */
    Route::get('/modelos/{marca_id}', function ($marca_id) {
        $modelos = DB::table('pro_modelo')
            ->where('modelo_marca_id', $marca_id)
            ->where('modelo_situacion', 1)
            ->orderBy('modelo_descripcion')
            ->get(['modelo_id', 'modelo_descripcion']);
        
        return response()->json($modelos);
    });
    
    /**
     * Obtener productos relacionados
     * GET /api/productos-relacionados/{categoria_id}/{producto_actual_id}
     */
    Route::get('/productos-relacionados/{categoria_id}/{producto_actual_id}', function ($categoria_id, $producto_actual_id) {
        $productos = DB::table('pro_productos as p')
            ->join('pro_categorias as c', 'p.producto_categoria_id', '=', 'c.categoria_id')
            ->join('pro_marcas as m', 'p.producto_marca_id', '=', 'm.marca_id')
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
                'c.categoria_nombre',
                'm.marca_descripcion',
                'f.foto_url',
                'pr.precio_venta',
                'pr.precio_especial',
                DB::raw('(SELECT COUNT(*) FROM pro_series_productos WHERE serie_producto_id = p.producto_id AND serie_estado = "disponible" AND serie_situacion = 1) as stock_series'),
                DB::raw('COALESCE((SELECT SUM(mov_cantidad) FROM pro_movimientos WHERE mov_producto_id = p.producto_id AND mov_tipo = "ingreso" AND mov_situacion = 1), 0) - 
                         COALESCE((SELECT SUM(mov_cantidad) FROM pro_movimientos WHERE mov_producto_id = p.producto_id AND mov_tipo = "egreso" AND mov_situacion = 1), 0) as stock_unidades')
            )
            ->where('p.producto_categoria_id', $categoria_id)
            ->where('p.producto_id', '!=', $producto_actual_id)
            ->where('p.producto_situacion', 1)
            ->havingRaw('(stock_series > 0 OR stock_unidades > 0)')
            ->orderBy('p.producto_id', 'desc')
            ->limit(4)
            ->get();
        
        return response()->json($productos);
    });
});