<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Yahaya Bawa Islamic Library')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <nav class="bg-green-800 text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="text-xl font-bold flex items-center">
                        Yahaya Bawa Islamic Library
                    </a>
                </div>
                <div class="flex items-center space-x-6">
                    <a href="{{ route('all-books') }}" class="hover:text-green-200 transition-colors">Books</a>
                    <a href="./scholars-page.html" class="hover:text-green-200 transition-colors">Scholars</a>
                    <a href="{{ route('login') }}" class="hover:text-green-200 transition-colors">Login</a>
                    <a href="{{ route('register') }}" class="bg-green-600 px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">Register</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-10">
        @yield('content')
    </div>

    <footer class="bg-gray-800 text-white text-center py-6">
        <p>&copy; {{ date('Y') }} Yahaya Bawa Islamic Library. All rights reserved.</p>
    </footer>
</body>
</html>
