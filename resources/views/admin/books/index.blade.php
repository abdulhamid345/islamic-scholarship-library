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
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
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
                                <div class="ml-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $book->title }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $book->scholar->name }}</div>
                            <div class="text-xs text-gray-500">{{ $book->published_year }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                {{ $book->category->name }}
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