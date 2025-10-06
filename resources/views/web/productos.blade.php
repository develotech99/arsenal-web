@extends('layouts.app')

@section('title', 'Catálogo de Productos - El Arsenal Guatemala')

@section('content')

<!-- Header Section -->
<section class="bg-gradient-to-r from-arsenal-black to-arsenal-gray text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-display font-bold mb-4">Catálogo de Productos</h1>
            <div class="gold-divider mb-4"></div>
            <p class="text-gray-300 text-lg max-w-2xl mx-auto">
                Explora nuestra amplia selección de productos de calidad profesional
            </p>
        </div>
    </div>
</section>

<!-- Filters and Products -->
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Advanced Filters -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold text-arsenal-black flex items-center">
                    <i class="fas fa-filter text-arsenal-gold mr-2"></i>
                    Filtros de Búsqueda
                </h3>
                <button type="button" 
                        onclick="toggleFilters()" 
                        class="md:hidden text-arsenal-gold font-semibold">
                    <i class="fas fa-chevron-down" id="filter-icon"></i>
                </button>
            </div>
            
            <form method="GET" action="{{ route('web.productos') }}" id="filter-form" class="space-y-4">
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    
                    <!-- Search by Name -->
                    <div class="lg:col-span-3">
                        <label for="buscar" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-search mr-1 text-arsenal-gold"></i>Buscar por nombre
                        </label>
                        <input type="text" 
                               name="buscar" 
                               id="buscar"
                               value="{{ request('buscar') }}"
                               placeholder="Ej: Glock, M4, chaleco..."
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-arsenal-gold focus:border-arsenal-gold transition-all">
                    </div>
                    
                    <!-- Category Filter -->
                    <div>
                        <label for="categoria" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-th-large mr-1 text-arsenal-gold"></i>Categoría
                        </label>
                        <select name="categoria" 
                                id="categoria"
                                onchange="cargarSubcategorias()"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-arsenal-gold focus:border-arsenal-gold transition-all">
                            <option value="">Todas las categorías</option>
                            @if(isset($categorias))
                                @foreach($categorias as $cat)
                                    <option value="{{ $cat->categoria_id }}" {{ request('categoria') == $cat->categoria_id ? 'selected' : '' }}>
                                        {{ $cat->categoria_nombre }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    
                    <!-- Subcategory Filter -->
                    <div>
                        <label for="subcategoria" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-layer-group mr-1 text-arsenal-gold"></i>Subcategoría
                        </label>
                        <select name="subcategoria" 
                                id="subcategoria"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-arsenal-gold focus:border-arsenal-gold transition-all"
                                {{ !request('categoria') ? 'disabled' : '' }}>
                            <option value="">Todas las subcategorías</option>
                            @if(isset($subcategorias))
                                @foreach($subcategorias as $subcat)
                                    <option value="{{ $subcat->subcategoria_id }}" {{ request('subcategoria') == $subcat->subcategoria_id ? 'selected' : '' }}>
                                        {{ $subcat->subcategoria_nombre }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    
                    <!-- Brand Filter -->
                    <div>
                        <label for="marca" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-tag mr-1 text-arsenal-gold"></i>Marca
                        </label>
                        <select name="marca" 
                                id="marca"
                                onchange="cargarModelos()"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-arsenal-gold focus:border-arsenal-gold transition-all">
                            <option value="">Todas las marcas</option>
                            @if(isset($marcas))
                                @foreach($marcas as $marca)
                                    <option value="{{ $marca->marca_id }}" {{ request('marca') == $marca->marca_id ? 'selected' : '' }}>
                                        {{ $marca->marca_descripcion }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    
                    <!-- Model Filter -->
                    <div>
                        <label for="modelo" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-cube mr-1 text-arsenal-gold"></i>Modelo
                        </label>
                        <select name="modelo" 
                                id="modelo"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-arsenal-gold focus:border-arsenal-gold transition-all"
                                {{ !request('marca') ? 'disabled' : '' }}>
                            <option value="">Todos los modelos</option>
                            @if(isset($modelos))
                                @foreach($modelos as $modelo)
                                    <option value="{{ $modelo->modelo_id }}" {{ request('modelo') == $modelo->modelo_id ? 'selected' : '' }}>
                                        {{ $modelo->modelo_descripcion }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    
                    <!-- Stock Filter -->
                    <div>
                        <label for="stock" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-boxes mr-1 text-arsenal-gold"></i>Disponibilidad
                        </label>
                        <select name="stock" 
                                id="stock"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-arsenal-gold focus:border-arsenal-gold transition-all">
                            <option value="">Todos los productos</option>
                            <option value="disponible" {{ request('stock') == 'disponible' ? 'selected' : '' }}>Solo disponibles</option>
                            <option value="agotado" {{ request('stock') == 'agotado' ? 'selected' : '' }}>Agotados</option>
                        </select>
                    </div>
                    
                    <!-- Order By -->
                    <div>
                        <label for="orden" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-sort mr-1 text-arsenal-gold"></i>Ordenar por
                        </label>
                        <select name="orden" 
                                id="orden"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-arsenal-gold focus:border-arsenal-gold transition-all">
                            <option value="reciente" {{ request('orden') == 'reciente' ? 'selected' : '' }}>Más recientes</option>
                            <option value="nombre_asc" {{ request('orden') == 'nombre_asc' ? 'selected' : '' }}>Nombre (A-Z)</option>
                            <option value="nombre_desc" {{ request('orden') == 'nombre_desc' ? 'selected' : '' }}>Nombre (Z-A)</option>
                            <option value="precio_asc" {{ request('orden') == 'precio_asc' ? 'selected' : '' }}>Precio: Menor a Mayor</option>
                            <option value="precio_desc" {{ request('orden') == 'precio_desc' ? 'selected' : '' }}>Precio: Mayor a Menor</option>
                        </select>
                    </div>
                    
                </div>
                
                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-gray-200">
                    <button type="submit" class="btn-gold flex-1 sm:flex-initial">
                        <i class="fas fa-search mr-2"></i>Buscar Productos
                    </button>
                    <a href="{{ route('web.productos') }}" class="btn-outline-gold flex-1 sm:flex-initial text-center">
                        <i class="fas fa-redo mr-2"></i>Limpiar Filtros
                    </a>
                    <button type="button" onclick="toggleAdvancedFilters()" class="hidden sm:block text-arsenal-gold hover:text-arsenal-dark-gold font-semibold transition-colors">
                        <i class="fas fa-sliders-h mr-1"></i>Opciones Avanzadas
                    </button>
                </div>
            </form>
        </div>
        
        <!-- Active Filters Tags -->
        @if(request()->hasAny(['buscar', 'categoria', 'subcategoria', 'marca', 'modelo', 'stock']))
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 mb-6">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="text-sm font-semibold text-gray-700">
                        <i class="fas fa-filter mr-1"></i>Filtros activos:
                    </span>
                    
                    @if(request('buscar'))
                        <span class="inline-flex items-center bg-arsenal-gold bg-opacity-10 text-arsenal-gold px-3 py-1 rounded-full text-sm">
                            <i class="fas fa-search mr-1"></i>
                            "{{ request('buscar') }}"
                            <a href="{{ route('web.productos', array_merge(request()->except('buscar'))) }}" class="ml-2 hover:text-arsenal-dark-gold">
                                <i class="fas fa-times"></i>
                            </a>
                        </span>
                    @endif
                    
                    @if(request('categoria'))
                        @php
                            $catNombre = $categorias->firstWhere('categoria_id', request('categoria'))->categoria_nombre ?? '';
                        @endphp
                        <span class="inline-flex items-center bg-arsenal-gold bg-opacity-10 text-arsenal-gold px-3 py-1 rounded-full text-sm">
                            <i class="fas fa-th-large mr-1"></i>
                            {{ $catNombre }}
                            <a href="{{ route('web.productos', array_merge(request()->except(['categoria', 'subcategoria']))) }}" class="ml-2 hover:text-arsenal-dark-gold">
                                <i class="fas fa-times"></i>
                            </a>
                        </span>
                    @endif
                    
                    @if(request('subcategoria'))
                        @php
                            $subcatNombre = $subcategorias->firstWhere('subcategoria_id', request('subcategoria'))->subcategoria_nombre ?? '';
                        @endphp
                        <span class="inline-flex items-center bg-arsenal-gold bg-opacity-10 text-arsenal-gold px-3 py-1 rounded-full text-sm">
                            <i class="fas fa-layer-group mr-1"></i>
                            {{ $subcatNombre }}
                            <a href="{{ route('web.productos', request()->except('subcategoria')) }}" class="ml-2 hover:text-arsenal-dark-gold">
                                <i class="fas fa-times"></i>
                            </a>
                        </span>
                    @endif
                    
                    @if(request('marca'))
                        @php
                            $marcaNombre = $marcas->firstWhere('marca_id', request('marca'))->marca_descripcion ?? '';
                        @endphp
                        <span class="inline-flex items-center bg-arsenal-gold bg-opacity-10 text-arsenal-gold px-3 py-1 rounded-full text-sm">
                            <i class="fas fa-tag mr-1"></i>
                            {{ $marcaNombre }}
                            <a href="{{ route('web.productos', array_merge(request()->except(['marca', 'modelo']))) }}" class="ml-2 hover:text-arsenal-dark-gold">
                                <i class="fas fa-times"></i>
                            </a>
                        </span>
                    @endif
                    
                    @if(request('modelo'))
                        @php
                            $modeloNombre = $modelos->firstWhere('modelo_id', request('modelo'))->modelo_descripcion ?? '';
                        @endphp
                        <span class="inline-flex items-center bg-arsenal-gold bg-opacity-10 text-arsenal-gold px-3 py-1 rounded-full text-sm">
                            <i class="fas fa-cube mr-1"></i>
                            {{ $modeloNombre }}
                            <a href="{{ route('web.productos', request()->except('modelo')) }}" class="ml-2 hover:text-arsenal-dark-gold">
                                <i class="fas fa-times"></i>
                            </a>
                        </span>
                    @endif
                    
                    @if(request('stock'))
                        <span class="inline-flex items-center bg-arsenal-gold bg-opacity-10 text-arsenal-gold px-3 py-1 rounded-full text-sm">
                            <i class="fas fa-boxes mr-1"></i>
                            {{ request('stock') == 'disponible' ? 'Solo disponibles' : 'Agotados' }}
                            <a href="{{ route('web.productos', request()->except('stock')) }}" class="ml-2 hover:text-arsenal-dark-gold">
                                <i class="fas fa-times"></i>
                            </a>
                        </span>
                    @endif
                    
                    <a href="{{ route('web.productos') }}" class="text-sm text-red-600 hover:text-red-700 font-semibold ml-2">
                        <i class="fas fa-times-circle mr-1"></i>Limpiar todos
                    </a>
                </div>
            </div>
        @endif
        
        <!-- Results Count -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
            <p class="text-gray-600">
                <span class="font-semibold text-arsenal-black text-lg">{{ $productos->total() }}</span> 
                <span class="text-gray-600">productos encontrados</span>
            </p>
            
            <!-- View Mode Toggle (opcional) -->
            <div class="flex items-center gap-2">
                <span class="text-sm text-gray-600">Vista:</span>
                <button onclick="cambiarVista('grid')" id="btn-grid" class="p-2 rounded bg-arsenal-gold text-white">
                    <i class="fas fa-th"></i>
                </button>
                <button onclick="cambiarVista('list')" id="btn-list" class="p-2 rounded bg-gray-200 text-gray-600 hover:bg-gray-300">
                    <i class="fas fa-list"></i>
                </button>
            </div>
        </div>
        
        <!-- Products Grid -->
        @if($productos->count() > 0)
            <div id="productos-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-12">
                @foreach($productos as $producto)
                    <div class="product-card">
                        <!-- Image -->
                        <div class="relative h-56 bg-gray-100 overflow-hidden group">
                            @if($producto->foto_url)
                                <img src="{{ asset('storage/' . $producto->foto_url) }}" 
                                     alt="{{ $producto->producto_nombre }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                     onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 400 300%22%3E%3Crect fill=%22%23f3f4f6%22 width=%22400%22 height=%22300%22/%3E%3Ctext x=%22200%22 y=%22150%22 font-size=%2224%22 text-anchor=%22middle%22 fill=%22%23D4AF37%22%3ESin imagen%3C/text%3E%3C/svg%3E'">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gray-100">
                                    <i class="fas fa-image text-5xl text-gray-300"></i>
                                </div>
                            @endif
                            
                            <!-- Stock Badge -->
                            @php
                                $stockTotal = ($producto->stock_series ?? 0) + ($producto->stock_unidades ?? 0);
                            @endphp
                            
                            @if($stockTotal > 0)
                                <span class="absolute top-3 right-3 bg-green-500 text-white px-2 py-1 rounded-full text-xs font-bold">
                                    <i class="fas fa-check mr-1"></i>Disponible
                                </span>
                            @else
                                <span class="absolute top-3 right-3 bg-red-500 text-white px-2 py-1 rounded-full text-xs font-bold">
                                    Agotado
                                </span>
                            @endif
                        </div>
                        
                        <!-- Content -->
                        <div class="p-5">
                            <!-- Category -->
                            <div class="flex items-center justify-between mb-2">
                                <span class="inline-block bg-arsenal-gold bg-opacity-10 text-arsenal-gold px-2 py-1 rounded-full text-xs font-semibold">
                                    {{ $producto->categoria_nombre }}
                                </span>
                                @if($producto->subcategoria_nombre)
                                    <span class="text-xs text-gray-500">
                                        {{ $producto->subcategoria_nombre }}
                                    </span>
                                @endif
                            </div>
                            
                            <!-- Title -->
                            <h3 class="text-lg font-bold text-arsenal-black mb-2 line-clamp-2 hover:text-arsenal-gold transition-colors">
                                <a href="{{ route('web.producto.detalle', $producto->producto_id) }}">
                                    {{ $producto->producto_nombre }}
                                </a>
                            </h3>
                            
                            <!-- Details -->
                            <div class="space-y-1 mb-3 text-xs text-gray-600">
                                <p><span class="font-semibold">Marca:</span> {{ $producto->marca_descripcion }}</p>
                                @if($producto->modelo_descripcion)
                                    <p><span class="font-semibold">Modelo:</span> {{ $producto->modelo_descripcion }}</p>
                                @endif
                            </div>
                            
                            <!-- Price -->
                            <div class="mb-3">
                                @if($producto->precio_especial && $producto->precio_especial < $producto->precio_venta)
                                    <div class="flex items-center space-x-2">
                                        <span class="text-xl font-bold text-arsenal-gold">Q{{ number_format($producto->precio_especial, 2) }}</span>
                                        <span class="text-xs text-gray-400 line-through">Q{{ number_format($producto->precio_venta, 2) }}</span>
                                    </div>
                                @else
                                    <span class="text-xl font-bold text-arsenal-black">Q{{ number_format($producto->precio_venta, 2) }}</span>
                                @endif
                            </div>
                            
                            <!-- Stock Info -->
                            <p class="text-xs text-gray-600 mb-3">
                                <i class="fas fa-box mr-1"></i>
                                <span class="font-semibold">Stock:</span> {{ $stockTotal }} unidades
                            </p>
                            
                            <!-- Button -->
                            <a href="{{ route('web.producto.detalle', $producto->producto_id) }}" 
                               class="block w-full text-center bg-arsenal-black hover:bg-arsenal-gold text-white font-semibold py-2 rounded-lg transition-all duration-300 text-sm">
                                Ver Detalles
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="flex justify-center">
                {{ $productos->appends(request()->query())->links() }}
            </div>
        @else
            <!-- No Results -->
            <div class="text-center py-20 bg-white rounded-xl shadow-sm">
                <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-search text-5xl text-gray-400"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">No se encontraron productos</h3>
                <p class="text-gray-600 mb-6">Intenta ajustar los filtros de búsqueda o explora otras categorías</p>
                <a href="{{ route('web.productos') }}" class="btn-gold inline-flex">
                    <i class="fas fa-redo mr-2"></i>Ver Todos los Productos
                </a>
            </div>
        @endif
        
    </div>
</section>

@endsection