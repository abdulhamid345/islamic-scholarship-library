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

            <!-- Recent Activities -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg sm:text-xl font-bold mb-4">Recent Activities</h3>
                    <div class="space-y-3 sm:space-y-4">
                        @if(isset($recentActivities))
                            @foreach($recentActivities as $activity)
                                <div class="flex items-start p-3 border-b border-gray-200 dark:border-gray-700">
                                    <div class="bg-green-100 dark:bg-green-800 p-2 rounded-full mr-3">
                                        <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-medium">{{ $activity->description }}</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $activity->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <!-- Sample Activities -->
 stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium">New book "Ihya ul-Sunnah" added</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">2 hours ago</p>
                                </div>
                            </div>
                            <div class="flex items-start p-3 border-b border-gray-200 dark:border-gray-700">
                                <div class="bg-green-100 dark:bg-green-800 p-2 rounded-full mr-3">
                                    <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium">Scholar information updated for "Sheik Othman Bn Fodio"</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">1 day ago</p>
                                </div>
                            </div>
                            <div class="flex items-start p-3">
                                <div class="bg-green-100 dark:bg-green-800 p-2 rounded-full mr-3">
                                    <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium">New category "Philosophy" added</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">3 days ago</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <!-- Add New Book -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg book-card">
                    <div class="p-4 sm:p-6">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Quick Actions</h3>
                        <div class="grid grid-cols-1 xs:grid-cols-2 gap-3 sm:gap-4">
                            <a href="{{ route('dashboard.books.create') }}" class="flex items-center justify-center p-2 sm:p-3 bg-green-50 dark:bg-green-900 rounded-lg hover:bg-green-100 dark:hover:bg-green-800 transition-colors">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-green-600 dark:text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span class="text-sm sm:text-base">Add Book</span>
                            </a>
                            <a href="{{ route('dashboard.scholars.create') }}" class="flex items-center justify-center p-2 sm:p-3 bg-green-50 dark:bg-green-900 rounded-lg hover:bg-green-100 dark:hover:bg-green-800 transition-colors">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-green-600 dark:text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                </svg>
                                <span class="text-sm sm:text-base">Add Scholar</span>
                            </a>
                            <a href="{{ route('dashboard.category.create') }}" class="flex items-center justify-center p-2 sm:p-3 bg-green-50 dark:bg-green-900 rounded-lg hover:bg-green-100 dark:hover:bg-green-800 transition-colors">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-green-600 dark:text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                <span class="text-sm sm:text-base">Add Category</span>
                            </a>
                            <a href="{{ route('profile.edit') }}" class="flex items-center justify-center p-2 sm:p-3 bg-green-50 dark:bg-green-900 rounded-lg hover:bg-green-100 dark:hover:bg-green-800 transition-colors">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-green-600 dark:text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span class="text-sm sm:text-base">Edit Profile</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Islamic Quote of the Day -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 sm:p-6">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Islamic Quote of the Day</h3>
                        <div class="bg-green-50 dark:bg-green-900 p-3 sm:p-4 rounded-lg">
                            <blockquote class="italic text-sm sm:text-base text-gray-700 dark:text-gray-300 mb-2">
                                "The seeking of knowledge is obligatory for every Muslim."
                            </blockquote>
                            <p class="text-right text-xs sm:text-sm text-gray-600 dark:text-gray-400">- Prophet Muhammad (ﷺ)</p>
                        </div>
                        <div class="mt-4">
                            <h4 class="text-sm sm:text-base font-medium text-gray-900 dark:text-gray-100 mb-2">Did you know?</h4>
                            <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400">
                                The Sokoto Caliphate, founded by Sheik Othman Bn Fodio, was a major center of Islamic scholarship in West Africa during the 19th century, producing thousands of manuscripts on various subjects.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>