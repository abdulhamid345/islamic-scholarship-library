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

<body class="bg-gray-50" :class="{ 'dark-mode': darkMode }">
    <div class="scroll-indicator" :style="{ width: scrollProgress + '%' }"></div>
    <div id="app">
        <!-- Navigation -->
        <nav class="bg-green-800 text-white shadow-lg sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="/" class="text-xl font-bold flex items-center">
                            <svg class="w-8 h-8 mr-2" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span class="hidden sm:inline">Yahaya Bawa Islamic Library</span>
                            <span class="sm:hidden">YBIL</span>
                        </a>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button @click="toggleDarkMode" class="p-2 rounded-full hover:bg-green-700">
                            <svg v-if="!darkMode" class="w-6 h-6" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                            <svg v-else="" class="w-6 h-6" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex items-center md:hidden">
                        <button @click="toggleMenu" class="p-2 rounded-md hover:bg-green-700 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path v-if="!menuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path v-else="" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div :class="['nav-links', 'md:flex', 'md:items-center', 'md:space-x-6', { 'active': menuOpen }]">
                        <a href="books.html" class="hover:text-green-200 transition-colors">Books</a>
                        <a href="categories.html"
                            class="px-3 py-2 rounded-md hover:bg-green-700 transition-colors">Categories</a>
                        <a href="scholars-page.html" class="hover:text-green-200 transition-colors">Scholars</a>
                        <a href="login.html" class="hover:text-green-200 transition-colors">Login</a>
                        <a href="register.html"
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

        <script>
            const {
                createApp
            } = Vue;
            createApp({
                data() {
                    return {
                        menuOpen: false,
                        searchQuery: "",
                        darkMode: false,
                        scrollProgress: 0,
                        scholars: [{
                                id: 1,
                                name: "Sheik Othman Bn Fodio",
                                initial: "O",
                                description: "Founder of the Sokoto Caliphate and prolific author of numerous Islamic texts",
                            },
                            {
                                id: 2,
                                name: "Sheik Abdullahi Bn Fodio",
                                initial: "A",
                                description: "Renowned scholar and brother of Othman Bn Fodio, known for his comprehensive works",
                            },
                            {
                                id: 3,
                                name: "Sheik Muhammad Bello",
                                initial: "M",
                                description: "Son of Othman Bn Fodio and second Sultan of Sokoto, authored many significant works",
                            },
                        ],
                        featuredBooks: [{
                                id: 1,
                                title: "Ihya ul-Sunna",
                                author: "Sheik Othman Bn Fodio",
                                downloads: 1234,
                            },
                            {
                                id: 2,
                                title: "Diya ul-Siyasat",
                                author: "Sheik Muhammad Bello",
                                downloads: 890,
                            },
                            {
                                id: 3,
                                title: "Diya ul-Hukkam",
                                author: "Sheik Abdullahi Bn Fodio",
                                downloads: 756,
                            },
                            {
                                id: 4,
                                title: "Nur ul-Albab",
                                author: "Sheik Othman Bn Fodio",
                                downloads: 643,
                            },
                        ],
                        selectedScholar: {},
                    };
                },
                methods: {
                    toggleMenu() {
                        this.menuOpen = !this.menuOpen;
                    },
                    toggleDarkMode() {
                        this.darkMode = !this.darkMode;
                    },
                    handleSearch() {
                        console.log("Searching for:", this.searchQuery);
                    },
                    updateScrollProgress() {
                        const winScroll =
                            document.body.scrollTop || document.documentElement.scrollTop;
                        const height =
                            document.documentElement.scrollHeight -
                            document.documentElement.clientHeight;
                        this.scrollProgress = (winScroll / height) * 100;
                    },
                },
                mounted() {
                    AOS.init({
                        duration: 1000,
                        once: true,
                        offset: 50,
                    });
                    window.addEventListener("scroll", this.updateScrollProgress);
                },
                beforeUnmount() {
                    window.removeEventListener("scroll", this.updateScrollProgress);
                },
            }).mount("#app");
        </script>
    </div>
</body>

</html>
</body>

</html>
