<html><head><base href="/" /><title>Books | Yahaya Bawa Islamic Library</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <style>
      .book-card {
        transition: all 0.3s ease;
      }
      .book-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        
      }
      .search-bar {
        transition: all 0.3s ease;
      }
      .search-bar:focus {
        box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.3);
      }
      .filter-button.active {
        background-color: #166534;
        color: white;
      }
      @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
      }
      .fade-in {
        animation: fadeIn 0.5s ease-out;
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
                <svg class="w-8 h-8 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Yahaya Bawa Islamic Library
              </a>
            </div>
            <div class="flex items-center space-x-6">
              <a href="{{ route('all-books') }}" class="hover:text-green-200 transition-colors">Books</a>
              <a href="{{ route('scholars') }}" class="hover:text-green-200 transition-colors">Scholars</a>
              <a href="{{ route('login') }}" class="hover:text-green-200 transition-colors">Login</a>
              <a href="{{ route('register') }}" class="bg-green-600 px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">Register</a>
            </div>
          </div>
        </div>
      </nav>
    
      <!-- Search and Filter Section -->
      <div class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-6">
          <div class="flex flex-col md:flex-row md:items-center md:space-x-4">
            <div class="flex-1 mb-4 md:mb-0">
              <input 
                type="text" 
                v-model="searchQuery" 
                placeholder="Search books by title, author, or topic..." 
                class="search-bar w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none"
              >
            </div>
            <div class="flex space-x-2 overflow-x-auto pb-2 md:pb-0">
              <button 
                v-for="category in categories" 
                :key="category"
                @click="toggleFilter(category)"
                :class="['filter-button px-4 py-2 rounded-lg border border-green-600 hover:bg-green-600 hover:text-white transition-colors',
                         selectedCategories.includes(category) ? 'active' : '']"
              >
                {{-- {{ category }} --}}
              </button>
            </div>
          </div>
        </div>
      </div>
    
      <!-- Books Grid -->
      <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-6">
          <div v-for="book in filteredBooks" 
               :key="book.id" 
               class="book-card bg-white rounded-lg shadow-md overflow-hidden fade-in">
            <div class="bg-green-50 p-6 flex items-center justify-center">
              <svg class="w-16 h-16 text-green-800" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 19.5C4 18.837 4.26339 18.2011 4.73223 17.7322C5.20107 17.2634 5.83696 17 6.5 17H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M6.5 2H20V22H6.5C5.83696 22 5.20107 21.7366 4.73223 21.2678C4.26339 20.7989 4 20.163 4 19.5V4.5C4 3.83696 4.26339 3.20107 4.73223 2.73223C5.20107 2.26339 5.83696 2 6.5 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <div class="p-4">
              <div class="flex items-start justify-between">
                <div>
                  <h3 class="font-bold text-lg mb-1">book.title </h3>
                  <p class="text-sm text-gray-600">book.author </p>
                </div>
                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">book.category </span>
              </div>
              <p class="text-sm text-gray-500 mt-2">book.description </p>
              <div class="mt-4 flex items-center justify-between">
                <div class="flex items-center text-sm text-gray-500">
                  <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                  </svg>
                  book.downloads  downloads
                </div>
                <a :href="'/books/' + book.id" 
                   class="inline-flex items-center text-green-600 hover:text-green-800 transition-colors">
                  Read More
                  <svg class="w-4 h-4 ml-1" viewBox="0 0 24 24" fill="none">
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
          selectedCategories: [],
          categories: ['Fiqh', 'Aqeedah', 'History', 'Poetry', 'Philosophy'],
          books: [
            {
              id: 1,
              title: 'Ihya ul-Sunna',
              author: 'Sheik Othman Bn Fodio',
              category: 'Fiqh',
              downloads: 1234,
              description: 'A comprehensive guide to reviving the Prophetic traditions in daily life.'
            },
            {
              id: 2,
              title: 'Diya ul-Siyasat',
              author: 'Sheik Muhammad Bello',
              category: 'Philosophy',
              downloads: 890,
              description: 'An enlightening discourse on Islamic governance and leadership principles.'
            },
            {
              id: 3,
              title: 'Diya ul-Hukkam',
              author: 'Sheik Abdullahi Bn Fodio',
              category: 'Fiqh',
              downloads: 756,
              description: 'A detailed manual on Islamic jurisprudence for rulers and judges.'
            },
            {
              id: 4,
              title: 'Nur ul-Albab',
              author: 'Sheik Othman Bn Fodio',
              category: 'Aqeedah',
              downloads: 643,
              description: 'An illuminating work on Islamic theology and spiritual enlightenment.'
            },
            {
              id: 5,
              title: 'Taalim ul-Ikhwan',
              author: 'Sheik Abdullahi Bn Fodio',
              category: 'History',
              downloads: 521,
              description: 'Historical accounts and teachings for the Muslim brotherhood.'
            },
            {
              id: 6,
              title: 'Asrar ul-Tauheed',
              author: 'Sheik Muhammad Bello',
              category: 'Aqeedah',
              downloads: 432,
              description: 'Deep insights into the mysteries of Islamic monotheism.'
            }
          ]
        }
      },
      computed: {
        filteredBooks() {
          return this.books.filter(book => {
            const matchesSearch = this.searchQuery === '' || 
              book.title.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
              book.author.toLowerCase().includes(this.searchQuery.toLowerCase());
            
            const matchesCategory = this.selectedCategories.length === 0 || 
              this.selectedCategories.includes(book.category);
            
            return matchesSearch && matchesCategory;
          });
        }
      },
      methods: {
        toggleFilter(category) {
          const index = this.selectedCategories.indexOf(category);
          if (index === -1) {
            this.selectedCategories.push(category);
          } else {
            this.selectedCategories.splice(index, 1);
          }
        }
      }
    }).mount('#app')
    </script>
    
    </body></html>