{{-- resources/views/dashboard/scholars/edit.blade.php --}}
@extends('layouts.dashboard')

@section('title', 'Edit Scholar')

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
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Edit Scholar</h1>
                <p class="text-gray-600">Update scholar information</p>
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
        <form action="{{ route('dashboard.scholars.update', $scholar->id) }}" method="POST" enctype="multipart/form-data" id="scholarForm">
            @csrf
            @method('POST')

            <!-- Basic Information Section -->
            <div class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg mb-6">
                <div class="flex items-center mb-6">
                    <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-emerald-600 rounded-lg flex items-center justify-center mr-3">
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
                            <input type="text" id="name" name="name" value="{{ old('name', $scholar->name) }}"
                                class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 @error('name') border-red-500 @enderror"
                                placeholder="Enter scholar's full name" required>
                        </div>
                        @error('name')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Years Active -->
                    <div class="form-group">
                        <label for="years_active" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-calendar-alt text-green-500 mr-2"></i>
                            Years Active
                        </label>
                        @php
                            $years = explode(' - ', $scholar->years_active ?? '');
                            $yearFrom = old('year_from', $years[0] ?? '');
                            $yearTo = old('year_to', $years[1] ?? '');
                        @endphp
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <input type="number" id="year_from" name="year_from" value="{{ $yearFrom }}"
                                    class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200"
                                    placeholder="From (e.g., 1980)" min="1400" max="{{ date('Y') }}">
                                <label class="text-xs text-gray-500 mt-1">From Year</label>
                            </div>
                            <div>
                                <input type="number" id="year_to" name="year_to" value="{{ $yearTo }}"
                                    class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200"
                                    placeholder="To (e.g., {{ date('Y') }})" min="1400"
                                    max="{{ date('Y') + 10 }}">
                                <label class="text-xs text-gray-500 mt-1">To Year (leave empty if still active)</label>
                            </div>
                        </div>
                        <input type="hidden" id="years_active" name="years_active" value="{{ old('years_active', $scholar->years_active) }}">
                        @error('years_active')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Biography Section -->
            <div class="glass-effect rounded-2xl p-6 border border-white border-opacity-20 backdrop-blur-xl shadow-lg mb-6">
                <div class="flex items-center mb-6">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mr-3">
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
                        class="min-h-[200px] border-l border-r border-b rounded-b-xl p-4 focus-within:ring-2 focus-within:ring-green-500 focus-within:border-green-500 transition-all duration-200 {{ $errors->has('biography') ? 'border-red-500' : 'border-gray-300' }}"
                        contenteditable="true"
                        data-placeholder="Write the scholar's biography here...">
                        {!! old('biography', $scholar->biography) !!}
                    </div>

                    <textarea id="biography" name="biography" class="hidden">{{ old('biography', $scholar->biography) }}</textarea>
                    @error('biography')
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
                    <a href="{{ route('dashboard.scholars.index') }}"
                        class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 shadow-sm text-sm font-medium rounded-xl text-gray-700 bg-white hover:bg-gray-50 transition-all duration-200">
                        <i class="fas fa-times mr-2"></i>
                        Cancel
                    </a>
                    <button type="submit"
                        class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white text-sm font-semibold rounded-xl shadow-lg hover:from-green-700 hover:to-emerald-700 transform hover:scale-105 transition-all duration-200">
                        <i class="fas fa-save mr-2"></i>
                        Update Scholar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('scholarForm');
    const biographyEditor = document.getElementById('biographyEditor');
    const biographyInput = document.getElementById('biography');

    form.addEventListener('submit', function(e) {
        biographyInput.value = biographyEditor.innerHTML;
    });

    biographyEditor.addEventListener('input', function() {
        biographyInput.value = this.innerHTML;
    });
});
</script>

<style>
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
</style>
@endsection
