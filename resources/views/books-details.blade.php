@extends('layouts.frontend')

@section('title', 'About the book')

@section('styles')
<style>
    .fade-in {
      animation: fadeIn 0.5s ease-in;
    }
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
    .book-details {
      transition: all 0.3s ease;
    }
    .hero-pattern {
      background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    </style>
@endsection

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">{{ $book->title }}</h1>
        
        <div class="flex flex-col md:flex-row items-center md:items-start">
            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" class="w-48 h-64 object-cover rounded-md shadow-md mb-4 md:mb-0 md:mr-6">
            
            <div class="flex-1">
                <p class="text-gray-700 mb-2"><strong>Author:</strong> {{ $book->author }}</p>
                <p class="text-gray-700 mb-2"><strong>Category:</strong> {{ $book->category->name }}</p>
                <p class="text-gray-700 mb-2"><strong>Downloads:</strong> {{ $book->downloads_count }}</p>
                
                <div class="mt-4">
                    <a href="{{ route('books.download', $book->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Download</a>
                </div>
            </div>
        </div>
        
        <div class="mt-6">
            <h2 class="text-xl font-semibold mb-2">Description</h2>
            <p class="text-gray-700">{{ $book->description }}</p>
        </div>
    </div>
</div>

@endsection