<nav class="bg-white shadow-lg sticky top-0 z-50 border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('web.home') }}" class="flex items-center space-x-3 group">
                    <!-- Logo Icon -->
                    <div class="w-14 h-14 bg-arsenal-black rounded-full flex items-center justify-center group-hover:bg-arsenal-gold transition-all duration-300 shadow-md">
                        <span class="text-arsenal-gold group-hover:text-white font-display font-black text-2xl transition-colors">EA</span>
                    </div>
                    <!-- Logo Text -->
                    <div class="hidden sm:block">
                        <h1 class="text-xl font-display font-bold text-arsenal-black group-hover:text-arsenal-gold transition-colors leading-tight">
                            EL ARSENAL
                        </h1>
                        <p class="text-xs text-gray-600 uppercase tracking-wider font-semibold">Guatemala</p>
                    </div>
                </a>
            </div>
            
            <!-- Desktop Navigation -->
            <div class="hidden md:flex md:items-center md:space-x-1">
                <a href="{{ route('web.home') }}" 
                   class="px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-300 flex items-center
                          {{ request()->routeIs('web.home') ? 'bg-arsenal-gold text-white shadow-md' : 'text-arsenal-black hover:bg-arsenal-gold hover:text-white' }}">
                    <i class="fas fa-home mr-2"></i>
                    <span>Inicio</span>
                </a>
                
                <a href="{{ route('web.productos') }}" 
                   class="px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-300 flex items-center
                          {{ request()->routeIs('web.productos') || request()->routeIs('web.producto.detalle') ? 'bg-arsenal-gold text-white shadow-md' : 'text-arsenal-black hover:bg-arsenal-gold hover:text-white' }}">
                    <i class="fas fa-boxes mr-2"></i>
                    <span>Productos</span>
                </a>
                
                <a href="{{ route('web.nosotros') }}" 
                   class="px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-300 flex items-center
                          {{ request()->routeIs('web.nosotros') ? 'bg-arsenal-gold text-white shadow-md' : 'text-arsenal-black hover:bg-arsenal-gold hover:text-white' }}">
                    <i class="fas fa-users mr-2"></i>
                    <span>Nosotros</span>
                </a>
                
                <a href="{{ route('web.contacto') }}" 
                   class="px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-300 flex items-center
                          {{ request()->routeIs('web.contacto') ? 'bg-arsenal-gold text-white shadow-md' : 'text-arsenal-black hover:bg-arsenal-gold hover:text-white' }}">
                    <i class="fas fa-envelope mr-2"></i>
                    <span>Contacto</span>
                </a>
            </div>
            
            <!-- Call to Action Desktop -->
            <div class="hidden md:flex items-center space-x-4">
                <!-- Phone -->
                <a href="tel:59668844" 
                   class="flex items-center space-x-2 text-arsenal-black hover:text-arsenal-gold transition-colors group">
                    <div class="w-10 h-10 bg-arsenal-gold bg-opacity-10 rounded-lg flex items-center justify-center group-hover:bg-arsenal-gold transition-all">
                        <i class="fas fa-phone-alt text-arsenal-gold group-hover:text-white transition-colors"></i>
                    </div>
                    <div class="hidden lg:block">
                        <p class="text-xs text-gray-500 leading-none">Llámanos</p>
                        <p class="font-bold text-sm leading-tight">5966-8844</p>
                    </div>
                </a>
                
                <!-- WhatsApp -->
                <a href="https://wa.me/50259668844" 
                   target="_blank"
                   rel="noopener noreferrer"
                   class="flex items-center space-x-2 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg">
                    <i class="fab fa-whatsapp text-lg"></i>
                    <span class="font-semibold text-sm">WhatsApp</span>
                </a>
            </div>
            
            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button type="button" 
                        onclick="toggleMobileMenu()"
                        id="mobile-menu-button"
                        class="inline-flex items-center justify-center p-2 rounded-lg text-arsenal-black hover:bg-arsenal-gold hover:text-white transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-arsenal-gold"
                        aria-label="Abrir menú">
                    <i class="fas fa-bars text-2xl" id="menu-icon"></i>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200 shadow-lg">
        <div class="px-4 pt-2 pb-4 space-y-2">
            
            <!-- Menu Items -->
            <a href="{{ route('web.home') }}" 
               class="block px-4 py-3 rounded-lg text-base font-semibold transition-all duration-300 flex items-center
                      {{ request()->routeIs('web.home') ? 'bg-arsenal-gold text-white' : 'text-arsenal-black hover:bg-arsenal-gold hover:text-white' }}">
                <i class="fas fa-home mr-3 w-5"></i>
                <span>Inicio</span>
            </a>
            
            <a href="{{ route('web.productos') }}" 
               class="block px-4 py-3 rounded-lg text-base font-semibold transition-all duration-300 flex items-center
                      {{ request()->routeIs('web.productos') || request()->routeIs('web.producto.detalle') ? 'bg-arsenal-gold text-white' : 'text-arsenal-black hover:bg-arsenal-gold hover:text-white' }}">
                <i class="fas fa-boxes mr-3 w-5"></i>
                <span>Productos</span>
            </a>
            
            <a href="{{ route('web.nosotros') }}" 
               class="block px-4 py-3 rounded-lg text-base font-semibold transition-all duration-300 flex items-center
                      {{ request()->routeIs('web.nosotros') ? 'bg-arsenal-gold text-white' : 'text-arsenal-black hover:bg-arsenal-gold hover:text-white' }}">
                <i class="fas fa-users mr-3 w-5"></i>
                <span>Nosotros</span>
            </a>
            
            <a href="{{ route('web.contacto') }}" 
               class="block px-4 py-3 rounded-lg text-base font-semibold transition-all duration-300 flex items-center
                      {{ request()->routeIs('web.contacto') ? 'bg-arsenal-gold text-white' : 'text-arsenal-black hover:bg-arsenal-gold hover:text-white' }}">
                <i class="fas fa-envelope mr-3 w-5"></i>
                <span>Contacto</span>
            </a>
            
            <!-- Divider -->
            <div class="border-t border-gray-200 my-3"></div>
            
            <!-- Contact Actions Mobile -->
            <a href="tel:59668844" 
               class="block px-4 py-3 rounded-lg text-base font-semibold text-arsenal-black hover:bg-arsenal-gold hover:text-white transition-all duration-300 flex items-center">
                <i class="fas fa-phone-alt mr-3 w-5"></i>
                <div>
                    <p class="text-xs opacity-75">Llámanos</p>
                    <p class="font-bold">5966-8844</p>
                </div>
            </a>
            
            <a href="https://wa.me/50259668844" 
               target="_blank"
               rel="noopener noreferrer"
               class="block px-4 py-3 rounded-lg text-base font-semibold bg-green-500 text-white hover:bg-green-600 transition-all duration-300 flex items-center justify-center">
                <i class="fab fa-whatsapp mr-2 text-xl"></i>
                <span>Chatear por WhatsApp</span>
            </a>
            
            <!-- Social Media Mobile -->
            <div class="pt-3">
                <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold mb-2 px-4">Síguenos</p>
                <div class="flex justify-center space-x-4">
                    <a href="https://www.facebook.com/profile.php?id=61567680477732" 
                       target="_blank"
                       rel="noopener noreferrer"
                       class="w-12 h-12 bg-arsenal-gold bg-opacity-10 hover:bg-arsenal-gold rounded-lg flex items-center justify-center transition-all duration-300 group">
                        <i class="fab fa-facebook-f text-arsenal-gold group-hover:text-white transition-colors"></i>
                    </a>
                    <a href="https://wa.me/50259668844" 
                       target="_blank"
                       rel="noopener noreferrer"
                       class="w-12 h-12 bg-arsenal-gold bg-opacity-10 hover:bg-arsenal-gold rounded-lg flex items-center justify-center transition-all duration-300 group">
                        <i class="fab fa-whatsapp text-arsenal-gold group-hover:text-white transition-colors"></i>
                    </a>
                    <a href="#" 
                       class="w-12 h-12 bg-arsenal-gold bg-opacity-10 hover:bg-arsenal-gold rounded-lg flex items-center justify-center transition-all duration-300 group">
                        <i class="fab fa-instagram text-arsenal-gold group-hover:text-white transition-colors"></i>
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</nav>

<!-- JavaScript para el menú móvil -->
<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        const icon = document.getElementById('menu-icon');
        const button = document.getElementById('mobile-menu-button');
        
        if (menu && icon) {
            const isHidden = menu.classList.contains('hidden');
            
            if (isHidden) {
                // Abrir menú
                menu.classList.remove('hidden');
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
                button.setAttribute('aria-label', 'Cerrar menú');
            } else {
                // Cerrar menú
                menu.classList.add('hidden');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
                button.setAttribute('aria-label', 'Abrir menú');
            }
        }
    }
    
    // Cerrar menú móvil al hacer clic en un enlace
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenu) {
            const links = mobileMenu.querySelectorAll('a');
            links.forEach(link => {
                link.addEventListener('click', function() {
                    // Cerrar menú después de hacer clic
                    setTimeout(() => {
                        toggleMobileMenu();
                    }, 200);
                });
            });
        }
    });
    
    // Cerrar menú móvil al cambiar tamaño de ventana
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            if (window.innerWidth >= 768) {
                const menu = document.getElementById('mobile-menu');
                const icon = document.getElementById('menu-icon');
                const button = document.getElementById('mobile-menu-button');
                
                if (menu && !menu.classList.contains('hidden')) {
                    menu.classList.add('hidden');
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                    button.setAttribute('aria-label', 'Abrir menú');
                }
            }
        }, 250);
    });
</script>