@extends('layouts.app')

@section('title', 'Contacto - El Arsenal Guatemala')

@section('content')

<!-- Hero Section -->
<section class="bg-gradient-to-r from-arsenal-black to-arsenal-gray text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-block mb-4">
            <span class="bg-arsenal-gold text-white px-6 py-2 rounded-full text-sm font-semibold uppercase tracking-wide">
                <i class="fas fa-envelope mr-2"></i>Contáctanos
            </span>
        </div>
        <h1 class="text-4xl md:text-5xl font-display font-bold mb-4">
            Estamos Aquí Para <span class="text-arsenal-gold">Ayudarte</span>
        </h1>
        <p class="text-xl text-gray-300 max-w-2xl mx-auto">
            Envíanos tus consultas, dudas o comentarios. Responderemos a la brevedad posible
        </p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <!-- Información de Contacto -->
            <div class="lg:col-span-1 space-y-6">
                
                <div>
                    <h2 class="text-3xl font-display font-bold text-arsenal-black mb-4">
                        Información de Contacto
                    </h2>
                    <div class="gold-divider ml-0 mb-6"></div>
                    <p class="text-gray-600 leading-relaxed">
                        Puedes contactarnos a través de cualquiera de los siguientes medios. 
                        Estamos disponibles para atender tus consultas.
                    </p>
                </div>
                
                <!-- Dirección -->
                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-all duration-300">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-arsenal-gold bg-opacity-10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-xl text-arsenal-gold"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-arsenal-black mb-2">Dirección</h3>
                            <p class="text-gray-700 text-sm">
                                12 Calle 5-59, Of. 6<br>
                                C.C. Plaza Montúfar, Zona 9<br>
                                Guatemala City, Guatemala<br>
                                01009
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Teléfono -->
                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-all duration-300">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-arsenal-gold bg-opacity-10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-phone-alt text-xl text-arsenal-gold"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-arsenal-black mb-2">Teléfono</h3>
                            <a href="tel:59668844" class="text-gray-700 hover:text-arsenal-gold transition-colors text-sm font-semibold">
                                5966-8844
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- WhatsApp -->
                <div class="bg-green-50 rounded-xl p-6 shadow-sm border border-green-200 hover:shadow-md transition-all duration-300">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-green-500 bg-opacity-10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fab fa-whatsapp text-xl text-green-600"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-arsenal-black mb-2">WhatsApp</h3>
                            <a href="https://wa.me/50259668844" target="_blank" class="text-green-700 hover:text-green-600 transition-colors text-sm font-semibold">
                                +502 5966-8844
                            </a>
                            <p class="text-xs text-gray-600 mt-1">Respuesta inmediata</p>
                        </div>
                    </div>
                </div>
                
                <!-- Horario -->
                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-all duration-300">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-arsenal-gold bg-opacity-10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-clock text-xl text-arsenal-gold"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-arsenal-black mb-2">Horario de Atención</h3>
                            <div class="text-sm text-gray-700 space-y-1">
                                <p><strong>Lun - Vie:</strong> 9:00 AM - 6:00 PM</p>
                                <p><strong>Sábado:</strong> 9:00 AM - 1:00 PM</p>
                                <p><strong>Domingo:</strong> Cerrado</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Redes Sociales -->
                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
                    <h3 class="font-bold text-arsenal-black mb-4">Síguenos en Redes</h3>
                    <div class="flex space-x-3">
                        <a href="https://www.facebook.com/profile.php?id=61567680477732" 
                           target="_blank"
                           class="w-10 h-10 bg-arsenal-gold bg-opacity-10 hover:bg-arsenal-gold rounded-lg flex items-center justify-center transition-all duration-300 group">
                            <i class="fab fa-facebook-f text-arsenal-gold group-hover:text-white transition-colors"></i>
                        </a>
                        <a href="https://wa.me/50259668844" 
                           target="_blank"
                           class="w-10 h-10 bg-arsenal-gold bg-opacity-10 hover:bg-arsenal-gold rounded-lg flex items-center justify-center transition-all duration-300 group">
                            <i class="fab fa-whatsapp text-arsenal-gold group-hover:text-white transition-colors"></i>
                        </a>
                        <a href="#" 
                           class="w-10 h-10 bg-arsenal-gold bg-opacity-10 hover:bg-arsenal-gold rounded-lg flex items-center justify-center transition-all duration-300 group">
                            <i class="fab fa-instagram text-arsenal-gold group-hover:text-white transition-colors"></i>
                        </a>
                    </div>
                </div>
                
            </div>
            
            <!-- Formulario de Contacto -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-8">
                    
                    <div class="mb-8">
                        <h2 class="text-3xl font-display font-bold text-arsenal-black mb-2">
                            Envíanos un Mensaje
                        </h2>
                        <p class="text-gray-600">
                            Completa el formulario y nos pondremos en contacto contigo lo antes posible
                        </p>
                    </div>
                    
                    <!-- Mensajes de éxito/error -->
                    @if(session('success'))
                        <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded-lg flex items-start">
                            <i class="fas fa-check-circle text-xl mr-3 mt-1"></i>
                            <div>
                                <p class="font-semibold">¡Mensaje enviado!</p>
                                <p class="text-sm">{{ session('success') }}</p>
                            </div>
                        </div>
                    @endif
                    
                    @if($errors->any())
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-800 px-6 py-4 rounded-lg">
                            <p class="font-semibold flex items-center mb-2">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                Por favor, corrige los siguientes errores:
                            </p>
                            <ul class="list-disc list-inside text-sm space-y-1">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <!-- Formulario -->
                    <form method="POST" action="{{ route('web.contacto.enviar') }}" id="contact-form" class="space-y-6">
                        @csrf
                        
                        <!-- Nombre -->
                        <div>
                            <label for="nombre" class="block text-sm font-semibold text-gray-700 mb-2">
                                Nombre Completo <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="nombre" 
                                   id="nombre"
                                   value="{{ old('nombre') }}"
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-arsenal-gold focus:border-arsenal-gold transition-all @error('nombre') border-red-500 @enderror"
                                   placeholder="Ej: Juan Pérez">
                            @error('nombre')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                Correo Electrónico <span class="text-red-500">*</span>
                            </label>
                            <input type="email" 
                                   name="email" 
                                   id="email"
                                   value="{{ old('email') }}"
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-arsenal-gold focus:border-arsenal-gold transition-all @error('email') border-red-500 @enderror"
                                   placeholder="correo@ejemplo.com">
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Teléfono -->
                        <div>
                            <label for="telefono" class="block text-sm font-semibold text-gray-700 mb-2">
                                Teléfono (Opcional)
                            </label>
                            <input type="tel" 
                                   name="telefono" 
                                   id="telefono"
                                   value="{{ old('telefono') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-arsenal-gold focus:border-arsenal-gold transition-all @error('telefono') border-red-500 @enderror"
                                   placeholder="5966-8844">
                            @error('telefono')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Mensaje -->
                        <div>
                            <label for="mensaje" class="block text-sm font-semibold text-gray-700 mb-2">
                                Mensaje <span class="text-red-500">*</span>
                            </label>
                            <textarea name="mensaje" 
                                      id="mensaje"
                                      required
                                      rows="6"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-arsenal-gold focus:border-arsenal-gold transition-all resize-none @error('mensaje') border-red-500 @enderror"
                                      placeholder="Escribe aquí tu consulta o comentario...">{{ old('mensaje') }}</textarea>
                            @error('mensaje')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-gray-500 mt-1">Máximo 1000 caracteres</p>
                        </div>
                        
                        <!-- Política de Privacidad -->
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <label class="flex items-start cursor-pointer">
                                <input type="checkbox" 
                                       name="acepto_politica" 
                                       required
                                       class="mt-1 mr-3 h-4 w-4 text-arsenal-gold focus:ring-arsenal-gold border-gray-300 rounded">
                                <span class="text-sm text-gray-700">
                                    Acepto la política de privacidad y el tratamiento de mis datos personales <span class="text-red-500">*</span>
                                </span>
                            </label>
                        </div>
                        
                        <!-- Botones -->
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button type="submit" 
                                    class="btn-gold flex-1 flex items-center justify-center">
                                <i class="fas fa-paper-plane mr-2"></i>
                                Enviar Mensaje
                            </button>
                            <button type="reset" 
                                    class="btn-outline-gold flex-1">
                                <i class="fas fa-redo mr-2"></i>
                                Limpiar Formulario
                            </button>
                        </div>
                        
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</section>

<!-- Mapa -->
<section class="py-0">
    <div class="w-full h-96">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.0847394897396!2d-90.51476892460308!3d14.605882085977882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8589a3d6b1e3f0c3%3A0x1234567890abcdef!2sPlaza%20Mont%C3%BAfar!5e0!3m2!1ses!2sgt!4v1234567890123!5m2!1ses!2sgt"
            width="100%" 
            height="100%" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade"
            class="grayscale hover:grayscale-0 transition-all duration-500">
        </iframe>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-display font-bold text-arsenal-black mb-4">
                Preguntas Frecuentes
            </h2>
            <div class="gold-divider mb-4"></div>
            <p class="text-gray-600">
                Encuentra respuestas a las dudas más comunes
            </p>
        </div>
        
        <div class="space-y-4">
            
            <!-- FAQ 1 -->
            <div class="bg-gray-50 rounded-xl border border-gray-200 overflow-hidden">
                <button onclick="toggleFAQ(1)" class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-100 transition-colors">
                    <span class="font-semibold text-arsenal-black">¿Qué documentos necesito para realizar una compra?</span>
                    <i class="fas fa-chevron-down text-arsenal-gold transition-transform" id="faq-icon-1"></i>
                </button>
                <div id="faq-content-1" class="hidden px-6 pb-4">
                    <p class="text-gray-700">
                        Necesitas presentar DPI vigente y, dependiendo del producto, licencia de portación de armas vigente 
                        emitida por DIGECAM. Nuestro personal te asesorará sobre los requisitos específicos.
                    </p>
                </div>
            </div>
            
            <!-- FAQ 2 -->
            <div class="bg-gray-50 rounded-xl border border-gray-200 overflow-hidden">
                <button onclick="toggleFAQ(2)" class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-100 transition-colors">
                    <span class="font-semibold text-arsenal-black">¿Hacen entregas a domicilio?</span>
                    <i class="fas fa-chevron-down text-arsenal-gold transition-transform" id="faq-icon-2"></i>
                </button>
                <div id="faq-content-2" class="hidden px-6 pb-4">
                    <p class="text-gray-700">
                        Por políticas de seguridad y cumplimiento legal, las entregas se coordinan de manera personalizada. 
                        Contáctanos para más información sobre tu caso específico.
                    </p>
                </div>
            </div>
            
            <!-- FAQ 3 -->
            <div class="bg-gray-50 rounded-xl border border-gray-200 overflow-hidden">
                <button onclick="toggleFAQ(3)" class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-100 transition-colors">
                    <span class="font-semibold text-arsenal-black">¿Tienen productos en consignación?</span>
                    <i class="fas fa-chevron-down text-arsenal-gold transition-transform" id="faq-icon-3"></i>
                </button>
                <div id="faq-content-3" class="hidden px-6 pb-4">
                    <p class="text-gray-700">
                        Todos nuestros productos son nuevos y certificados. No manejamos productos de segunda mano 
                        ni en consignación para garantizar la calidad y seguridad de nuestros clientes.
                    </p>
                </div>
            </div>
            
            <!-- FAQ 4 -->
            <div class="bg-gray-50 rounded-xl border border-gray-200 overflow-hidden">
                <button onclick="toggleFAQ(4)" class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-100 transition-colors">
                    <span class="font-semibold text-arsenal-black">¿Ofrecen asesoría para elegir el producto adecuado?</span>
                    <i class="fas fa-chevron-down text-arsenal-gold transition-transform" id="faq-icon-4"></i>
                </button>
                <div id="faq-content-4" class="hidden px-6 pb-4">
                    <p class="text-gray-700">
                        Sí, contamos con personal capacitado que te brindará asesoría profesional sin costo 
                        para ayudarte a elegir el producto que mejor se adapte a tus necesidades.
                    </p>
                </div>
            </div>
            
        </div>
    </div>
</section>

@endsection