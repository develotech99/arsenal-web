<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="El Arsenal Guatemala - Soluciones integrales en armamento, cargadores y accesorios tácticos de la más alta calidad">
    <meta name="keywords" content="armería, armas, Guatemala, accesorios tácticos, municiones, seguridad">
    <meta name="author" content="El Arsenal Guatemala">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'El Arsenal Guatemala - Armería Profesional')">
    <meta property="og:description" content="Soluciones integrales en armamento, cargadores y accesorios tácticos">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', 'El Arsenal Guatemala')">
    <meta property="twitter:description" content="Soluciones integrales en armamento y accesorios tácticos">
    
    <!-- Title -->
    <title>@yield('title', 'El Arsenal Guatemala - Armería Profesional')</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
          crossorigin="anonymous" 
          referrerpolicy="no-referrer" />
    
    <!-- Vite CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Estilos adicionales por página -->
    @stack('styles')
    
    <!-- Google Analytics (opcional) -->
    @if(config('services.analytics.enabled', false))
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.analytics.tracking_id') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ config("services.analytics.tracking_id") }}');
        </script>
    @endif
</head>
<body class="bg-white text-arsenal-black antialiased">
    
    <!-- Navigation -->
    @include('layouts.navigation')
    
    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>
    
    <!-- Footer -->
    @include('layouts.footer')
    
    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/50259668844?text=Hola%2C%20quisiera%20más%20información%20sobre%20sus%20productos" 
       target="_blank"
       rel="noopener noreferrer"
       class="fixed bottom-6 right-6 bg-green-500 hover:bg-green-600 text-white w-16 h-16 rounded-full flex items-center justify-center shadow-2xl transition-all duration-300 hover:scale-110 z-50 group"
       aria-label="Contactar por WhatsApp">
        <i class="fab fa-whatsapp text-3xl group-hover:animate-pulse"></i>
        <span class="absolute -top-2 -left-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full animate-bounce">
            Online
        </span>
    </a>
    
    <!-- Scroll to Top Button (se crea dinámicamente con JS) -->
    
    <!-- Scripts -->
    
    <!-- JavaScript Principal -->
    <script src="{{ asset('js/arsenal-web.js') }}" defer></script>
    
    <!-- Scripts adicionales por página -->
    @stack('scripts')
    
    <!-- Mensajes Flash (Toast notifications) -->
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                mostrarNotificacion('success', '{{ session("success") }}');
            });
        </script>
    @endif
    
    @if(session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                mostrarNotificacion('error', '{{ session("error") }}');
            });
        </script>
    @endif
    
    @if(session('warning'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                mostrarNotificacion('warning', '{{ session("warning") }}');
            });
        </script>
    @endif
    
    @if(session('info'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                mostrarNotificacion('info', '{{ session("info") }}');
            });
        </script>
    @endif
    
    <!-- Sistema de Notificaciones Toast -->
    <script>
        /**
         * Mostrar notificación toast
         */
        function mostrarNotificacion(tipo, mensaje) {
            // Crear contenedor si no existe
            let container = document.getElementById('toast-container');
            if (!container) {
                container = document.createElement('div');
                container.id = 'toast-container';
                container.className = 'fixed top-20 right-6 z-50 space-y-4';
                document.body.appendChild(container);
            }
            
            // Colores según tipo
            const colores = {
                success: 'bg-green-500',
                error: 'bg-red-500',
                warning: 'bg-yellow-500',
                info: 'bg-blue-500'
            };
            
            const iconos = {
                success: 'fa-check-circle',
                error: 'fa-times-circle',
                warning: 'fa-exclamation-triangle',
                info: 'fa-info-circle'
            };
            
            // Crear toast
            const toast = document.createElement('div');
            toast.className = `${colores[tipo]} text-white px-6 py-4 rounded-lg shadow-2xl flex items-center space-x-3 min-w-[300px] max-w-md transform transition-all duration-300 translate-x-[400px]`;
            toast.innerHTML = `
                <i class="fas ${iconos[tipo]} text-2xl"></i>
                <span class="flex-1">${mensaje}</span>
                <button onclick="this.parentElement.remove()" class="text-white hover:text-gray-200 transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            `;
            
            container.appendChild(toast);
            
            // Animación de entrada
            setTimeout(() => {
                toast.classList.remove('translate-x-[400px]');
            }, 10);
            
            // Auto-cerrar después de 5 segundos
            setTimeout(() => {
                toast.classList.add('translate-x-[400px]');
                setTimeout(() => toast.remove(), 300);
            }, 5000);
        }
    </script>
    
</body>
</html>