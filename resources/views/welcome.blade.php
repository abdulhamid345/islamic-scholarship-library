@extends('layouts.frontend')

@section('title', 'Welcome to the Library')

@section('styles')
<style>
    .scholar-card {
        transition: all 0.3s ease;
    }
    .scholar-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    .fade-in {
        animation: fadeIn 0.5s ease-in;
    }
    .book-card {
        transition: all 0.3s ease;
    }
    .book-card:hover {
        transform: scale(1.02);
    }
    .search-bar {
        transition: all 0.3s ease;
    }
    .search-bar:focus {
        box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.3);
    }
    .arabic-calligraphy {
        font-family: 'Noto Naskh Arabic', serif;
    }
    .hero-pattern {
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
</style>
@endsection
<div id="app">
    
      
    
  <!-- Hero Section -->
  <div class="bg-green-700 text-white py-20 hero-pattern relative">
    <div class="max-w-7xl mx-auto px-4">
      <div class="text-center">
        <h1 class="text-5xl font-bold mb-6 fade-in">Discover the Rich Islamic Heritage</h1>
        <p class="text-xl mb-8">Access the timeless works of great scholars from the Sokoto Caliphate</p>
        <div class="max-w-xl mx-auto">
          <input type="text" 
                 v-model="searchQuery" 
                 placeholder="Search for books, scholars, or topics..." 
                 class="search-bar w-full px-6 py-3 rounded-lg text-gray-800 bg-white/90 backdrop-blur-sm">
        </div>
      </div>
    </div>
  </div>

  <!-- Scholars Section -->
  <div class="max-w-7xl mx-auto px-4 py-16">
    <h2 class="text-3xl font-bold mb-8 text-center">Renowned Scholars</h2>
    <div class="grid md:grid-cols-3 gap-8">
        @foreach ($scholars as $scholar)
            <div class="scholar-card bg-white rounded-lg shadow-md p-6 text-center">
                <div class="h-32 w-32 mx-auto mb-4 rounded-full bg-green-100 flex items-center justify-center">
                    <span class="text-4xl text-green-800 arabic-calligraphy">
                        {{ strtoupper(substr($scholar->name, 0, 1)) }}  
                    </span>
                </div>
                <h3 class="text-xl font-bold mb-2">{{ $scholar->name }}</h3>
                <p class="text-gray-600 mb-4">{{ $scholar->biography }}</p>
                <a href="{{ route('works', ['id' => $scholar->id]) }}" 
                   class="inline-block bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-colors">
                    View Works
                </a>
            </div>
        @endforeach
    </div>
</div>


  
<div class="bg-gray-100 py-16">
  <div class="max-w-7xl mx-auto px-4">
      <h2 class="text-3xl font-bold mb-8 text-center">Featured Books</h2>
      <div class="grid md:grid-cols-4 gap-6">
          @foreach ($books as $book)
              <div class="book-card bg-white rounded-lg shadow-md p-4">
                  <div class="aspect-w-3 aspect-h-4 mb-4">
                      <div class="bg-green-50 h-48 rounded-lg flex items-center justify-center">
                          <svg class="w-16 h-16 text-green-800" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M4 19.5C4 18.837 4.26339 18.2011 4.73223 17.7322C5.20107 17.2634 5.83696 17 6.5 17H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M6.5 2H20V22H6.5C5.83696 22 5.20107 21.7366 4.73223 21.2678C4.26339 20.7989 4 20.163 4 19.5V4.5C4 3.83696 4.26339 3.20107 4.73223 2.73223C5.20107 2.26339 5.83696 2 6.5 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>
                      </div>
                  </div>
                  <h3 class="font-bold mb-2">{{ $book->title }}</h3>
                  <p class="text-sm text-gray-600 mb-2">{{ $book->author }}</p>
                  <div class="flex justify-between items-center">
                      <span class="text-sm text-gray-500">Downloads: {{ $book->downloads }}</span>
                      <a href="{{ route('books.show', $book->id) }}" class="text-green-600 hover:text-green-800 transition-colors flex items-center">
                          View Details
                          <svg class="w-4 h-4 ml-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>
                      </a>
                  </div>
              </div>
          @endforeach
      </div>
  </div>
</div>

</div>

@section('content')
    
@endsection




{{-- 
    <body class="bg-gray-50">
    
    
    
  </body>
    </html> --}}