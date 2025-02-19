<html>

<head>
  <base href="/" />
  <title>Yahaya Bawa Islamic Library - Scholar Profile</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <style>
    @keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    .fade-in {
      animation: fadeIn 0.5s ease-in;
    }

    .arabic-calligraphy {
      font-family: 'Noto Naskh Arabic', serif;
    }

    .book-card {
      transition: all 0.3s ease;
    }

    .book-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
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
                <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
              Yahaya Bawa Islamic Library
            </a>
          </div>
          <div class="flex items-center space-x-6">
            <a href="{{ route('all-books') }}" class="hover:text-green-200 transition-colors">Books</a>
            <a href="/scholars" class="hover:text-green-200 transition-colors">Scholars</a>
            <a href="/login" class="hover:text-green-200 transition-colors">Login</a>
            <a href="/register" class="bg-green-600 px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">Register</a>
          </div>
        </div>
      </div>
    </nav>

    <!-- Scholar Profile Header -->
    <div class="bg-green-700 text-white py-16">
      <div class="max-w-7xl mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center gap-8">
          <div class="h-48 w-48 rounded-full bg-green-200 flex items-center justify-center">
            <span class="text-6xl text-green-800 arabic-calligraphy"> scholar.initial </span>
          </div>
          <div class="text-center md:text-left">
            <h1 class="text-4xl font-bold mb-4"> scholar.name </h1>
            <p class="text-xl mb-4"> scholar.era </p>
            <div class="flex flex-wrap gap-2">
              <span v-for="specialty in scholar.specialties"
                :key="specialty"
                class="px-4 py-1 bg-green-600 rounded-full text-sm">
                specialty
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Scholar Biography -->
    <div class="max-w-7xl mx-auto px-4 py-12">
      <div class="bg-white rounded-lg shadow-lg p-8">
        <h2 class="text-2xl font-bold mb-6">Biography</h2>
        <p class="text-gray-700 leading-relaxed mb-6"> scholar.biography </p>
        <div class="grid md:grid-cols-3 gap-6 mt-8">
          <div class="bg-green-50 p-6 rounded-lg">
            <h3 class="font-bold mb-2">Published Works</h3>
            <p class="text-3xl font-bold text-green-700"> scholar.works </p>
          </div>
          <div class="bg-green-50 p-6 rounded-lg">
            <h3 class="font-bold mb-2">Students</h3>
            <p class="text-3xl font-bold text-green-700"> scholar.students </p>
          </div>
          <div class="bg-green-50 p-6 rounded-lg">
            <h3 class="font-bold mb-2">Years Active</h3>
            <p class="text-3xl font-bold text-green-700"> scholar.activeYears </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Scholar's Works -->
    <div class="max-w-7xl mx-auto px-4 py-12">
      <h2 class="text-2xl font-bold mb-8">Notable Works</h2>
      <div class="grid md:grid-cols-3 gap-8">
        <div v-for="book in scholarWorks"
          :key="book.id"
          class="book-card bg-white rounded-lg shadow-md overflow-hidden">
          <div class="h-48 bg-green-100 flex items-center justify-center">
            <span class="text-4xl">📚</span>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold mb-2"> book.title </h3>
            <p class="text-gray-600 mb-4"> book.description </p>
            <div class="flex justify-between items-center">
              <span class="text-sm text-gray-500"> book.year </span>
              <a :href="'/books/' + book.id"
                class="inline-flex items-center text-green-600 hover:text-green-800">
                Read More
                <svg class="w-4 h-4 ml-1" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                  <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Timeline -->
    <div class="bg-gray-100 py-16">
      <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-2xl font-bold mb-12 text-center">Life Timeline</h2>
        <div class="relative">
          <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-green-200"></div>
          <div class="space-y-12">
            <div v-for="event in scholarTimeline"
              :key="event.year"
              class="relative">
              <div class="absolute left-1/2 transform -translate-x-1/2 -translate-y-4 w-4 h-4 bg-green-500 rounded-full"></div>
              <div class="ml-auto mr-8 md:mr-auto md:ml-8 p-6 bg-white rounded-lg shadow-md w-full md:w-96"
                :class="event.year % 2 === 0 ? 'md:ml-auto md:mr-8' : 'md:mr-auto md:ml-8'">
                <span class="text-green-600 font-bold"> event.year </span>
                <h3 class="font-bold mt-2 mb-2"> event.title </h3>
                <p class="text-gray-600"> event.description </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    const {
      createApp
    } = Vue

    createApp({
      data() {
        return {
          scholar: {
            id: 2,
            name: 'Sheikh Abdullahi Bn Fodio',
            initial: 'ع',
            era: '18th-19th Century Scholar',
            specialties: ['Fiqh', 'Arabic Literature', 'Islamic Law', 'Tafsir'],
            biography: 'Sheikh Abdullahi Bn Fodio was a prominent Islamic scholar, writer, and the brother of Sheikh Othman Bn Fodio. Born in Gobir, he was instrumental in the Sokoto jihad and the establishment of the Sokoto Caliphate. He was known for his extensive knowledge of Islamic sciences, particularly in jurisprudence and Arabic literature. His writings covered various aspects of Islamic knowledge, from theology to governance, and he was particularly noted for his expertise in Arabic grammar and literature.',
            works: 42,
            students: 186,
            activeYears: '1776-1829'
          },
          scholarWorks: [{
              id: 1,
              title: 'Diya al-Hukkam',
              description: 'A comprehensive guide on Islamic governance and leadership principles',
              year: 1810
            },
            {
              id: 2,
              title: 'Diya al-Talim',
              description: 'An educational treatise on the methods of Islamic teaching and learning',
              year: 1813
            },
            {
              id: 3,
              title: 'Sabeel al-Najat',
              description: 'A guide to spiritual salvation and religious obligations',
              year: 1815
            }
          ],
          scholarTimeline: [{
              year: 1766,
              title: 'Birth',
              description: 'Born in Gobir, present-day Northern Nigeria'
            },
            {
              year: 1776,
              title: 'Early Education',
              description: 'Began formal Islamic studies under various scholars'
            },
            {
              year: 1804,
              title: 'Sokoto Jihad',
              description: 'Participated in the jihad led by his brother Othman Bn Fodio'
            },
            {
              year: 1808,
              title: 'Scholarly Works',
              description: 'Began writing major works on Islamic jurisprudence and education'
            },
            {
              year: 1829,
              title: 'Passed Away',
              description: 'Died in Sokoto, leaving a rich legacy of Islamic scholarship'
            }
          ]
        }
      }
    }).mount('#app')
  </script>

</body>

</html>