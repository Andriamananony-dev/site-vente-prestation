@extends('layouts.app')

@section('title', 'Nos Services — PrestaServices')

@section('content')
<section class="hero-gradient text-white py-32">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <h1 class="text-6xl md:text-8xl font-bold mb-6 leading-none">Explorez notre<br>gamme <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">complète</span></h1>
    </div>
</section>

<section class="sticky top-20 z-40 bg-white border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 py-8">
        <form method="GET" action="{{ route('services.index') }}" class="flex flex-col lg:flex-row gap-6">
            <div class="flex-1">
                <input type="text" name="search" placeholder="Rechercher..." value="{{ request('search') }}" class="input-field">
            </div>
            <select name="category" class="input-field lg:w-64">
                <option value="">Toutes</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn-primary"><span>Filtrer</span></button>
        </form>
    </div>
</section>

<section class="section-spacing bg-gray-50">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        @if($services->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                @foreach($services as $service)
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
                                <a href="{{ route('services.show', $service->slug) }}" class="flex-1 text-center bg-black hover:bg-gray-800 text-white font-semibold py-4 rounded-full transition-all duration-300">Voir</a>
                                <button onclick="window.cart.add({{ json_encode(['id' => $service->id, 'name' => $service->name, 'price' => $service->price]) }})" class="w-14 h-14 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $services->links() }}
        @else
            <div class="text-center py-32">
                <h3 class="text-4xl font-bold text-gray-900 mb-4">Aucun service trouvé</h3>
                <a href="{{ route('services.index') }}" class="btn-primary inline-block"><span>Voir tous</span></a>
            </div>
        @endif
    </div>
</section>
@endsection

