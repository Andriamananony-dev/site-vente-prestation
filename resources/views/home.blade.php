@extends('layouts.app')

@section('title', 'PrestaServices — Created to Create')

@section('content')
<section class="hero-gradient min-h-screen flex items-center justify-center relative overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-20 left-10 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-72 h-72 bg-pink-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse" style="animation-delay: 2s;"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-6 lg:px-12 py-32 relative z-10">
        <div class="text-center">
            <div class="inline-block mb-6 px-6 py-3 bg-white/10 backdrop-blur-sm rounded-full text-white/90 font-light text-sm tracking-wider animate-fade-in">
                ✨ Depuis 2024 — Agence digitale créative
            </div>
            
            <h1 class="text-6xl md:text-8xl lg:text-9xl font-bold text-white mb-8 leading-none animate-fade-in-up">
                Nous avons été<br>
                <span class="gradient-text bg-gradient-to-r from-purple-400 via-pink-400 to-orange-400 bg-clip-text text-transparent">créés pour créer</span><br>
                des histoires
            </h1>
            
            <p class="text-xl md:text-2xl text-gray-300 font-light max-w-3xl mx-auto mb-12 animate-fade-in-up" style="animation-delay: 0.2s;">
                à la fois <span class="text-white font-semibold">belles</span> et <span class="text-white font-semibold">utiles</span> pour les marques
            </p>
            
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center animate-fade-in-up" style="animation-delay: 0.4s;">
                <a href="{{ route('services.index') }}" class="btn-primary"><span>Découvrir nos Services</span></a>
                <a href="#services" class="group flex items-center space-x-2 text-white font-semibold hover:text-gray-300 transition-colors">
                    <span>Voir nos projets</span>
                    <svg class="w-5 h-5 transform group-hover:translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="section-spacing bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 md:gap-16">
            <div class="text-center animate-on-scroll">
                <div class="text-6xl md:text-7xl font-bold mb-2 gradient-text">500</div>
                <div class="text-gray-600 font-light">Clients satisfaits</div>
            </div>
            <div class="text-center animate-on-scroll">
                <div class="text-6xl md:text-7xl font-bold mb-2 gradient-text">{{ $featuredServices->count() * 10 }}</div>
                <div class="text-gray-600 font-light">Services offerts</div>
            </div>
            <div class="text-center animate-on-scroll">
                <div class="text-6xl md:text-7xl font-bold mb-2 gradient-text">98%</div>
                <div class="text-gray-600 font-light">Satisfaction</div>
            </div>
            <div class="text-center animate-on-scroll">
                <div class="text-6xl md:text-7xl font-bold mb-2 gradient-text">24/7</div>
                <div class="text-gray-600 font-light">Support</div>
            </div>
        </div>
    </div>
</section>

<section id="services" class="section-spacing bg-gray-50">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="max-w-4xl mb-20 animate-on-scroll">
            <div class="inline-block mb-4 px-6 py-2 bg-black text-white rounded-full text-sm font-medium tracking-wider">NOS SERVICES</div>
            <h2 class="section-title">Nos créations<br><span class="gradient-text">les plus populaires</span></h2>
            <p class="section-subtitle mt-6">Découvrez nos prestations les plus demandées</p>
        </div>

        @if($featuredServices->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredServices as $service)
                    <div class="service-card">
                        <div class="relative h-64 bg-gradient-to-br from-gray-900 to-gray-800">
                            <div class="absolute inset-0 flex items-center justify-center text-8xl opacity-20">{{ $service->icon ?? '🚀' }}</div>
                            <div class="absolute top-6 left-6"><span class="badge badge-category">{{ $service->category }}</span></div>
                        </div>
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ $service->name }}</h3>
                            <p class="text-gray-600 mb-6 font-light">{{ Str::limit($service->description, 100) }}</p>
                            <div class="text-4xl font-bold text-gray-900 mb-6">{{ $service->formatted_price }}</div>
                            <div class="flex gap-3">
                                <a href="{{ route('services.show', $service->slug) }}" class="flex-1 text-center bg-black hover:bg-gray-800 text-white font-semibold py-4 rounded-full transition-all duration-300">Détails</a>
                                <button onclick="window.cart.add({{ json_encode(['id' => $service->id, 'name' => $service->name, 'price' => $service->price]) }})" class="w-14 h-14 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection



