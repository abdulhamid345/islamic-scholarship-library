{{-- resources/views/dashboard/categories/show.blade.php --}}
@extends('layouts.dashboard')

@section('title', 'Category Details')

@section('content')
<div class="p-6 space-y-6">
    <!-- Page Header -->
    <div class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div>
                <div class="flex items-center space-x-3 mb-2">
                    <a href="{{ route('dashboard.category.index') }}" 
                       class="inline-flex items-center text-gray-500 hover:text-gray-700 transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to Categories
                    </a>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $category->name }}</h1>
                <p class="text-gray-600">Category details and information</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('dashboard.category.edit', $category->id) }}" 
                   class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-xl hover:bg-blue-700 transition-colors">
                    <i class="fas fa-edit mr-2"></i>
                    Edit
                </a>
            </div>
        </div>
    </div>

    <!-- Category Details -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Category Information -->
            <div class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg">
                <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-folder text-green-500 mr-2"></i>
                    Category Information
                </h2>
                <div class="space-y-4">
                    <div>
                        <label class="text-sm font-medium text-gray-500">Name</label>
                        <p class="text-lg font-semibold text-gray-900 mt-1">{{ $category->name }}</p>
                    </div>
                    @if($category->description)
                    <div>
                        <label class="text-sm font-medium text-gray-500">Description</label>
                        <p class="text-gray-700 mt-1">{{ $category->description }}</p>
                    </div>
                    @endif
                    <div>
                        <label class="text-sm font-medium text-gray-500">Slug</label>
                        <p class="text-gray-900 mt-1 font-mono text-sm">{{ $category->slug }}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-500">Created</label>
                        <p class="text-gray-900 mt-1">{{ $category->created_at->format('M d, Y') }}</p>
                    </div>
                </div>
            </div>

            <!-- Books in this Category -->
            @if($category->books && $category->books->count() > 0)
            <div class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg">
                <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-book text-green-500 mr-2"></i>
                    Books ({{ $category->books->count() }})
                </h2>
                <div class="space-y-3">
                    @foreach($category->books->take(10) as $book)
                    <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg hover:bg-gray-100 transition-colors">
                        <a href="{{ route('dashboard.books.show', $book->id) }}" 
                           class="block text-green-600 hover:text-green-700 font-medium">
                            {{ $book->title }}
                        </a>
                        @if($book->scholar)
                        <p class="text-sm text-gray-500 mt-1">by {{ $book->scholar->name }}</p>
                        @endif
                    </div>
                    @endforeach
                    @if($category->books->count() > 10)
                    <p class="text-sm text-gray-500 text-center">And {{ $category->books->count() - 10 }} more books...</p>
                    @endif
                </div>
            </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Quick Actions -->
            <div class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <a href="{{ route('dashboard.category.edit', $category->id) }}" 
                       class="w-full flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Category
                    </a>
                    <form action="{{ route('dashboard.category.destroy', $category->id) }}" method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this category?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="w-full flex items-center justify-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                            <i class="fas fa-trash mr-2"></i>
                            Delete Category
                        </button>
                    </form>
                </div>
            </div>

            <!-- Statistics -->
            <div class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Statistics</h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Total Books</span>
                        <span class="font-semibold text-gray-900">{{ $category->books->count() ?? 0 }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

