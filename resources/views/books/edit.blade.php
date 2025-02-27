<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('dashboard.books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" id="title" name="title" class="block mt-1 w-full text-black-500" required>
                        </div>
                    
                        <div class="mb-4">
                            <label for="scholar_id" class="block text-sm font-medium text-gray-700">Scholar</label>
                            <select id="scholar_id" name="scholar_id" class="block mt-1 w-full text-black-500" required>
                                <option value="">Select Scholar</option>
                                @foreach($scholars as $scholar)
                                    <option value="{{ $scholar->id }}">{{ $scholar->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <div class="mb-4">
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                            <select id="category_id" name="category_id" class="block mt-1 w-full text-black-500" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea id="description" name="description" rows="4" class="block mt-1 w-full text-black-500"></textarea>
                        </div>
                    
                        <div class="mb-4">
                            <label for="file" class="block text-sm font-medium text-gray-700">Book File</label>
                            <input type="file" id="file" name="file" class="block mt-1 w-full text-black-500">
                        </div>
                    
                        <div>
                            <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
