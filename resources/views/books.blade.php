<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/" />
    <title>Books Collection - Yahaya Bawa Islamic Library</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <style>
        :root {
            --primary-green: #0f4a2a;
            --secondary-green: #166534;
            --accent-green: #22c55e;
            --light-green: #dcfce7;
            --gold: #f59e0b;
            --gold-light: #fef3c7;
        }

        * {
            scroll-behavior: smooth;
        }

        .font-inter {
            font-family: 'Inter', sans-serif;
        }

        .font-arabic {
            font-family: 'Noto Naskh Arabic', serif;
        }

        .hero-gradient {
            background: linear-gradient(135deg, var(--primary-green) 0%, var(--secondary-green) 50%, var(--accent-green) 100%);
        }

        .floating-nav {
            transition: all 0.3s ease;
            backdrop-filter: blur(20px);
        }

        .floating-nav.scrolled {
            background: rgba(15, 74, 42, 0.95);
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.3);
        }

        .scroll-indicator {
            position: fixed;
            top: 0;
            left: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--accent-green), var(--gold));
            z-index: 1000;
            transition: width 0.1s ease;
            width: 0%;
        }

        .book-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 16px;
            overflow: hidden;
            background: white;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .book-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            border-color: var(--accent-green);
        }

        .book-cover {
            background: linear-gradient(145deg, var(--secondary-green), var(--accent-green));
            position: relative;
            overflow: hidden;
        }

        .book-cover::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.1) 25%, transparent 25%),
                linear-gradient(-45deg, rgba(255, 255, 255, 0.1) 25%, transparent 25%),
                linear-gradient(45deg, transparent 75%, rgba(255, 255, 255, 0.1) 75%),
                linear-gradient(-45deg, transparent 75%, rgba(255, 255, 255, 0.1) 75%);
            background-size: 20px 20px;
            opacity: 0.3;
        }

        .filter-btn {
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .filter-btn.active {
            background: var(--accent-green);
            color: white;
            border-color: var(--accent-green);
        }

        .filter-btn:hover {
            border-color: var(--accent-green);
            color: var(--accent-green);
        }

        .search-container {
            position: relative;
        }

        .search-bar {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .search-bar:focus {
            box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.2);
            transform: scale(1.02);
            border-color: var(--accent-green);
        }

        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .mobile-menu.active {
            transform: translateX(0);
        }

        .back-to-top {
            display: none;
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 3rem;
            height: 3rem;
            background: var(--secondary-green);
            color: white;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            z-index: 40;
            border: none;
            cursor: pointer;
        }

        .back-to-top.show {
            display: flex;
        }

        .back-to-top:hover {
            background: var(--accent-green);
            transform: translateY(-2px);
        }

        .category-badge {
            background: var(--gold-light);
            color: var(--gold);
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
        }

        .download-count {
            color: #6b7280;
            font-size: 0.875rem;
        }

        .rating-stars {
            color: var(--gold);
        }

        .pagination-btn {
            transition: all 0.3s ease;
            border: 1px solid #e5e7eb;
        }

        .pagination-btn:hover:not(.active) {
            background: #f9fafb;
            border-color: var(--accent-green);
        }

        .pagination-btn.active {
            background: var(--accent-green);
            color: white;
            border-color: var(--accent-green);
        }

        .sort-dropdown {
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }

        .book-spine {
            background: linear-gradient(to right,
                    rgba(0, 0, 0, 0.1) 0%,
                    rgba(0, 0, 0, 0.05) 10%,
                    transparent 15%,
                    transparent 85%,
                    rgba(0, 0, 0, 0.05) 90%,
                    rgba(0, 0, 0, 0.1) 100%);
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .nav-links.active {
                display: flex;
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background-color: var(--secondary-green);
                padding: 1rem;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
                align-items: center;
                gap: 1rem;
            }
        }

        .loading-overlay {
            position: fixed;
            inset: 0;
            background: rgba(255, 255, 255, 0.8);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .loading-overlay.show {
            display: flex;
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid #f3f4f6;
            border-top: 4px solid var(--accent-green);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .fade-in {
            animation: fadeIn 0.6s ease-out;
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
    </style>
</head>

<body class="font-inter bg-gray-50">
    <div class="scroll-indicator" id="scrollIndicator"></div>
    <div class="loading-overlay" id="loadingOverlay">
        <div class="spinner"></div>
    </div>

    <!-- Enhanced Navigation -->
    <nav class="floating-nav fixed top-0 w-full z-50 bg-green-800" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-green-400 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-7 h-7 text-white" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="text-white">
                        <h1 class="text-xl font-bold">Yahaya Bawa</h1>
                        <p class="text-xs text-green-200 hidden sm:block">Islamic Library</p>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8" id="desktopNav">
                    <a href="{{ route('welcome') }}"
                        class="text-white hover:text-green-200 transition-colors duration-200 font-medium relative group">
                        Home
                        <span
                            class="absolute -bottom-1 left-0 w-0 h-0.5 bg-green-400 transition-all duration-200 group-hover:w-full"></span>
                    </a>
                    <a href="{{ route('books') }}"
                        class="text-white hover:text-green-200 transition-colors duration-200 font-medium relative group">
                        Books
                        <span
                            class="absolute -bottom-1 left-0 w-0 h-0.5 bg-green-400 transition-all duration-200 group-hover:w-full"></span>
                    </a>
                    <a href="{{ route('scholars') }}"
                        class="text-white hover:text-green-200 transition-colors duration-200 font-medium relative group">
                        Scholars
                        <span
                            class="absolute -bottom-1 left-0 w-0 h-0.5 bg-green-400 transition-all duration-200 group-hover:w-full"></span>
                    </a>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center space-x-4">
                    <!-- Search Button -->
                    <button id="searchToggle" class="p-2 rounded-full text-white hover:bg-green-700 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>

                    <!-- Mobile Menu Button -->
                    <button id="mobileMenuToggle"
                        class="md:hidden p-2 rounded-full text-white hover:bg-green-700 transition-colors">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path id="menuIcon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
          </div>

            <!-- Mobile Menu -->
            <div class="md:hidden nav-links" id="mobileMenu">
                <a href="{{ route('welcome') }}"
                    class="text-white hover:text-green-200 transition-colors text-lg font-medium py-3 border-b border-green-700">Home</a>
                <a href="{{ route('books') }}"
                    class="text-white hover:text-green-200 transition-colors text-lg font-medium py-3 border-b border-green-700">Books</a>
                <a href="{{ route('scholars') }}"
                    class="text-white hover:text-green-200 transition-colors text-lg font-medium py-3 border-b border-green-700">Scholars</a>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="hero-gradient pt-24 pb-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto text-center">
            <div class="space-y-6" data-aos="fade-up">
                <h1 class="text-4xl lg:text-6xl font-bold text-white leading-tight">
                    Islamic Books
                    <span class="block text-yellow-300">Collection</span>
                </h1>
                <p class="text-xl text-green-100 max-w-3xl mx-auto leading-relaxed">
                    Explore our comprehensive collection of authentic Islamic texts, from classical works to
                    contemporary scholarship
                </p>

                <!-- Search Bar -->
                <div class="max-w-2xl mx-auto mt-8">
                    <div class="search-container">
                        <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-6 h-6 text-gray-400"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <input id="mainSearchInput" type="text"
                            class="search-bar w-full pl-14 pr-6 py-4 bg-white rounded-2xl border-0 focus:outline-none text-lg shadow-2xl"
                            placeholder="Search books, authors, or topics...">
                        <button id="mainSearchBtn"
                            class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-xl font-medium transition-colors">
                            Search
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Filters and Controls -->
    <section class="bg-white shadow-sm sticky top-16 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">
                <!-- Category Filters -->
                <div class="flex flex-wrap gap-3">
                    <button class="filter-btn active px-4 py-2 rounded-full font-medium" data-category="all">
                        All Books
                    </button>
                    <button class="filter-btn px-4 py-2 rounded-full font-medium" data-category="quran">
                        Quran & Tafsir
                    </button>
                    <button class="filter-btn px-4 py-2 rounded-full font-medium" data-category="hadith">
                        Hadith
                    </button>
                    <button class="filter-btn px-4 py-2 rounded-full font-medium" data-category="fiqh">
                        Fiqh
                    </button>
                    <button class="filter-btn px-4 py-2 rounded-full font-medium" data-category="history">
                        History
                    </button>
                    <button class="filter-btn px-4 py-2 rounded-full font-medium" data-category="theology">
                        Theology
                    </button>
                </div>

                <!-- Sort and View Controls -->
                <div class="flex items-center gap-4">
                    <div class="flex items-center space-x-2">
                        <label class="text-sm font-medium text-gray-700">Sort by:</label>
                        <select id="sortSelect"
                            class="sort-dropdown border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500">
                            <option value="title">Title A-Z</option>
                            <option value="author">Author</option>
                            <option value="downloads">Most Downloaded</option>
                            <option value="rating">Highest Rated</option>
                            <option value="recent">Recently Added</option>
                        </select>
                    </div>

                    <!-- View Toggle -->
                    <div class="flex items-center bg-gray-100 rounded-lg p-1">
                        <button id="gridViewBtn" class="p-2 rounded-md bg-white shadow-sm">
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                            </svg>
                        </button>
                        <button id="listViewBtn" class="p-2 rounded-md">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Results Count -->
            <div class="mt-4 text-sm text-gray-600">
                Showing <span id="resultsCount">48</span> of <span id="totalCount">156</span> books
            </div>
        </div>
    </section>

    <!-- Books Grid -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div id="booksGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <!-- Book Card Template - Multiple cards will be generated by JavaScript -->
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-12">
                <button id="loadMoreBtn"
                    class="bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-xl font-semibold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                    Load More Books
                </button>
            </div>

            <!-- Pagination -->
            <div class="flex justify-center items-center space-x-2 mt-12" id="pagination">
                <button class="pagination-btn px-3 py-2 rounded-lg">Previous</button>
                <button class="pagination-btn active px-3 py-2 rounded-lg">1</button>
                <button class="pagination-btn px-3 py-2 rounded-lg">2</button>
                <button class="pagination-btn px-3 py-2 rounded-lg">3</button>
                <span class="px-3 py-2 text-gray-500">...</span>
                <button class="pagination-btn px-3 py-2 rounded-lg">12</button>
                <button class="pagination-btn px-3 py-2 rounded-lg">Next</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16" id="contact">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div
                            class="w-10 h-10 bg-gradient-to-br from-green-400 to-emerald-600 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none">
                                <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg">Yahaya Bawa</h3>
                            <p class="text-sm text-gray-400">Islamic Library</p>
                        </div>
                    </div>
                    <p class="text-gray-400 leading-relaxed">
                        Preserving and sharing authentic Islamic knowledge for generations to come.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-green-600 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-green-600 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-green-600 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.098.119.112.223.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.012.001z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="font-semibold text-lg mb-4">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('welcome') }}"
                                class="text-gray-400 hover:text-white transition-colors">Home</a></li>
                        <li><a href="{{ route('books') }}"
                                class="text-gray-400 hover:text-white transition-colors">Books</a></li>
                        <li><a href="{{ route('scholars') }}"
                                class="text-gray-400 hover:text-white transition-colors">Scholars</a></li>
                    </ul>
                </div>

                <!-- Categories -->
                <div>
                    <h4 class="font-semibold text-lg mb-4">Categories</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Quran &
                                Tafsir</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Hadith</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Fiqh</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Islamic
                                History</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Theology</a>
                        </li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="font-semibold text-lg mb-4">Contact</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>Sokoto, Nigeria</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span>info@yahaybawa.org</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span>+234 xxx xxx xxxx</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-12 pt-8 text-center">
                <p class="text-gray-400">
                    &copy; 2025 Yahaya Bawa Islamic Library. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTop">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12" />
        </svg>
    </button>

    <script>
        // Sample book data
        const booksData = [{
                id: 1,
                title: "Ihya ul-Sunna",
                author: "Sheik Othman Bn Fodio",
                category: "theology",
                description: "A comprehensive work on Islamic theology and revival of Prophetic traditions.",
                downloads: 1234,
                rating: 4.9,
                pages: 245,
                language: "Arabic",
                format: "PDF",
                size: "2.1 MB",
                year: 1804,
                featured: true
            },
            {
                id: 2,
                title: "Diya ul-Siyasat",
                author: "Sheik Muhammad Bello",
                category: "history",
                description: "Political governance and administration in Islamic societies.",
                downloads: 890,
                rating: 4.7,
                pages: 189,
                language: "Arabic",
                format: "PDF",
                size: "1.8 MB",
                year: 1820
            },
            {
                id: 3,
                title: "Diya ul-Hukkam",
                author: "Sheik Abdullahi Bn Fodio",
                category: "fiqh",
                description: "Islamic jurisprudence and legal principles for rulers and administrators.",
                downloads: 756,
                rating: 4.8,
                pages: 312,
                language: "Arabic",
                format: "PDF",
                size: "2.8 MB",
                year: 1812
            },
            {
                id: 4,
                title: "Nur ul-Albab",
                author: "Sheik Othman Bn Fodio",
                category: "theology",
                description: "Enlightenment of hearts through Islamic spiritual guidance.",
                downloads: 643,
                rating: 4.6,
                pages: 156,
                language: "Arabic",
                format: "PDF",
                size: "1.5 MB",
                year: 1808
            },
            {
                id: 5,
                title: "Tafsir al-Quran al-Karim",
                author: "Sheik Ahmad ibn Muhammad",
                category: "quran",
                description: "Comprehensive commentary on the Holy Quran with deep spiritual insights.",
                downloads: 2156,
                rating: 4.9,
                pages: 1240,
                language: "Arabic",
                format: "PDF",
                size: "8.5 MB",
                year: 1825
            },
            {
                id: 6,
                title: "Sahih al-Bukhari Commentary",
                author: "Sheik Abdullah al-Sudani",
                category: "hadith",
                description: "Detailed explanation of the authentic traditions of Prophet Muhammad (PBUH).",
                downloads: 1876,
                rating: 4.8,
                pages: 890,
                language: "Arabic",
                format: "PDF",
                size: "6.2 MB",
                year: 1835
            },
            {
                id: 8,
                title: "Tarikh al-Sudan",
                author: "Abd al-Rahman al-Sadi",
                category: "history",
                description: "Historical chronicle of the Songhai Empire and West African Islamic civilization.",
                downloads: 967,
                rating: 4.6,
                pages: 445,
                language: "Arabic",
                format: "PDF",
                size: "3.7 MB",
                year: 1655
            },
            {
                id: 9,
                title: "Kitab al-Tawhid",
                author: "Sheik Muhammad ibn Abd al-Wahhab",
                category: "theology",
                description: "Essential work on Islamic monotheism and the unity of Allah.",
                downloads: 2234,
                rating: 4.8,
                pages: 198,
                language: "Arabic",
                format: "PDF",
                size: "1.9 MB",
                year: 1758
            },
            {
                id: 10,
                title: "Al-Risala",
                author: "Imam al-Shafi'i",
                category: "fiqh",
                description: "Foundational treatise on Islamic legal theory and principles of jurisprudence.",
                downloads: 1678,
                rating: 4.9,
                pages: 356,
                language: "Arabic",
                format: "PDF",
                size: "3.1 MB",
                year: 820
            },
            {
                id: 11,
                title: "Sunan an-Nasa'i",
                author: "Imam an-Nasa'i",
                category: "hadith",
                description: "Collection of authentic prophetic traditions with detailed commentary.",
                downloads: 1456,
                rating: 4.7,
                pages: 678,
                language: "Arabic",
                format: "PDF",
                size: "5.4 MB",
                year: 915
            },
            {
                id: 12,
                title: "Minhaj as-Sunnah",
                author: "Ibn Taymiyyah",
                category: "theology",
                description: "Comprehensive refutation of deviant beliefs and defense of orthodox Islam.",
                downloads: 1123,
                rating: 4.8,
                pages: 523,
                language: "Arabic",
                format: "PDF",
                size: "4.2 MB",
                year: 1318
            }
        ];

        let currentBooks = booksData;
        let currentPage = 1;
        let currentView = 'grid';
        const booksPerPage = 12;

        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 50,
        });

        // DOM Elements
        const booksGrid = document.getElementById('booksGrid');
        const filterButtons = document.querySelectorAll('.filter-btn');
        const sortSelect = document.getElementById('sortSelect');
        const searchInput = document.getElementById('mainSearchInput');
        const searchBtn = document.getElementById('mainSearchBtn');
        const loadMoreBtn = document.getElementById('loadMoreBtn');
        const resultsCount = document.getElementById('resultsCount');
        const totalCount = document.getElementById('totalCount');
        const loadingOverlay = document.getElementById('loadingOverlay');
        const gridViewBtn = document.getElementById('gridViewBtn');
        const listViewBtn = document.getElementById('listViewBtn');

        // Mobile menu functionality
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const mobileMenu = document.getElementById('mobileMenu');
        const menuIcon = document.getElementById('menuIcon');

        mobileMenuToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('active');

            if (mobileMenu.classList.contains('active')) {
                menuIcon.setAttribute('d', 'M6 18L18 6M6 6l12 12');
            } else {
                menuIcon.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
            }
        });

        // Create book card HTML
        function createBookCard(book, index) {
            return `
                <div class="book-card fade-in" data-aos="fade-up" data-aos-delay="${index * 100}" data-category="${book.category}">
                    <div class="book-cover h-48 flex items-center justify-center relative">
                        ${book.featured ? '<div class="absolute top-3 right-3 bg-yellow-400 text-yellow-900 text-xs font-bold px-2 py-1 rounded-full">FEATURED</div>' : ''}
                        <div class="book-spine absolute left-2 top-2 bottom-2 w-2 rounded-sm"></div>
                        <svg class="w-16 h-16 text-white opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        <div class="absolute inset-0 bg-black opacity-0 hover:opacity-20 transition-opacity duration-300 flex items-center justify-center">
                            <button class="bg-white text-green-800 px-4 py-2 rounded-lg font-semibold opacity-0 hover:opacity-100 transition-opacity duration-300 transform translate-y-4 hover:translate-y-0">
                                Quick View
                            </button>
                        </div>
                    </div>
                    
                    <div class="p-6 space-y-4">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <div class="category-badge mb-2 inline-block">${book.category.charAt(0).toUpperCase() + book.category.slice(1)}</div>
                                <h3 class="font-bold text-lg text-gray-800 leading-tight mb-2 font-arabic">${book.title}</h3>
                                <p class="text-gray-600 font-medium">${book.author}</p>
                            </div>
                        </div>
                        
                        <p class="text-gray-600 text-sm leading-relaxed line-clamp-3">${book.description}</p>
                        
                        <div class="flex items-center justify-between text-sm text-gray-500">
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center rating-stars">
                                    ${generateStars(book.rating)}
                                    <span class="ml-1 text-gray-600">(${book.rating})</span>
                                </div>
                            </div>
                            <div class="download-count flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                                ${book.downloads.toLocaleString()}
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-between text-xs text-gray-500 pt-2 border-t border-gray-100">
                            <span>${book.pages} pages</span>
                            <span>${book.format}</span>
                            <span>${book.size}</span>
                        </div>
                        
                        <div class="flex space-x-2 pt-2">
                            <button class="flex-1 bg-green-600 hover:bg-green-700 text-white py-3 px-4 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 flex items-center justify-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                                Download
                            </button>
                            <button class="p-3 border border-gray-200 hover:border-green-500 rounded-lg transition-colors group">
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                            </button>
                            <button class="p-3 border border-gray-200 hover:border-green-500 rounded-lg transition-colors group">
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            `;
        }

        // Generate star rating
        function generateStars(rating) {
            const fullStars = Math.floor(rating);
            const hasHalfStar = rating % 1 !== 0;
            let starsHTML = '';

            for (let i = 0; i < fullStars; i++) {
                starsHTML +=
                    '<svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>';
            }

            if (hasHalfStar) {
                starsHTML +=
                    '<svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><defs><linearGradient id="half"><stop offset="50%" stop-color="currentColor"/><stop offset="50%" stop-color="#e5e7eb"/></linearGradient></defs><path fill="url(#half)" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>';
            }

            return starsHTML;
        }

        // Render books
        function renderBooks(books = currentBooks, append = false) {
            if (!append) {
                booksGrid.innerHTML = '';
            }

            const booksToShow = books.slice(0, currentPage * booksPerPage);
            const newBooks = append ? books.slice((currentPage - 1) * booksPerPage, currentPage * booksPerPage) :
                booksToShow;

            newBooks.forEach((book, index) => {
                const bookElement = document.createElement('div');
                bookElement.innerHTML = createBookCard(book, index);
                booksGrid.appendChild(bookElement.firstElementChild);
            });

            // Update counts
            resultsCount.textContent = Math.min(booksToShow.length, books.length);
            totalCount.textContent = books.length;

            // Show/hide load more button
            if (booksToShow.length >= books.length) {
                loadMoreBtn.style.display = 'none';
            } else {
                loadMoreBtn.style.display = 'block';
            }

            // Reinitialize AOS for new elements
            AOS.refresh();
        }

        // Filter books by category
        function filterBooks(category) {
            showLoading();
            setTimeout(() => {
                if (category === 'all') {
                    currentBooks = booksData;
                } else {
                    currentBooks = booksData.filter(book => book.category === category);
                }
                currentPage = 1;
                renderBooks();
                hideLoading();
            }, 500);
        }

        // Sort books
        function sortBooks(sortBy) {
            showLoading();
            setTimeout(() => {
                const sortedBooks = [...currentBooks];

                switch (sortBy) {
                    case 'title':
                        sortedBooks.sort((a, b) => a.title.localeCompare(b.title));
                        break;
                    case 'author':
                        sortedBooks.sort((a, b) => a.author.localeCompare(b.author));
                        break;
                    case 'downloads':
                        sortedBooks.sort((a, b) => b.downloads - a.downloads);
                        break;
                    case 'rating':
                        sortedBooks.sort((a, b) => b.rating - a.rating);
                        break;
                    case 'recent':
                        sortedBooks.sort((a, b) => b.year - a.year);
                        break;
                }

                currentBooks = sortedBooks;
                currentPage = 1;
                renderBooks();
                hideLoading();
            }, 500);
        }

        // Search books
        function searchBooks(query) {
            showLoading();
            setTimeout(() => {
                if (!query.trim()) {
                    currentBooks = booksData;
                } else {
                    const searchTerm = query.toLowerCase();
                    currentBooks = booksData.filter(book =>
                        book.title.toLowerCase().includes(searchTerm) ||
                        book.author.toLowerCase().includes(searchTerm) ||
                        book.description.toLowerCase().includes(searchTerm) ||
                        book.category.toLowerCase().includes(searchTerm)
                    );
                }
                currentPage = 1;
                renderBooks();
                hideLoading();
            }, 500);
        }

        // Show/hide loading
        function showLoading() {
            loadingOverlay.classList.add('show');
        }

        function hideLoading() {
            loadingOverlay.classList.remove('show');
        }

        // Event listeners
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                filterBooks(this.dataset.category);
            });
        });

        sortSelect.addEventListener('change', function() {
            sortBooks(this.value);
        });

        searchBtn.addEventListener('click', function() {
            searchBooks(searchInput.value);
        });

        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchBooks(this.value);
            }
        });

        loadMoreBtn.addEventListener('click', function() {
            currentPage++;
            renderBooks(currentBooks, true);
        });

        // View toggle functionality
        gridViewBtn.addEventListener('click', function() {
            currentView = 'grid';
            this.classList.add('bg-white', 'shadow-sm');
            this.querySelector('svg').classList.remove('text-gray-400');
            this.querySelector('svg').classList.add('text-gray-600');

            listViewBtn.classList.remove('bg-white', 'shadow-sm');
            listViewBtn.querySelector('svg').classList.add('text-gray-400');
            listViewBtn.querySelector('svg').classList.remove('text-gray-600');

            booksGrid.className = 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8';
        });

        listViewBtn.addEventListener('click', function() {
            currentView = 'list';
            this.classList.add('bg-white', 'shadow-sm');
            this.querySelector('svg').classList.remove('text-gray-400');
            this.querySelector('svg').classList.add('text-gray-600');

            gridViewBtn.classList.remove('bg-white', 'shadow-sm');
            gridViewBtn.querySelector('svg').classList.add('text-gray-400');
            gridViewBtn.querySelector('svg').classList.remove('text-gray-600');

            booksGrid.className = 'grid grid-cols-1 gap-6';
        });

        // Scroll progress and navigation effects
        const scrollIndicator = document.getElementById('scrollIndicator');
        const navbar = document.getElementById('navbar');
        const backToTop = document.getElementById('backToTop');

        function updateScrollProgress() {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;

            scrollIndicator.style.width = scrolled + '%';

            if (winScroll > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }

            if (winScroll > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        }

        window.addEventListener('scroll', updateScrollProgress);

        // Back to top functionality
        backToTop.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Close mobile menu when clicking on links
        document.querySelectorAll('#mobileMenu a').forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.remove('active');
                menuIcon.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
            });
        });

        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            renderBooks();
            updateScrollProgress();
        });
    </script>
</body>

</html>
