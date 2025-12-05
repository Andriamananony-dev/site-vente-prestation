@extends('layouts.app')

@section('content')
<section class="section-spacing bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-6">
        <h1 class="text-5xl font-bold mb-12">Créer un Service</h1>
        <form method="POST" action="{{ route('admin.services.store') }}" class="card p-8 space-y-6">
            @csrf
            <input type="text" name="name" required placeholder="Nom" class="input-field">
            <textarea name="description" required rows="4" placeholder="Description" class="input-field"></textarea>
            <div class="grid grid-cols-2 gap-6">
                <input type="number" name="price" required step="0.01" placeholder="Prix" class="input-field">
                <input type="text" name="category" required placeholder="Catégorie" class="input-field">
            </div>
            <div class="grid grid-cols-2 gap-6">
                <input type="number" name="duration" placeholder="Durée (jours)" class="input-field">
                <input type="text" name="icon" placeholder="Icône (emoji)" class="input-field">
            </div>
            <textarea name="features" rows="6" placeholder="Fonctionnalités (une par ligne)" class="input-field"></textarea>
            <div class="space-y-3">
                <label class="flex items-center"><input type="checkbox" name="is_featured" value="1" class="mr-2">Service en vedette</label>
                <label class="flex items-center"><input type="checkbox" name="is_active" value="1" checked class="mr-2">Service actif</label>
            </div>
            <button type="submit" class="btn-primary"><span>Créer</span></button>
        </form>
    </div>
</section>
@endsection

