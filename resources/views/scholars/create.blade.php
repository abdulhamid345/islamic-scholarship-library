<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Scholar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('scholars.store') }}" method="POST">
                        @csrf
                        
                        <!-- Name Field -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>

                        <!-- About Field -->
                        <div class="mb-4">
                            <label for="about" class="block text-sm font-medium text-gray-700">About</label>
                            <textarea name="about" id="about" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                        </div>

                        <!-- Biography Field -->
                        <div class="mb-4">
                            <label for="biography" class="block text-sm font-medium text-gray-700">Biography</label>
                            <input type="text" id="biography" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                        </div>

                        <!-- Students Field -->
                        <div class="mb-4">
                            <label for="students" class="block text-sm font-medium text-gray-700">Students</label>
                            <input type="text" id="students" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>

                         <!-- Categories Field -->
                         <div class="mb-4">
                            <label for="categories" class="block text-sm font-medium text-gray-700">Categories</label>
                            <select name="categories[]" id="categories" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" multiple>
                                <option value="fiqh">Fiqh</option>
                                <option value="hadith">Hadith</option>
                                <option value="tafsir">Tafsir</option>
                                <option value="islamic philosophy">Islamic Philosophy</option>
                                <option value="islamic history">Islamic History</option>
                            </select>
                            <small class="text-gray-500">Hold down the Ctrl (Windows) or Command (Mac) key to select multiple options.</small>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>

                        <!-- Published Works Field -->
                        <div class="mb-4">
                            <label for="published_works" class="block text-sm font-medium text-gray-700">Published Works</label>
                            <textarea name="published_works" id="published_works" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>  
                        </div>
                                                
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
