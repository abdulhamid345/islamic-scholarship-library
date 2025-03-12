<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6 fade-in">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center mb-4">
                        <svg class="w-8 h-8 text-green-600 dark:text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                        <h3 class="text-2xl font-bold">Welcome to Yahaya Bawa Islamic Library</h3>
                    </div>
                    <p class="text-lg">You're logged in successfully. Manage books, scholars, and categories from your dashboard.</p>
                </div>
            </div>

            <!-- Statistics Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-6">
                <!-- Books Stats -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg book-card">
                    <div class="p-4 sm:p-6">
                        <div class="flex justify-between items-center">
                            <h3 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-gray-100">Total Books</h3>
                            <svg class="w-8 h-8 sm:w-10 sm:h-10 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <p class="mt-4 text-2xl sm:text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $bookCount ?? 27 }}</p>
                        <p class="mt-2 text-xs sm:text-sm text-gray-600 dark:text-gray-400">
                            <span class="text-green-600 dark:text-green-400">↗ 3 new</span> books added this month
                        </p>
                    </div>
                </div>

                <!-- Scholars Stats -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg scholar-card">
                    <div class="p-4 sm:p-6">
                        <div class="flex justify-between items-center">
                            <h3 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-gray-100">Scholars</h3>
                            <svg class="w-8 h-8 sm:w-10 sm:h-10 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <p class="mt-4 text-2xl sm:text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $scholarCount ?? 8 }}</p>
                        <p class="mt-2 text-xs sm:text-sm text-gray-600 dark:text-gray-400">From classical and contemporary traditions</p>
                    </div>
                </div>

                <!-- Categories Stats -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg book-card">
                    <div class="p-4 sm:p-6">
                        <div class="flex justify-between items-center">
                            <h3 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-gray-100">Categories</h3>
                            <svg class="w-8 h-8 sm:w-10 sm:h-10 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                        </div>
                        <p class="mt-4 text-2xl sm:text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $categoryCount ?? 9 }}</p>
                        <p class="mt-2 text-xs sm:text-sm text-gray-600 dark:text-gray-400">Fiqh, Aqeedah, Tafsir, and more</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>