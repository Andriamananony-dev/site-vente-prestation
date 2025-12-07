@extends('layouts.app')

@section('content')
<section class="section-spacing bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-6">
        <h1 class="text-5xl font-bold mb-12">Finaliser ma Commande</h1>
        <div x-data="{items: window.cart.items, getTotal() { return window.cart.getTotal(); }}">
            <form x-show="items.length > 0" method="POST" action="{{ route('orders.store') }}">
                @csrf
                <input type="hidden" name="cart_items" :value="JSON.stringify(items)">
                <div class="card p-8 mb-8">
                    <h2 class="text-2xl font-bold mb-6">Vos Informations</h2>
                    <div class="space-y-4">
                        <input type="text" name="customer_name" required placeholder="Nom complet" value="{{ old('customer_name', auth()->user()->name ?? '') }}" class="input-field">
                        <input type="email" name="customer_email" required placeholder="Email" value="{{ old('customer_email', auth()->user()->email ?? '') }}" class="input-field">
                        <input type="tel" name="customer_phone" placeholder="Téléphone" value="{{ old('customer_phone') }}" class="input-field">
                        <textarea name="customer_address" rows="3" placeholder="Adresse" class="input-field">{{ old('customer_address') }}</textarea>
                        <textarea name="notes" rows="4" placeholder="Notes" class="input-field">{{ old('notes') }}</textarea>
                    </div>
                </div>
                <button type="submit" class="w-full btn-primary"><span>Valider la Commande</span></button>
            </form>
        </div>
    </div>
</section>
@endsection



