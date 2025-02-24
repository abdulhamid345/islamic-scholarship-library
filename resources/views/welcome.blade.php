@extends('layouts.frontend')

@section('content')
    <div class="bg-green-700 text-white py-12 sm:py-20 hero-pattern relative">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center" data-aos="fade-up">
                <h1 class="text-3xl sm:text-5xl font-bold mb-6 fade-in">
                    Discover the Rich Islamic Heritage
                </h1>
                <p class="text-lg sm:text-xl mb-8">
                    Access the timeless works of great scholars from the Sokoto
                    Caliphate
                </p>
                <div class="max-w-xl mx-auto px-4">
                    <input type="text" v-model="searchQuery" @input="handleSearch"
                        placeholder="Search for books, scholars, or topics..."
                        class="search-bar w-full px-4 sm:px-6 py-2 sm:py-3 rounded-lg text-gray-800 bg-white/90 backdrop-blur-sm" />
                </div>
            </div>
        </div>
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
            </svg>
        </div>
    </div>

    <!-- Scholars Section -->
    <div id="app" class="max-w-7xl mx-auto px-4 py-12 sm:py-16">
        <h2 class="text-2xl sm:text-3xl font-bold mb-8 text-center" data-aos="fade-up">
            Renowned Scholars
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            <div v-for="(scholar, index) in scholars" :key="scholar.id"
                class="scholar-card bg-white rounded-lg shadow-md p-4 sm:p-6 text-center"
                :data-aos="index % 2 === 0 ? 'fade-right' : 'fade-left'" :data-aos-delay="index * 100">
                <div class="h-24 w-24 sm:h-32 sm:w-32 mx-auto mb-4 rounded-full bg-green-100 flex items-center justify-center">
                    <span class="text-3xl sm:text-4xl text-green-800 arabic-calligraphy" v-text="scholar.initial"></span>
                </div>
                <h3 class="text-lg sm:text-xl font-bold mb-2" v-text="scholar.name"></h3>
                <p class="text-sm sm:text-base text-gray-600 mb-4" v-text="scholar.description"></p>
                <a :href="'/scholar/' + scholar.id"
                    class="inline-block bg-green-600 text-white px-4 sm:px-6 py-2 rounded-lg hover:bg-green-700 transition-colors">
                    View Works
                </a>
            </div>
        </div>
    </div>

    <!-- Featured Books Section -->
    <div class="bg-gray-100 py-12 sm:py-16">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-2xl sm:text-3xl font-bold mb-8 text-center" data-aos="fade-up">
                Featured Books
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div v-for="(book, index) in featuredBooks" :key="book.id"
                    class="book-card bg-white rounded-lg shadow-md p-4" :data-aos="'fade-up'"
                    :data-aos-delay="index * 100">
                    <div class="aspect-w-3 aspect-h-4 mb-4">
                        <div class="bg-green-50 h-36 sm:h-48 rounded-lg flex items-center justify-center">
                            <svg class="w-12 h-12 sm:w-16 sm:h-16 text-green-800" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4 19.5C4 18.837 4.26339 18.2011 4.73223 17.7322C5.20107 17.2634 5.83696 17 6.5 17H20"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M6.5 2H20V22H6.5C5.83696 22 5.20107 21.7366 4.73223 21.2678C4.26339 20.7989 4 20.163 4 19.5V4.5C4 3.83696 4.26339 3.20107 4.73223 2.73223C5.20107 2.26339 5.83696 2 6.5 2Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="font-bold mb-2" v:text="book.title"></h3>
                    <p class="text-sm text-gray-600 mb-2" v:text="book.author"></p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500" v:text="book.downloads">Downloads: </span>
                        <a :href="'/books/' + book.id"
                            class="text-green-600 hover:text-green-800 transition-colors flex items-center">
                            View Details
                            <svg class="w-4 h-4 ml-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
