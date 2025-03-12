<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Yahaya Bawa Islamic Library') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

    <style>
        .slide-fade-enter-active {
            transition: all 0.3s ease;
        }
        .slide-fade-leave-active {
            transition: all 0.3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
        }
        .slide-fade-enter-from,
        .slide-fade-leave-to {
            transform: translateX(20px);
            opacity: 0;
        }
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .scholar-card {
            transition: all 0.3s ease;
        }
        .scholar-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .book-card {
            transition: all 0.3s ease;
        }
        .book-card:hover {
            transform: scale(1.02);
        }
        .search-bar {
            transition: all 0.3s ease;
        }
        .search-bar:focus {
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.3);
        }
        .arabic-calligraphy {
            font-family: 'Noto Naskh Arabic', serif;
        }
        .hero-pattern {
            background-color: #065f46;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            min-height: calc(100vh - 4rem);
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div id="app" class="min-h-screen bg-green-400 dark:bg-green-900 hero-pattern">
        <!-- Navigation -->
        <nav class="bg-green-800 text-white shadow-lg">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="{{ route('dashboard') }}" class="text-xl font-bold">
                            <span class="flex items-center">
                                <svg class="w-8 h-8 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2L2 7L12 12L22 7L12 2Z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 17L12 22L22 17"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 12L12 17L22 12"></path>
                                </svg>
                                <span class="hidden sm:inline">Yahaya Bawa Islamic Library</span>
                                <span class="sm:hidden">YBIL</span>
                            </span>
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('dashboard.books.index')" :active="request()->routeIs('books.*')">
                            {{ __('Books') }}
                        </x-nav-link>
                        <x-nav-link :href="route('dashboard.category.index')" :active="request()->routeIs('category.*')">
                            {{ __('Categories') }}
                        </x-nav-link>
                        <x-nav-link :href="route('dashboard.scholars.index')" :active="request()->routeIs('scholars.*')">
                            {{ __('Scholars') }}
                        </x-nav-link>
                    </div>

                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-700 hover:bg-green-600 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button onclick="toggleMobileMenu()" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-white hover:bg-green-700 focus:outline-none focus:bg-green-700 focus:text-white transition duration-150 ease-in-out">
                            <svg id="hamburger-icon" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path id="hamburger-open" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path id="hamburger-close" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div id="mobile-menu" class="hidden sm:hidden bg-green-700">
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:bg-green-600">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('dashboard.books.index')" :active="request()->routeIs('books.*')" class="text-white hover:bg-green-600">
                        {{ __('Books') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('dashboard.category.index')" :active="request()->routeIs('category.*')" class="text-white hover:bg-green-600">
                        {{ __('Categories') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('dashboard.scholars.index')" :active="request()->routeIs('scholars.*')" class="text-white hover:bg-green-600">
                        {{ __('Scholars') }}
                    </x-responsive-nav-link>
                </div>

                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                    <div class="px-4">
                        <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-green-200">{{ Auth::user()->email }}</div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <x-responsive-nav-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <script>
        // Mobile menu toggle function
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobile-menu');
            const hamburgerOpen = document.getElementById('hamburger-open');
            const hamburgerClose = document.getElementById('hamburger-close');
            
            if (mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.remove('hidden');
                hamburgerOpen.classList.add('hidden');
                hamburgerOpen.classList.remove('inline-flex');
                hamburgerClose.classList.add('inline-flex');
                hamburgerClose.classList.remove('hidden');
            } else {
                mobileMenu.classList.add('hidden');
                hamburgerOpen.classList.remove('hidden');
                hamburgerOpen.classList.add('inline-flex');
                hamburgerClose.classList.remove('inline-flex');
                hamburgerClose.classList.add('hidden');
            }
        }

        // Initialize any Alpine.js components if needed
        document.addEventListener('alpine:init', () => {
            Alpine.data('app', () => ({
                open: false
            }))
        })
    </script>
</body>
</html>