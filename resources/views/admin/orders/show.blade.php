@extends('layouts.app')

@section('content')
<section class="section-spacing bg-gray-50 min-h-screen">
    <div class="max-w-5xl mx-auto px-6">
        <h1 class="text-5xl font-bold mb-12">Commande {{ $order->order_number }}</h1>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2">
                <div class="card p-8 mb-8">
                    <h2 class="text-2xl font-bold mb-6">Services</h2>
                    <div class="space-y-4">
                        @foreach($order->items as $item)
                            <div class="flex justify-between">
                                <span>{{ $item->service_name }} (x{{ $item->quantity }})</span>
                                <span class="font-bold">{{ $item->formatted_subtotal }}</span>
                            </div>
                        @endforeach
                    </div>
                    <div class="border-t-2 border-gray-900 mt-6 pt-6 flex justify-between text-2xl font-bold">
                        <span>Total</span>
                        <span>{{ $order->formatted_total }}</span>
                    </div>
                </div>
                <div class="card p-8">
                    <h2 class="text-2xl font-bold mb-6">Client</h2>
                    <div class="space-y-2 text-gray-600">
                        <p><strong>Nom:</strong> {{ $order->customer_name }}</p>
                        <p><strong>Email:</strong> {{ $order->customer_email }}</p>
                        @if($order->customer_phone)<p><strong>Tél:</strong> {{ $order->customer_phone }}</p>@endif
                    </div>
                </div>
            </div>
            <div class="lg:col-span-1">
                <div class="card sticky top-32 p-8">
                    <h3 class="text-xl font-bold mb-4">Changer Statut</h3>
                    <form method="POST" action="{{ route('admin.orders.update-status', $order) }}">
                        @csrf
                        <select name="status" class="input-field mb-4">
                            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>En attente</option>
                            <option value="confirmed" {{ $order->status === 'confirmed' ? 'selected' : '' }}>Confirmé</option>
                            <option value="in_progress" {{ $order->status === 'in_progress' ? 'selected' : '' }}>En cours</option>
                            <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Terminé</option>
                            <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Annulé</option>
                        </select>
                        <button type="submit" class="w-full btn-primary"><span>Mettre à jour</span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

