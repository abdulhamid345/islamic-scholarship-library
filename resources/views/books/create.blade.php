<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" id="title" name="title" class="block mt-1 w-full text-black-500" required>
                        </div>

                        <div class="mb-4">
                            <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                            <input type="text" id="author" name="author" class="block mt-1 w-full text-black-500" required>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea id="description" name="description" rows="4" class="block mt-1 w-full text-black-500"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="language" class="block text-sm font-medium text-gray-700">Language</label>
                            <input type="text" id="language" name="language" class="block mt-1 w-full text-black-500" required>
                        </div>

                        <div class="mb-4">
                            <label for="categories" class="block text-sm font-medium text-gray-700">Category</label>
                            <select id="categories" name="categories" class="block mt-1 w-full text-black-500" required>
                                <option value="fiqh">Fiqh</option>
                                <option value="aqeedah">Aqeedah</option>
                                <option value="history">History</option>
                                <option value="poetry">Poetry</option>
                                <option value="philosophy">Philosophy</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="number_of_pages" class="block text-sm font-medium text-gray-700">Number of Pages</label>
                            <input type="number" id="number_of_pages" name="number_of_pages" class="block mt-1 w-full text-black-500" required>
                        </div>

                        <div class="mb-4">
                            <label for="year_written" class="block text-sm font-medium text-gray-700">Year Written</label>
                            <input type="number" id="year_written" name="year_written" class="block mt-1 w-full text-black-500" required>
                        </div>


                        <div class="mb-4">
                            <label for="file" class="block text-sm font-medium text-gray-700">Book File</label>
                            <input type="file" id="file" name="file" class="block mt-1 w-full text-black-500">
                        </div>

                        <div>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
