@extends('layouts.app')

@section('content')
<section class="section-spacing bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-6">
        <h1 class="text-5xl font-bold mb-12">Mes Commandes</h1>
        @if($orders->count() > 0)
            <div class="space-y-6">
                @foreach($orders as $order)
                    <div class="card p-8">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-2xl font-bold mb-2">{{ $order->order_number }}</h3>
                                <p class="text-gray-600">{{ $order->created_at->format('d/m/Y') }}</p>
                            </div>
                            <div class="text-3xl font-bold">{{ $order->formatted_total }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="card p-16 text-center">
                <h2 class="text-3xl font-bold mb-4">Aucune commande</h2>
                <a href="{{ route('services.index') }}" class="btn-primary inline-block"><span>Découvrir</span></a>
            </div>
        @endif
    </div>
</section>
@endsection



