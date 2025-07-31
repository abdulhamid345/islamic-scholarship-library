<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/" />
    <title>Yahaya Bawa Islamic Library</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
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

        .glass-morphism {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .hero-gradient {
            background: linear-gradient(135deg, var(--primary-green) 0%, var(--secondary-green) 50%, var(--accent-green) 100%);
        }

        .text-gradient {
            background: linear-gradient(135deg, var(--accent-green), var(--gold));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .scholar-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .scholar-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .scholar-card:hover::before {
            left: 100%;
        }

        .scholar-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 60px -12px rgba(0, 0, 0, 0.25);
        }

        .book-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 16px;
            overflow: hidden;
        }

        .book-card:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.2);
        }

        .search-container {
            position: relative;
        }

        .search-bar {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            padding-left: 3rem;
        }

        .search-bar:focus {
            box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.2);
            transform: scale(1.02);
            border-color: var(--accent-green);
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

        .stats-counter {
            font-weight: 700;
            font-size: 2.5rem;
            color: var(--gold);
        }

        .feature-icon {
            background: linear-gradient(135deg, var(--accent-green), var(--gold));
            border-radius: 50%;
            padding: 1rem;
            color: white;
            transition: all 0.3s ease;
        }

        .feature-icon:hover {
            transform: scale(1.1) rotate(5deg);
        }

        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .mobile-menu.active {
            transform: translateX(0);
        }

        .fade-in-up {
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .pulse-animation {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        .hero-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .nav-hidden {
            display: none;
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

            .nav-links a {
                width: 100%;
                text-align: center;
                padding: 0.5rem;
            }

            .stats-counter {
                font-size: 2rem;
            }
            
            .hero-title {
                font-size: 2.5rem;
            }
        }

        /* Hide elements by default for JavaScript enhancement */
        .search-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 50;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .search-overlay.active {
            display: flex;
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
    </style>
</head>

<body class="font-inter bg-gray-50">
    <div class="scroll-indicator" id="scrollIndicator"></div>
    
    <!-- Enhanced Navigation -->
    <nav class="floating-nav fixed top-0 w-full z-50 bg-green-800" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-7 h-7 text-white" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="text-white">
                        <h1 class="text-xl font-bold">Yahaya Bawa</h1>
                        <p class="text-xs text-green-200 hidden sm:block">Islamic Library</p>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8" id="desktopNav">
                    <a href="{{ route('welcome') }}" class="text-white hover:text-green-200 transition-colors duration-200 font-medium relative group">
                        Home
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-green-400 transition-all duration-200 group-hover:w-full"></span>
                    </a>
                    <a href="{{ route('books') }}" class="text-white hover:text-green-200 transition-colors duration-200 font-medium relative group">
                        Books
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-green-400 transition-all duration-200 group-hover:w-full"></span>
                    </a>
                    <a href="{{ route('scholars') }}" class="text-white hover:text-green-200 transition-colors duration-200 font-medium relative group">
                        Scholars
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-green-400 transition-all duration-200 group-hover:w-full"></span>
                    </a>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center space-x-4">
                    <!-- Search Button -->
                    <button id="searchToggle" class="p-2 rounded-full text-white hover:bg-green-700 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>

                    <!-- Mobile Menu Button -->
                    <button id="mobileMenuToggle" class="md:hidden p-2 rounded-full text-white hover:bg-green-700 transition-colors">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path id="menuIcon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div class="md:hidden nav-links" id="mobileMenu">
                <a href="{{ route('welcome') }}" class="text-white hover:text-green-200 transition-colors text-lg font-medium py-3 border-b border-green-700">Home</a>
                <a href="{{ route('books') }}" class="text-white hover:text-green-200 transition-colors text-lg font-medium py-3 border-b border-green-700">Books</a>
                <a href="{{ route('scholars') }}" class="text-white hover:text-green-200 transition-colors text-lg font-medium py-3 border-b border-green-700">Scholars</a>
            </div>
        </div>
    </nav>

    <!-- Search Overlay -->
    <div class="search-overlay" id="searchOverlay">
        <div class="bg-white rounded-2xl p-6 w-full max-w-2xl">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-semibold">Search Library</h3>
                <button id="searchClose" class="p-2 rounded-full hover:bg-gray-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="search-container">
                <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input id="searchInput" 
                       class="search-bar w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl focus:outline-none bg-gray-50 text-lg" 
                       placeholder="Search books, authors, or topics...">
            </div>
            <div class="mt-4 flex justify-end">
                <button id="searchSubmit" 
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl font-medium transition-colors">
                    Search
                </button>
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="hero-gradient hero-pattern pt-20 pb-20 px-4 sm:px-6 lg:px-8 min-h-screen flex items-center relative overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="floating-element absolute top-20 left-10 w-20 h-20 bg-white rounded-full"></div>
            <div class="floating-element absolute top-40 right-20 w-16 h-16 bg-yellow-300 rounded-full" style="animation-delay: -2s;"></div>
            <div class="floating-element absolute bottom-32 left-20 w-12 h-12 bg-green-300 rounded-full" style="animation-delay: -4s;"></div>
            <div class="floating-element absolute bottom-20 right-32 w-24 h-24 bg-emerald-300 rounded-full" style="animation-delay: -1s;"></div>
            
            <!-- Islamic Pattern Elements -->
            <div class="absolute top-32 left-1/4 text-white opacity-5 text-6xl font-arabic">ﷲ</div>
            <div class="absolute bottom-40 right-1/4 text-white opacity-5 text-4xl font-arabic transform rotate-45">☪</div>
        </div>

        <div class="max-w-7xl mx-auto relative z-10 w-full">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Left Content -->
                <div class="space-y-10" data-aos="fade-right">
                    <!-- Main Heading -->
                    <div class="space-y-6">
                        <div class="inline-flex items-center px-4 py-2 bg-white bg-opacity-20 rounded-full text-sm font-medium backdrop-blur-sm border border-white border-opacity-30 mb-4 text-black">
                            <svg class="w-4 h-4 mr-2 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            Trusted by 100,000+ Islamic scholars and students
                        </div>
                        
                        <h1 class="hero-title text-6xl lg:text-7xl xl:text-8xl font-bold leading-none tracking-tight text-black">
                            <span class="block">Discover</span>
                            <span class="block text-gradient bg-gradient-to-r from-yellow-300 via-green-300 to-emerald-300 bg-clip-text text-transparent">Islamic</span>
                            <span class="block">Knowledge</span>
                        </h1>
                        
                        <p class="text-xl lg:text-2xl leading-relaxed max-w-2xl font-light text-black">
                            Access <span class="font-semibold text-yellow-300">thousands</span> of authentic Islamic texts, scholarly works, and educational resources from renowned scholars spanning centuries of Islamic tradition.
                        </p>
                    </div>

                    <!-- Enhanced Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-6">
                        <button class="group bg-white text-green-800 px-10 py-5 rounded-2xl font-bold text-lg hover:bg-green-50 transition-all duration-500 transform hover:scale-105 hover:-translate-y-1 shadow-2xl relative overflow-hidden">
                            <span class="relative z-10 flex items-center justify-center">
                                <svg class="w-6 h-6 mr-3 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                                Explore Library
                            </span>
                            <div class="absolute inset-0 bg-gradient-to-r from-green-400 to-emerald-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                        </button>
                        
                        <button class="group border-3 border-white text-black px-10 py-5 rounded-2xl font-bold text-lg hover:bg-white hover:text-green-800 transition-all duration-500 backdrop-blur-sm bg-white bg-opacity-10 relative overflow-hidden">
                            <span class="relative z-10 flex items-center justify-center">
                                <svg class="w-6 h-6 mr-3 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h8M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Learn More
                            </span>
                        </button>
                    </div>

                    <!-- Enhanced Stats -->
                    <div class="grid grid-cols-3 gap-8 pt-10">
                        <div class="text-center group cursor-pointer">
                            <div class="stats-counter text-4xl lg:text-5xl font-black bg-gradient-to-r from-yellow-300 to-yellow-500 bg-clip-text text-transparent group-hover:scale-110 transition-transform duration-300">5K+</div>
                            <div class="font-semibold text-lg text-black">Books</div>
                            <div class="text-green-700 text-sm opacity-80">Verified Texts</div>
                        </div>
                        <div class="text-center group cursor-pointer">
                            <div class="stats-counter text-4xl lg:text-5xl font-black bg-gradient-to-r from-yellow-300 to-yellow-500 bg-clip-text text-transparent group-hover:scale-110 transition-transform duration-300">50+</div>
                            <div class="font-semibold text-lg text-black">Scholars</div>
                            <div class="text-green-700 text-sm opacity-80">Classical & Modern</div>
                        </div>
                        <div class="text-center group cursor-pointer">
                            <div class="stats-counter text-4xl lg:text-5xl font-black bg-gradient-to-r from-yellow-300 to-yellow-500 bg-clip-text text-transparent group-hover:scale-110 transition-transform duration-300">100K+</div>
                            <div class="font-semibold text-lg text-black">Students</div>
                            <div class="text-green-700 text-sm opacity-80">Worldwide</div>
                        </div>
                    </div>

                    <!-- Trust Indicators -->
                    <div class="flex flex-wrap items-center gap-6 pt-6 opacity-80">
                        <div class="flex items-center text-green-700">
                            <svg class="w-5 h-5 mr-2 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-sm font-medium text-black">Authenticated Sources</span>
                        </div>
                        <div class="flex items-center text-green-700">
                            <svg class="w-5 h-5 mr-2 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-sm font-medium text-black">Free Access</span>
                        </div>
                        <div class="flex items-center text-green-700">
                            <svg class="w-5 h-5 mr-2 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-sm font-medium text-black">Instant Downloads</span>
                        </div>
                    </div>
                </div>

                <!-- Right Content - Enhanced Visual -->
                <div class="relative" data-aos="fade-left" data-aos-delay="200">
                    <!-- Main Featured Book Card -->
                    <div class="relative z-20">
                        <div class="bg-white rounded-3xl p-10 shadow-2xl transform hover:rotate-0 transition-all duration-700 hover:scale-105 group" style="transform: rotate(2deg);">
                            <!-- Book Preview Header -->
                            <div class="flex items-center justify-between mb-8">
                                <div class="flex items-center space-x-3">
                                    <div class="w-3 h-3 bg-red-400 rounded-full"></div>
                                    <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                                    <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                                </div>
                                <div class="text-xs text-gray-400 font-mono">FEATURED</div>
                            </div>

                            <div class="text-center space-y-8">
                                <!-- Book Icon with Animation -->
                                <div class="relative">
                                    <div class="w-24 h-24 bg-gradient-to-br from-green-400 via-emerald-500 to-teal-600 rounded-2xl mx-auto flex items-center justify-center shadow-2xl group-hover:shadow-3xl transition-all duration-500 group-hover:scale-110">
                                        <svg class="w-12 h-12 text-white group-hover:rotate-12 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                        </svg>
                                    </div>
                                    <!-- Floating Badge -->
                                    <div class="absolute -top-2 -right-2 bg-yellow-400 text-yellow-900 text-xs font-bold px-2 py-1 rounded-full animate-bounce">
                                        NEW
                                    </div>
                                </div>

                                <!-- Book Details -->
                                <div class="space-y-4">
                                    <div class="space-y-2">
                                        <h3 class="text-3xl font-bold text-green-700 group-hover:text-green-700 transition-colors duration-300">Featured Today</h3>
                                        <div class="w-16 h-1 bg-gradient-to-r from-green-400 to-emerald-500 mx-auto rounded-full"></div>
                                    </div>
                                    
                                    <div class="space-y-4">
                                        <h4 class="text-2xl font-bold text-green-600 font-arabic">Ihya ul-Sunna</h4>
                                        <p class="font-semibold text-black">By Sheik Othman Bn Fodio</p>
                                        
                                        <!-- Rating Stars -->
                                        <div class="flex items-center justify-center space-x-1">
                                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <span class="text-sm text-gray-500 ml-2">(4.9)</span>
                                        </div>
                                        
                                        <!-- Download Stats -->
                                        <div class="flex items-center justify-center space-x-6 text-sm">
                                            <div class="flex items-center text-gray-500">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                                </svg>
                                                <span class="font-semibold">1,234</span>
                                            </div>
                                            <div class="flex items-center text-gray-500">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                                <span class="font-semibold">2,456</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Action Button -->
                                    <button class="w-full bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white py-4 px-6 rounded-xl font-bold text-lg transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                                        Read Now
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Background Elements -->
                    <div class="absolute -top-8 -right-8 w-40 h-40 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full opacity-20 blur-xl"></div>
                    <div class="absolute -bottom-8 -left-8 w-32 h-32 bg-gradient-to-br from-green-400 to-teal-500 rounded-full opacity-20 blur-xl"></div>
                    <div class="absolute top-1/2 -right-4 w-6 h-6 bg-white rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-1/4 -left-6 w-4 h-4 bg-yellow-300 rounded-full opacity-80 animate-bounce" style="animation-delay: -1s;"></div>
                    
                    <!-- Islamic Geometric Pattern -->
                    <div class="absolute inset-0 opacity-5">
                        <svg class="w-full h-full" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <pattern id="islamicPattern" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                    <path d="M10,0 L20,10 L10,20 L0,10 Z" fill="currentColor" opacity="0.3"/>
                                </pattern>
                            </defs>
                            <rect width="100" height="100" fill="url(#islamicPattern)"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>
                

    <!-- Features Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Why Choose Our Library?</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Discover the comprehensive features that make our Islamic library your trusted source for authentic knowledge.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="card-hover bg-white p-8 rounded-2xl shadow-lg text-center" data-aos="fade-up" data-aos-delay="0">
                    <div class="feature-icon w-16 h-16 mx-auto mb-6 flex items-center justify-center">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Community Support</h3>
                    <p class="text-gray-600 leading-relaxed">Join our community of scholars and students for discussions and support.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Scholars Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Featured Scholars</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Explore the works of renowned Islamic scholars whose contributions continue to enlighten generations.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="scholar-card bg-white rounded-2xl p-8 shadow-lg text-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="w-24 h-24 bg-gradient-to-br from-green-400 to-emerald-600 rounded-full mx-auto mb-6 flex items-center justify-center shadow-xl">
                        <span class="text-3xl font-bold text-white">O</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Sheik Othman Bn Fodio</h3>
                    <p class="text-gray-600 leading-relaxed mb-6">Founder of the Sokoto Caliphate and prolific author of numerous Islamic texts covering theology, jurisprudence, and governance.</p>
                    <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl font-medium transition-colors">
                        View Works
                    </button>
                </div>

                <div class="scholar-card bg-white rounded-2xl p-8 shadow-lg text-center" data-aos="zoom-in" data-aos-delay="200">
                    <div class="w-24 h-24 bg-gradient-to-br from-green-400 to-emerald-600 rounded-full mx-auto mb-6 flex items-center justify-center shadow-xl">
                        <span class="text-3xl font-bold text-white">A</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Sheik Abdullahi Bn Fodio</h3>
                    <p class="text-gray-600 leading-relaxed mb-6">Renowned scholar and brother of Othman Bn Fodio, known for his comprehensive works on Islamic law and spirituality.</p>
                    <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl font-medium transition-colors">
                        View Works
                    </button>
                </div>

                <div class="scholar-card bg-white rounded-2xl p-8 shadow-lg text-center" data-aos="zoom-in" data-aos-delay="300">
                    <div class="w-24 h-24 bg-gradient-to-br from-green-400 to-emerald-600 rounded-full mx-auto mb-6 flex items-center justify-center shadow-xl">
                        <span class="text-3xl font-bold text-white">M</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Sheik Muhammad Bello</h3>
                    <p class="text-gray-600 leading-relaxed mb-6">Son of Othman Bn Fodio and second Sultan of Sokoto, authored many significant works on Islamic administration and scholarship.</p>
                    <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl font-medium transition-colors">
                        View Works
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Books Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Popular Books</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Discover the most downloaded and highly recommended Islamic texts in our collection.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="book-card bg-gradient-to-br from-green-50 to-emerald-50 p-6 shadow-lg" data-aos="flip-left" data-aos-delay="100">
                    <div class="text-center space-y-4">
                        <div class="w-16 h-20 bg-gradient-to-br from-green-600 to-emerald-700 rounded-lg mx-auto shadow-lg flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-800">Ihya ul-Sunna</h3>
                        <p class="text-sm text-gray-600">Sheik Othman Bn Fodio</p>
                        <div class="flex items-center justify-center space-x-2 text-sm text-gray-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            <span>1,234 downloads</span>
                        </div>
                        <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg font-medium transition-colors">
                            Download
                        </button>
                    </div>
                </div>

                <div class="book-card bg-gradient-to-br from-green-50 to-emerald-50 p-6 shadow-lg" data-aos="flip-left" data-aos-delay="200">
                    <div class="text-center space-y-4">
                        <div class="w-16 h-20 bg-gradient-to-br from-green-600 to-emerald-700 rounded-lg mx-auto shadow-lg flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-800">Diya ul-Siyasat</h3>
                        <p class="text-sm text-gray-600">Sheik Muhammad Bello</p>
                        <div class="flex items-center justify-center space-x-2 text-sm text-gray-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            <span>890 downloads</span>
                        </div>
                        <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg font-medium transition-colors">
                            Download
                        </button>
                    </div>
                </div>

                <div class="book-card bg-gradient-to-br from-green-50 to-emerald-50 p-6 shadow-lg" data-aos="flip-left" data-aos-delay="300">
                    <div class="text-center space-y-4">
                        <div class="w-16 h-20 bg-gradient-to-br from-green-600 to-emerald-700 rounded-lg mx-auto shadow-lg flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-800">Diya ul-Hukkam</h3>
                        <p class="text-sm text-gray-600">Sheik Abdullahi Bn Fodio</p>
                        <div class="flex items-center justify-center space-x-2 text-sm text-gray-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            <span>756 downloads</span>
                        </div>
                        <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg font-medium transition-colors">
                            Download
                        </button>
                    </div>
                </div>

                <div class="book-card bg-gradient-to-br from-green-50 to-emerald-50 p-6 shadow-lg" data-aos="flip-left" data-aos-delay="400">
                    <div class="text-center space-y-4">
                        <div class="w-16 h-20 bg-gradient-to-br from-green-600 to-emerald-700 rounded-lg mx-auto shadow-lg flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-800">Nur ul-Albab</h3>
                        <p class="text-sm text-gray-600">Sheik Othman Bn Fodio</p>
                        <div class="flex items-center justify-center space-x-2 text-sm text-gray-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            <span>643 downloads</span>
                        </div>
                        <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg font-medium transition-colors">
                            Download
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-20 hero-gradient">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-white mb-4">Stay Updated</h2>
            <p class="text-xl text-green-100 mb-8 max-w-2xl mx-auto">
                Subscribe to our newsletter to receive updates on new books, scholarly articles, and library events.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                <input type="email" 
                       placeholder="Enter your email" 
                       class="flex-1 px-6 py-4 rounded-xl border-0 focus:outline-none focus:ring-4 focus:ring-green-300 text-gray-800">
                <button class="bg-yellow-500 hover:bg-yellow-400 text-gray-800 px-8 py-4 rounded-xl font-semibold transition-colors whitespace-nowrap">
                    Subscribe
                </button>
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
                        <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-emerald-600 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none">
                                <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
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
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-green-600 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-green-600 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-green-600 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.098.119.112.223.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.012.001z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="font-semibold text-lg mb-4">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('welcome') }}" class="text-gray-400 hover:text-white transition-colors">Home</a></li>
                        <li><a href="{{ route('books') }}" class="text-gray-400 hover:text-white transition-colors">Books</a></li>
                        <li><a href="{{ route('scholars') }}" class="text-gray-400 hover:text-white transition-colors">Scholars</a></li>
                    </ul>
                </div>

                <!-- Categories -->
                <div>
                    <h4 class="font-semibold text-lg mb-4">Categories</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Quran & Tafsir</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Hadith</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Fiqh</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Islamic History</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Theology</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="font-semibold text-lg mb-4">Contact</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>Sokoto, Nigeria</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span>info@yahaybawa.org</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
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
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"/>
        </svg>
    </button>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 50,
        });

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

        // Search functionality
        const searchToggle = document.getElementById('searchToggle');
        const searchOverlay = document.getElementById('searchOverlay');
        const searchClose = document.getElementById('searchClose');
        const searchInput = document.getElementById('searchInput');
        const searchSubmit = document.getElementById('searchSubmit');

        searchToggle.addEventListener('click', function() {
            searchOverlay.classList.add('active');
            setTimeout(() => searchInput.focus(), 100);
        });

        searchClose.addEventListener('click', function() {
            searchOverlay.classList.remove('active');
        });

        searchOverlay.addEventListener('click', function(e) {
            if (e.target === searchOverlay) {
                searchOverlay.classList.remove('active');
            }
        });

        searchSubmit.addEventListener('click', function() {
            const query = searchInput.value.trim();
            if (query) {
                console.log('Searching for:', query);
                searchOverlay.classList.remove('active');
                // Here you would implement actual search functionality
            }
        });

        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchSubmit.click();
            }
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
            
            // Update navbar appearance
            if (winScroll > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
            
            // Show/hide back to top button
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

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Close mobile menu when clicking on links
        document.querySelectorAll('#mobileMenu a').forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.remove('active');
                menuIcon.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
            });
        });

        // Newsletter subscription
        const newsletterForm = document.querySelector('section input[type="email"]');
        const subscribeBtn = document.querySelector('section button');

        if (subscribeBtn) {
            subscribeBtn.addEventListener('click', function() {
                const email = newsletterForm.value.trim();
                if (email && email.includes('@')) {
                    alert('Thank you for subscribing!');
                    newsletterForm.value = '';
                } else {
                    alert('Please enter a valid email address.');
                }
            });
        }

        // Escape key functionality
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                if (searchOverlay.classList.contains('active')) {
                    searchOverlay.classList.remove('active');
                }
                if (mobileMenu.classList.contains('active')) {
                    mobileMenu.classList.remove('active');
                    menuIcon.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
                }
            }
        });

        // Add loading animation to buttons
        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('click', function() {
                if (!this.classList.contains('loading')) {
                    const originalText = this.textContent;
                    this.classList.add('loading');
                    this.style.position = 'relative';
                    this.style.color = 'transparent';
                    
                    // Create spinner
                    const spinner = document.createElement('div');
                    spinner.className = 'absolute inset-0 flex items-center justify-center';
                    spinner.innerHTML = '<div class="w-5 h-5 border-2 border-white border-t-transparent rounded-full animate-spin"></div>';
                    this.appendChild(spinner);
                    
                    // Remove loading state after delay
                    setTimeout(() => {
                        this.classList.remove('loading');
                        this.style.color = '';
                        this.textContent = originalText;
                        if (spinner.parentNode) {
                            spinner.remove();
                        }
                    }, 1000);
                }
            });
        });

        // Add intersection observer for scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in-up');
                }
            });
        }, observerOptions);

        // Observe all sections
        document.querySelectorAll('section').forEach(section => {
            observer.observe(section);
        });

        // Add pulse animation to important elements
        document.querySelectorAll('.stats-counter').forEach(counter => {
            counter.classList.add('pulse-animation');
        });

        // Initialize all functionality when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            updateScrollProgress();
            
            // Add hover effects to cards
            document.querySelectorAll('.card-hover, .scholar-card, .book-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-8px) scale(1.02)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = '';
                });
            });
        });
    </script>
</body>

</html>