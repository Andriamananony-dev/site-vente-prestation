@extends('layouts.app')

@section('title', 'Mon Panier — PrestaServices')

@section('content')
<section class="section-spacing bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <h1 class="text-5xl md:text-7xl font-bold text-gray-900 mb-12">Mon Panier</h1>

        <div x-data="{
            items: window.cart.items,
            updateQuantity(id, qty) { window.cart.updateQuantity(id, parseInt(qty)); this.items = window.cart.items; },
            removeItem(id) { if (confirm('Retirer ?')) { window.cart.remove(id); this.items = window.cart.items; } },
            getTotal() { return window.cart.getTotal(); },
            formatPrice(p) { return new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format(p); }
        }" class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <div class="lg:col-span-2">
                <div x-show="items.length === 0" class="card p-16 text-center">
                    <div class="text-9xl mb-8">🛒</div>
                    <h2 class="text-4xl font-bold mb-4">Panier vide</h2>
                    <a href="{{ route('services.index') }}" class="btn-primary inline-block"><span>Découvrir</span></a>
                </div>

                <div x-show="items.length > 0" class="space-y-6">
                    <template x-for="item in items" :key="item.id">
                        <div class="card p-8">
                            <div class="flex items-center gap-6">
                                <div class="flex-1">
                                    <h3 class="text-2xl font-bold" x-text="item.name"></h3>
                                    <p class="text-3xl font-bold gradient-text" x-text="formatPrice(item.price)"></p>
                                </div>
                                <input type="number" min="1" :value="item.quantity" @change="updateQuantity(item.id, $event.target.value)" class="w-20 px-4 py-2 border-2 border-gray-200 rounded-full text-center font-bold">
                                <div class="text-right">
                                    <div class="text-3xl font-bold" x-text="formatPrice(item.price * item.quantity)"></div>
                                </div>
                                <button @click="removeItem(item.id)" class="text-red-500 hover:text-red-700 p-2">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                </button>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div x-show="items.length > 0" class="card sticky top-32 p-8">
                    <h2 class="text-3xl font-bold mb-8">Récapitulatif</h2>
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between text-lg"><span>Sous-total</span><span class="font-semibold" x-text="formatPrice(getTotal())"></span></div>
                        <div class="flex justify-between text-lg"><span>TVA (20%)</span><span class="font-semibold" x-text="formatPrice(getTotal() * 0.2)"></span></div>
                        <div class="border-t-2 border-gray-900 pt-4 flex justify-between text-2xl font-bold"><span>Total</span><span x-text="formatPrice(getTotal() * 1.2)"></span></div>
                    </div>
                    <a href="{{ route('cart.checkout') }}" class="w-full btn-primary block text-center mb-4"><span>Commander</span></a>
                    <a href="{{ route('services.index') }}" class="w-full btn-secondary block text-center">Continuer</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection



