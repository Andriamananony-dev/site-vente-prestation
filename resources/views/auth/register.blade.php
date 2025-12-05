@extends('layouts.app')

@section('content')
<section class="py-12 bg-gray-50 min-h-screen flex items-center">
    <div class="max-w-md mx-auto px-6 w-full">
        <h1 class="text-4xl font-bold text-center mb-8">Inscription</h1>
        <div class="card p-8">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="space-y-6">
                    <input type="text" name="name" required placeholder="Nom complet" value="{{ old('name') }}" class="input-field">
                    <input type="email" name="email" required placeholder="Email" value="{{ old('email') }}" class="input-field">
                    <input type="password" name="password" required placeholder="Mot de passe" class="input-field">
                    <input type="password" name="password_confirmation" required placeholder="Confirmer" class="input-field">
                    <button type="submit" class="w-full btn-primary"><span>Créer mon Compte</span></button>
                </div>
                <p class="text-center mt-6"><a href="{{ route('login') }}" class="text-black font-semibold hover:text-purple-600">Se connecter</a></p>
            </form>
        </div>
    </div>
</section>
@endsection

