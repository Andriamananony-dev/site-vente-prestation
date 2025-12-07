@extends('layouts.app')

@section('content')
<section class="section-spacing bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-6">
        <h1 class="text-5xl font-bold mb-12">Modifier Service</h1>
        <form method="POST" action="{{ route('admin.services.update', $service) }}" class="card p-8 space-y-6">
            @csrf
            @method('PUT')
            <input type="text" name="name" required value="{{ $service->name }}" class="input-field">
            <textarea name="description" required rows="4" class="input-field">{{ $service->description }}</textarea>
            <div class="grid grid-cols-2 gap-6">
                <input type="number" name="price" required step="0.01" value="{{ $service->price }}" class="input-field">
                <input type="text" name="category" required value="{{ $service->category }}" class="input-field">
            </div>
            <div class="grid grid-cols-2 gap-6">
                <input type="number" name="duration" value="{{ $service->duration }}" class="input-field">
                <input type="text" name="icon" value="{{ $service->icon }}" class="input-field">
            </div>
            <textarea name="features" rows="6" class="input-field">{{ is_array($service->features) ? implode("\n", $service->features) : '' }}</textarea>
            <div class="space-y-3">
                <label class="flex items-center"><input type="checkbox" name="is_featured" value="1" {{ $service->is_featured ? 'checked' : '' }} class="mr-2">En vedette</label>
                <label class="flex items-center"><input type="checkbox" name="is_active" value="1" {{ $service->is_active ? 'checked' : '' }} class="mr-2">Actif</label>
            </div>
            <button type="submit" class="btn-primary"><span>Enregistrer</span></button>
        </form>
    </div>
</section>
@endsection



