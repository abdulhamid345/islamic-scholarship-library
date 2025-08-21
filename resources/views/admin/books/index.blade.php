{{-- resources/views/dashboard/books/index.blade.php --}}
@extends('layouts.dashboard')

@section('title', 'Books Management')

@section('content')
<div class="p-6 space-y-6">
    <!-- Page Header -->
    <div class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Books Management</h1>
                <p class="text-gray-600">Manage Islamic books and digital publications</p>
                <div class="flex items-center space-x-4 mt-3">
                    <div class="flex items-center space-x-2 text-sm">
                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                        <span class="text-gray-600">{{ $totalBooks ?? '2,847' }} Total Books</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm">
                        <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                        <span class="text-gray-600">{{ $publishedBooks ?? '2,654' }} Published</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm">
                        <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                        <span class="text-gray-600">{{ $draftBooks ?? '193' }} Drafts</span>
                    </div>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <button onclick="exportBooks()" 
                    class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-xl text-gray-700 bg-white hover:bg-gray-50 transition-all duration-200">
                    <i class="fas fa-download mr-2 text-gray-500"></i>
                    Export
                </button>
                <button onclick="bulkActions()" 
                    class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-xl text-gray-700 bg-white hover:bg-gray-50 transition-all duration-200">
                    <i class="fas fa-tasks mr-2 text-gray-500"></i>
                    Bulk Actions
                </button>
                <a href="{{ route('dashboard.books.create') }}" 
                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white text-sm font-semibold rounded-xl shadow-lg hover:from-green-700 hover:to-emerald-700 transform hover:scale-105 transition-all duration-200">
                    <i class="fas fa-plus mr-2"></i>
                    Add New Book
                </a>
            </div>
        </div>
    </div>

    <!-- Filters and Search -->
    <div class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-4">
            <!-- Search -->
            <div class="lg:col-span-2">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text" id="searchInput" 
                        class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200" 
                        placeholder="Search books by title, author, ISBN...">
                </div>
            </div>
            
            <!-- Category Filter -->
            <div>
                <select id="categoryFilter" 
                    class="block w-full py-3 px-3 border border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200">
                    <option value="">All Categories</option>
                    <option value="quran">Quran & Tafsir</option>
                    <option value="hadith">Hadith Sciences</option>
                    <option value="fiqh">Islamic Jurisprudence</option>
                    <option value="aqeedah">Islamic Creed</option>
                    <option value="history">Islamic History</option>
                    <option value="ethics">Islamic Ethics</option>
                </select>
            </div>
            
            <!-- Author Filter -->
            <div>
                <select id="authorFilter" 
                    class="block w-full py-3 px-3 border border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200">
                    <option value="">All Authors</option>
                    <option value="1">Dr. Ahmad Al-Rashid</option>
                    <option value="2">Sheikh Abdullah</option>
                    <option value="3">Prof. Mohammad Ali</option>
                </select>
            </div>
            
            <!-- Status Filter -->
            <div>
                <select id="statusFilter" 
                    class="block w-full py-3 px-3 border border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200">
                    <option value="">All Status</option>
                    <option value="published">Published</option>
                    <option value="draft">Draft</option>
                    <option value="archived">Archived</option>
                </select>
            </div>
        </div>
        
        <!-- View Toggle and Results Info -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-6 pt-6 border-t border-gray-200">
            <div class="flex items-center space-x-3 mb-4 sm:mb-0">
                <span class="text-sm text-gray-600">View:</span>
                <div class="flex rounded-xl border border-gray-300 p-1 bg-gray-50">
                    <button id="tableViewBtn" 
                        class="px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200 bg-white text-gray-900 shadow-sm">
                        <i class="fas fa-table mr-1"></i>
                        Table
                    </button>
                    <button id="cardViewBtn" 
                        class="px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200 text-gray-600 hover:text-gray-900">
                        <i class="fas fa-th-large mr-1"></i>
                        Cards
                    </button>
                </div>
            </div>
            <div class="text-sm text-gray-600">
                Showing <span id="resultsStart">1</span>-<span id="resultsEnd">10</span> of <span id="resultsTotal">{{ $totalBooks ?? '2,847' }}</span> books
            </div>
        </div>
    </div>

    <!-- Table View -->
    <div id="tableView" class="glass-effect rounded-2xl border border-white border-opacity-20 backdrop-blur-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center space-x-1">
                                <span>Book</span>
                                <i class="fas fa-sort text-gray-400 cursor-pointer hover:text-gray-600"></i>
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center space-x-1">
                                <span>Author</span>
                                <i class="fas fa-sort text-gray-400 cursor-pointer hover:text-gray-600"></i>
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center space-x-1">
                                <span>Category</span>
                                <i class="fas fa-sort text-gray-400 cursor-pointer hover:text-gray-600"></i>
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center space-x-1">
                                <span>Stats</span>
                                <i class="fas fa-sort text-gray-400 cursor-pointer hover:text-gray-600"></i>
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($books ?? [] as $book)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-16 w-12">
                                    <img class="h-16 w-12 rounded-lg object-cover ring-2 ring-green-500 ring-opacity-30" 
                                         src="{{ $book->cover_image ?? '/images/default-book-cover.jpg' }}" 
                                         alt="{{ $book->title }}">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $book->title }}</div>
                                    <div class="text-sm text-gray-500 arabic-text">{{ $book->title_arabic }}</div>
                                    <div class="text-xs text-gray-400">ISBN: {{ $book->isbn }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $book->author->name }}</div>
                            <div class="text-xs text-gray-500">{{ $book->published_year }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                {{ $book->category->name }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm">
                                <div class="flex items-center mb-1">
                                    <i class="fas fa-star text-yellow-400 mr-1"></i>
                                    <span class="text-gray-900">{{ $book->rating }}/5</span>
                                    <span class="text-gray-500 ml-1">({{ $book->reviews_count }})</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-download text-blue-500 mr-1"></i>
                                    <span class="text-gray-900">{{ number_format($book->downloads_count) }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                {{ $book->status === 'published' ? 'bg-green-100 text-green-800' : 
                                   ($book->status === 'draft' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                                <div class="w-1.5 h-1.5 rounded-full mr-1 
                                    {{ $book->status === 'published' ? 'bg-green-400' : 
                                       ($book->status === 'draft' ? 'bg-yellow-400' : 'bg-gray-400') }}"></div>
                                {{ ucfirst($book->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('dashboard.books.show', $book->id) }}" 
                                   class="text-green-600 hover:text-green-900 p-2 rounded-lg hover:bg-green-50 transition-all duration-200" 
                                   title="View Book">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('dashboard.books.edit', $book->id) }}" 
                                   class="text-blue-600 hover:text-blue-900 p-2 rounded-lg hover:bg-blue-50 transition-all duration-200" 
                                   title="Edit Book">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ $book->download_url }}" target="_blank"
                                   class="text-purple-600 hover:text-purple-900 p-2 rounded-lg hover:bg-purple-50 transition-all duration-200" 
                                   title="Download Book">
                                    <i class="fas fa-download"></i>
                                </a>
                                <button onclick="toggleBookStatus({{ $book->id }})" 
                                        class="text-yellow-600 hover:text-yellow-900 p-2 rounded-lg hover:bg-yellow-50 transition-all duration-200" 
                                        title="Toggle Status">
                                    <i class="fas fa-power-off"></i>
                                </button>
                                <button onclick="deleteBook({{ $book->id }})" 
                                        class="text-red-600 hover:text-red-900 p-2 rounded-lg hover:bg-red-50 transition-all duration-200" 
                                        title="Delete Book">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    {{-- Default data for demonstration --}}
                    @for($i = 1; $i <= 10; $i++)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-16 w-12">
                                    <div class="h-16 w-12 rounded-lg bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
                                        <i class="fas fa-book text-white text-lg"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-semibold text-gray-900">Islamic Principles {{ $i }}</div>
                                    <div class="text-sm text-gray-500 arabic-text">المبادئ الإسلامية {{ $i }}</div>
                                    <div class="text-xs text-gray-400">ISBN: 978-{{ 1000 + $i }}-{{ 2000 + $i }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Dr. Ahmad Al-Rashid</div>
                            <div class="text-xs text-gray-500">{{ 2015 + ($i % 8) }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                {{ ['Quran & Tafsir', 'Hadith Sciences', 'Islamic Jurisprudence', 'Islamic Creed'][$i % 4] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm">
                                <div class="flex items-center mb-1">
                                    <i class="fas fa-star text-yellow-400 mr-1"></i>
                                    <span class="text-gray-900">{{ 4 + ($i % 2) }}.{{ 5 + ($i % 5) }}/5</span>
                                    <span class="text-gray-500 ml-1">({{ 10 + ($i * 5) }})</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-download text-blue-500 mr-1"></i>
                                    <span class="text-gray-900">{{ number_format(1000 + ($i * 150)) }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                {{ $i % 4 === 0 ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                <div class="w-1.5 h-1.5 rounded-full mr-1 
                                    {{ $i % 4 === 0 ? 'bg-yellow-400' : 'bg-green-400' }}"></div>
                                {{ $i % 4 === 0 ? 'Draft' : 'Published' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center space-x-2">
                                <a href="#" 
                                   class="text-green-600 hover:text-green-900 p-2 rounded-lg hover:bg-green-50 transition-all duration-200" 
                                   title="View Book">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" 
                                   class="text-blue-600 hover:text-blue-900 p-2 rounded-lg hover:bg-blue-50 transition-all duration-200" 
                                   title="Edit Book">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" 
                                   class="text-purple-600 hover:text-purple-900 p-2 rounded-lg hover:bg-purple-50 transition-all duration-200" 
                                   title="Download Book">
                                    <i class="fas fa-download"></i>
                                </a>
                                <button onclick="toggleBookStatus({{ $i }})" 
                                        class="text-yellow-600 hover:text-yellow-900 p-2 rounded-lg hover:bg-yellow-50 transition-all duration-200" 
                                        title="Toggle Status">
                                    <i class="fas fa-power-off"></i>
                                </button>
                                <button onclick="deleteBook({{ $i }})" 
                                        class="text-red-600 hover:text-red-900 p-2 rounded-lg hover:bg-red-50 transition-all duration-200" 
                                        title="Delete Book">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endfor
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Card View -->
    <div id="cardView" class="hidden grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse($books ?? [] as $book)
        <div class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
            <div class="flex flex-col">
                <div class="relative mb-4">
                    <img src="{{ $book->cover_image ?? '/images/default-book-cover.jpg' }}" 
                         alt="{{ $book->title }}" 
                         class="w-full h-48 object-cover rounded-lg">
                    <div class="absolute top-2 right-2">
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium 
                            {{ $book->status === 'published' ? 'bg-green-100 text-green-800' : 
                               ($book->status === 'draft' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                            {{ ucfirst($book->status) }}
                        </span>
                    </div>
                </div>
                
                <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $book->title }}</h3>
                <p class="text-sm text-gray-600 arabic-text mb-2">{{ $book->title_arabic }}</p>
                <p class="text-sm text-gray-500 mb-3">by {{ $book->author->name }}</p>
                
                <div class="space-y-2 mb-4">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Category:</span>
                        <span class="font-medium text-gray-900">{{ $book->category->name }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Rating:</span>
                        <div class="flex items-center">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="font-medium text-gray-900">{{ $book->rating }}/5</span>
                        </div>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Downloads:</span>
                        <span class="font-medium text-gray-900">{{ number_format($book->downloads_count) }}</span>
                    </div>
                </div>
                
                <div class="flex items-center space-x-2">
                    <a href="{{ route('dashboard.books.show', $book->id) }}" 
                       class="flex-1 bg-green-600 text-white text-center py-2 px-3 rounded-lg hover:bg-green-700 transition-colors duration-200 text-sm">
                        <i class="fas fa-eye mr-1"></i>
                        View
                    </a>
                    <a href="{{ route('dashboard.books.edit', $book->id) }}" 
                       class="flex-1 bg-blue-600 text-white text-center py-2 px-3 rounded-lg hover:bg-blue-700 transition-colors duration-200 text-sm">
                        <i class="fas fa-edit mr-1"></i>
                        Edit
                    </a>
                    <button onclick="deleteBook({{ $book->id }})" 
                            class="bg-red-600 text-white py-2 px-3 rounded-lg hover:bg-red-700 transition-colors duration-200 text-sm">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
        @empty
        {{-- Default cards for demonstration --}}
        @for($i = 1; $i <= 8; $i++)
        <div class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
            <div class="flex flex-col">
                <div class="relative mb-4">
                    <div class="w-full h-48 bg-gradient-to-br from-green-400 to-green-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-book text-white text-4xl"></i>
                    </div>
                    <div class="absolute top-2 right-2">
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium 
                            {{ $i % 4 === 0 ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                            {{ $i % 4 === 0 ? 'Draft' : 'Published' }}
                        </span>
                    </div>
                </div>
                
                <h3 class="text-lg font-semibold text-gray-900 mb-1">Islamic Principles {{ $i }}</h3>
                <p class="text-sm text-gray-600 arabic-text mb-2">المبادئ الإسلامية {{ $i }}</p>
                <p class="text-sm text-gray-500 mb-3">by Dr. Ahmad Al-Rashid</p>
                
                <div class="space-y-2 mb-4">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Category:</span>
                        <span class="font-medium text-gray-900">{{ ['Quran & Tafsir', 'Hadith Sciences', 'Islamic Jurisprudence', 'Islamic Creed'][$i % 4] }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Rating:</span>
                        <div class="flex items-center">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="font-medium text-gray-900">{{ 4 + ($i % 2) }}.{{ 5 + ($i % 5) }}/5</span>
                        </div>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Downloads:</span>
                        <span class="font-medium text-gray-900">{{ number_format(1000 + ($i * 150)) }}</span>
                    </div>
                </div>
                
                <div class="flex items-center space-x-2">
                    <a href="#" 
                       class="flex-1 bg-green-600 text-white text-center py-2 px-3 rounded-lg hover:bg-green-700 transition-colors duration-200 text-sm">
                        <i class="fas fa-eye mr-1"></i>
                        View
                    </a>
                    <a href="#" 
                       class="flex-1 bg-blue-600 text-white text-center py-2 px-3 rounded-lg hover:bg-blue-700 transition-colors duration-200 text-sm">
                        <i class="fas fa-edit mr-1"></i>
                        Edit
                    </a>
                    <button onclick="deleteBook({{ $i }})" 
                            class="bg-red-600 text-white py-2 px-3 rounded-lg hover:bg-red-700 transition-colors duration-200 text-sm">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
        @endfor
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div class="flex items-center space-x-2 text-sm text-gray-600 mb-4 sm:mb-0">
                <span>Show</span>
                <select class="border border-gray-300 rounded-lg px-3 py-1 focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                    <option>100</option>
                </select>
                <span>entries per page</span>
            </div>
            
            <nav class="flex items-center space-x-1">
                <button class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="px-4 py-2 text-sm font-medium text-white bg-green-600 border border-green-600">1</button>
                <button class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 hover:bg-gray-50">2</button>
                <button class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 hover:bg-gray-50">3</button>
                <span class="px-4 py-2 text-sm font-medium text-gray-500">...</span>
                <button class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 hover:bg-gray-50">285</button>
                <button class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-50">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </nav>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-2xl bg-white">
        <div class="mt-3 text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                <i class="fas fa-exclamation-triangle text-red-600"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mb-2">Delete Book</h3>
            <p class="text-sm text-gray-500 mb-6">Are you sure you want to delete this book? This action cannot be undone.</p>
            <div class="flex space-x-3">
                <button onclick="closeDeleteModal()" 
                    class="flex-1 px-4 py-2 bg-gray-300 text-gray-800 text-sm font-medium rounded-lg hover:bg-gray-400 transition-colors duration-200">
                    Cancel
                </button>
                <button onclick="confirmDelete()" 
                    class="flex-1 px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition-colors duration-200">
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>

<style>
.arabic-text {
    direction: rtl;
    text-align: right;
    font-family: 'Arial', sans-serif;
}
</style>

<script>
// View Toggle Functionality
const tableViewBtn = document.getElementById('tableViewBtn');
const cardViewBtn = document.getElementById('cardViewBtn');
const tableView = document.getElementById('tableView');
const cardView = document.getElementById('cardView');

tableViewBtn.addEventListener('click', () => {
    tableView.classList.remove('hidden');
    cardView.classList.add('hidden');
    tableViewBtn.classList.add('bg-white', 'text-gray-900', 'shadow-sm');
    tableViewBtn.classList.remove('text-gray-600');
    cardViewBtn.classList.remove('bg-white', 'text-gray-900', 'shadow-sm');
    cardViewBtn.classList.add('text-gray-600');
});

cardViewBtn.addEventListener('click', () => {
    tableView.classList.add('hidden');
    cardView.classList.remove('hidden');
    cardViewBtn.classList.add('bg-white', 'text-gray-900', 'shadow-sm');
    cardViewBtn.classList.remove('text-gray-600');
    tableViewBtn.classList.remove('bg-white', 'text-gray-900', 'shadow-sm');
    tableViewBtn.classList.add('text-gray-600');
});

// Delete Book Functionality
let currentDeleteId = null;

function deleteBook(id) {
    currentDeleteId = id;
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
    currentDeleteId = null;
}

function confirmDelete() {
    if (currentDeleteId) {
        console.log('Deleting book with ID:', currentDeleteId);
        closeDeleteModal();
    }
}

// Toggle Book Status
function toggleBookStatus(id) {
    console.log('Toggling status for book ID:', id);
}

// Export Books
function exportBooks() {
    console.log('Exporting books...');
}

// Bulk Actions
function bulkActions() {
    console.log('Opening bulk actions...');
}

// Filter functionality
document.getElementById('searchInput').addEventListener('input', function() {
    console.log('Searching for:', this.value);
});

document.getElementById('categoryFilter').addEventListener('change', function() {
    console.log('Filter by category:', this.value);
});

document.getElementById('authorFilter').addEventListener('change', function() {
    console.log('Filter by author:', this.value);
});

document.getElementById('statusFilter').addEventListener('change', function() {
    console.log('Filter by status:', this.value);
});

// Close modal when clicking outside
document.getElementById('deleteModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeDeleteModal();
    }
});

// ESC key to close modal
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeDeleteModal();
    }
});
</script>
@endsection