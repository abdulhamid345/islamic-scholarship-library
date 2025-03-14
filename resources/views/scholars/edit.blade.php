<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Scholar
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-semibold mb-4">Edit Scholar</h2>

                    <form action="{{ route('dashboard.scholars.update', $scholar->id) }}" method="POST">
                        @csrf

                        {{-- Name --}}
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium">Name</label>
                            <input type="text" id="name" name="name"
                                value="{{ old('name', $scholar->name) }}"
                                class="mt-1 block w-full p-2 border rounded-lg bg-gray-100 dark:bg-gray-700 focus:ring-blue-500 focus:border-blue-500">
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Biography --}}
                        <div class="mb-4">
                            <label for="biography" class="block text-sm font-medium">Biography</label>
                            <textarea id="biography" name="biography" rows="4"
                                class="mt-1 block w-full p-2 border rounded-lg bg-gray-100 dark:bg-gray-700 focus:ring-blue-500 focus:border-blue-500">{{ old('biography', $scholar->biography) }}</textarea>
                            @error('biography')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Published Works --}}
                        <div class="mb-4">
                            <label for="published_works" class="block text-sm font-medium">Published Works</label>
                            <input type="text" id="published_works" name="published_works"
                                value="{{ old('published_works', $scholar->published_works) }}"
                                class="mt-1 block w-full p-2 border rounded-lg bg-gray-100 dark:bg-gray-700 focus:ring-blue-500 focus:border-blue-500">
                            @error('published_works')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Categories (Array) --}}
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

                        <div class="mb-4">
                            <label for="years_active" class="block text-sm font-medium">Years Active</label>
                            <input type="text" id="years_active" name="years_active"
                                value="{{ old('years_active', $scholar->years_active) }}"
                                class="mt-1 block w-full p-2 border rounded-lg bg-gray-100 dark:bg-gray-700 focus:ring-blue-500 focus:border-blue-500">
                            @error('years_active')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Submit Button --}}
                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-black rounded-lg hover:bg-blue-700">
                                Save Changes
                            </button>
                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
