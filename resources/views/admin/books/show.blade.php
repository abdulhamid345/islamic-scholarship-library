{{-- resources/views/dashboard/books/show.blade.php --}}
@extends('layouts.dashboard')

@section('title', 'Book Details')

@section('content')
<div class="p-6 space-y-6">
    <!-- Page Header -->
    <div class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div>
                <div class="flex items-center space-x-3 mb-2">
                    <a href="{{ route('dashboard.books.index') }}" 
                       class="inline-flex items-center text-gray-500 hover:text-gray-700 transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to Books
                    </a>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $book->title }}</h1>
                <p class="text-gray-600">Book details and information</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('dashboard.books.edit', $book->id) }}" 
                   class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-xl hover:bg-blue-700 transition-colors">
                    <i class="fas fa-edit mr-2"></i>
                    Edit
                </a>
            </div>
        </div>
    </div>

    <!-- Book Details -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Book Information -->
            <div class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg">
                <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-book text-green-500 mr-2"></i>
                    Book Information
                </h2>
                <div class="space-y-4">
                    <div>
                        <label class="text-sm font-medium text-gray-500">Title</label>
                        <p class="text-lg font-semibold text-gray-900 mt-1">{{ $book->title }}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-500">Description</label>
                        <p class="text-gray-700 mt-1">{{ $book->description ?? 'No description available.' }}</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm font-medium text-gray-500">Author/Scholar</label>
                            <p class="text-gray-900 mt-1 font-medium">{{ $book->scholar->name ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-500">Category</label>
                            <p class="text-gray-900 mt-1 font-medium">{{ $book->category->name ?? 'N/A' }}</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm font-medium text-gray-500">Downloads</label>
                            <p class="text-gray-900 mt-1 font-medium">{{ number_format($book->download_count ?? 0) }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-500">Created</label>
                            <p class="text-gray-900 mt-1">{{ $book->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- File Information -->
            @if($book->file)
            <div class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg">
                <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-file text-blue-500 mr-2"></i>
                    File Information
                </h2>
                <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center">
                                <i class="fas fa-file text-white"></i>
                            </div>
                            <div>
                                <div class="font-medium text-gray-900">{{ basename($book->file) }}</div>
                                <div class="text-sm text-gray-500">File uploaded</div>
                            </div>
                        </div>
                        @php
                            $fileUrl = \Illuminate\Support\Facades\Storage::url($book->file);
                        @endphp
                        <a href="{{ $fileUrl }}" target="_blank" 
                           class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-lg hover:bg-green-700 transition-colors">
                            <i class="fas fa-download mr-2"></i>
                            Download
                        </a>
                    </div>
                </div>
            </div>
            @endif
            @endif
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Quick Actions -->
            <div class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <a href="{{ route('dashboard.books.edit', $book->id) }}" 
                       class="w-full flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Book
                    </a>
                    <form action="{{ route('dashboard.books.destroy', $book->id) }}" method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this book?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="w-full flex items-center justify-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                            <i class="fas fa-trash mr-2"></i>
                            Delete Book
                        </button>
                    </form>
                </div>
            </div>

            <!-- Related Information -->
            <div class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Related Information</h3>
                <div class="space-y-4">
                    @if($book->scholar)
                    <div>
                        <label class="text-sm font-medium text-gray-500">Scholar</label>
                        <a href="{{ route('dashboard.scholars.show', $book->scholar->id) }}" 
                           class="block text-green-600 hover:text-green-700 mt-1 font-medium">
                            {{ $book->scholar->name }}
                        </a>
                    </div>
                    @endif
                    @if($book->category)
                    <div>
                        <label class="text-sm font-medium text-gray-500">Category</label>
                        <a href="{{ route('dashboard.category.show', $book->category->id) }}" 
                           class="block text-green-600 hover:text-green-700 mt-1 font-medium">
                            {{ $book->category->name }}
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

