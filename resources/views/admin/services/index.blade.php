@extends('layouts.app')

@section('content')
<section class="section-spacing bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between mb-12">
            <h1 class="text-5xl font-bold">Services</h1>
            <a href="{{ route('admin.services.create') }}" class="btn-primary"><span>Ajouter</span></a>
        </div>
        <div class="space-y-4">
            @foreach($services as $service)
                <div class="card p-6 flex justify-between items-center">
                    <div>
                        <h3 class="text-xl font-bold">{{ $service->name }}</h3>
                        <p class="text-gray-600">{{ $service->category }} - {{ $service->formatted_price }}</p>
                    </div>
                    <div class="flex gap-3">
                        <a href="{{ route('admin.services.edit', $service) }}" class="btn-secondary !py-2 !px-4">Modifier</a>
                        <form method="POST" action="{{ route('admin.services.destroy', $service) }}" onsubmit="return confirm('Supprimer ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-700 px-4 py-2">Supprimer</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $services->links() }}
    </div>
</section>
@endsection

