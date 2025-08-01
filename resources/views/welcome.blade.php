@extends('layouts.frontend')

@section('content')
    <!-- Hero Section -->
    <section
        class="hero-gradient hero-pattern pt-20 pb-20 px-4 sm:px-6 lg:px-8 min-h-screen flex items-center relative overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="floating-element absolute top-20 left-10 w-20 h-20 bg-white rounded-full"></div>
            <div class="floating-element absolute top-40 right-20 w-16 h-16 bg-yellow-300 rounded-full"
                style="animation-delay: -2s;"></div>
            <div class="floating-element absolute bottom-32 left-20 w-12 h-12 bg-green-300 rounded-full"
                style="animation-delay: -4s;"></div>
            <div class="floating-element absolute bottom-20 right-32 w-24 h-24 bg-emerald-300 rounded-full"
                style="animation-delay: -1s;"></div>

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
                        <div
                            class="inline-flex items-center px-4 py-2 bg-white bg-opacity-20 rounded-full text-sm font-medium backdrop-blur-sm border border-white border-opacity-30 mb-4 text-black">
                            <svg class="w-4 h-4 mr-2 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            Trusted by 100,000+ Islamic scholars and students
                        </div>

                        <h1
                            class="hero-title text-6xl lg:text-7xl xl:text-8xl font-bold leading-none tracking-tight text-black">
                            <span class="block">Discover</span>
                            <span
                                class="block text-gradient bg-gradient-to-r from-yellow-300 via-green-300 to-emerald-300 bg-clip-text text-transparent">Islamic</span>
                            <span class="block">Knowledge</span>
                        </h1>

                        <p class="text-xl lg:text-2xl leading-relaxed max-w-2xl font-light text-black">
                            Access <span class="font-semibold text-yellow-300">thousands</span> of authentic Islamic texts,
                            scholarly works, and educational resources from renowned scholars spanning centuries of Islamic
                            tradition.
                        </p>
                    </div>

                    <!-- Enhanced Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-6">
                        <button
                            class="group bg-white text-green-800 px-10 py-5 rounded-2xl font-bold text-lg hover:bg-green-50 transition-all duration-500 transform hover:scale-105 hover:-translate-y-1 shadow-2xl relative overflow-hidden">
                            <span class="relative z-10 flex items-center justify-center">
                                <svg class="w-6 h-6 mr-3 group-hover:rotate-12 transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                                Explore Library
                            </span>
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-green-400 to-emerald-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left">
                            </div>
                        </button>

                        <button
                            class="group border-3 border-white text-black px-10 py-5 rounded-2xl font-bold text-lg hover:bg-white hover:text-green-800 transition-all duration-500 backdrop-blur-sm bg-white bg-opacity-10 relative overflow-hidden">
                            <span class="relative z-10 flex items-center justify-center">
                                <svg class="w-6 h-6 mr-3 group-hover:scale-110 transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h8M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Learn More
                            </span>
                        </button>
                    </div>

                    <!-- Enhanced Stats -->
                    <div class="grid grid-cols-3 gap-8 pt-10">
                        <div class="text-center group cursor-pointer">
                            <div
                                class="stats-counter text-4xl lg:text-5xl font-black bg-gradient-to-r from-yellow-300 to-yellow-500 bg-clip-text text-transparent group-hover:scale-110 transition-transform duration-300">
                                5K+</div>
                            <div class="font-semibold text-lg text-black">Books</div>
                            <div class="text-green-700 text-sm opacity-80">Verified Texts</div>
                        </div>
                        <div class="text-center group cursor-pointer">
                            <div
                                class="stats-counter text-4xl lg:text-5xl font-black bg-gradient-to-r from-yellow-300 to-yellow-500 bg-clip-text text-transparent group-hover:scale-110 transition-transform duration-300">
                                50+</div>
                            <div class="font-semibold text-lg text-black">Scholars</div>
                            <div class="text-green-700 text-sm opacity-80">Classical & Modern</div>
                        </div>
                        <div class="text-center group cursor-pointer">
                            <div
                                class="stats-counter text-4xl lg:text-5xl font-black bg-gradient-to-r from-yellow-300 to-yellow-500 bg-clip-text text-transparent group-hover:scale-110 transition-transform duration-300">
                                100K+</div>
                            <div class="font-semibold text-lg text-black">Students</div>
                            <div class="text-green-700 text-sm opacity-80">Worldwide</div>
                        </div>
                    </div>

                    <!-- Trust Indicators -->
                    <div class="flex flex-wrap items-center gap-6 pt-6 opacity-80">
                        <div class="flex items-center text-green-700">
                            <svg class="w-5 h-5 mr-2 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm font-medium text-black">Authenticated Sources</span>
                        </div>
                        <div class="flex items-center text-green-700">
                            <svg class="w-5 h-5 mr-2 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm font-medium text-black">Free Access</span>
                        </div>
                        <div class="flex items-center text-green-700">
                            <svg class="w-5 h-5 mr-2 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm font-medium text-black">Instant Downloads</span>
                        </div>
                    </div>
                </div>

                <!-- Right Content - Enhanced Visual -->
                <div class="relative" data-aos="fade-left" data-aos-delay="200">
                    <!-- Main Featured Book Card -->
                    <div class="relative z-20">
                        <div class="bg-white rounded-3xl p-10 shadow-2xl transform hover:rotate-0 transition-all duration-700 hover:scale-105 group"
                            style="transform: rotate(2deg);">
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
                                    <div
                                        class="w-24 h-24 bg-gradient-to-br from-green-400 via-emerald-500 to-teal-600 rounded-2xl mx-auto flex items-center justify-center shadow-2xl group-hover:shadow-3xl transition-all duration-500 group-hover:scale-110">
                                        <svg class="w-12 h-12 text-white group-hover:rotate-12 transition-transform duration-500"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                    </div>
                                    <!-- Floating Badge -->
                                    <div
                                        class="absolute -top-2 -right-2 bg-yellow-400 text-yellow-900 text-xs font-bold px-2 py-1 rounded-full animate-bounce">
                                        NEW
                                    </div>
                                </div>

                                <!-- Book Details -->
                                <div class="space-y-4">
                                    <div class="space-y-2">
                                        <h3
                                            class="text-3xl font-bold text-green-700 group-hover:text-green-700 transition-colors duration-300">
                                            Featured Today</h3>
                                        <div
                                            class="w-16 h-1 bg-gradient-to-r from-green-400 to-emerald-500 mx-auto rounded-full">
                                        </div>
                                    </div>

                                    <div class="space-y-4">
                                        <h4 class="text-2xl font-bold text-green-600 font-arabic">Ihya ul-Sunna</h4>
                                        <p class="font-semibold text-black">By Sheik Othman Bn Fodio</p>

                                        <!-- Rating Stars -->
                                        <div class="flex items-center justify-center space-x-1">
                                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <span class="text-sm text-gray-500 ml-2">(4.9)</span>
                                        </div>

                                        <!-- Download Stats -->
                                        <div class="flex items-center justify-center space-x-6 text-sm">
                                            <div class="flex items-center text-gray-500">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                </svg>
                                                <span class="font-semibold">1,234</span>
                                            </div>
                                            <div class="flex items-center text-gray-500">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                <span class="font-semibold">2,456</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Action Button -->
                                    <button
                                        class="w-full bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white py-4 px-6 rounded-xl font-bold text-lg transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                                        Read Now
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Background Elements -->
                    <div
                        class="absolute -top-8 -right-8 w-40 h-40 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full opacity-20 blur-xl">
                    </div>
                    <div
                        class="absolute -bottom-8 -left-8 w-32 h-32 bg-gradient-to-br from-green-400 to-teal-500 rounded-full opacity-20 blur-xl">
                    </div>
                    <div class="absolute top-1/2 -right-4 w-6 h-6 bg-white rounded-full opacity-60 animate-pulse"></div>
                    <div class="absolute bottom-1/4 -left-6 w-4 h-4 bg-yellow-300 rounded-full opacity-80 animate-bounce"
                        style="animation-delay: -1s;"></div>

                    <!-- Islamic Geometric Pattern -->
                    <div class="absolute inset-0 opacity-5">
                        <svg class="w-full h-full" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <pattern id="islamicPattern" x="0" y="0" width="20" height="20"
                                    patternUnits="userSpaceOnUse">
                                    <path d="M10,0 L20,10 L10,20 L0,10 Z" fill="currentColor" opacity="0.3" />
                                </pattern>
                            </defs>
                            <rect width="100" height="100" fill="url(#islamicPattern)" />
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
                    Discover the comprehensive features that make our Islamic library your trusted source for authentic
                    knowledge.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="card-hover bg-white p-8 rounded-2xl shadow-lg text-center" data-aos="fade-up"
                    data-aos-delay="0">
                    <div class="feature-icon w-16 h-16 mx-auto mb-6 flex items-center justify-center">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Community Support</h3>
                    <p class="text-gray-600 leading-relaxed">Join our community of scholars and students for discussions
                        and support.</p>
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
                <div class="scholar-card bg-white rounded-2xl p-8 shadow-lg text-center" data-aos="zoom-in"
                    data-aos-delay="100">
                    <div
                        class="w-24 h-24 bg-gradient-to-br from-green-400 to-emerald-600 rounded-full mx-auto mb-6 flex items-center justify-center shadow-xl">
                        <span class="text-3xl font-bold text-white">O</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Sheik Othman Bn Fodio</h3>
                    <p class="text-gray-600 leading-relaxed mb-6">Founder of the Sokoto Caliphate and prolific author of
                        numerous Islamic texts covering theology, jurisprudence, and governance.</p>
                    <button
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl font-medium transition-colors">
                        View Works
                    </button>
                </div>

                <div class="scholar-card bg-white rounded-2xl p-8 shadow-lg text-center" data-aos="zoom-in"
                    data-aos-delay="200">
                    <div
                        class="w-24 h-24 bg-gradient-to-br from-green-400 to-emerald-600 rounded-full mx-auto mb-6 flex items-center justify-center shadow-xl">
                        <span class="text-3xl font-bold text-white">A</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Sheik Abdullahi Bn Fodio</h3>
                    <p class="text-gray-600 leading-relaxed mb-6">Renowned scholar and brother of Othman Bn Fodio, known
                        for his comprehensive works on Islamic law and spirituality.</p>
                    <button
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl font-medium transition-colors">
                        View Works
                    </button>
                </div>

                <div class="scholar-card bg-white rounded-2xl p-8 shadow-lg text-center" data-aos="zoom-in"
                    data-aos-delay="300">
                    <div
                        class="w-24 h-24 bg-gradient-to-br from-green-400 to-emerald-600 rounded-full mx-auto mb-6 flex items-center justify-center shadow-xl">
                        <span class="text-3xl font-bold text-white">M</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Sheik Muhammad Bello</h3>
                    <p class="text-gray-600 leading-relaxed mb-6">Son of Othman Bn Fodio and second Sultan of Sokoto,
                        authored many significant works on Islamic administration and scholarship.</p>
                    <button
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl font-medium transition-colors">
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
                <div class="book-card bg-gradient-to-br from-green-50 to-emerald-50 p-6 shadow-lg" data-aos="flip-left"
                    data-aos-delay="100">
                    <div class="text-center space-y-4">
                        <div
                            class="w-16 h-20 bg-gradient-to-br from-green-600 to-emerald-700 rounded-lg mx-auto shadow-lg flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-800">Ihya ul-Sunna</h3>
                        <p class="text-sm text-gray-600">Sheik Othman Bn Fodio</p>
                        <div class="flex items-center justify-center space-x-2 text-sm text-gray-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            <span>1,234 downloads</span>
                        </div>
                        <button
                            class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg font-medium transition-colors">
                            Download
                        </button>
                    </div>
                </div>

                <div class="book-card bg-gradient-to-br from-green-50 to-emerald-50 p-6 shadow-lg" data-aos="flip-left"
                    data-aos-delay="200">
                    <div class="text-center space-y-4">
                        <div
                            class="w-16 h-20 bg-gradient-to-br from-green-600 to-emerald-700 rounded-lg mx-auto shadow-lg flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-800">Diya ul-Siyasat</h3>
                        <p class="text-sm text-gray-600">Sheik Muhammad Bello</p>
                        <div class="flex items-center justify-center space-x-2 text-sm text-gray-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            <span>890 downloads</span>
                        </div>
                        <button
                            class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg font-medium transition-colors">
                            Download
                        </button>
                    </div>
                </div>

                <div class="book-card bg-gradient-to-br from-green-50 to-emerald-50 p-6 shadow-lg" data-aos="flip-left"
                    data-aos-delay="300">
                    <div class="text-center space-y-4">
                        <div
                            class="w-16 h-20 bg-gradient-to-br from-green-600 to-emerald-700 rounded-lg mx-auto shadow-lg flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-800">Diya ul-Hukkam</h3>
                        <p class="text-sm text-gray-600">Sheik Abdullahi Bn Fodio</p>
                        <div class="flex items-center justify-center space-x-2 text-sm text-gray-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            <span>756 downloads</span>
                        </div>
                        <button
                            class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg font-medium transition-colors">
                            Download
                        </button>
                    </div>
                </div>

                <div class="book-card bg-gradient-to-br from-green-50 to-emerald-50 p-6 shadow-lg" data-aos="flip-left"
                    data-aos-delay="400">
                    <div class="text-center space-y-4">
                        <div
                            class="w-16 h-20 bg-gradient-to-br from-green-600 to-emerald-700 rounded-lg mx-auto shadow-lg flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-800">Nur ul-Albab</h3>
                        <p class="text-sm text-gray-600">Sheik Othman Bn Fodio</p>
                        <div class="flex items-center justify-center space-x-2 text-sm text-gray-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            <span>643 downloads</span>
                        </div>
                        <button
                            class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg font-medium transition-colors">
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
                <input type="email" placeholder="Enter your email"
                    class="flex-1 px-6 py-4 rounded-xl border-0 focus:outline-none focus:ring-4 focus:ring-green-300 text-gray-800">
                <button
                    class="bg-yellow-500 hover:bg-yellow-400 text-gray-800 px-8 py-4 rounded-xl font-semibold transition-colors whitespace-nowrap">
                    Subscribe
                </button>
            </div>
        </div>
    </section>
@endsection
