/**
 * ========================================
 * EL ARSENAL GUATEMALA - WEB JAVASCRIPT
 * Sistema completo para página web
 * ========================================
 */

// ========================================
// UTILIDADES GENERALES
// ========================================

/**
 * Cambiar imagen principal en detalle de producto
 */
function cambiarImagen(url) {
    const mainImage = document.getElementById('main-image');
    if (mainImage) {
        mainImage.src = url;
    }
}

/**
 * Compartir producto en redes sociales
 */
function compartirProducto() {
    if (navigator.share) {
        navigator.share({
            title: document.title,
            url: window.location.href
        }).catch(err => console.log('Error al compartir:', err));
    } else {
        // Fallback: copiar al portapapeles
        navigator.clipboard.writeText(window.location.href).then(() => {
            alert('¡Enlace copiado al portapapeles!');
        });
    }
}

/**
 * Toggle FAQ (Preguntas Frecuentes)
 */
function toggleFAQ(id) {
    const content = document.getElementById(`faq-content-${id}`);
    const icon = document.getElementById(`faq-icon-${id}`);
    
    if (content && icon) {
        content.classList.toggle('hidden');
        icon.classList.toggle('fa-chevron-down');
        icon.classList.toggle('fa-chevron-up');
    }
}

// ========================================
// FILTROS DE PRODUCTOS
// ========================================

/**
 * Toggle mobile filters
 */
function toggleFilters() {
    const form = document.getElementById('filter-form');
    const icon = document.getElementById('filter-icon');
    
    if (form && icon) {
        form.classList.toggle('hidden');
        icon.classList.toggle('fa-chevron-down');
        icon.classList.toggle('fa-chevron-up');
    }
}

/**
 * Cargar subcategorías dinámicamente según categoría seleccionada
 */
async function cargarSubcategorias() {
    const categoriaId = document.getElementById('categoria').value;
    const subcategoriaSelect = document.getElementById('subcategoria');
    
    if (!categoriaId) {
        subcategoriaSelect.disabled = true;
        subcategoriaSelect.innerHTML = '<option value="">Todas las subcategorías</option>';
        return;
    }
    
    try {
        // Mostrar loading
        subcategoriaSelect.innerHTML = '<option value="">Cargando...</option>';
        subcategoriaSelect.disabled = true;
        
        const response = await fetch(`/api/subcategorias/${categoriaId}`);
        
        if (!response.ok) {
            throw new Error('Error al cargar subcategorías');
        }
        
        const data = await response.json();
        
        // Habilitar select
        subcategoriaSelect.disabled = false;
        subcategoriaSelect.innerHTML = '<option value="">Todas las subcategorías</option>';
        
        // Agregar opciones
        data.forEach(subcat => {
            const option = document.createElement('option');
            option.value = subcat.subcategoria_id;
            option.textContent = subcat.subcategoria_nombre;
            subcategoriaSelect.appendChild(option);
        });
        
    } catch (error) {
        console.error('Error al cargar subcategorías:', error);
        subcategoriaSelect.innerHTML = '<option value="">Error al cargar</option>';
        subcategoriaSelect.disabled = false;
    }
}

/**
 * Cargar modelos dinámicamente según marca seleccionada
 */
async function cargarModelos() {
    const marcaId = document.getElementById('marca').value;
    const modeloSelect = document.getElementById('modelo');
    
    if (!marcaId) {
        modeloSelect.disabled = true;
        modeloSelect.innerHTML = '<option value="">Todos los modelos</option>';
        return;
    }
    
    try {
        // Mostrar loading
        modeloSelect.innerHTML = '<option value="">Cargando...</option>';
        modeloSelect.disabled = true;
        
        const response = await fetch(`/api/modelos/${marcaId}`);
        
        if (!response.ok) {
            throw new Error('Error al cargar modelos');
        }
        
        const data = await response.json();
        
        // Habilitar select
        modeloSelect.disabled = false;
        modeloSelect.innerHTML = '<option value="">Todos los modelos</option>';
        
        // Agregar opciones
        data.forEach(modelo => {
            const option = document.createElement('option');
            option.value = modelo.modelo_id;
            option.textContent = modelo.modelo_descripcion;
            modeloSelect.appendChild(option);
        });
        
    } catch (error) {
        console.error('Error al cargar modelos:', error);
        modeloSelect.innerHTML = '<option value="">Error al cargar</option>';
        modeloSelect.disabled = false;
    }
}

/**
 * Cambiar vista de productos (grid/list)
 */
function cambiarVista(vista) {
    const grid = document.getElementById('productos-grid');
    const btnGrid = document.getElementById('btn-grid');
    const btnList = document.getElementById('btn-list');
    
    if (!grid || !btnGrid || !btnList) return;
    
    if (vista === 'grid') {
        grid.className = 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-12';
        btnGrid.className = 'p-2 rounded bg-arsenal-gold text-white';
        btnList.className = 'p-2 rounded bg-gray-200 text-gray-600 hover:bg-gray-300';
        
        // Guardar preferencia
        localStorage.setItem('vistaProductos', 'grid');
    } else {
        grid.className = 'grid grid-cols-1 gap-4 mb-12';
        btnGrid.className = 'p-2 rounded bg-gray-200 text-gray-600 hover:bg-gray-300';
        btnList.className = 'p-2 rounded bg-arsenal-gold text-white';
        
        // Guardar preferencia
        localStorage.setItem('vistaProductos', 'list');
    }
}

/**
 * Restaurar vista guardada
 */
function restaurarVistaGuardada() {
    const vistaGuardada = localStorage.getItem('vistaProductos');
    if (vistaGuardada) {
        cambiarVista(vistaGuardada);
    }
}

/**
 * Toggle advanced filters
 */
function toggleAdvancedFilters() {
    // Por implementar si deseas filtros adicionales colapsables
    console.log('Toggle advanced filters');
}

// ========================================
// PRODUCTOS RELACIONADOS
// ========================================

/**
 * Cargar productos relacionados en detalle de producto
 */
async function cargarProductosRelacionados(categoriaId, productoActualId) {
    const container = document.getElementById('productos-relacionados');
    
    if (!container) return;
    
    try {
        const response = await fetch(`/api/productos-relacionados/${categoriaId}/${productoActualId}`);
        
        if (!response.ok) {
            throw new Error('Error al cargar productos relacionados');
        }
        
        const productos = await response.json();
        
        if (productos.length === 0) {
            container.innerHTML = `
                <div class="text-center py-12">
                    <i class="fas fa-box-open text-4xl text-gray-400 mb-4"></i>
                    <p class="text-gray-600">No hay productos relacionados disponibles</p>
                </div>
            `;
            return;
        }
        
        // Generar HTML de productos
        let html = '<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">';
        
        productos.forEach(producto => {
            const stockTotal = (producto.stock_series || 0) + (producto.stock_unidades || 0);
            const stockBadge = stockTotal > 0 
                ? '<span class="absolute top-3 right-3 bg-green-500 text-white px-2 py-1 rounded-full text-xs font-bold"><i class="fas fa-check mr-1"></i>Disponible</span>'
                : '<span class="absolute top-3 right-3 bg-red-500 text-white px-2 py-1 rounded-full text-xs font-bold">Agotado</span>';
            
            const imagenUrl = producto.foto_url 
                ? `/storage/${producto.foto_url}` 
                : 'data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 400 300%22%3E%3Crect fill=%22%23f3f4f6%22 width=%22400%22 height=%22300%22/%3E%3Ctext x=%22200%22 y=%22150%22 font-size=%2224%22 text-anchor=%22middle%22 fill=%22%23D4AF37%22%3ESin imagen%3C/text%3E%3C/svg%3E';
            
            const precioHtml = producto.precio_especial && producto.precio_especial < producto.precio_venta
                ? `<div class="flex items-center space-x-2">
                       <span class="text-xl font-bold text-arsenal-gold">Q${parseFloat(producto.precio_especial).toFixed(2)}</span>
                       <span class="text-xs text-gray-400 line-through">Q${parseFloat(producto.precio_venta).toFixed(2)}</span>
                   </div>`
                : `<span class="text-xl font-bold text-arsenal-black">Q${parseFloat(producto.precio_venta).toFixed(2)}</span>`;
            
            html += `
                <div class="product-card">
                    <div class="relative h-56 bg-gray-100 overflow-hidden group">
                        <img src="${imagenUrl}" 
                             alt="${producto.producto_nombre}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                             onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 400 300%22%3E%3Crect fill=%22%23f3f4f6%22 width=%22400%22 height=%22300%22/%3E%3Ctext x=%22200%22 y=%22150%22 font-size=%2224%22 text-anchor=%22middle%22 fill=%22%23D4AF37%22%3ESin imagen%3C/text%3E%3C/svg%3E'">
                        ${stockBadge}
                    </div>
                    <div class="p-5">
                        <span class="inline-block bg-arsenal-gold bg-opacity-10 text-arsenal-gold px-2 py-1 rounded-full text-xs font-semibold mb-2">
                            ${producto.categoria_nombre}
                        </span>
                        <h3 class="text-lg font-bold text-arsenal-black mb-2 line-clamp-2 hover:text-arsenal-gold transition-colors">
                            <a href="/productos/${producto.producto_id}">
                                ${producto.producto_nombre}
                            </a>
                        </h3>
                        <p class="text-sm text-gray-600 mb-3">
                            <span class="font-semibold">Marca:</span> ${producto.marca_descripcion}
                        </p>
                        <div class="mb-3">
                            ${precioHtml}
                        </div>
                        <a href="/productos/${producto.producto_id}" 
                           class="block w-full text-center bg-arsenal-black hover:bg-arsenal-gold text-white font-semibold py-2 rounded-lg transition-all duration-300 text-sm">
                            Ver Detalles
                        </a>
                    </div>
                </div>
            `;
        });
        
        html += '</div>';
        container.innerHTML = html;
        
    } catch (error) {
        console.error('Error al cargar productos relacionados:', error);
        container.innerHTML = `
            <div class="text-center py-12">
                <i class="fas fa-exclamation-triangle text-4xl text-red-400 mb-4"></i>
                <p class="text-gray-600">Error al cargar productos relacionados</p>
            </div>
        `;
    }
}

// ========================================
// VALIDACIÓN DE FORMULARIOS
// ========================================

/**
 * Validar formulario de contacto
 */
function validarFormularioContacto() {
    const form = document.getElementById('contact-form');
    
    if (!form) return;
    
    form.addEventListener('submit', function(e) {
        const nombre = document.getElementById('nombre').value.trim();
        const email = document.getElementById('email').value.trim();
        const mensaje = document.getElementById('mensaje').value.trim();
        const aceptoPolitica = document.querySelector('input[name="acepto_politica"]').checked;
        
        let errores = [];
        
        if (nombre === '') {
            errores.push('El nombre es obligatorio');
        }
        
        if (email === '') {
            errores.push('El correo electrónico es obligatorio');
        } else if (!validarEmail(email)) {
            errores.push('El correo electrónico no es válido');
        }
        
        if (mensaje === '') {
            errores.push('El mensaje es obligatorio');
        } else if (mensaje.length < 10) {
            errores.push('El mensaje debe tener al menos 10 caracteres');
        }
        
        if (!aceptoPolitica) {
            errores.push('Debes aceptar la política de privacidad');
        }
        
        if (errores.length > 0) {
            e.preventDefault();
            alert('Por favor corrige los siguientes errores:\n\n' + errores.join('\n'));
            return false;
        }
        
        return true;
    });
}

/**
 * Validar formato de email
 */
function validarEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

// ========================================
// ANIMACIONES Y EFECTOS
// ========================================

/**
 * Smooth scroll para enlaces internos
 */
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            
            // Ignorar # vacío
            if (href === '#') return;
            
            e.preventDefault();
            const target = document.querySelector(href);
            
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

/**
 * Lazy loading para imágenes
 */
function initLazyLoading() {
    const images = document.querySelectorAll('img[data-src]');
    
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.removeAttribute('data-src');
                observer.unobserve(img);
            }
        });
    });
    
    images.forEach(img => imageObserver.observe(img));
}

/**
 * Scroll to top button
 */
function initScrollToTop() {
    const scrollBtn = document.createElement('button');
    scrollBtn.innerHTML = '<i class="fas fa-arrow-up"></i>';
    scrollBtn.className = 'fixed bottom-24 right-6 bg-arsenal-gold text-white w-12 h-12 rounded-full shadow-lg hover:bg-arsenal-dark-gold transition-all duration-300 hidden z-40';
    scrollBtn.id = 'scroll-to-top';
    
    document.body.appendChild(scrollBtn);
    
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            scrollBtn.classList.remove('hidden');
        } else {
            scrollBtn.classList.add('hidden');
        }
    });
    
    scrollBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

// ========================================
// INICIALIZACIÓN
// ========================================

/**
 * Inicializar todas las funciones cuando el DOM esté listo
 */
document.addEventListener('DOMContentLoaded', function() {
    console.log('🎯 Arsenal Web - Sistema cargado correctamente');
    
    // Inicializar funciones generales
    initSmoothScroll();
    initScrollToTop();
    
    // Validar formulario de contacto si existe
    if (document.getElementById('contact-form')) {
        validarFormularioContacto();
    }
    
    // Cargar subcategorías si ya hay una categoría seleccionada
    const categoriaSelect = document.getElementById('categoria');
    if (categoriaSelect && categoriaSelect.value) {
        cargarSubcategorias();
        
        // Limpiar subcategoría cuando se cambia la categoría
        categoriaSelect.addEventListener('change', function() {
            const subcategoriaSelect = document.getElementById('subcategoria');
            if (subcategoriaSelect) {
                subcategoriaSelect.value = '';
            }
        });
    }
    
    // Cargar modelos si ya hay una marca seleccionada
    const marcaSelect = document.getElementById('marca');
    if (marcaSelect && marcaSelect.value) {
        cargarModelos();
        
        // Limpiar modelo cuando se cambia la marca
        marcaSelect.addEventListener('change', function() {
            const modeloSelect = document.getElementById('modelo');
            if (modeloSelect) {
                modeloSelect.value = '';
            }
        });
    }
    
    // Restaurar vista guardada de productos
    restaurarVistaGuardada();
    
    // Cargar productos relacionados si estamos en detalle de producto
    const productoDetalleData = document.querySelector('[data-producto-categoria]');
    if (productoDetalleData) {
        const categoriaId = productoDetalleData.dataset.productoCategoria;
        const productoId = productoDetalleData.dataset.productoId;
        cargarProductosRelacionados(categoriaId, productoId);
    }
    
    // Auto-submit en cambio de orden (opcional - comentado por defecto)
    /*
    const ordenSelect = document.getElementById('orden');
    if (ordenSelect) {
        ordenSelect.addEventListener('change', function() {
            document.getElementById('filter-form').submit();
        });
    }
    */
});

// ========================================
// EXPONER FUNCIONES GLOBALES
// ========================================

window.arsenalWeb = {
    cambiarImagen,
    compartirProducto,
    toggleFAQ,
    toggleFilters,
    cargarSubcategorias,
    cargarModelos,
    cambiarVista,
    cargarProductosRelacionados
};