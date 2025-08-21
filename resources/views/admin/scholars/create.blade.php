{{-- resources/views/dashboard/scholars/create.blade.php --}}
@extends('layouts.dashboard')

@section('title', 'Create New Scholar')

@section('content')
    <div class="p-6 space-y-6">
        <!-- Page Header -->
        <div class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div>
                    <div class="flex items-center space-x-3 mb-2">
                        <a href="{{ route('dashboard.scholars.index') }}"
                            class="inline-flex items-center text-gray-500 hover:text-gray-700 transition-colors">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Back to Scholars
                        </a>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Add New Scholar</h1>
                    <p class="text-gray-600">Create a new scholar profile with detailed information</p>
                </div>
                <div class="flex items-center space-x-2">
                    <div
                        class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full flex items-center justify-center shadow-lg">
                        <i class="fas fa-user-plus text-white text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Container -->
        <div class=" gap-6">
            <!-- Main Form -->
            <div class="lg:col-span-2">
                <form action="{{ route('dashboard.scholars.store') }}" method="POST" enctype="multipart/form-data"
                    id="scholarForm">
                    @csrf

                    <!-- Basic Information Section -->
                    <div
                        class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg mb-6">
                        <div class="flex items-center mb-6">
                            <div
                                class="w-10 h-10 bg-gradient-to-r from-green-500 to-emerald-600 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-user text-white"></i>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-900">Basic Information</h2>
                        </div>

                        <div class="space-y-6">
                            <!-- Scholar Name -->
                            <div class="form-group">
                                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-user text-green-500 mr-2"></i>
                                    Scholar Name <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                                        class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 @error('name') border-red-500 @enderror"
                                        placeholder="Enter scholar's full name" required>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                        <div class="text-gray-400" id="nameStatus">
                                            <i class="fas fa-pencil-alt"></i>
                                        </div>
                                    </div>
                                </div>
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                                <p class="mt-2 text-sm text-gray-500">Enter the scholar's full name as it should appear
                                    publicly</p>
                            </div>

                            <!-- Years Active -->
                            <div class="form-group">
                                <label for="years_active" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-calendar-alt text-green-500 mr-2"></i>
                                    Years Active
                                </label>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <input type="number" id="year_from" name="year_from" value="{{ old('year_from') }}"
                                            class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200"
                                            placeholder="From (e.g., 1980)" min="1400" max="{{ date('Y') }}">
                                        <label class="text-xs text-gray-500 mt-1">From Year</label>
                                    </div>
                                    <div>
                                        <input type="number" id="year_to" name="year_to" value="{{ old('year_to') }}"
                                            class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200"
                                            placeholder="To (e.g., {{ date('Y') }})" min="1400"
                                            max="{{ date('Y') + 10 }}">
                                        <label class="text-xs text-gray-500 mt-1">To Year (leave empty if still
                                            active)</label>
                                    </div>
                                </div>
                                <input type="hidden" id="years_active" name="years_active"
                                    value="{{ old('years_active') }}">
                                @error('years_active')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                                <p class="mt-2 text-sm text-gray-500">Specify the years the scholar has been active in their
                                    field</p>
                            </div>
                        </div>
                    </div>

                    <!-- Biography Section -->
                    <div
                        class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg mb-6">
                        <div class="flex items-center mb-6">
                            <div
                                class="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-file-alt text-white"></i>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-900">Biography</h2>
                        </div>

                        <div class="form-group">
                            <label for="biography" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-book-open text-blue-500 mr-2"></i>
                                Scholar Biography
                            </label>

                            <!-- Rich Text Editor -->
                            <div id="biographyEditor"
                                class="min-h-[200px] border-l border-r border-b border-gray-300 rounded-b-xl p-4 focus-within:ring-2 focus-within:ring-green-500 focus-within:border-green-500 transition-all duration-200 @error('biography') border-red-500 @enderror"
                                contenteditable="true"
                                data-placeholder="Write the scholar's biography here... Include their education, achievements, specializations, and contributions to Islamic scholarship.">
                                {!! old('biography') !!}
                            </div>

                            <textarea id="biography" name="biography" class="hidden">{{ old('biography') }}</textarea>

                            @error('biography')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                            <p class="mt-2 text-sm text-gray-500">Provide a comprehensive biography of the scholar including
                                their education, achievements, and contributions</p>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div
                        class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg">
                        <div class="flex flex-col sm:flex-row gap-3 justify-end">
                            <a href="{{ route('dashboard.scholars.index') }}"
                                class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 shadow-sm text-sm font-medium rounded-xl text-gray-700 bg-white hover:bg-gray-50 transition-all duration-200">
                                <i class="fas fa-times mr-2"></i>
                                Cancel
                            </a>
                            <button type="submit" id="publishScholar"
                                class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white text-sm font-semibold rounded-xl shadow-lg hover:from-green-700 hover:to-emerald-700 transform hover:scale-105 transition-all duration-200">
                                <i class="fas fa-plus mr-2"></i>
                                Create Scholar
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <style>
        .toolbar-btn {
            @apply p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-200 rounded transition-colors duration-200;
        }

        .toolbar-btn.active {
            @apply bg-green-100 text-green-700;
        }

        #biographyEditor {
            outline: none;
        }

        #biographyEditor:empty:before {
            content: attr(data-placeholder);
            color: #9CA3AF;
            font-style: italic;
        }

        #biographyEditor:focus:before {
            display: none;
        }

        .form-group {
            @apply relative;
        }

        .form-group input:focus+.absolute .fas,
        .form-group textarea:focus+.absolute .fas {
            @apply text-green-500;
        }

        .preview-card {
            transition: all 0.3s ease;
        }

        .preview-card:hover {
            @apply bg-green-50 border border-green-200;
        }
    </style>
@endsection
