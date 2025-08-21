{{-- resources/views/dashboard/categories/create.blade.php --}}
@extends('layouts.dashboard')

@section('title', 'Create New Category')

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
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Add New Category</h1>
                <p class="text-gray-600">Create a new book category for organization</p>
            </div>
            <div class="flex items-center space-x-2">
                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full flex items-center justify-center shadow-lg">
                    <i class="fas fa-folder-plus text-white text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Container -->
    <div class="w-full mx-auto">
        <form action="{{ route('dashboard.category.store') }}" method="POST" id="categoryForm">
            @csrf
            
            <!-- Basic Information Section -->
            <div class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg mb-6">
                <div class="flex items-center mb-6">
                    <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-emerald-600 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-folder text-white"></i>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-900">Category Information</h2>
                </div>

                <div class="space-y-6">
                    <!-- Category Name -->
                    <div class="form-group">
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-tag text-green-500 mr-2"></i>
                            Category Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               value="{{ old('name') }}"
                               class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 @error('name') border-red-500 @enderror"
                               placeholder="e.g., Quran & Tafsir, Islamic History"
                               required>
                        @error('name')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                        <p class="mt-2 text-sm text-gray-500">Enter a clear, descriptive name for the category</p>
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-align-left text-green-500 mr-2"></i>
                            Description
                        </label>
                        <textarea id="description" 
                                  name="description" 
                                  rows="4"
                                  class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 @error('description') border-red-500 @enderror"
                                  placeholder="Describe what types of books belong in this category...">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                        <p class="mt-2 text-sm text-gray-500">Provide a brief description of this category (optional)</p>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg">
                <div class="flex flex-col sm:flex-row gap-3 justify-end">
                    <a href="{{ route('dashboard.category.index') }}" 
                       class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 shadow-sm text-sm font-medium rounded-xl text-gray-700 bg-white hover:bg-gray-50 transition-all duration-200">
                        <i class="fas fa-times mr-2"></i>
                        Cancel
                    </a>
                    <button type="submit" 
                            class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white text-sm font-semibold rounded-xl shadow-lg hover:from-green-700 hover:to-emerald-700 transform hover:scale-105 transition-all duration-200">
                        <i class="fas fa-plus mr-2"></i>
                        Create Category
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('categoryForm');
    const nameInput = document.getElementById('name');
    
    // Form validation
    form.addEventListener('submit', function(e) {
        if (!nameInput.value.trim()) {
            e.preventDefault();
            nameInput.focus();
            alert('Please enter a category name');
            return;
        }
    });
});
</script>
@endsection