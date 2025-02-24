<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/" />
    <title>Yahaya Bawa Islamic Library</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />
    <style>
        .scholar-card {
            transition: all 0.3s ease;
        }

        .scholar-card:hover {
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
            animation: fadeIn 0.7s ease-out;
        }

        .book-card {
            transition: all 0.3s ease;
        }

        .book-card:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .search-bar {
            transition: all 0.3s ease;
        }

        .search-bar:focus {
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.3);
            transform: scale(1.01);
        }

        .arabic-calligraphy {
            font-family: "Noto Naskh Arabic", serif;
        }

        .hero-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .scroll-indicator {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            background: #22c55e;
            z-index: 1000;
            transition: width 0.3s ease;
        }

        .nav-links {
            transition: all 0.3s ease;
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background-color: #166534;
                padding: 1rem;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            }

            .nav-links.active {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 1rem;
            }

            .nav-links a {
                width: 100%;
                text-align: center;
                padding: 0.5rem;
            }
        }

        .dark-mode {
            background-color: #1a1a1a;
            color: #ffffff;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic&amp;display=swap" rel="stylesheet" />
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
                    <a href="{{ route('all-books') }}" class="hover:text-green-200 transition-colors">Categories</a>
                    <a href="./scholars-page.html" class="hover:text-green-200 transition-colors">Scholars</a>
                    <a href="{{ route('login') }}" class="hover:text-green-200 transition-colors">Login</a>
                    <a href="{{ route('register') }}"
                        class="bg-green-600 px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">Register</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="mx-auto">
        @yield('content')
    </div>

    <footer class="bg-green-800 text-white text-center py-6">
        <p>&copy; {{ date('Y') }} Yahaya Bawa Islamic Library. All rights reserved.</p>
    </footer>
</body>

</html>
