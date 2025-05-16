<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Categories') }}
            </h2>
            <div class="flex gap-3 flex-col sm:flex-row sm:items-center">
                <form method="GET" action="{{ route('dashboard.category.index') }}">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Search categories..."
                        class="rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                </form>
                <a href="{{ route('dashboard.category.create') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition">
                    + Create Category
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                
                @if (session('success'))
                    <div class="bg-green-500 text-white p-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($categories->isEmpty())
                    <div class="text-center text-gray-500 dark:text-gray-400 py-10">
                        No categories found.
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($categories as $category)
                            <div class="bg-gray-100 dark:bg-gray-700 p-5 rounded-lg shadow-md">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">
                                    {{ $category->name }}
                                </h3>

                                <div class="flex justify-between items-center mt-4">
                                    <a href="{{ route('dashboard.category.edit', $category->id) }}"
                                        class="text-blue-600 hover:text-blue-800 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M17.414 2.586a2 2 0 00-2.828 0L8 9.172V11h1.828l6.586-6.586a2 2 0 000-2.828zM4 13v3h3l8.586-8.586-3-3L4 13z" />
                                        </svg>
                                        Edit
                                    </a>

                                    <form action="{{ route('dashboard.category.destroy', $category->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this category?');"
                                        class="flex items-center">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:text-red-800 flex items-center">
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
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
