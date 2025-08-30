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

                </div>
                <div class="flex flex-col sm:flex-row gap-3">
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
            </div>
        </div>

        <!-- Table View -->
        <div id="tableView"
            class="glass-effect rounded-2xl border border-white border-opacity-20 backdrop-blur-xl shadow-lg overflow-hidden">
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
                                    <span>Created</span>
                                    <i class="fas fa-sort text-gray-400 cursor-pointer hover:text-gray-600"></i>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($categories ?? [] as $category)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-12 w-12">
                                            <div
                                                class="h-12 w-12 rounded-lg flex items-center justify-center 
                                        {{ $category->color ?? 'bg-gradient-to-br from-green-400 to-green-600' }} shadow-lg">
                                                <i class="{{ $category->icon ?? 'fas fa-book' }} text-white text-lg"></i>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-semibold text-gray-900">{{ $category->name }}</div>
                                            <div class="text-sm text-gray-500 arabic-text">{{ $category->name_arabic }}
                                            </div>
                                            @if ($category->parent)
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
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $category->created_at->format('M d, Y') }}</div>
                                    <div class="text-xs text-gray-500">{{ $category->created_at->diffForHumans() }}</div>
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
                                        <button onclick="deleteCategory({{ $category->id }})"
                                            class="text-red-600 hover:text-red-900 p-2 rounded-lg hover:bg-red-50 transition-all duration-200"
                                            title="Delete Category">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
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
                <h3 class="text-lg font-medium text-gray-900 mb-2">Delete Category</h3>
                <p class="text-sm text-gray-500 mb-6">Are you sure you want to delete this category? All associated books
                    will be moved to "Uncategorized".</p>
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
