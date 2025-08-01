@extends('layouts.frontend')

@section('content')
    <!-- Page Header -->
    <section class="hero-gradient pt-24 pb-20 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="floating-element absolute top-20 left-10 w-16 h-16 bg-white rounded-full"></div>
            <div class="floating-element absolute top-40 right-20 w-12 h-12 bg-yellow-300 rounded-full"
                style="animation-delay: -2s;"></div>
            <div class="floating-element absolute bottom-32 left-20 w-8 h-8 bg-green-300 rounded-full"
                style="animation-delay: -4s;"></div>
            <div class="floating-element absolute bottom-20 right-32 w-20 h-20 bg-emerald-300 rounded-full"
                style="animation-delay: -1s;"></div>
        </div>

        <div class="max-w-7xl mx-auto text-center relative z-10">
            <div class="space-y-8" data-aos="fade-up">
                <div
                    class="inline-flex items-center px-6 py-3 bg-white bg-opacity-20 rounded-full text-sm font-medium backdrop-blur-sm border border-white border-opacity-30 mb-6">
                    <svg class="w-5 h-5 mr-3 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2L3 7v11a1 1 0 001 1h3v-8h6v8h3a1 1 0 001-1V7l-7-5z" />
                    </svg>
                    Preserving Islamic Scholarship Through the Ages
                </div>

                <h1 class="text-5xl lg:text-7xl font-bold text-white leading-tight">
                    Islamic
                    <span class="block text-yellow-300">Scholars</span>
                </h1>
                <p class="text-xl lg:text-2xl text-green-100 max-w-4xl mx-auto leading-relaxed font-light">
                    Explore the lives, works, and lasting contributions of <span
                        class="font-semibold text-yellow-300">renowned Islamic scholars</span> who shaped Islamic
                    thought and jurisprudence across centuries
                </p>

                <!-- Search Bar -->
                <div class="max-w-2xl mx-auto mt-10">
                    <div class="search-container">
                        <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-6 h-6 text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <input id="mainSearchInput" type="text"
                            class="search-bar w-full pl-14 pr-6 py-5 bg-white rounded-2xl border-0 focus:outline-none text-lg shadow-2xl"
                            placeholder="Search scholars by name, era, or specialization...">
                        <button id="mainSearchBtn"
                            class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl font-medium transition-colors">
                            Search
                        </button>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 max-w-4xl mx-auto mt-12">
                    <div class="text-center">
                        <div class="text-3xl lg:text-4xl font-bold text-yellow-300">50+</div>
                        <div class="text-green-200 font-medium">Scholars</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl lg:text-4xl font-bold text-yellow-300">15</div>
                        <div class="text-green-200 font-medium">Centuries</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl lg:text-4xl font-bold text-yellow-300">500+</div>
                        <div class="text-green-200 font-medium">Works</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl lg:text-4xl font-bold text-yellow-300">20</div>
                        <div class="text-green-200 font-medium">Regions</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Filters and Controls -->
    <section class="bg-white shadow-sm sticky top-16 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">

                <!-- Sort and View Controls -->
                <div class="flex items-center gap-4">
                    <div class="flex items-center space-x-2">
                        <label class="text-sm font-medium text-gray-700">Sort by:</label>
                        <select id="sortSelect"
                            class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500">
                            <option value="name">Name A-Z</option>
                            <option value="era">Era</option>
                            <option value="influence">Influence</option>
                            <option value="works">Most Works</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scholars Grid -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div id="scholarsGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Scholar cards will be generated by JavaScript -->
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-16">
                <button id="loadMoreBtn"
                    class="bg-green-600 hover:bg-green-700 text-white px-10 py-4 rounded-xl font-semibold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                    Discover More Scholars
                </button>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold mb-2"> scholar.name </h3>
                <p class="text-sm text-gray-600 mb-2"> scholar.era </p>
                <p class="text-gray-700 mb-4"> scholar.description </p>
                <div class="flex flex-wrap gap-2 mb-4">
                    <span v-for="specialty in scholar.specialties" :key="specialty"
                        class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                        specialty
                    </span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-500"> scholar.works works</span>
                    <a href="{{ route('scholars') }}" class="inline-flex items-center text-green-600 hover:text-green-800">
                        View Profile
                        <svg class="w-4 h-4 ml-1" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
