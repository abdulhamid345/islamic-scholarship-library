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
                    <form action="{{ route('dashboard.scholars.store') }}" method="POST">
                        @csrf

                        <!-- Name Field -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>

                        <!-- Biography Field -->
                        <div class="mb-4">
                            <label for="biography" class="block text-sm font-medium text-gray-700">Biography</label>
                            <input type="text" name="biography" id="biography"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                        <!-- Categories Field -->
                        <div class="mb-4">
                            <label for="categories" class="block text-sm font-medium text-gray-700">Categories</label>
                            <select name="categories[]" id="categories"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" multiple>
                                <option value="fiqh">Fiqh</option>
                                <option value="hadith">Hadith</option>
                                <option value="tafsir">Tafsir</option>
                                <option value="islamic philosophy">Islamic Philosophy</option>
                                <option value="islamic history">Islamic History</option>
                            </select>
                            <small class="text-gray-500">Hold down the Ctrl (Windows) or Command (Mac) key to select
                                multiple options.</small>
                        </div>

                        <!-- Published Works Field -->
                        <div class="mb-4">
                            <label for="published_works" class="block text-sm font-medium text-gray-700">Published
                                Works</label>
                            <input type="text" name="published_works" id="published_works"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="years_active" class="block text-sm font-medium">Years Active</label>
                            <input type="text" id="years_active" name="years_active"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
