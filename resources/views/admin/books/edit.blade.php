{{-- resources/views/dashboard/books/edit.blade.php --}}
@extends('layouts.dashboard')

@section('title', 'Edit Book')

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
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Edit Book</h1>
                <p class="text-gray-600">Update book information</p>
            </div>
            <div class="flex items-center space-x-2">
                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full flex items-center justify-center shadow-lg">
                    <i class="fas fa-edit text-white text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Container -->
    <div class="w-full mx-auto">
        <form action="{{ route('dashboard.books.update', $book->id) }}" method="POST" enctype="multipart/form-data" id="bookForm">
            @csrf
            @method('POST')
            
            <!-- Book Information Section -->
            <div class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg mb-6">
                <div class="flex items-center mb-6">
                    <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-emerald-600 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-book text-white"></i>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-900">Book Information</h2>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Book Title -->
                    <div class="lg:col-span-2">
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-heading text-green-500 mr-2"></i>
                            Book Title <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               id="title" 
                               name="title" 
                               value="{{ old('title', $book->title) }}"
                               class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 @error('title') border-red-500 @enderror"
                               placeholder="Enter the book title"
                               required>
                        @error('title')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Scholar Selection -->
                    <div>
                        <label for="scholar_id" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-user-graduate text-green-500 mr-2"></i>
                            Author/Scholar <span class="text-red-500">*</span>
                        </label>
                        <select id="scholar_id" 
                                name="scholar_id" 
                                class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 @error('scholar_id') border-red-500 @enderror"
                                required>
                            <option value="">Select an author/scholar</option>
                            @foreach($scholars ?? [] as $scholar)
                                <option value="{{ $scholar->id }}" {{ old('scholar_id', $book->scholar_id) == $scholar->id ? 'selected' : '' }}>
                                    {{ $scholar->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('scholar_id')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Category Selection -->
                    <div>
                        <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-folder-open text-green-500 mr-2"></i>
                            Category <span class="text-red-500">*</span>
                        </label>
                        <select id="category_id" 
                                name="category_id" 
                                class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 @error('category_id') border-red-500 @enderror"
                                required>
                            <option value="">Select a category</option>
                            @foreach($categories ?? [] as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="lg:col-span-2">
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-align-left text-green-500 mr-2"></i>
                            Description
                        </label>
                        <textarea id="description" 
                                  name="description" 
                                  rows="4"
                                  class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 @error('description') border-red-500 @enderror"
                                  placeholder="Brief description of the book content, themes, or significance...">{{ old('description', $book->description) }}</textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- File Upload Section -->
            <div class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg mb-6">
                <div class="flex items-center mb-6">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-cloud-upload-alt text-white"></i>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-900">Book File</h2>
                </div>

                <div class="form-group">
                    <label for="file" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-file-pdf text-blue-500 mr-2"></i>
                        Upload New Book File (Optional)
                    </label>
                    
                    @if($book->file)
                        <div class="mb-4 p-4 bg-gray-50 border border-gray-200 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-file text-white text-sm"></i>
                                    </div>
                                    <div>
                                        <div class="font-medium text-gray-900">Current File</div>
                                        <div class="text-sm text-gray-500">{{ basename($book->file) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    <!-- File Upload Area -->
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-green-500 transition-colors duration-200" id="fileDropArea">
                        <div class="space-y-4">
                            <div class="flex justify-center">
                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-cloud-upload-alt text-gray-400 text-2xl"></i>
                                </div>
                            </div>
                            <div>
                                <input type="file" 
                                       id="file" 
                                       name="file" 
                                       class="hidden"
                                       accept=".pdf,.doc,.docx,.epub,.jpg,.jpeg,.png">
                                <label for="file" class="cursor-pointer">
                                    <span class="text-green-600 font-medium hover:text-green-500">Click to upload</span>
                                    <span class="text-gray-500"> or drag and drop</span>
                                </label>
                            </div>
                            <p class="text-sm text-gray-500">
                                Supported formats: PDF, DOC, DOCX, EPUB, JPG, PNG (Max size: 100MB)
                            </p>
                        </div>
                    </div>
                    
                    <!-- File Info Display -->
                    <div id="fileInfo" class="hidden mt-4 p-4 bg-green-50 border border-green-200 rounded-lg">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-file text-white text-sm"></i>
                                </div>
                                <div>
                                    <div class="font-medium text-gray-900" id="fileName"></div>
                                    <div class="text-sm text-gray-500" id="fileSize"></div>
                                </div>
                            </div>
                            <button type="button" id="removeFile" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    
                    @error('file')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <!-- Form Actions -->
            <div class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg">
                <div class="flex flex-col sm:flex-row gap-3 justify-end">
                    <a href="{{ route('dashboard.books.index') }}" 
                       class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 shadow-sm text-sm font-medium rounded-xl text-gray-700 bg-white hover:bg-gray-50 transition-all duration-200">
                        <i class="fas fa-times mr-2"></i>
                        Cancel
                    </a>
                    <button type="submit" 
                            class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white text-sm font-semibold rounded-xl shadow-lg hover:from-green-700 hover:to-emerald-700 transform hover:scale-105 transition-all duration-200">
                        <i class="fas fa-save mr-2"></i>
                        Update Book
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('file');
    const fileDropArea = document.getElementById('fileDropArea');
    const fileInfo = document.getElementById('fileInfo');
    const fileName = document.getElementById('fileName');
    const fileSize = document.getElementById('fileSize');
    const removeFileBtn = document.getElementById('removeFile');

    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    function displayFileInfo(file) {
        fileName.textContent = file.name;
        fileSize.textContent = formatFileSize(file.size);
        fileInfo.classList.remove('hidden');
        fileDropArea.classList.add('border-green-500', 'bg-green-50');
    }

    function hideFileInfo() {
        fileInfo.classList.add('hidden');
        fileDropArea.classList.remove('border-green-500', 'bg-green-50');
        fileInput.value = '';
    }

    fileInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            displayFileInfo(file);
        }
    });

    removeFileBtn.addEventListener('click', function() {
        hideFileInfo();
    });

    fileDropArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        this.classList.add('border-green-500', 'bg-green-50');
    });

    fileDropArea.addEventListener('dragleave', function(e) {
        e.preventDefault();
        if (!fileInput.files[0]) {
            this.classList.remove('border-green-500', 'bg-green-50');
        }
    });

    fileDropArea.addEventListener('drop', function(e) {
        e.preventDefault();
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files;
            displayFileInfo(files[0]);
        }
    });
});
</script>
@endsection
