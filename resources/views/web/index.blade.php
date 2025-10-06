@extends('layouts.app')

@section('title', 'El Arsenal Guatemala - Armería Profesional')

@section('content')

<!-- Hero Section -->
<section class="hero-gradient relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-72 h-72 bg-arsenal-gold rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-arsenal-gold rounded-full blur-3xl"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <!-- Content -->
            <div class="text-white animate-fade-in-up">
                <div class="inline-block mb-4">
                    <span class="bg-arsenal-gold text-white px-4 py-2 rounded-full text-sm font-semibold uppercase tracking-wide">
                        <i class="fas fa-shield-alt mr-2"></i>Armería Profesional
                    </span>
                </div>
                
                <h1 class="text-5xl lg:text-6xl font-display font-black leading-tight mb-6">
                    Bienvenido a<br>
                    <span class="text-arsenal-gold">EL ARSENAL</span>
                </h1>
                
                <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                    Soluciones integrales en <span class="text-arsenal-gold font-semibold">armamento</span>, 
                    <span class="text-arsenal-gold font-semibold">cargadores</span> y 
                    <span class="text-arsenal-gold font-semibold">accesorios tácticos</span> de la más alta calidad.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('web.productos') }}" class="btn-gold text-center">
                        <i class="fas fa-boxes mr-2"></i>Ver Catálogo
                    </a>
                    <a href="{{ route('web.contacto') }}" class="btn-outline-gold text-center bg-white bg-opacity-10 backdrop-blur-sm">
                        <i class="fas fa-envelope mr-2"></i>Contactar
                    </a>
                </div>
                
                <!-- Stats -->
                <div class="grid grid-cols-3 gap-6 mt-12 pt-12 border-t border-gray-700">
                    <div>
                        <div class="text-3xl font-bold text-arsenal-gold mb-1">100+</div>
                        <div class="text-sm text-gray-400">Productos</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-arsenal-gold mb-1">5⭐</div>
                        <div class="text-sm text-gray-400">Calificación</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-arsenal-gold mb-1">397+</div>
                        <div class="text-sm text-gray-400">Clientes</div>
                    </div>
                </div>
            </div>
            
            <!-- Image/Logo -->
            <div class="hidden lg:block animate-fade-in-up">
                <div class="relative">
                    <div class="absolute inset-0 bg-arsenal-gold opacity-20 rounded-full blur-3xl"></div>
                    <div class="relative w-full max-w-md mx-auto">
                        <!-- SVG Logo Placeholder -->
                        <svg viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg" class="drop-shadow-2xl">
                            <circle cx="200" cy="200" r="180" fill="#D4AF37" opacity="0.1"/>
                            <circle cx="200" cy="200" r="150" fill="none" stroke="#D4AF37" stroke-width="3" stroke-dasharray="10,5"/>
                            <text x="200" y="220" font-size="120" text-anchor="middle" fill="#D4AF37" font-weight="bold" font-family="Poppins, sans-serif">EA</text>
                        </svg>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
    <!-- Wave Divider -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="white"/>
        </svg>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-display font-bold text-arsenal-black mb-4">¿Por qué elegirnos?</h2>
            <div class="gold-divider mb-4"></div>
            <p class="text-gray-600 max-w-2xl mx-auto">Ofrecemos experiencia, calidad y servicio profesional en cada producto</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="text-center group">
                <div class="w-20 h-20 bg-arsenal-gold bg-opacity-10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-arsenal-gold transition-all duration-300">
                    <i class="fas fa-shield-alt text-4xl text-arsenal-gold group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-arsenal-black mb-3">Productos Certificados</h3>
                <p class="text-gray-600">Todos nuestros productos cuentan con certificaciones internacionales de calidad</p>
            </div>
            
            <!-- Feature 2 -->
            <div class="text-center group">
                <div class="w-20 h-20 bg-arsenal-gold bg-opacity-10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-arsenal-gold transition-all duration-300">
                    <i class="fas fa-truck text-4xl text-arsenal-gold group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-arsenal-black mb-3">Entrega Segura</h3>
                <p class="text-gray-600">Proceso de entrega seguro y documentado cumpliendo todas las normativas</p>
            </div>
            
            <!-- Feature 3 -->
            <div class="text-center group">
                <div class="w-20 h-20 bg-arsenal-gold bg-opacity-10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-arsenal-gold transition-all duration-300">
                    <i class="fas fa-headset text-4xl text-arsenal-gold group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-arsenal-black mb-3">Asesoría Profesional</h3>
                <p class="text-gray-600">Personal capacitado para brindar la mejor orientación en tu compra</p>
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-12">
            <div>
                <h2 class="text-4xl font-display font-bold text-arsenal-black mb-4">Productos Destacados</h2>
                <div class="gold-divider ml-0"></div>
            </div>
            <a href="{{ route('web.productos') }}" class="btn-outline-gold hidden md:inline-flex">
                Ver Todo <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
        
        @if(isset($productosDestacados) && count($productosDestacados) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($productosDestacados as $producto)
                    <div class="product-card">
                        <!-- Image -->
                        <div class="relative h-64 bg-gray-100 overflow-hidden group">
                            @if($producto->foto_url)
                                <img src="{{ asset('storage/' . $producto->foto_url) }}" 
                                     alt="{{ $producto->producto_nombre }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                     onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 400 300%22%3E%3Crect fill=%22%23f3f4f6%22 width=%22400%22 height=%22300%22/%3E%3Ctext x=%22200%22 y=%22150%22 font-size=%2224%22 text-anchor=%22middle%22 fill=%22%23D4AF37%22%3ESin imagen%3C/text%3E%3C/svg%3E'">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gray-100">
                                    <i class="fas fa-image text-6xl text-gray-300"></i>
                                </div>
                            @endif
                            
                            <!-- Stock Badge -->
                            @php
                                $stockTotal = ($producto->stock_series ?? 0) + ($producto->stock_unidades ?? 0);
                            @endphp
                            
                            @if($stockTotal > 0)
                                <span class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                    <i class="fas fa-check mr-1"></i>Disponible
                                </span>
                            @else
                                <span class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                    Agotado
                                </span>
                            @endif
                        </div>
                        
                        <!-- Content -->
                        <div class="p-6">
                            <!-- Category -->
                            <span class="inline-block bg-arsenal-gold bg-opacity-10 text-arsenal-gold px-3 py-1 rounded-full text-xs font-semibold mb-3">
                                {{ $producto->categoria_nombre }}
                            </span>
                            
                            <!-- Title -->
                            <h3 class="text-xl font-bold text-arsenal-black mb-2 line-clamp-2 hover:text-arsenal-gold transition-colors">
                                <a href="{{ route('web.producto.detalle', $producto->producto_id) }}">
                                    {{ $producto->producto_nombre }}
                                </a>
                            </h3>
                            
                            <!-- Details -->
                            <div class="space-y-1 mb-4 text-sm text-gray-600">
                                <p><span class="font-semibold">Marca:</span> {{ $producto->marca_descripcion }}</p>
                                @if($producto->modelo_descripcion)
                                    <p><span class="font-semibold">Modelo:</span> {{ $producto->modelo_descripcion }}</p>
                                @endif
                                @if($producto->calibre_nombre)
                                    <p><span class="font-semibold">Calibre:</span> {{ $producto->calibre_nombre }}</p>
                                @endif
                            </div>
                            
                            <!-- Price -->
                            <div class="mb-4">
                                @if($producto->precio_especial && $producto->precio_especial < $producto->precio_venta)
                                    <div class="flex items-center space-x-2">
                                        <span class="text-2xl font-bold text-arsenal-gold">Q{{ number_format($producto->precio_especial, 2) }}</span>
                                        <span class="text-sm text-gray-400 line-through">Q{{ number_format($producto->precio_venta, 2) }}</span>
                                    </div>
                                @else
                                    <span class="text-2xl font-bold text-arsenal-black">Q{{ number_format($producto->precio_venta, 2) }}</span>
                                @endif
                            </div>
                            
                            <!-- Stock -->
                            <p class="text-sm text-gray-600 mb-4">
                                <i class="fas fa-box mr-1"></i>
                                <span class="font-semibold">Stock:</span> {{ $stockTotal }} unidades
                            </p>
                            
                            <!-- Button -->
                            <a href="{{ route('web.producto.detalle', $producto->producto_id) }}" 
                               class="block w-full text-center bg-arsenal-black hover:bg-arsenal-gold text-white font-semibold py-3 rounded-lg transition-all duration-300">
                                Ver Detalles
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Mobile Button -->
            <div class="mt-12 text-center md:hidden">
                <a href="{{ route('web.productos') }}" class="btn-outline-gold inline-flex">
                    Ver Todo el Catálogo <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        @else
            <!-- No Products Message -->
            <div class="text-center py-20">
                <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-box-open text-5xl text-gray-400"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">No hay productos disponibles</h3>
                <p class="text-gray-600 mb-6">Estamos actualizando nuestro inventario. Vuelve pronto.</p>
                <a href="{{ route('web.contacto') }}" class="btn-gold inline-flex">
                    Contáctanos
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 bg-arsenal-black text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 right-0 w-96 h-96 bg-arsenal-gold rounded-full blur-3xl"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-display font-bold mb-4">¿Necesitas Asesoría?</h2>
        <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
            Nuestro equipo de expertos está listo para ayudarte a encontrar el producto perfecto para tus necesidades
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="https://wa.me/50259668844" target="_blank" class="btn-gold">
                <i class="fab fa-whatsapp mr-2"></i>Chatear por WhatsApp
            </a>
            <a href="tel:59668844" class="btn-outline-gold bg-white bg-opacity-10 backdrop-blur-sm">
                <i class="fas fa-phone-alt mr-2"></i>Llamar: 5966-8844
            </a>
        </div>
    </div>
</section>

@endsection


@vite('resources/js/general/index.js')