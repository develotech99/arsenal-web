@extends('layouts.app')

@section('title', $producto->producto_nombre . ' - El Arsenal Guatemala')

@section('content')

<!-- Breadcrumb -->
<section class="bg-gray-100 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center space-x-2 text-sm">
            <a href="{{ route('web.home') }}" class="text-gray-600 hover:text-arsenal-gold">
                <i class="fas fa-home"></i> Inicio
            </a>
            <span class="text-gray-400">/</span>
            <a href="{{ route('web.productos') }}" class="text-gray-600 hover:text-arsenal-gold">
                Productos
            </a>
            <span class="text-gray-400">/</span>
            <a href="{{ route('web.productos', ['categoria' => $producto->categoria_id]) }}" class="text-gray-600 hover:text-arsenal-gold">
                {{ $producto->categoria_nombre }}
            </a>
            <span class="text-gray-400">/</span>
            <span class="text-arsenal-black font-semibold">{{ $producto->producto_nombre }}</span>
        </nav>
    </div>
</section>

<!-- Product Detail -->
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <!-- Galería de Imágenes -->
            <div class="space-y-4">
                <!-- Imagen Principal -->
                <div class="bg-gray-100 rounded-xl overflow-hidden border-2 border-gray-200">
                    @if(count($fotos) > 0)
                        <img id="main-image" 
                             src="{{ asset('storage/' . $fotos[0]->foto_url) }}" 
                             alt="{{ $producto->producto_nombre }}"
                             class="w-full h-96 object-contain p-8"
                             onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 400 400%22%3E%3Crect fill=%22%23f3f4f6%22 width=%22400%22 height=%22400%22/%3E%3Ctext x=%22200%22 y=%22200%22 font-size=%2224%22 text-anchor=%22middle%22 fill=%22%23D4AF37%22%3ESin imagen%3C/text%3E%3C/svg%3E'">
                    @else
                        <div class="w-full h-96 flex items-center justify-center">
                            <div class="text-center">
                                <i class="fas fa-image text-8xl text-gray-300 mb-4"></i>
                                <p class="text-gray-500">Sin imagen disponible</p>
                            </div>
                        </div>
                    @endif
                </div>
                
                <!-- Miniaturas -->
                @if(count($fotos) > 1)
                    <div class="grid grid-cols-4 gap-3">
                        @foreach($fotos as $foto)
                            <button onclick="cambiarImagen('{{ asset('storage/' . $foto->foto_url) }}')"
                                    class="bg-gray-100 rounded-lg overflow-hidden border-2 border-gray-200 hover:border-arsenal-gold transition-all">
                                <img src="{{ asset('storage/' . $foto->foto_url) }}" 
                                     alt="Miniatura"
                                     class="w-full h-20 object-contain p-2"
                                     onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22%3E%3Crect fill=%22%23f3f4f6%22 width=%22100%22 height=%22100%22/%3E%3C/svg%3E'">
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>
            
            <!-- Información del Producto -->
            <div>
                <!-- Badge Categoría -->
                <div class="flex items-center space-x-2 mb-4">
                    <span class="bg-arsenal-gold bg-opacity-10 text-arsenal-gold px-4 py-2 rounded-full text-sm font-semibold">
                        {{ $producto->categoria_nombre }}
                    </span>
                    <span class="bg-gray-100 text-gray-700 px-4 py-2 rounded-full text-sm font-semibold">
                        {{ $producto->subcategoria_nombre }}
                    </span>
                </div>
                
                <!-- Título -->
                <h1 class="text-4xl font-display font-bold text-arsenal-black mb-4">
                    {{ $producto->producto_nombre }}
                </h1>
                
                <!-- Stock Badge -->
                @php
                    $stockTotal = ($producto->stock_series ?? 0) + ($producto->stock_unidades ?? 0);
                @endphp
                
                <div class="mb-6">
                    @if($stockTotal > 0)
                        <div class="inline-flex items-center bg-green-100 text-green-800 px-4 py-2 rounded-lg">
                            <i class="fas fa-check-circle mr-2"></i>
                            <span class="font-semibold">Disponible</span>
                            <span class="ml-2 text-sm">({{ $stockTotal }} unidades en stock)</span>
                        </div>
                    @else
                        <div class="inline-flex items-center bg-red-100 text-red-800 px-4 py-2 rounded-lg">
                            <i class="fas fa-times-circle mr-2"></i>
                            <span class="font-semibold">Agotado</span>
                        </div>
                    @endif
                </div>
                
                <!-- Precio -->
                <div class="mb-6 pb-6 border-b border-gray-200">
                    @if($producto->precio_especial && $producto->precio_especial < $producto->precio_venta)
                        <div class="flex items-baseline space-x-3">
                            <span class="text-5xl font-bold text-arsenal-gold">
                                Q{{ number_format($producto->precio_especial, 2) }}
                            </span>
                            <span class="text-2xl text-gray-400 line-through">
                                Q{{ number_format($producto->precio_venta, 2) }}
                            </span>
                            @php
                                $descuento = (($producto->precio_venta - $producto->precio_especial) / $producto->precio_venta) * 100;
                            @endphp
                            <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                                -{{ round($descuento) }}%
                            </span>
                        </div>
                        <p class="text-sm text-gray-600 mt-2">Precio regular: Q{{ number_format($producto->precio_venta, 2) }}</p>
                    @else
                        <span class="text-5xl font-bold text-arsenal-black">
                            Q{{ number_format($producto->precio_venta, 2) }}
                        </span>
                    @endif
                </div>
                
                <!-- Especificaciones -->
                <div class="mb-6">
                    <h3 class="text-lg font-bold text-arsenal-black mb-4">Especificaciones</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="text-sm text-gray-600 mb-1">Marca</p>
                            <p class="font-semibold text-arsenal-black">{{ $producto->marca_descripcion }}</p>
                        </div>
                        
                        @if($producto->modelo_descripcion)
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-sm text-gray-600 mb-1">Modelo</p>
                                <p class="font-semibold text-arsenal-black">{{ $producto->modelo_descripcion }}</p>
                            </div>
                        @endif
                        
                        @if($producto->calibre_nombre)
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-sm text-gray-600 mb-1">Calibre</p>
                                <p class="font-semibold text-arsenal-black">{{ $producto->calibre_nombre }}</p>
                            </div>
                        @endif
                        
                        @if($producto->producto_codigo_barra)
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-sm text-gray-600 mb-1">Código</p>
                                <p class="font-semibold text-arsenal-black">{{ $producto->producto_codigo_barra }}</p>
                            </div>
                        @endif
                    </div>
                </div>
                
                <!-- Acciones -->
                <div class="space-y-4">
                    <a href="https://wa.me/50259668844?text=Hola%2C%20me%20interesa%20el%20producto%3A%20{{ urlencode($producto->producto_nombre) }}" 
                       target="_blank"
                       class="block w-full bg-green-500 hover:bg-green-600 text-white text-center font-bold py-4 rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl">
                        <i class="fab fa-whatsapp mr-2"></i>Consultar por WhatsApp
                    </a>
                    
                    <a href="tel:59668844" 
                       class="block w-full bg-arsenal-black hover:bg-arsenal-gold text-white text-center font-bold py-4 rounded-lg transition-all duration-300">
                        <i class="fas fa-phone-alt mr-2"></i>Llamar: 5966-8844
                    </a>
                    
                    <button onclick="compartirProducto()"
                            class="block w-full bg-gray-100 hover:bg-gray-200 text-arsenal-black text-center font-semibold py-3 rounded-lg transition-all duration-300">
                        <i class="fas fa-share-alt mr-2"></i>Compartir
                    </button>
                </div>
                
                <!-- Información Adicional -->
                <div class="mt-8 p-6 bg-blue-50 rounded-xl border border-blue-200">
                    <h4 class="font-bold text-arsenal-black mb-3 flex items-center">
                        <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                        Información Importante
                    </h4>
                    <ul class="space-y-2 text-sm text-gray-700">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-600 mr-2 mt-1"></i>
                            Productos certificados y garantizados
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-600 mr-2 mt-1"></i>
                            Cumplimos todas las normativas legales
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-600 mr-2 mt-1"></i>
                            Asesoría profesional incluida
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-600 mr-2 mt-1"></i>
                            Proceso de entrega seguro y documentado
                        </li>
                    </ul>
                </div>
            </div>
            
        </div>
        
    </div>
</section>

<!-- Related Products -->
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-3xl font-display font-bold text-arsenal-black mb-2">Productos Relacionados</h2>
                <div class="gold-divider ml-0"></div>
            </div>
            <a href="{{ route('web.productos', ['categoria' => $producto->categoria_id]) }}" 
               class="text-arsenal-gold hover:text-arsenal-dark-gold font-semibold">
                Ver más <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
        
        <div id="productos-relacionados" class="text-center py-12">
            <i class="fas fa-spinner fa-spin text-4xl text-arsenal-gold"></i>
            <p class="text-gray-600 mt-4">Cargando productos...</p>
        </div>
    </div>
</section>

@endsection