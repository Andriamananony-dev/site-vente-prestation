@extends('layouts.app')

@section('content')
<section class="section-spacing bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <div class="text-8xl mb-8">✅</div>
        <h1 class="text-5xl font-bold mb-4">Commande Confirmée !</h1>
        <p class="text-xl text-gray-600 mb-8">Merci {{ $order->customer_name }}</p>
        <div class="card p-8 text-left mb-8">
            <h2 class="text-2xl font-bold mb-4">Commande {{ $order->order_number }}</h2>
            <div class="space-y-3">
                @foreach($order->items as $item)
                    <div class="flex justify-between">
                        <span>{{ $item->service_name }} (x{{ $item->quantity }})</span>
                        <span class="font-bold">{{ $item->formatted_subtotal }}</span>
                    </div>
                @endforeach
            </div>
            <div class="border-t-2 border-gray-900 mt-4 pt-4 flex justify-between text-2xl font-bold">
                <span>Total</span>
                <span>{{ $order->formatted_total }}</span>
            </div>
        </div>
        <a href="{{ route('home') }}" class="btn-primary inline-block"><span>Retour Accueil</span></a>
        <script>window.cart.clear();</script>
    </div>
</section>
@endsection



