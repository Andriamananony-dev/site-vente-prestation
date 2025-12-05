@extends('layouts.app')

@section('title', $service->name . ' — PrestaServices')

@section('content')
<section class="py-20 bg-gradient-to-br from-gray-900 to-black text-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <h1 class="text-5xl md:text-7xl font-bold mb-6">{{ $service->name }}</h1>
        <p class="text-xl text-gray-300 font-light mb-8">{{ $service->description }}</p>
        <div class="text-5xl font-bold mb-8">{{ $service->formatted_price }}</div>
        <div class="flex gap-4">
            <button onclick="window.cart.add({{ json_encode(['id' => $service->id, 'name' => $service->name, 'price' => $service->price]) }}); setTimeout(() => window.location.href = '{{ route('cart.index') }}', 500);" class="btn-primary"><span>Acheter</span></button>
            <button onclick="window.cart.add({{ json_encode(['id' => $service->id, 'name' => $service->name, 'price' => $service->price]) }})" class="btn-secondary !text-white !border-white hover:!bg-white hover:!text-black">Ajouter au Panier</button>
        </div>
    </div>
</section>

<section class="section-spacing bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        @if($service->features && is_array($service->features))
            <h2 class="text-4xl font-bold text-gray-900 mb-8">Ce qui est inclus</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($service->features as $feature)
                    <div class="flex items-start p-6 rounded-2xl bg-gray-50">
                        <svg class="w-6 h-6 text-green-500 mr-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                        <span class="text-gray-900 font-light">{{ $feature }}</span>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection

