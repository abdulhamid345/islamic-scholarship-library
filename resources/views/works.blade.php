<html><head><base href="/" /><title>Scholar Works - Yahaya Bawa Islamic Library</title>
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
      .filter-button {
        transition: all 0.3s ease;
      }
      .filter-button.active {
        background-color: #166534;
        color: white;
      }
      @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
      }
      .fade-in {
        animation: fadeIn 0.5s ease-in;
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
              <a href="/books" class="hover:text-green-200 transition-colors">Books</a>
              <a href="/scholars" class="hover:text-green-200 transition-colors">Scholars</a>
              <a href="/login" class="hover:text-green-200 transition-colors">Login</a>
              <a href="/register" class="bg-green-600 px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">Register</a>
            </div>
          </div>
        </div>
      </nav>
    
      <!-- Scholar Profile -->
      <div class="bg-green-700 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
          <div class="flex items-center space-x-8">
            <div class="h-40 w-40 rounded-full bg-green-100 flex items-center justify-center">
              <span class="text-6xl text-green-800"> scholar.initial </span>
            </div>
            <div>
              <h1 class="text-4xl font-bold mb-4"> scholar.name </h1>
              <p class="text-xl mb-4"> scholar.description </p>
              <div class="flex space-x-4">
                <span class="bg-green-600 px-4 py-2 rounded-lg">
                  <span class="font-bold"> scholar.works.length </span> Works
                </span>
                <span class="bg-green-600 px-4 py-2 rounded-lg">
                  <span class="font-bold"> totalDownloads </span> Total Downloads
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    
      <!-- Works Section -->
      <div class="max-w-7xl mx-auto px-4 py-12">
        <!-- Filters -->
        <div class="mb-8">
          <div class="flex space-x-4 mb-6">
            <button 
              v-for="category in categories" 
              :key="category"
              @click="selectedCategory = category"
              :class="['filter-button px-4 py-2 rounded-lg border border-green-600',
                       selectedCategory === category ? 'active' : 'text-green-600']">
               category 
            </button>
          </div>
          <input 
            type="text"
            v-model="searchQuery"
            placeholder="Search works..."
            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200"
          >
        </div>
    
        <!-- Works Grid -->
        <div class="grid md:grid-cols-3 gap-6">
          <div v-for="work in filteredWorks" 
               :key="work.id" 
               class="book-card bg-white rounded-lg shadow-md p-6">
            <div class="bg-green-50 h-48 rounded-lg flex items-center justify-center mb-4">
              <svg class="w-16 h-16 text-green-800" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 19.5C4 18.837 4.26339 18.2011 4.73223 17.7322C5.20107 17.2634 5.83696 17 6.5 17H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M6.5 2H20V22H6.5C5.83696 22 5.20107 21.7366 4.73223 21.2678C4.26339 20.7989 4 20.163 4 19.5V4.5C4 3.83696 4.26339 3.20107 4.73223 2.73223C5.20107 2.26339 5.83696 2 6.5 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <h3 class="text-xl font-bold mb-2"> work.title </h3>
            <p class="text-gray-600 mb-4"> work.description </p>
            <div class="flex justify-between items-center">
              <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">
                 work.category 
              </span>
              <span class="text-gray-600 text-sm"> work.downloads  downloads</span>
            </div>
            <div class="mt-4 flex justify-between items-center">
              <a :href="'/work/' + work.id" 
                 class="text-green-600 hover:text-green-800 font-medium">
                Read More
              </a>
              <button @click="downloadWork(work)" 
                      class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
                Download
              </button>
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
          scholar: {
            id: 1,
            name: 'Sheik Othman Bn Fodio',
            initial: 'O',
            description: 'Founder of the Sokoto Caliphate and prolific author of numerous Islamic texts',
            works: [
              {
                id: 1,
                title: 'Ihya ul-Sunna',
                description: 'A comprehensive work on the revival of Prophetic traditions',
                category: 'Fiqh',
                downloads: 1234
              },
              {
                id: 2,
                title: 'Najm al-Ikhwan',
                description: 'Guidance for the brotherhood in Islamic principles',
                category: 'Aqeedah',
                downloads: 890
              },
              {
                id: 3,
                title: 'Bayan Wujub ul-Hijra',
                description: 'Explanation on the obligation of migration',
                category: 'Fiqh',
                downloads: 756
              },
              {
                id: 4,
                title: 'Tariq al-Jannah',
                description: 'The path to paradise - a spiritual guide',
                category: 'Tafsir',
                downloads: 643
              },
              {
                id: 5,
                title: 'Tanbih ul-Ikhwan',
                description: 'Historical account of the Sokoto Caliphate',
                category: 'History',
                downloads: 921
              }
            ]
          },
          categories: ['All', 'Fiqh', 'Aqeedah', 'Tafsir', 'History'],
          selectedCategory: 'All',
          searchQuery: '',
        }
      },
      computed: {
        filteredWorks() {
          let filtered = this.scholar.works
          if (this.selectedCategory !== 'All') {
            filtered = filtered.filter(work => work.category === this.selectedCategory)
          }
          if (this.searchQuery) {
            const query = this.searchQuery.toLowerCase()
            filtered = filtered.filter(work => 
              work.title.toLowerCase().includes(query) ||
              work.description.toLowerCase().includes(query)
            )
          }
          return filtered
        },
        totalDownloads() {
          return this.scholar.works.reduce((total, work) => total + work.downloads, 0)
        }
      },
      methods: {
        downloadWork(work) {
          // Implement download functionality
          alert(`Downloading ${work.title}...`)
        }
      }
    }).mount('#app')
    </script>
    
    </body></html>