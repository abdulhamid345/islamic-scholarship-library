<html><head><base href="/" /><title>Yahaya Bawa Islamic Library</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
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
    <link href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic&display=swap" rel="stylesheet">
    </head>
    <body class="bg-gray-50">
    <div id="app">
      <!-- Navigation -->
      <nav class="bg-green-800 text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
          <div class="flex justify-between h-16">
            <div class="flex items-center">
              <a href="/" class="text-xl font-bold flex items-center">
                Yahaya Bawa Islamic Library
              </a>
            </div>
            <div class="flex items-center space-x-6">
              <a href="{{ route('all-books') }}" class="hover:text-green-200 transition-colors">Books</a>
              <a href="./scholars-page.html" class="hover:text-green-200 transition-colors">Scholars</a>
              <a href="{{ route('login') }}" class="hover:text-green-200 transition-colors">Login</a>
              <a href="{{ route('register') }}" class="bg-green-600 px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">Register</a>
            </div>
          </div>
        </div>
      </nav>
      
    
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
          <div v-for="scholar in scholars" 
               :key="scholar.id" 
               class="scholar-card bg-white rounded-lg shadow-md p-6 text-center">
            <div class="h-32 w-32 mx-auto mb-4 rounded-full bg-green-100 flex items-center justify-center">
              <span class="text-4xl text-green-800 arabic-calligraphy"> scholar.initial </span>
            </div>
            <h3 class="text-xl font-bold mb-2"> scholar.name </h3>
            <p class="text-gray-600 mb-4"> scholar.description </p>
            <a :href="{{ route('works') }}"    //TODO: Add scholar id and fetch dynamically
               class="inline-block bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-colors">
              View Works
            </a>
          </div>
        </div>
      </div>
    
      <!-- Featured Books Section -->
      <div class="bg-gray-100 py-16">
        <div class="max-w-7xl mx-auto px-4">
          <h2 class="text-3xl font-bold mb-8 text-center">Featured Books</h2>
          <div class="grid md:grid-cols-4 gap-6">
            <div v-for="book in featuredBooks" 
                 :key="book.id" 
                 class="book-card bg-white rounded-lg shadow-md p-4">
              <div class="aspect-w-3 aspect-h-4 mb-4">
                <div class="bg-green-50 h-48 rounded-lg flex items-center justify-center">
                  <svg class="w-16 h-16 text-green-800" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 19.5C4 18.837 4.26339 18.2011 4.73223 17.7322C5.20107 17.2634 5.83696 17 6.5 17H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6.5 2H20V22H6.5C5.83696 22 5.20107 21.7366 4.73223 21.2678C4.26339 20.7989 4 20.163 4 19.5V4.5C4 3.83696 4.26339 3.20107 4.73223 2.73223C5.20107 2.26339 5.83696 2 6.5 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </div>
              </div>
              <h3 class="font-bold mb-2"> book.title </h3>
              <p class="text-sm text-gray-600 mb-2"> book.author </p>
              <div class="flex justify-between items-center">
                <span class="text-sm text-gray-500">Downloads:  book.downloads </span>
                <a :href="'/books/' + book.id" 
                   class="text-green-600 hover:text-green-800 transition-colors flex items-center">
                  View Details
                  <svg class="w-4 h-4 ml-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script>
    const { createApp } = Vue
    
    createApp({
      data() {
        return {
          searchQuery: '',
          scholars: [
            {
              id: 1,
              name: 'Sheik Othman Bn Fodio',
              initial: 'O',
              description: 'Founder of the Sokoto Caliphate and prolific author of numerous Islamic texts'
            },
            {
              id: 2,
              name: 'Sheik Abdullahi Bn Fodio',
              initial: 'A',
              description: 'Renowned scholar and brother of Othman Bn Fodio, known for his comprehensive works'
            },
            {
              id: 3,
              name: 'Sheik Muhammad Bello',
              initial: 'M',
              description: 'Son of Othman Bn Fodio and second Sultan of Sokoto, authored many significant works'
            }
          ],
          featuredBooks: [
            {
              id: 1,
              title: 'Ihya ul-Sunna',
              author: 'Sheik Othman Bn Fodio',
              downloads: 1234
            },
            {
              id: 2,
              title: 'Diya ul-Siyasat',
              author: 'Sheik Muhammad Bello',
              downloads: 890
            },
            {
              id: 3,
              title: 'Diya ul-Hukkam',
              author: 'Sheik Abdullahi Bn Fodio',
              downloads: 756
            },
            {
              id: 4,
              title: 'Nur ul-Albab',
              author: 'Sheik Othman Bn Fodio',
              downloads: 643
            }
          ]
        }
      }
    }).mount('#app')
    </script>
    
    </body>
    </html>