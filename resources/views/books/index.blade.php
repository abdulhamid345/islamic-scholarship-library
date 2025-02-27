<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Books') }}
            </h2>
            <a href="{{ route('dashboard.books.create') }}"
                class="bg-blue-500 hover:bg-blue-600 text-black font-bold py-2 px-4 rounded">
                Create Book
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div class="bg-green-500 text-black p-2 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($books as $book)
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">Book Name:
                                    {{ $book->title }}</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Author:
                                    {{ $book->scholar->name }}</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Description:
                                    {{ Str::limit($book->description, 100, '...') }}
                                </p>

                                <div class="flex justify-between items-center mt-4">
                                    <a href="{{ route('dashboard.books.edit', $book->id) }}"
                                        class="text-blue-500 hover:text-blue-700 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M17.414 2.586a2 2 0 00-2.828 0L8 9.172V11h1.828l6.586-6.586a2 2 0 000-2.828zM4 13v3h3l8.586-8.586-3-3L4 13z" />
                                        </svg>
                                        Edit
                                    </a>

                                    <form action="{{ route('dashboard.books.destroy', $book->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?');" class="flex items-center">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-500 hover:text-red-700 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2h-1V3a1 1 0 00-1-1H6zm0 5H4v10a2 2 0 002 2h8a2 2 0 002-2V7H6zM8 9a1 1 0 112 0v6a1 1 0 11-2 0V9zm4 0a1 1 0 112 0v6a1 1 0 11-2 0V9z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
