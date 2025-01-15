<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Scholars') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">About</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Biography</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Published Works</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Students</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Categories</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($scholars as $scholar)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                    <td class="border border-gray-300 px-4 py-2">{{ $scholar->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $scholar->about ?? 'N/A' }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $scholar->biography ?? 'N/A' }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $scholar->published_works ?? 'N/A' }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        @if(!empty($scholar->students))
                                            {{ implode(', ', $scholar->students) }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        @if(!empty($scholar->categories))
                                            {{ implode(', ', $scholar->categories) }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2 flex space-x-2">
                                        <a href="{{ route('scholars.edit', $scholar) }}" class="text-blue-500 hover:text-blue-700">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('scholars.destroy', $scholar) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    
</x-app-layout>
