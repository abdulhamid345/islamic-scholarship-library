{{-- resources/views/dashboard/categories/index.blade.php --}}
@extends('layouts.dashboard')

@section('title', 'Categories Management')

@section('content')
<div class="p-6 space-y-6">
    <!-- Page Header -->
    <div class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Categories Management</h1>
                <p class="text-gray-600">Organize and manage book categories and topics</p>
                <div class="flex items-center space-x-4 mt-3">
                    <div class="flex items-center space-x-2 text-sm">
                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                        <span class="text-gray-600">{{ $totalCategories ?? '24' }} Total Categories</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm">
                        <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                        <span class="text-gray-600">{{ $activeCategories ?? '22' }} Active</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm">
                        <div class="w-3 h-3 bg-gray-400 rounded-full"></div>
                        <span class="text-gray-600">{{ $inactiveCategories ?? '2' }} Inactive</span>
                    </div>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <button onclick="exportCategories()" 
                    class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-xl text-gray-700 bg-white hover:bg-gray-50 transition-all duration-200">
                    <i class="fas fa-download mr-2 text-gray-500"></i>
                    Export
                </button>
                <button onclick="reorderCategories()" 
                    class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-xl text-gray-700 bg-white hover:bg-gray-50 transition-all duration-200">
                    <i class="fas fa-sort mr-2 text-gray-500"></i>
                    Reorder
                </button>
                <a href="{{ route('dashboard.category.create') }}" 
                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white text-sm font-semibold rounded-xl shadow-lg hover:from-green-700 hover:to-emerald-700 transform hover:scale-105 transition-all duration-200">
                    <i class="fas fa-plus mr-2"></i>
                    Add New Category
                </a>
            </div>
        </div>
    </div>

    <!-- Filters and Search -->
    <div class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
            <!-- Search -->
            <div class="lg:col-span-2">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text" id="searchInput" 
                        class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200" 
                        placeholder="Search categories by name or description...">
                </div>
            </div>
            
            <!-- Parent Category Filter -->
            <div>
                <select id="parentFilter" 
                    class="block w-full py-3 px-3 border border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200">
                    <option value="">All Levels</option>
                    <option value="main">Main Categories</option>
                    <option value="sub">Sub Categories</option>
                </select>
            </div>
            
            <!-- Status Filter -->
            <div>
                <select id="statusFilter" 
                    class="block w-full py-3 px-3 border border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
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
                    <button id="treeViewBtn" 
                        class="px-3 py-2 text-sm font-medium rounded-lg transition-all duration-200 text-gray-600 hover:text-gray-900">
                        <i class="fas fa-sitemap mr-1"></i>
                        Tree
                    </button>
                </div>
            </div>
            <div class="text-sm text-gray-600">
                Showing <span id="resultsStart">1</span>-<span id="resultsEnd">10</span> of <span id="resultsTotal">{{ $totalCategories ?? '24' }}</span> categories
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
                            <div class="flex items-center space-x-1">
                                <span>Category</span>
                                <i class="fas fa-sort text-gray-400 cursor-pointer hover:text-gray-600"></i>
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center space-x-1">
                                <span>Description</span>
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center space-x-1">
                                <span>Books</span>
                                <i class="fas fa-sort text-gray-400 cursor-pointer hover:text-gray-600"></i>
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center space-x-1">
                                <span>Created</span>
                                <i class="fas fa-sort text-gray-400 cursor-pointer hover:text-gray-600"></i>
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($categories ?? [] as $category)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-12 w-12">
                                    <div class="h-12 w-12 rounded-lg flex items-center justify-center 
                                        {{ $category->color ?? 'bg-gradient-to-br from-green-400 to-green-600' }} shadow-lg">
                                        <i class="{{ $category->icon ?? 'fas fa-book' }} text-white text-lg"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $category->name }}</div>
                                    <div class="text-sm text-gray-500 arabic-text">{{ $category->name_arabic }}</div>
                                    @if($category->parent)
                                    <div class="text-xs text-gray-400">
                                        <i class="fas fa-level-up-alt mr-1"></i>
                                        {{ $category->parent->name }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900 max-w-xs truncate">{{ $category->description }}</div>
                            @if($category->description_arabic)
                            <div class="text-sm text-gray-500 arabic-text max-w-xs truncate">{{ $category->description_arabic }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-900">{{ $category->books_count }}</span>
                                <span class="ml-1 text-xs text-gray-500">books</span>
                            </div>
                            @if($category->subcategories_count > 0)
                            <div class="text-xs text-gray-400">
                                {{ $category->subcategories_count }} subcategories
                            </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $category->created_at->format('M d, Y') }}</div>
                            <div class="text-xs text-gray-500">{{ $category->created_at->diffForHumans() }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                {{ $category->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                <div class="w-1.5 h-1.5 rounded-full mr-1 
                                    {{ $category->status === 'active' ? 'bg-green-400' : 'bg-gray-400' }}"></div>
                                {{ ucfirst($category->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('dashboard.category.show', $category->id) }}" 
                                   class="text-green-600 hover:text-green-900 p-2 rounded-lg hover:bg-green-50 transition-all duration-200" 
                                   title="View Category">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('dashboard.category.edit', $category->id) }}" 
                                   class="text-blue-600 hover:text-blue-900 p-2 rounded-lg hover:bg-blue-50 transition-all duration-200" 
                                   title="Edit Category">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="toggleCategoryStatus({{ $category->id }})" 
                                        class="text-yellow-600 hover:text-yellow-900 p-2 rounded-lg hover:bg-yellow-50 transition-all duration-200" 
                                        title="Toggle Status">
                                    <i class="fas fa-power-off"></i>
                                </button>
                                <button onclick="deleteCategory({{ $category->id }})" 
                                        class="text-red-600 hover:text-red-900 p-2 rounded-lg hover:bg-red-50 transition-all duration-200" 
                                        title="Delete Category">
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
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-12 w-12">
                                    <div class="h-12 w-12 rounded-lg flex items-center justify-center 
                                        {{ ['bg-gradient-to-br from-green-400 to-green-600', 'bg-gradient-to-br from-blue-400 to-blue-600', 'bg-gradient-to-br from-purple-400 to-purple-600', 'bg-gradient-to-br from-yellow-400 to-yellow-600'][$i % 4] }} shadow-lg">
                                        <i class="{{ ['fas fa-book-open', 'fas fa-mosque', 'fas fa-balance-scale', 'fas fa-heart'][$i % 4] }} text-white text-lg"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ ['Quran & Tafsir', 'Hadith Sciences', 'Islamic Jurisprudence', 'Islamic Creed', 'Islamic History', 'Islamic Ethics', 'Contemporary Issues', 'Islamic Economics', 'Islamic Philosophy', 'Islamic Literature'][$i-1] }}</div>
                                    <div class="text-sm text-gray-500 arabic-text">{{ ['القرآن والتفسير', 'علوم الحديث', 'الفقه الإسلامي', 'العقيدة الإسلامية', 'التاريخ الإسلامي', 'الأخلاق الإسلامية', 'القضايا المعاصرة', 'الاقتصاد الإسلامي', 'الفلسفة الإسلامية', 'الأدب الإسلامي'][$i-1] }}</div>
                                    @if($i > 5)
                                    <div class="text-xs text-gray-400">
                                        <i class="fas fa-level-up-alt mr-1"></i>
                                        {{ ['Islamic Studies', 'Religious Sciences', 'Jurisprudence'][$i % 3] }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900 max-w-xs truncate">Comprehensive collection of {{ strtolower(['Quran & Tafsir', 'Hadith Sciences', 'Islamic Jurisprudence', 'Islamic Creed', 'Islamic History', 'Islamic Ethics', 'Contemporary Issues', 'Islamic Economics', 'Islamic Philosophy', 'Islamic Literature'][$i-1]) }} texts and resources.</div>
                            <div class="text-sm text-gray-500 arabic-text max-w-xs truncate">مجموعة شاملة من النصوص والموارد الإسلامية.</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-900">{{ [342, 287, 425, 198, 312, 156, 89, 234, 167, 203][$i-1] }}</span>
                                <span class="ml-1 text-xs text-gray-500">books</span>
                            </div>
                            @if($i > 5)
                            <div class="text-xs text-gray-400">
                                {{ $i - 3 }} subcategories
                            </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ now()->subDays($i * 30)->format('M d, Y') }}</div>
                            <div class="text-xs text-gray-500">{{ now()->subDays($i * 30)->diffForHumans() }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                {{ $i % 5 === 0 ? 'bg-gray-100 text-gray-800' : 'bg-green-100 text-green-800' }}">
                                <div class="w-1.5 h-1.5 rounded-full mr-1 
                                    {{ $i % 5 === 0 ? 'bg-gray-400' : 'bg-green-400' }}"></div>
                                {{ $i % 5 === 0 ? 'Inactive' : 'Active' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center space-x-2">
                                <a href="#" 
                                   class="text-green-600 hover:text-green-900 p-2 rounded-lg hover:bg-green-50 transition-all duration-200" 
                                   title="View Category">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" 
                                   class="text-blue-600 hover:text-blue-900 p-2 rounded-lg hover:bg-blue-50 transition-all duration-200" 
                                   title="Edit Category">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="toggleCategoryStatus({{ $i }})" 
                                        class="text-yellow-600 hover:text-yellow-900 p-2 rounded-lg hover:bg-yellow-50 transition-all duration-200" 
                                        title="Toggle Status">
                                    <i class="fas fa-power-off"></i>
                                </button>
                                <button onclick="deleteCategory({{ $i }})" 
                                        class="text-red-600 hover:text-red-900 p-2 rounded-lg hover:bg-red-50 transition-all duration-200" 
                                        title="Delete Category">
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
        @forelse($categories ?? [] as $category)
        <div class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 rounded-2xl flex items-center justify-center 
                    {{ $category->color ?? 'bg-gradient-to-br from-green-400 to-green-600' }} shadow-lg mb-4">
                    <i class="{{ $category->icon ?? 'fas fa-book' }} text-white text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $category->name }}</h3>
                <p class="text-sm text-gray-600 arabic-text mb-2">{{ $category->name_arabic }}</p>
                @if($category->parent)
                <p class="text-xs text-gray-500 mb-3">
                    <i class="fas fa-level-up-alt mr-1"></i>
                    {{ $category->parent->name }}
                </p>
                @endif
                
                <p class="text-sm text-gray-600 text-center mb-4 line-clamp-3">{{ $category->description }}</p>
                
                <div class="w-full space-y-2 mb-4">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Books:</span>
                        <span class="font-medium text-gray-900">{{ $category->books_count }}</span>
                    </div>
                    @if($category->subcategories_count > 0)
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Subcategories:</span>
                        <span class="font-medium text-gray-900">{{ $category->subcategories_count }}</span>
                    </div>
                    @endif
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Created:</span>
                        <span class="font-medium text-gray-900">{{ $category->created_at->format('M Y') }}</span>
                    </div>
                </div>
                
                <div class="flex items-center justify-center mb-4">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                        {{ $category->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                        <div class="w-1.5 h-1.5 rounded-full mr-1 
                            {{ $category->status === 'active' ? 'bg-green-400' : 'bg-gray-400' }}"></div>
                        {{ ucfirst($category->status) }}
                    </span>
                </div>
                
                <div class="flex items-center space-x-2 w-full">
                    <a href="{{ route('dashboard.category.show', $category->id) }}" 
                       class="flex-1 bg-green-600 text-white text-center py-2 px-3 rounded-lg hover:bg-green-700 transition-colors duration-200 text-sm">
                        <i class="fas fa-eye mr-1"></i>
                        View
                    </a>
                    <a href="{{ route('dashboard.category.edit', $category->id) }}" 
                       class="flex-1 bg-blue-600 text-white text-center py-2 px-3 rounded-lg hover:bg-blue-700 transition-colors duration-200 text-sm">
                        <i class="fas fa-edit mr-1"></i>
                        Edit
                    </a>
                    <button onclick="deleteCategory({{ $category->id }})" 
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
            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 rounded-2xl flex items-center justify-center 
                    {{ ['bg-gradient-to-br from-green-400 to-green-600', 'bg-gradient-to-br from-blue-400 to-blue-600', 'bg-gradient-to-br from-purple-400 to-purple-600', 'bg-gradient-to-br from-yellow-400 to-yellow-600'][$i % 4] }} shadow-lg mb-4">
                    <i class="{{ ['fas fa-book-open', 'fas fa-mosque', 'fas fa-balance-scale', 'fas fa-heart'][$i % 4] }} text-white text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ ['Quran & Tafsir', 'Hadith Sciences', 'Islamic Jurisprudence', 'Islamic Creed', 'Islamic History', 'Islamic Ethics', 'Contemporary Issues', 'Islamic Economics'][$i-1] }}</h3>
                <p class="text-sm text-gray-600 arabic-text mb-2">{{ ['القرآن والتفسير', 'علوم الحديث', 'الفقه الإسلامي', 'العقيدة الإسلامية', 'التاريخ الإسلامي', 'الأخلاق الإسلامية', 'القضايا المعاصرة', 'الاقتصاد الإسلامي'][$i-1] }}</p>
                @if($i > 4)
                <p class="text-xs text-gray-500 mb-3">
                    <i class="fas fa-level-up-alt mr-1"></i>
                    {{ ['Islamic Studies', 'Religious Sciences', 'Jurisprudence'][$i % 3] }}
                </p>
                @endif
                
                <p class="text-sm text-gray-600 text-center mb-4 line-clamp-3">Comprehensive collection of {{ strtolower(['Quran & Tafsir', 'Hadith Sciences', 'Islamic Jurisprudence', 'Islamic Creed', 'Islamic History', 'Islamic Ethics', 'Contemporary Issues', 'Islamic Economics'][$i-1]) }} texts and resources.</p>
                
                <div class="w-full space-y-2 mb-4">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Books:</span>
                        <span class="font-medium text-gray-900">{{ [342, 287, 425, 198, 312, 156, 89, 234][$i-1] }}</span>
                    </div>
                    @if($i > 4)
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Subcategories:</span>
                        <span class="font-medium text-gray-900">{{ $i - 2 }}</span>
                    </div>
                    @endif
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Created:</span>
                        <span class="font-medium text-gray-900">{{ now()->subDays($i * 30)->format('M Y') }}</span>
                    </div>
                </div>
                
                <div class="flex items-center justify-center mb-4">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                        {{ $i % 5 === 0 ? 'bg-gray-100 text-gray-800' : 'bg-green-100 text-green-800' }}">
                        <div class="w-1.5 h-1.5 rounded-full mr-1 
                            {{ $i % 5 === 0 ? 'bg-gray-400' : 'bg-green-400' }}"></div>
                        {{ $i % 5 === 0 ? 'Inactive' : 'Active' }}
                    </span>
                </div>
                
                <div class="flex items-center space-x-2 w-full">
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
                    <button onclick="deleteCategory({{ $i }})" 
                            class="bg-red-600 text-white py-2 px-3 rounded-lg hover:bg-red-700 transition-colors duration-200 text-sm">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
        @endfor
        @endforelse
    </div>

    <!-- Tree View -->
    <div id="treeView" class="hidden glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg">
        <div class="space-y-4">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Category Hierarchy</h3>
            <div class="space-y-3">
                <!-- Main Categories -->
                <div class="category-tree-item">
                    <div class="flex items-center p-3 bg-green-50 rounded-lg border border-green-200">
                        <button class="mr-3 text-green-600 hover:text-green-800" onclick="toggleTreeNode(this)">
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-green-600 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-book-open text-white"></i>
                        </div>
                        <div class="flex-1">
                            <div class="font-semibold text-gray-900">Islamic Studies</div>
                            <div class="text-sm text-gray-600">Main category • 1,847 books</div>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-blue-600 hover:text-blue-800 p-2 rounded-lg hover:bg-blue-50">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-red-600 hover:text-red-800 p-2 rounded-lg hover:bg-red-50">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Subcategories -->
                    <div class="ml-8 mt-2 space-y-2 tree-children">
                        <div class="flex items-center p-3 bg-blue-50 rounded-lg border border-blue-200">
                            <div class="w-8 h-8 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-mosque text-white text-sm"></i>
                            </div>
                            <div class="flex-1">
                                <div class="font-medium text-gray-900">Quran & Tafsir</div>
                                <div class="text-sm text-gray-600">342 books</div>
                            </div>
                            <div class="flex space-x-2">
                                <button class="text-blue-600 hover:text-blue-800 p-1 rounded">
                                    <i class="fas fa-edit text-sm"></i>
                                </button>
                                <button class="text-red-600 hover:text-red-800 p-1 rounded">
                                    <i class="fas fa-trash text-sm"></i>
                                </button>
                            </div>
                        </div>
                        <div class="flex items-center p-3 bg-purple-50 rounded-lg border border-purple-200">
                            <div class="w-8 h-8 bg-gradient-to-br from-purple-400 to-purple-600 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-scroll text-white text-sm"></i>
                            </div>
                            <div class="flex-1">
                                <div class="font-medium text-gray-900">Hadith Sciences</div>
                                <div class="text-sm text-gray-600">287 books</div>
                            </div>
                            <div class="flex space-x-2">
                                <button class="text-blue-600 hover:text-blue-800 p-1 rounded">
                                    <i class="fas fa-edit text-sm"></i>
                                </button>
                                <button class="text-red-600 hover:text-red-800 p-1 rounded">
                                    <i class="fas fa-trash text-sm"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- More main categories would go here -->
                <div class="category-tree-item">
                    <div class="flex items-center p-3 bg-yellow-50 rounded-lg border border-yellow-200">
                        <button class="mr-3 text-yellow-600 hover:text-yellow-800" onclick="toggleTreeNode(this)">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                        <div class="w-10 h-10 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-balance-scale text-white"></i>
                        </div>
                        <div class="flex-1">
                            <div class="font-semibold text-gray-900">Jurisprudence</div>
                            <div class="text-sm text-gray-600">Main category • 623 books</div>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-blue-600 hover:text-blue-800 p-2 rounded-lg hover:bg-blue-50">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-red-600 hover:text-red-800 p-2 rounded-lg hover:bg-red-50">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="ml-8 mt-2 space-y-2 tree-children hidden">
                        <!-- Subcategories would be here -->
                    </div>
                </div>
            </div>
        </div>
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
            <h3 class="text-lg font-medium text-gray-900 mb-2">Delete Category</h3>
            <p class="text-sm text-gray-500 mb-6">Are you sure you want to delete this category? All associated books will be moved to "Uncategorized".</p>
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

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>

<script>
// View Toggle Functionality
const tableViewBtn = document.getElementById('tableViewBtn');
const cardViewBtn = document.getElementById('cardViewBtn');
const treeViewBtn = document.getElementById('treeViewBtn');
const tableView = document.getElementById('tableView');
const cardView = document.getElementById('cardView');
const treeView = document.getElementById('treeView');

function activateView(activeBtn, activeView) {
    // Hide all views
    tableView.classList.add('hidden');
    cardView.classList.add('hidden');
    treeView.classList.add('hidden');
    
    // Reset all buttons
    [tableViewBtn, cardViewBtn, treeViewBtn].forEach(btn => {
        btn.classList.remove('bg-white', 'text-gray-900', 'shadow-sm');
        btn.classList.add('text-gray-600');
    });
    
    // Show active view and style active button
    activeView.classList.remove('hidden');
    activeBtn.classList.add('bg-white', 'text-gray-900', 'shadow-sm');
    activeBtn.classList.remove('text-gray-600');
}

tableViewBtn.addEventListener('click', () => activateView(tableViewBtn, tableView));
cardViewBtn.addEventListener('click', () => activateView(cardViewBtn, cardView));
treeViewBtn.addEventListener('click', () => activateView(treeViewBtn, treeView));

// Tree View Toggle
function toggleTreeNode(button) {
    const chevron = button.querySelector('i');
    const children = button.closest('.category-tree-item').querySelector('.tree-children');
    
    if (children.classList.contains('hidden')) {
        children.classList.remove('hidden');
        chevron.classList.remove('fa-chevron-right');
        chevron.classList.add('fa-chevron-down');
    } else {
        children.classList.add('hidden');
        chevron.classList.remove('fa-chevron-down');
        chevron.classList.add('fa-chevron-right');
    }
}

// Delete Category Functionality
let currentDeleteId = null;

function deleteCategory(id) {
    currentDeleteId = id;
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
    currentDeleteId = null;
}

function confirmDelete() {
    if (currentDeleteId) {
        console.log('Deleting category with ID:', currentDeleteId);
        closeDeleteModal();
    }
}

// Toggle Category Status
function toggleCategoryStatus(id) {
    console.log('Toggling status for category ID:', id);
}

// Export Categories
function exportCategories() {
    console.log('Exporting category...');
}

// Reorder Categories
function reorderCategories() {
    console.log('Opening reorder interface...');
}

// Filter functionality
document.getElementById('searchInput').addEventListener('input', function() {
    console.log('Searching for:', this.value);
});

document.getElementById('parentFilter').addEventListener('change', function() {
    console.log('Filter by parent:', this.value);
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