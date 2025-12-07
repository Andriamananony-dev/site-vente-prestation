@extends('layouts.app')

@section('content')
<section class="py-12 bg-gray-50 min-h-screen flex items-center">
    <div class="max-w-md mx-auto px-6 w-full">
        <h1 class="text-4xl font-bold text-center mb-8">Connexion</h1>
        <div class="card p-8">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="space-y-6">
                    <input type="email" name="email" required placeholder="Email" value="{{ old('email') }}" class="input-field">
                    <input type="password" name="password" required placeholder="Mot de passe" class="input-field">
                    <button type="submit" class="w-full btn-primary"><span>Se Connecter</span></button>
                </div>
                <p class="text-center mt-6"><a href="{{ route('register') }}" class="text-black font-semibold hover:text-purple-600">Créer un compte</a></p>
            </form>
        </div>
    </div>
</section>
@endsection



