{{-- resources/views/dashboard/scholars/index.blade.php --}}
@extends('layouts.dashboard')

@section('title', 'Scholars Management')

@section('content')
<div class="p-6 space-y-6">
    <!-- Page Header -->
    <div class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Scholars Management</h1>
                <p class="text-gray-600">Manage Islamic scholars and their information</p>
                <div class="flex items-center space-x-4 mt-3">
                    <div class="flex items-center space-x-2 text-sm">
                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                        <span class="text-gray-600">{{ $totalScholars ?? '156' }} Total Scholars</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm">
                        <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                        <span class="text-gray-600">{{ $activeScholars ?? '142' }} Active</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm">
                        <div class="w-3 h-3 bg-gray-400 rounded-full"></div>
                        <span class="text-gray-600">{{ $inactiveScholars ?? '14' }} Inactive</span>
                    </div>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <button onclick="exportScholars()" 
                    class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-xl text-gray-700 bg-white hover:bg-gray-50 transition-all duration-200">
                    <i class="fas fa-download mr-2 text-gray-500"></i>
                    Export
                </button>
                <a href="{{ route('dashboard.scholars.create') }}" 
                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white text-sm font-semibold rounded-xl shadow-lg hover:from-green-700 hover:to-emerald-700 transform hover:scale-105 transition-all duration-200">
                    <i class="fas fa-plus mr-2"></i>
                    Add New Scholar
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
                        placeholder="Search scholars by name, specialization, or location...">
                </div>
            </div>
            
            <!-- Specialization Filter -->
            <div>
                <select id="specializationFilter" 
                    class="block w-full py-3 px-3 border border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200">
                    <option value="">All Specializations</option>
                    <option value="quran">Quran & Tafsir</option>
                    <option value="hadith">Hadith Sciences</option>
                    <option value="fiqh">Islamic Jurisprudence</option>
                    <option value="aqeedah">Islamic Creed</option>
                    <option value="history">Islamic History</option>
                    <option value="ethics">Islamic Ethics</option>
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
                </div>
            </div>
            <div class="text-sm text-gray-600">
                Showing <span id="resultsStart">1</span>-<span id="resultsEnd">10</span> of <span id="resultsTotal">{{ $totalScholars ?? '156' }}</span> scholars
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
                                <span>Scholar</span>
                                <i class="fas fa-sort text-gray-400 cursor-pointer hover:text-gray-600"></i>
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center space-x-1">
                                <span>Specialization</span>
                                <i class="fas fa-sort text-gray-400 cursor-pointer hover:text-gray-600"></i>
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center space-x-1">
                                <span>Location</span>
                                <i class="fas fa-sort text-gray-400 cursor-pointer hover:text-gray-600"></i>
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center space-x-1">
                                <span>Books</span>
                                <i class="fas fa-sort text-gray-400 cursor-pointer hover:text-gray-600"></i>
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($scholars ?? [] as $scholar)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-12 w-12">
                                    <img class="h-12 w-12 rounded-full object-cover ring-2 ring-green-500 ring-opacity-30" 
                                         src="{{ $scholar->image ?? 'https://ui-avatars.com/api/?name=' . urlencode($scholar->name) . '&background=059669&color=ffffff' }}" 
                                         alt="{{ $scholar->name }}">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $scholar->name }}</div>
                                    <div class="text-sm text-gray-500 arabic-text">{{ $scholar->name_arabic }}</div>
                                    <div class="text-xs text-gray-400">{{ $scholar->title }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $scholar->specialization }}</div>
                            <div class="text-xs text-gray-500">{{ $scholar->experience_years }}+ years</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $scholar->location }}</div>
                            <div class="text-xs text-gray-500">{{ $scholar->country }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-900">{{ $scholar->books_count }}</span>
                                <span class="ml-1 text-xs text-gray-500">books</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                {{ $scholar->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                <div class="w-1.5 h-1.5 rounded-full mr-1 
                                    {{ $scholar->status === 'active' ? 'bg-green-400' : 'bg-gray-400' }}"></div>
                                {{ ucfirst($scholar->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('dashboard.scholars.show', $scholar->id) }}" 
                                   class="text-green-600 hover:text-green-900 p-2 rounded-lg hover:bg-green-50 transition-all duration-200" 
                                   title="View Scholar">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('dashboard.scholars.edit', $scholar->id) }}" 
                                   class="text-blue-600 hover:text-blue-900 p-2 rounded-lg hover:bg-blue-50 transition-all duration-200" 
                                   title="Edit Scholar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="toggleScholarStatus({{ $scholar->id }})" 
                                        class="text-yellow-600 hover:text-yellow-900 p-2 rounded-lg hover:bg-yellow-50 transition-all duration-200" 
                                        title="Toggle Status">
                                    <i class="fas fa-power-off"></i>
                                </button>
                                <button onclick="deleteScholar({{ $scholar->id }})" 
                                        class="text-red-600 hover:text-red-900 p-2 rounded-lg hover:bg-red-50 transition-all duration-200" 
                                        title="Delete Scholar">
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
                                    <img class="h-12 w-12 rounded-full object-cover ring-2 ring-green-500 ring-opacity-30" 
                                         src="https://ui-avatars.com/api/?name=Scholar{{ $i }}&background=059669&color=ffffff" 
                                         alt="Scholar {{ $i }}">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-semibold text-gray-900">Dr. Ahmad Al-Rashid {{ $i }}</div>
                                    <div class="text-sm text-gray-500 arabic-text">د. أحمد الراشد {{ $i }}</div>
                                    <div class="text-xs text-gray-400">Professor of Islamic Studies</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ ['Quran & Tafsir', 'Hadith Sciences', 'Islamic Jurisprudence', 'Islamic Creed'][$i % 4] }}</div>
                            <div class="text-xs text-gray-500">{{ 15 + ($i * 2) }}+ years</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ ['Mecca', 'Medina', 'Cairo', 'Damascus'][$i % 4] }}</div>
                            <div class="text-xs text-gray-500">{{ ['Saudi Arabia', 'Egypt', 'Syria', 'Jordan'][$i % 4] }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-900">{{ 5 + ($i * 3) }}</span>
                                <span class="ml-1 text-xs text-gray-500">books</span>
                            </div>
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
                                   title="View Scholar">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" 
                                   class="text-blue-600 hover:text-blue-900 p-2 rounded-lg hover:bg-blue-50 transition-all duration-200" 
                                   title="Edit Scholar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="toggleScholarStatus({{ $i }})" 
                                        class="text-yellow-600 hover:text-yellow-900 p-2 rounded-lg hover:bg-yellow-50 transition-all duration-200" 
                                        title="Toggle Status">
                                    <i class="fas fa-power-off"></i>
                                </button>
                                <button onclick="deleteScholar({{ $i }})" 
                                        class="text-red-600 hover:text-red-900 p-2 rounded-lg hover:bg-red-50 transition-all duration-200" 
                                        title="Delete Scholar">
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
        @forelse($scholars ?? [] as $scholar)
        <div class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
            <div class="flex flex-col items-center text-center">
                <div class="w-20 h-20 rounded-full overflow-hidden ring-4 ring-green-500 ring-opacity-30 mb-4">
                    <img src="{{ $scholar->image ?? 'https://ui-avatars.com/api/?name=' . urlencode($scholar->name) . '&background=059669&color=ffffff' }}" 
                         alt="{{ $scholar->name }}" 
                         class="w-full h-full object-cover">
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $scholar->name }}</h3>
                <p class="text-sm text-gray-600 arabic-text mb-2">{{ $scholar->name_arabic }}</p>
                <p class="text-xs text-gray-500 mb-3">{{ $scholar->title }}</p>
                
                <div class="w-full space-y-2 mb-4">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Specialization:</span>
                        <span class="font-medium text-gray-900">{{ $scholar->specialization }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Books:</span>
                        <span class="font-medium text-gray-900">{{ $scholar->books_count }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Location:</span>
                        <span class="font-medium text-gray-900">{{ $scholar->location }}</span>
                    </div>
                </div>
                
                <div class="flex items-center justify-center mb-4">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                        {{ $scholar->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                        <div class="w-1.5 h-1.5 rounded-full mr-1 
                            {{ $scholar->status === 'active' ? 'bg-green-400' : 'bg-gray-400' }}"></div>
                        {{ ucfirst($scholar->status) }}
                    </span>
                </div>
                
                <div class="flex items-center space-x-2 w-full">
                    <a href="{{ route('dashboard.scholars.show', $scholar->id) }}" 
                       class="flex-1 bg-green-600 text-white text-center py-2 px-3 rounded-lg hover:bg-green-700 transition-colors duration-200 text-sm">
                        <i class="fas fa-eye mr-1"></i>
                        View
                    </a>
                    <a href="{{ route('dashboard.scholars.edit', $scholar->id) }}" 
                       class="flex-1 bg-blue-600 text-white text-center py-2 px-3 rounded-lg hover:bg-blue-700 transition-colors duration-200 text-sm">
                        <i class="fas fa-edit mr-1"></i>
                        Edit
                    </a>
                    <button onclick="deleteScholar({{ $scholar->id }})" 
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
                <div class="w-20 h-20 rounded-full overflow-hidden ring-4 ring-green-500 ring-opacity-30 mb-4">
                    <img src="https://ui-avatars.com/api/?name=Scholar{{ $i }}&background=059669&color=ffffff" 
                         alt="Scholar {{ $i }}" 
                         class="w-full h-full object-cover">
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-1">Dr. Ahmad Al-Rashid {{ $i }}</h3>
                <p class="text-sm text-gray-600 arabic-text mb-2">د. أحمد الراشد {{ $i }}</p>
                <p class="text-xs text-gray-500 mb-3">Professor of Islamic Studies</p>
                
                <div class="w-full space-y-2 mb-4">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Specialization:</span>
                        <span class="font-medium text-gray-900">{{ ['Quran & Tafsir', 'Hadith Sciences', 'Islamic Jurisprudence', 'Islamic Creed'][$i % 4] }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Books:</span>
                        <span class="font-medium text-gray-900">{{ 5 + ($i * 3) }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Location:</span>
                        <span class="font-medium text-gray-900">{{ ['Mecca', 'Medina', 'Cairo', 'Damascus'][$i % 4] }}</span>
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
                    <button onclick="deleteScholar({{ $i }})" 
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
                <button class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 hover:bg-gray-50">16</button>
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
            <h3 class="text-lg font-medium text-gray-900 mb-2">Delete Scholar</h3>
            <p class="text-sm text-gray-500 mb-6">Are you sure you want to delete this scholar? This action cannot be undone.</p>
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

// Search and Filter Functionality
let currentDeleteId = null;

document.getElementById('searchInput').addEventListener('input', function() {
    // Implement search functionality
    console.log('Searching for:', this.value);
});

document.getElementById('specializationFilter').addEventListener('change', function() {
    // Implement specialization filter
    console.log('Filter by specialization:', this.value);
});

document.getElementById('statusFilter').addEventListener('change', function() {
    // Implement status filter
    console.log('Filter by status:', this.value);
});

// Delete Scholar Functionality
function deleteScholar(id) {
    currentDeleteId = id;
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
    currentDeleteId = null;
}

function confirmDelete() {
    if (currentDeleteId) {
        // Implement actual delete functionality
        console.log('Deleting scholar with ID:', currentDeleteId);
        
        // Example: Make AJAX request to delete
        // fetch(`/dashboard/scholars/${currentDeleteId}`, {
        //     method: 'DELETE',
        //     headers: {
        //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        //     }
        // }).then(response => {
        //     if (response.ok) {
        //         // Remove row from table or reload page
        //         location.reload();
        //     }
        // });
        
        closeDeleteModal();
    }
}

// Toggle Scholar Status
function toggleScholarStatus(id) {
    // Implement status toggle functionality
    console.log('Toggling status for scholar ID:', id);
    
    // Example: Make AJAX request to toggle status
    // fetch(`/dashboard/scholars/${id}/toggle-status`, {
    //     method: 'POST',
    //     headers: {
    //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    //     }
    // }).then(response => {
    //     if (response.ok) {
    //         location.reload();
    //     }
    // });
}

// Export Scholars
function exportScholars() {
    // Implement export functionality
    console.log('Exporting scholars...');
    
    // Example: Redirect to export endpoint
    // window.location.href = '/dashboard/scholars/export';
}

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