@extends('layouts.app')

@section('content')
<section class="section-spacing bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-6">
        <h1 class="text-5xl font-bold mb-12">Dashboard Admin</h1>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
            <div class="card p-6">
                <div class="text-4xl font-bold gradient-text">{{ $stats['total_services'] }}</div>
                <div class="text-gray-600">Services</div>
            </div>
            <div class="card p-6">
                <div class="text-4xl font-bold gradient-text">{{ $stats['total_orders'] }}</div>
                <div class="text-gray-600">Commandes</div>
            </div>
            <div class="card p-6">
                <div class="text-4xl font-bold gradient-text">{{ $stats['pending_orders'] }}</div>
                <div class="text-gray-600">En attente</div>
            </div>
            <div class="card p-6">
                <div class="text-4xl font-bold gradient-text">{{ number_format($stats['total_revenue'], 0) }}€</div>
                <div class="text-gray-600">Revenu</div>
            </div>
        </div>
        <div class="flex gap-6">
            <a href="{{ route('admin.services.create') }}" class="btn-primary"><span>Ajouter Service</span></a>
            <a href="{{ route('admin.services.index') }}" class="btn-secondary">Gérer Services</a>
            <a href="{{ route('admin.orders.index') }}" class="btn-secondary">Gérer Commandes</a>
        </div>
    </div>
</section>
@endsection

