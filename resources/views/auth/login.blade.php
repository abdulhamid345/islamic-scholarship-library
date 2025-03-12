<html>

<head>
    <base href="/" />
    <title>Login - Yahaya Bawa Islamic Library</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <style>
        .login-form {
            transition: all 0.3s ease;
        }

        .login-form:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        .input-field {
            transition: all 0.3s ease;
        }

        .input-field:focus {
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.3);
        }

        .hero-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .scholar-card {
            transition: all 0.3s ease;
        }

        .scholar-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
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

        .mobile-menu {
            transition: transform 0.3s ease-in-out;
        }

        .mobile-menu.open {
            transform: translateX(0);
        }

        .mobile-menu.closed {
            transform: translateX(100%);
        }

        .moon-icon {
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .moon-icon:hover {
            transform: rotate(45deg) scale(1.1);
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-50">
    <div id="app">
        <!-- Navigation -->
        <nav class="bg-green-800 text-white shadow-lg sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex justify-between items-center h-16 relative">
                    <!-- Left side - Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="/" class="text-xl font-bold flex items-center space-x-2">
                            <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span class="hidden sm:inline">Yahaya Bawa Islamic Library</span>
                            <span class="sm:hidden">YBIL</span>
                        </a>
                    </div>

                    <!-- Center - Moon Icon -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 flex items-center">
                        <div class="bg-green-700 rounded-full p-2">
                            <svg class="w-6 h-6 moon-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>

                    <!-- Right side - Navigation Links -->
                    <div class="hidden md:flex items-center space-x-4">
                        <a href="{{ route('books.index') }}" class="px-3 py-2 rounded-md hover:bg-green-700 transition-colors">Books</a>
                        <a href="{{ route('category.index') }}" class="px-3 py-2 rounded-md hover:bg-green-700 transition-colors">Categories</a>
                        <a href="{{ route('scholars.index') }}" class="px-3 py-2 rounded-md hover:bg-green-700 transition-colors">Scholars</a>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="md:hidden flex items-center">
                        <button @click="toggleMobileMenu" class="inline-flex items-center justify-center p-2 rounded-md hover:bg-green-700 focus:outline-none transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path v-if="!isMobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile menu panel -->
                <transition enter-active-class="transition duration-200 ease-out" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition duration-100 ease-in" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                    <div v-show="isMobileMenuOpen" class="md:hidden">
                        <div class="px-2 pt-2 pb-3 space-y-1">
                            <a href="books.html" class="block px-3 py-2 rounded-md hover:bg-green-700 transition-colors">Books</a>
                            <a href="categories.html" class="block px-3 py-2 rounded-md hover:bg-green-700 transition-colors">categories</a>
                            <a href="scholars-page.html" class="block px-3 py-2 rounded-md hover:bg-green-700 transition-colors">Scholars</a>
                            <a href="register.html" class="block px-3 py-2 rounded-md bg-green-600 hover:bg-green-700 transition-colors">Register</a>
                        </div>
                    </div>
                </transition>
            </div>
        </nav>

        <!-- Login Section -->
        <div class="min-h-screen bg-green-700 hero-pattern py-16 px-4">
            <div class="max-w-md mx-auto">
                <div class="login-form bg-white rounded-lg shadow-xl p-8 fade-in">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-800">Welcome Back</h2>
                        <p class="text-gray-600 mt-2">Sign in to access your account</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">Email Address</label>
                            <input
                                type="email"
                                v-model="email"
                                name="email"
                                class="input-field w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-green-500"
                                placeholder="Enter your email"
                                required>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                            <input
                                type="password"
                                v-model="password"
                                name="password"
                                class="input-field w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-green-500"
                                placeholder="Enter your password"
                                required>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-between">
                            <label class="flex items-center">
                                <input type="checkbox" v-model="rememberMe" class="form-checkbox text-green-600">
                                <span class="ml-2 text-sm text-gray-600">Remember me</span>
                            </label>
                            <a href="https://example.com/forgot-password" class="text-sm text-green-600 hover:text-green-800">Forgot password?</a>
                        </div>

                        <button
                            type="submit"
                            class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition-colors focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                            Sign In
                        </button>
                    </form>

                    <div class="mt-6 text-center">
                        <p class="text-gray-600">
                            Don't have an account?
                            <a href="register.html" class="text-green-600 hover:text-green-800 font-semibold">Register here</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const {
            createApp
        } = Vue

        createApp({
            data() {
                return {
                    isMobileMenuOpen: false,
                    email: '',
                    password: '',
                    rememberMe: false
                }
            },
            methods: {
                toggleMobileMenu() {
                    this.isMobileMenuOpen = !this.isMobileMenuOpen;
                },
                handleLogin() {
                    // Here you would typically make an API call to authenticate the user
                    console.log('Login attempt:', {
                        email: this.email,
                        password: this.password,
                        rememberMe: this.rememberMe
                    })

                    // For demonstration purposes, show an alert
                    alert('Login functionality would be implemented here')
                }
            }
        }).mount('#app')
    </script>

</body>

</html>