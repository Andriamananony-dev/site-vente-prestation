<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'PrestaServices — Created to Create')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-white">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-xl border-b border-gray-100" x-data="{ open: false, cartCount: window.cart.getCount() }" @cart-updated.window="cartCount = window.cart.getCount()">
        <div class="max-w-7xl mx-auto px-6 lg:px-12">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="text-2xl font-bold tracking-tight hover:opacity-70 transition-opacity duration-300">
                        Presta<span class="gradient-text">Services</span>
                    </a>
                </div>

                <div class="hidden lg:flex items-center space-x-12">
                    <a href="{{ route('home') }}" class="nav-link">Accueil</a>
                    <a href="{{ route('services.index') }}" class="nav-link">Services</a>
                    @auth
                        @if(auth()->user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}" class="nav-link">Admin</a>
                        @endif
                        <a href="{{ route('orders.my') }}" class="nav-link">Mes Commandes</a>
                    @endauth
                </div>

                <div class="hidden lg:flex items-center space-x-6">
                    <a href="{{ route('cart.index') }}" class="relative group">
                        <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center group-hover:bg-black group-hover:text-white transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                        <span x-show="cartCount > 0" x-text="cartCount" class="absolute -top-1 -right-1 bg-gradient-to-r from-purple-600 to-pink-600 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center"></span>
                    </a>

                    @guest
                        <a href="{{ route('login') }}" class="nav-link">Connexion</a>
                        <a href="{{ route('register') }}" class="btn-primary"><span>Inscription</span></a>
                    @else
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center space-x-2 nav-link">
                                <span>{{ auth()->user()->name }}</span>
                                <svg class="w-4 h-4 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-4 w-48 bg-white rounded-2xl shadow-2xl py-2 border border-gray-100">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-6 py-3 text-gray-700 hover:bg-gray-50 transition-colors">Déconnexion</button>
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>

                <div class="lg:hidden">
                    <button @click="open = !open" class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center hover:bg-black hover:text-white transition-all duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div x-show="open" x-transition class="lg:hidden bg-white border-t border-gray-100">
            <div class="px-6 py-6 space-y-4">
                <a href="{{ route('home') }}" class="block text-lg font-semibold text-gray-900 hover:text-purple-600 transition-colors">Accueil</a>
                <a href="{{ route('services.index') }}" class="block text-lg font-semibold text-gray-900 hover:text-purple-600 transition-colors">Services</a>
                @auth
                    @if(auth()->user()->is_admin)
                        <a href="{{ route('admin.dashboard') }}" class="block text-lg font-semibold text-gray-900 hover:text-purple-600 transition-colors">Admin</a>
                    @endif
                    <a href="{{ route('orders.my') }}" class="block text-lg font-semibold text-gray-900 hover:text-purple-600 transition-colors">Mes Commandes</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left text-lg font-semibold text-red-600 hover:text-red-700 transition-colors">Déconnexion</button>
                    </form>
                @else
                    <a href="{{ route('cart.index') }}" class="block text-lg font-semibold text-gray-900 hover:text-purple-600 transition-colors">Panier (<span x-text="cartCount">0</span>)</a>
                    <a href="{{ route('login') }}" class="block text-lg font-semibold text-gray-900 hover:text-purple-600 transition-colors">Connexion</a>
                    <a href="{{ route('register') }}" class="block w-full text-center bg-black text-white font-semibold py-4 rounded-full hover:bg-gray-800 transition-colors">Inscription</a>
                @endguest
            </div>
        </div>
    </nav>

    @if(session('success'))
        <div class="fixed top-24 right-6 z-50 animate-slide-in">
            <div class="bg-black text-white px-8 py-4 rounded-full shadow-2xl" role="alert">
                <span class="font-semibold">✓ {{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="fixed top-24 right-6 z-50 animate-slide-in">
            <div class="bg-red-600 text-white px-8 py-4 rounded-full shadow-2xl" role="alert">
                <span class="font-semibold">✕ {{ session('error') }}</span>
            </div>
        </div>
    @endif

    <main class="flex-grow pt-20">
        @yield('content')
    </main>

    <footer class="bg-black text-white mt-32">
        <div class="max-w-7xl mx-auto px-6 lg:px-12 py-20">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
                <div class="lg:col-span-2">
                    <h3 class="text-4xl font-bold mb-6">Presta<span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">Services</span></h3>
                    <p class="text-gray-400 text-lg font-light mb-8 max-w-md">Créée pour créer des expériences digitales exceptionnelles.</p>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-6 text-white">Services</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('services.index') }}" class="text-gray-400 hover:text-white transition-colors font-light">Tous les services</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-6 text-white">Contact</h4>
                    <ul class="space-y-3 text-gray-400 font-light">
                        <li>Paris, France</li>
                        <li><a href="mailto:contact@prestaservices.com" class="hover:text-white transition-colors">contact@prestaservices.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-white/10 pt-8 text-center">
                <p class="text-gray-400 font-light text-sm">© {{ date('Y') }} PrestaServices. Created to Create™</p>
            </div>
        </div>
    </footer>
</body>
</html>

