@extends('layouts.app')

@section('content')
<section class="section-spacing bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-6">
        <h1 class="text-5xl font-bold mb-12">Commandes</h1>
        @if($orders->count() > 0)
            <div class="space-y-4">
                @foreach($orders as $order)
                    <div class="card p-8">
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="text-2xl font-bold mb-2">{{ $order->order_number }}</h3>
                                <p class="text-gray-600">{{ $order->customer_name }} - {{ $order->created_at->format('d/m/Y') }}</p>
                                {!! $order->status_badge !!}
                            </div>
                            <div class="text-right">
                                <div class="text-3xl font-bold">{{ $order->formatted_total }}</div>
                                <a href="{{ route('admin.orders.show', $order) }}" class="btn-primary !py-2 !px-4 mt-4"><span>Voir</span></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $orders->links() }}
        @endif
    </div>
</section>
@endsection



