@extends('layouts.app')

@section('title', 'PrestaServices — Created to Create')

@section('content')
<!-- Hero Ultra-Moderne avec Bulles Animées -->
<section class="hero-gradient min-h-screen flex items-center justify-center relative overflow-hidden">
    <!-- Bulles Animées -->
    <div class="bubble bubble-1"></div>
    <div class="bubble bubble-2"></div>
    <div class="bubble bubble-3"></div>
    
    <div class="max-w-7xl mx-auto px-6 lg:px-12 py-32 relative z-10">
        <div class="text-center">
            <div class="inline-block mb-8 glass-dark px-8 py-4 rounded-full text-white font-light text-sm tracking-widest animate-bounce-in uppercase">
                ✨ Agence Digitale Créative — Depuis 2024
            </div>
            
            <h1 class="text-6xl md:text-8xl lg:text-9xl font-extrabold text-white mb-8 leading-none animate-fade-in-up text-shadow-lg">
                Nous avons été<br>
                <span class="text-shine">créés pour créer</span><br>
                <span class="floating">des histoires</span>
            </h1>
            
            <p class="text-2xl md:text-3xl text-white font-light max-w-4xl mx-auto mb-16 animate-fade-in-up" style="animation-delay: 0.3s;">
                à la fois <span class="font-bold bg-gradient-to-r from-yellow-300 to-orange-400 px-4 py-1 rounded-lg">belles</span> et 
                <span class="font-bold bg-gradient-to-r from-green-300 to-emerald-400 px-4 py-1 rounded-lg">utiles</span> 
                pour les marques
            </p>
            
            <div class="flex flex-col sm:flex-row gap-8 justify-center items-center animate-fade-in-up" style="animation-delay: 0.6s;">
                <a href="{{ route('services.index') }}" class="btn-primary text-lg">
                    <span>🚀 Découvrir nos Services</span>
                </a>
                <a href="#services" class="btn-secondary text-lg">
                    <span>💼 Voir nos Projets</span>
                </a>
            </div>
        </div>
        
        <!-- Flèche de scroll animée -->
        <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
            </svg>
        </div>
    </div>
</section>

<!-- Stats Animées avec Icônes SVG -->
<section class="section-spacing bg-white relative">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-12">
            <!-- Clients -->
            <div class="text-center group animate-on-scroll hover-lift">
                <div class="icon-modern mx-auto mb-6">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div class="text-6xl md:text-7xl font-extrabold mb-3 gradient-text">500+</div>
                <div class="text-gray-600 font-medium text-lg">Clients Satisfaits</div>
            </div>

            <!-- Services -->
            <div class="text-center group animate-on-scroll hover-lift" style="animation-delay: 0.1s;">
                <div class="icon-modern mx-auto mb-6" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <div class="text-6xl md:text-7xl font-extrabold mb-3 gradient-text">{{ $featuredServices->count() * 10 }}+</div>
                <div class="text-gray-600 font-medium text-lg">Services Offerts</div>
            </div>

            <!-- Satisfaction -->
            <div class="text-center group animate-on-scroll hover-lift" style="animation-delay: 0.2s;">
                <div class="icon-modern mx-auto mb-6" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                    </svg>
                </div>
                <div class="text-6xl md:text-7xl font-extrabold mb-3 gradient-text">98%</div>
                <div class="text-gray-600 font-medium text-lg">Satisfaction</div>
            </div>

            <!-- Support -->
            <div class="text-center group animate-on-scroll hover-lift" style="animation-delay: 0.3s;">
                <div class="icon-modern mx-auto mb-6" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="text-6xl md:text-7xl font-extrabold mb-3 gradient-text">24/7</div>
                <div class="text-gray-600 font-medium text-lg">Support Client</div>
            </div>
        </div>
    </div>
</section>

<!-- Services en Vedette Spectaculaires -->
<section id="services" class="section-spacing bg-gradient-to-br from-gray-50 to-white relative">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="max-w-4xl mx-auto text-center mb-20 animate-on-scroll">
            <div class="inline-block mb-6 glass px-8 py-3 rounded-full text-gray-900 font-semibold text-sm tracking-widest uppercase">
                🎯 NOS SERVICES POPULAIRES
            </div>
            <h2 class="section-title mb-8">
                Nos créations les plus <span class="text-shine">populaires</span>
            </h2>
            <p class="section-subtitle mx-auto text-xl">
                Découvrez nos prestations les plus demandées, sélectionnées pour transformer vos idées en réalité
            </p>
        </div>

        @if($featuredServices->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach($featuredServices as $index => $service)
                    <div class="service-card animate-on-scroll hover-glow" style="animation-delay: {{ $index * 0.15 }}s;">
                        <!-- Header avec Gradient -->
                        <div class="relative h-72 bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 overflow-hidden">
                            <!-- Icône SVG Moderne -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                @switch($service->category)
                                    @case('Web')
                                        <svg class="w-32 h-32 text-white opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                        </svg>
                                        @break
                                    @case('Design')
                                        <svg class="w-32 h-32 text-white opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                                        </svg>
                                        @break
                                    @case('SEO')
                                        <svg class="w-32 h-32 text-white opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                        @break
                                    @default
                                        <svg class="w-32 h-32 text-white opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                @endswitch
                            </div>
                            <!-- Badges -->
                            <div class="absolute top-6 left-6">
                                <span class="badge badge-category">{{ $service->category }}</span>
                            </div>
                            @if($service->is_featured)
                                <div class="absolute top-6 right-6">
                                    <span class="badge badge-featured">⭐ Populaire</span>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Contenu -->
                        <div class="p-8 bg-white">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-gradient-hover">
                                {{ $service->name }}
                            </h3>
                            
                            <p class="text-gray-600 mb-6 font-light leading-relaxed">
                                {{ Str::limit($service->description, 120) }}
                            </p>
                            
                            @if($service->features && is_array($service->features) && count($service->features) > 0)
                                <ul class="mb-8 space-y-3">
                                    @foreach(array_slice($service->features, 0, 3) as $feature)
                                        <li class="text-sm text-gray-700 flex items-start font-light">
                                            <svg class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                            </svg>
                                            {{ $feature }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            
                            <div class="flex items-center justify-between mb-8">
                                <div>
                                    <div class="price-tag">{{ $service->formatted_price }}</div>
                                    @if($service->duration)
                                        <div class="text-sm text-gray-500 font-medium mt-2">
                                            ⚡ Livraison {{ $service->duration }} jours
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="flex gap-4">
                                <a href="{{ route('services.show', $service->slug) }}" class="flex-1 text-center bg-black hover:bg-gray-800 text-white font-bold py-4 px-6 rounded-full transition-all duration-300 shadow-lg hover:shadow-2xl transform hover:scale-105">
                                    Voir Détails
                                </a>
                                <button onclick="window.cart.add({{ json_encode(['id' => $service->id, 'name' => $service->name, 'price' => $service->price]) }})" 
                                    class="w-16 h-16 bg-gradient-to-r from-purple-600 via-pink-600 to-red-500 text-white rounded-full flex items-center justify-center shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-110 hover:rotate-12">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-20 animate-on-scroll">
                <a href="{{ route('services.index') }}" class="btn-primary text-xl px-12">
                    <span>✨ Voir Tous les Services</span>
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Catégories Modernes -->
@if($categories->count() > 0)
<section class="section-spacing bg-gradient-to-br from-white to-gray-50 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="max-w-4xl mx-auto text-center mb-20 animate-on-scroll">
            <h2 class="section-title mb-6">
                Explorez par <span class="text-shine">catégorie</span>
            </h2>
            <p class="section-subtitle mx-auto text-xl">
                Trouvez rapidement les services dont vous avez besoin
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($categories as $index => $category)
                <a href="{{ route('services.index', ['category' => $category]) }}" 
                   class="group card hover-lift p-10 text-center animate-on-scroll" 
                   style="animation-delay: {{ $index * 0.1 }}s;">
                    
                    <div class="icon-modern mx-auto mb-6 
                        @if($loop->index % 4 == 0) bg-gradient-to-br from-blue-500 to-cyan-500
                        @elseif($loop->index % 4 == 1) bg-gradient-to-br from-purple-500 to-pink-500
                        @elseif($loop->index % 4 == 2) bg-gradient-to-br from-orange-500 to-red-500
                        @else bg-gradient-to-br from-green-500 to-emerald-500
                        @endif">
                        @switch($category)
                            @case('Web')
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                </svg>
                                @break
                            @case('Design')
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                                </svg>
                                @break
                            @case('Marketing')
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                </svg>
                                @break
                            @case('SEO')
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                @break
                            @default
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                        @endswitch
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-gradient-hover transition-all">
                        {{ $category }}
                    </h3>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA Finale Spectaculaire -->
<section class="section-spacing hero-gradient text-white relative overflow-hidden">
    <div class="bubble bubble-1"></div>
    <div class="bubble bubble-2"></div>
    
    <div class="max-w-5xl mx-auto px-6 lg:px-12 text-center relative z-10">
        <div class="animate-on-scroll">
            <h2 class="text-6xl md:text-8xl font-extrabold mb-8 leading-tight floating-slow">
                Prêt à transformer<br>
                <span class="text-shine">vos idées</span> en réalité ?
            </h2>
            <p class="text-2xl md:text-3xl text-white font-light mb-16 max-w-3xl mx-auto">
                Rejoignez des centaines de clients satisfaits qui ont déjà franchi le pas
            </p>
            <div class="flex flex-col sm:flex-row gap-8 justify-center items-center">
                <a href="{{ route('services.index') }}" class="btn-primary text-xl px-12">
                    <span>🚀 Commencer Maintenant</span>
                </a>
                @guest
                    <a href="{{ route('register') }}" class="btn-secondary text-xl px-12">
                        <span>✨ Créer un Compte Gratuit</span>
                    </a>
                @endguest
            </div>
        </div>
    </div>
</section>

<!-- Avantages avec Icônes Modernes -->
<section class="section-spacing bg-white relative">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="max-w-4xl mx-auto text-center mb-20 animate-on-scroll">
            <h2 class="section-title">
                Pourquoi nous <span class="text-shine">choisir</span> ?
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div class="text-center group animate-on-scroll hover-lift">
                <div class="w-28 h-28 bg-gradient-to-br from-blue-500 via-indigo-500 to-purple-600 rounded-3xl flex items-center justify-center mx-auto mb-8 shadow-2xl group-hover:shadow-indigo-500/50 transform transition-all duration-500 group-hover:rotate-12 group-hover:scale-110">
                    <svg class="w-14 h-14 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-3xl font-bold mb-4 text-gradient-hover">Rapidité d'Exécution</h3>
                <p class="text-gray-600 font-light text-lg leading-relaxed">Livraison rapide et efficace dans les délais convenus</p>
            </div>

            <div class="text-center group animate-on-scroll hover-lift" style="animation-delay: 0.2s;">
                <div class="w-28 h-28 bg-gradient-to-br from-pink-500 via-red-500 to-orange-500 rounded-3xl flex items-center justify-center mx-auto mb-8 shadow-2xl group-hover:shadow-pink-500/50 transform transition-all duration-500 group-hover:rotate-12 group-hover:scale-110">
                    <svg class="w-14 h-14 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-3xl font-bold mb-4 text-gradient-hover">Qualité Garantie</h3>
                <p class="text-gray-600 font-light text-lg leading-relaxed">Professionnels expérimentés pour des résultats exceptionnels</p>
            </div>

            <div class="text-center group animate-on-scroll hover-lift" style="animation-delay: 0.4s;">
                <div class="w-28 h-28 bg-gradient-to-br from-green-500 via-emerald-500 to-teal-500 rounded-3xl flex items-center justify-center mx-auto mb-8 shadow-2xl group-hover:shadow-green-500/50 transform transition-all duration-500 group-hover:rotate-12 group-hover:scale-110">
                    <svg class="w-14 h-14 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <h3 class="text-3xl font-bold mb-4 text-gradient-hover">Support 24/7</h3>
                <p class="text-gray-600 font-light text-lg leading-relaxed">Équipe à votre écoute pour toutes vos questions</p>
            </div>
        </div>
    </div>
</section>
@endsection
