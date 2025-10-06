@extends('layouts.app')

@section('title', 'Sobre Nosotros - El Arsenal Guatemala')

@section('content')

<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-arsenal-black to-arsenal-gray text-white py-20 overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 right-0 w-96 h-96 bg-arsenal-gold rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-arsenal-gold rounded-full blur-3xl"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-block mb-6">
            <span class="bg-arsenal-gold text-white px-6 py-2 rounded-full text-sm font-semibold uppercase tracking-wide">
                Conócenos
            </span>
        </div>
        <h1 class="text-5xl md:text-6xl font-display font-bold mb-6">
            Sobre <span class="text-arsenal-gold">El Arsenal</span>
        </h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
            Tu socio de confianza en soluciones profesionales de armamento y accesorios tácticos en Guatemala
        </p>
    </div>
</section>

<!-- Historia -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <!-- Contenido -->
            <div>
                <h2 class="text-4xl font-display font-bold text-arsenal-black mb-4">
                    Nuestra Historia
                </h2>
                <div class="gold-divider ml-0 mb-6"></div>
                
                <div class="space-y-4 text-gray-700 leading-relaxed">
                    <p class="text-lg">
                        <span class="font-bold text-arsenal-gold">El Arsenal Guatemala</span> nació con la visión de ofrecer soluciones integrales 
                        en armamento, cargadores y accesorios tácticos de la más alta calidad en el mercado guatemalteco.
                    </p>
                    
                    <p>
                        Desde nuestros inicios, nos hemos comprometido con la excelencia en el servicio, 
                        brindando a nuestros clientes productos certificados que cumplen con los más altos 
                        estándares de calidad y seguridad internacionales.
                    </p>
                    
                    <p>
                        Nuestro equipo está conformado por profesionales con amplia experiencia en el sector, 
                        capacitados para brindar asesoría especializada y garantizar que cada cliente encuentre 
                        exactamente lo que necesita.
                    </p>
                    
                    <p class="font-semibold text-arsenal-black">
                        Hoy en día, somos reconocidos como uno de los proveedores más confiables en Guatemala, 
                        sirviendo tanto a clientes individuales como a instituciones que requieren equipamiento profesional.
                    </p>
                </div>
            </div>
            
            <!-- Imagen/Logo -->
            <div class="relative">
                <div class="absolute inset-0 bg-arsenal-gold opacity-10 rounded-3xl blur-2xl"></div>
                <div class="relative bg-gray-100 rounded-3xl p-12 shadow-xl">
                    <!-- SVG Logo -->
                    <svg viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg" class="w-full">
                        <circle cx="200" cy="200" r="180" fill="#D4AF37" opacity="0.1"/>
                        <circle cx="200" cy="200" r="150" fill="none" stroke="#D4AF37" stroke-width="3" stroke-dasharray="10,5"/>
                        <circle cx="200" cy="200" r="120" fill="none" stroke="#D4AF37" stroke-width="2"/>
                        <text x="200" y="220" font-size="100" text-anchor="middle" fill="#D4AF37" font-weight="bold" font-family="Poppins, sans-serif">EA</text>
                        <text x="200" y="280" font-size="24" text-anchor="middle" fill="#0F0F0F" font-weight="600" font-family="Poppins, sans-serif">GUATEMALA</text>
                    </svg>
                </div>
            </div>
            
        </div>
    </div>
</section>

<!-- Misión, Visión, Valores -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-display font-bold text-arsenal-black mb-4">
                Nuestros Pilares
            </h2>
            <div class="gold-divider mb-4"></div>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Los principios que guían cada decisión y acción en El Arsenal
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Misión -->
            <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-200 hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-arsenal-gold bg-opacity-10 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-bullseye text-3xl text-arsenal-gold"></i>
                </div>
                <h3 class="text-2xl font-bold text-arsenal-black mb-4">Misión</h3>
                <p class="text-gray-700 leading-relaxed">
                    Proveer productos de armamento y accesorios tácticos de la más alta calidad, 
                    garantizando seguridad, legalidad y satisfacción total a nuestros clientes, 
                    con un servicio profesional y asesoría experta.
                </p>
            </div>
            
            <!-- Visión -->
            <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-200 hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-arsenal-gold bg-opacity-10 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-eye text-3xl text-arsenal-gold"></i>
                </div>
                <h3 class="text-2xl font-bold text-arsenal-black mb-4">Visión</h3>
                <p class="text-gray-700 leading-relaxed">
                    Ser la empresa líder en Guatemala en la comercialización de armamento y accesorios tácticos, 
                    reconocidos por nuestra excelencia, confiabilidad y compromiso con la seguridad de nuestros clientes.
                </p>
            </div>
            
            <!-- Valores -->
            <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-200 hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-arsenal-gold bg-opacity-10 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-gem text-3xl text-arsenal-gold"></i>
                </div>
                <h3 class="text-2xl font-bold text-arsenal-black mb-4">Valores</h3>
                <ul class="space-y-2 text-gray-700">
                    <li class="flex items-start">
                        <i class="fas fa-check text-arsenal-gold mr-2 mt-1"></i>
                        <span>Integridad y transparencia</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-arsenal-gold mr-2 mt-1"></i>
                        <span>Calidad garantizada</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-arsenal-gold mr-2 mt-1"></i>
                        <span>Responsabilidad social</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-arsenal-gold mr-2 mt-1"></i>
                        <span>Compromiso con la legalidad</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-arsenal-gold mr-2 mt-1"></i>
                        <span>Servicio excepcional</span>
                    </li>
                </ul>
            </div>
            
        </div>
    </div>
</section>

<!-- Por qué elegirnos -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-display font-bold text-arsenal-black mb-4">
                ¿Por qué elegirnos?
            </h2>
            <div class="gold-divider mb-4"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            
            <!-- Razón 1 -->
            <div class="text-center group">
                <div class="w-20 h-20 bg-arsenal-gold bg-opacity-10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-arsenal-gold transition-all duration-300">
                    <i class="fas fa-certificate text-4xl text-arsenal-gold group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-arsenal-black mb-3">Productos Certificados</h3>
                <p class="text-gray-600">
                    Todos nuestros productos cuentan con certificaciones internacionales de calidad y seguridad
                </p>
            </div>
            
            <!-- Razón 2 -->
            <div class="text-center group">
                <div class="w-20 h-20 bg-arsenal-gold bg-opacity-10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-arsenal-gold transition-all duration-300">
                    <i class="fas fa-user-shield text-4xl text-arsenal-gold group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-arsenal-black mb-3">Asesoría Experta</h3>
                <p class="text-gray-600">
                    Personal capacitado y con experiencia para brindarte la mejor orientación en tu compra
                </p>
            </div>
            
            <!-- Razón 3 -->
            <div class="text-center group">
                <div class="w-20 h-20 bg-arsenal-gold bg-opacity-10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-arsenal-gold transition-all duration-300">
                    <i class="fas fa-balance-scale text-4xl text-arsenal-gold group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-arsenal-black mb-3">100% Legal</h3>
                <p class="text-gray-600">
                    Cumplimos estrictamente con todas las normativas y regulaciones vigentes en Guatemala
                </p>
            </div>
            
            <!-- Razón 4 -->
            <div class="text-center group">
                <div class="w-20 h-20 bg-arsenal-gold bg-opacity-10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-arsenal-gold transition-all duration-300">
                    <i class="fas fa-handshake text-4xl text-arsenal-gold group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-arsenal-black mb-3">Confianza</h3>
                <p class="text-gray-600">
                    Años de experiencia respaldados por cientos de clientes satisfechos en todo el país
                </p>
            </div>
            
        </div>
    </div>
</section>

<!-- Estadísticas -->
<section class="py-20 bg-gradient-to-r from-arsenal-black to-arsenal-gray text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            
            <div>
                <div class="text-5xl font-bold text-arsenal-gold mb-2">100+</div>
                <div class="text-gray-300">Productos</div>
            </div>
            
            <div>
                <div class="text-5xl font-bold text-arsenal-gold mb-2">397+</div>
                <div class="text-gray-300">Clientes Satisfechos</div>
            </div>
            
            <div>
                <div class="text-5xl font-bold text-arsenal-gold mb-2">5⭐</div>
                <div class="text-gray-300">Calificación</div>
            </div>
            
            <div>
                <div class="text-5xl font-bold text-arsenal-gold mb-2">100%</div>
                <div class="text-gray-300">Legal y Seguro</div>
            </div>
            
        </div>
    </div>
</section>

<!-- Ubicación -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-display font-bold text-arsenal-black mb-4">
                Encuéntranos
            </h2>
            <div class="gold-divider mb-4"></div>
            <p class="text-gray-600">
                Visítanos en nuestra ubicación en Guatemala City
            </p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <!-- Información de Contacto -->
            <div class="space-y-6">
                
                <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-arsenal-gold bg-opacity-10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-2xl text-arsenal-gold"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-arsenal-black mb-2">Dirección</h3>
                            <p class="text-gray-700">
                                12 Calle 5-59, Of. 6<br>
                                C.C. Plaza Montúfar, Zona 9<br>
                                Guatemala City, Guatemala, 01009
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-arsenal-gold bg-opacity-10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-phone-alt text-2xl text-arsenal-gold"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-arsenal-black mb-2">Teléfono</h3>
                            <p class="text-gray-700">
                                <a href="tel:59668844" class="hover:text-arsenal-gold transition-colors">
                                    5966-8844
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-arsenal-gold bg-opacity-10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-clock text-2xl text-arsenal-gold"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-arsenal-black mb-2">Horario</h3>
                            <p class="text-gray-700">
                                <strong>Lunes a Viernes:</strong> 9:00 AM - 6:00 PM<br>
                                <strong>Sábado:</strong> 9:00 AM - 1:00 PM<br>
                                <strong>Domingo:</strong> Cerrado
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-arsenal-gold bg-opacity-10 rounded-xl p-6 border border-arsenal-gold">
                    <h3 class="font-bold text-arsenal-black mb-3 flex items-center">
                        <i class="fas fa-info-circle text-arsenal-gold mr-2"></i>
                        Nota Importante
                    </h3>
                    <p class="text-sm text-gray-700">
                        Para garantizar una mejor atención, te recomendamos contactarnos previamente 
                        para coordinar tu visita y verificar disponibilidad de productos específicos.
                    </p>
                </div>
                
            </div>
            
            <!-- Mapa (Placeholder) -->
            <div class="bg-gray-100 rounded-xl overflow-hidden border border-gray-200 h-96 lg:h-auto">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.0847394897396!2d-90.51476892460308!3d14.605882085977882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8589a3d6b1e3f0c3%3A0x1234567890abcdef!2sPlaza%20Mont%C3%BAfar!5e0!3m2!1ses!2sgt!4v1234567890123!5m2!1ses!2sgt"
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade"
                    class="grayscale hover:grayscale-0 transition-all duration-300">
                </iframe>
            </div>
            
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-display font-bold text-arsenal-black mb-6">
            ¿Listo para hacer tu compra?
        </h2>
        <p class="text-xl text-gray-600 mb-8">
            Contáctanos hoy mismo y descubre cómo podemos ayudarte
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('web.contacto') }}" class="btn-gold">
                <i class="fas fa-envelope mr-2"></i>Enviar Mensaje
            </a>
            <a href="https://wa.me/50259668844" target="_blank" class="btn-outline-gold">
                <i class="fab fa-whatsapp mr-2"></i>WhatsApp
            </a>
        </div>
    </div>
</section>

@endsection