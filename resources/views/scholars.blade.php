<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/" />
    <title>Scholars Collection - Yahaya Bawa Islamic Library</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <style>
        :root {
            --primary-green: #0f4a2a;
            --secondary-green: #166534;
            --accent-green: #22c55e;
            --light-green: #dcfce7;
            --gold: #f59e0b;
            --gold-light: #fef3c7;
        }

        * {
            scroll-behavior: smooth;
        }

        .font-inter {
            font-family: 'Inter', sans-serif;
        }

        .font-arabic {
            font-family: 'Noto Naskh Arabic', serif;
        }

        .hero-gradient {
            background: linear-gradient(135deg, var(--primary-green) 0%, var(--secondary-green) 50%, var(--accent-green) 100%);
        }

        .floating-nav {
            transition: all 0.3s ease;
            backdrop-filter: blur(20px);
        }

        .floating-nav.scrolled {
            background: rgba(15, 74, 42, 0.95);
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.3);
        }

        .scroll-indicator {
            position: fixed;
            top: 0;
            left: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--accent-green), var(--gold));
            z-index: 1000;
            transition: width 0.1s ease;
            width: 0%;
        }

        .scholar-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 20px;
            overflow: hidden;
            background: white;
            border: 1px solid rgba(0, 0, 0, 0.05);
            position: relative;
        }

        .scholar-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s;
        }

        .scholar-card:hover::before {
            left: 100%;
        }

        .scholar-card:hover {
            transform: translateY(-12px) scale(1.03);
            box-shadow: 0 30px 60px -12px rgba(0, 0, 0, 0.25);
            border-color: var(--accent-green);
        }

        .scholar-avatar {
            background: linear-gradient(135deg, var(--secondary-green), var(--accent-green));
            position: relative;
            overflow: hidden;
        }

        .scholar-avatar::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.3), transparent 60%);
        }

        .featured-scholar {
            background: linear-gradient(135deg, var(--gold-light), rgba(249, 115, 22, 0.1));
            border: 2px solid var(--gold);
        }

        .era-badge {
            background: linear-gradient(135deg, var(--gold), #f97316);
            color: white;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .specialty-tag {
            background: var(--light-green);
            color: var(--secondary-green);
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.25rem 0.5rem;
            border-radius: 0.5rem;
            border: 1px solid rgba(34, 197, 94, 0.2);
        }

        .search-container {
            position: relative;
        }

        .search-bar {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .search-bar:focus {
            box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.2);
            transform: scale(1.02);
            border-color: var(--accent-green);
        }

        .filter-btn {
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .filter-btn.active {
            background: var(--accent-green);
            color: white;
            border-color: var(--accent-green);
        }

        .filter-btn:hover {
            border-color: var(--accent-green);
            color: var(--accent-green);
        }

        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .mobile-menu.active {
            transform: translateX(0);
        }

        .back-to-top {
            display: none;
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 3rem;
            height: 3rem;
            background: var(--secondary-green);
            color: white;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            z-index: 40;
            border: none;
            cursor: pointer;
        }

        .back-to-top.show {
            display: flex;
        }

        .back-to-top:hover {
            background: var(--accent-green);
            transform: translateY(-2px);
        }

        .timeline-item {
            position: relative;
            padding-left: 2rem;
            border-left: 2px solid var(--light-green);
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -6px;
            top: 0;
            width: 10px;
            height: 10px;
            background: var(--accent-green);
            border-radius: 50%;
            border: 2px solid white;
            box-shadow: 0 0 0 3px var(--light-green);
        }

        .timeline-item.featured::before {
            background: var(--gold);
            box-shadow: 0 0 0 3px var(--gold-light);
        }

        .works-counter {
            background: linear-gradient(135deg, var(--accent-green), #10b981);
            color: white;
            border-radius: 50%;
            width: 2.5rem;
            height: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 0.875rem;
        }

        .influence-meter {
            height: 4px;
            background: #e5e7eb;
            border-radius: 2px;
            overflow: hidden;
        }

        .influence-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--accent-green), var(--gold));
            border-radius: 2px;
            transition: width 1s ease-out;
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .nav-links.active {
                display: flex;
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background-color: var(--secondary-green);
                padding: 1rem;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
                align-items: center;
                gap: 1rem;
            }
        }

        .loading-overlay {
            position: fixed;
            inset: 0;
            background: rgba(255, 255, 255, 0.8);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .loading-overlay.show {
            display: flex;
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid #f3f4f6;
            border-top: 4px solid var(--accent-green);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .pulse-ring {
            animation: pulse-ring 2s infinite;
        }

        @keyframes pulse-ring {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            100% {
                transform: scale(1.3);
                opacity: 0;
            }
        }

        .floating-element {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }
    </style>
</head>

<body class="font-inter bg-gray-50">
    <div class="scroll-indicator" id="scrollIndicator"></div>
    <div class="loading-overlay" id="loadingOverlay">
        <div class="spinner"></div>
    </div>

    <!-- Enhanced Navigation -->
    <nav class="floating-nav fixed top-0 w-full z-50 bg-green-800" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-green-400 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-7 h-7 text-white" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="text-white">
                        <h1 class="text-xl font-bold">Yahaya Bawa</h1>
                        <p class="text-xs text-green-200 hidden sm:block">Islamic Library</p>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8" id="desktopNav">
                    <a href="{{ route('welcome') }}"
                        class="text-white hover:text-green-200 transition-colors duration-200 font-medium relative group">
                        Home
                        <span
                            class="absolute -bottom-1 left-0 w-0 h-0.5 bg-green-400 transition-all duration-200 group-hover:w-full"></span>
                    </a>
                    <a href="{{ route('books') }}"
                        class="text-white hover:text-green-200 transition-colors duration-200 font-medium relative group">
                        Books
                        <span
                            class="absolute -bottom-1 left-0 w-0 h-0.5 bg-green-400 transition-all duration-200 group-hover:w-full"></span>
                    </a>
                    <a href="{{ route('scholars') }}"
                        class="text-white hover:text-green-200 transition-colors duration-200 font-medium relative group">
                        Scholars
                        <span
                            class="absolute -bottom-1 left-0 w-0 h-0.5 bg-green-400 transition-all duration-200 group-hover:w-full"></span>
                    </a>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center space-x-4">
                    <!-- Search Button -->
                    <button id="searchToggle" class="p-2 rounded-full text-white hover:bg-green-700 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>

                    <!-- Mobile Menu Button -->
                    <button id="mobileMenuToggle"
                        class="md:hidden p-2 rounded-full text-white hover:bg-green-700 transition-colors">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path id="menuIcon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
          </div>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="hero-gradient pt-24 pb-20 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="floating-element absolute top-20 left-10 w-16 h-16 bg-white rounded-full"></div>
            <div class="floating-element absolute top-40 right-20 w-12 h-12 bg-yellow-300 rounded-full"
                style="animation-delay: -2s;"></div>
            <div class="floating-element absolute bottom-32 left-20 w-8 h-8 bg-green-300 rounded-full"
                style="animation-delay: -4s;"></div>
            <div class="floating-element absolute bottom-20 right-32 w-20 h-20 bg-emerald-300 rounded-full"
                style="animation-delay: -1s;"></div>
        </div>

        <div class="max-w-7xl mx-auto text-center relative z-10">
            <div class="space-y-8" data-aos="fade-up">
                <div
                    class="inline-flex items-center px-6 py-3 bg-white bg-opacity-20 rounded-full text-sm font-medium backdrop-blur-sm border border-white border-opacity-30 mb-6">
                    <svg class="w-5 h-5 mr-3 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2L3 7v11a1 1 0 001 1h3v-8h6v8h3a1 1 0 001-1V7l-7-5z" />
                    </svg>
                    Preserving Islamic Scholarship Through the Ages
                </div>

                <h1 class="text-5xl lg:text-7xl font-bold text-white leading-tight">
                    Islamic
                    <span class="block text-yellow-300">Scholars</span>
                </h1>
                <p class="text-xl lg:text-2xl text-green-100 max-w-4xl mx-auto leading-relaxed font-light">
                    Explore the lives, works, and lasting contributions of <span
                        class="font-semibold text-yellow-300">renowned Islamic scholars</span> who shaped Islamic
                    thought and jurisprudence across centuries
                </p>

                <!-- Search Bar -->
                <div class="max-w-2xl mx-auto mt-10">
                    <div class="search-container">
                        <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-6 h-6 text-gray-400"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <input id="mainSearchInput" type="text"
                            class="search-bar w-full pl-14 pr-6 py-5 bg-white rounded-2xl border-0 focus:outline-none text-lg shadow-2xl"
                            placeholder="Search scholars by name, era, or specialization...">
                        <button id="mainSearchBtn"
                            class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl font-medium transition-colors">
                            Search
                        </button>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 max-w-4xl mx-auto mt-12">
                    <div class="text-center">
                        <div class="text-3xl lg:text-4xl font-bold text-yellow-300">50+</div>
                        <div class="text-green-200 font-medium">Scholars</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl lg:text-4xl font-bold text-yellow-300">15</div>
                        <div class="text-green-200 font-medium">Centuries</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl lg:text-4xl font-bold text-yellow-300">500+</div>
                        <div class="text-green-200 font-medium">Works</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl lg:text-4xl font-bold text-yellow-300">20</div>
                        <div class="text-green-200 font-medium">Regions</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Filters and Controls -->
    <section class="bg-white shadow-sm sticky top-16 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">
                <!-- Era Filters -->
                <div class="flex flex-wrap gap-3">
                    <button class="filter-btn active px-4 py-2 rounded-full font-medium" data-era="all">
                        All Eras
                    </button>
                    <button class="filter-btn px-4 py-2 rounded-full font-medium" data-era="classical">
                        Classical (7th-13th Century)
                    </button>
                    <button class="filter-btn px-4 py-2 rounded-full font-medium" data-era="golden">
                        Golden Age (8th-13th Century)
                    </button>
                    <button class="filter-btn px-4 py-2 rounded-full font-medium" data-era="medieval">
                        Medieval (13th-16th Century)
                    </button>
                    <button class="filter-btn px-4 py-2 rounded-full font-medium" data-era="modern">
                        Modern (17th-20th Century)
                    </button>
                </div>

                <!-- Sort and View Controls -->
                <div class="flex items-center gap-4">
                    <div class="flex items-center space-x-2">
                        <label class="text-sm font-medium text-gray-700">Sort by:</label>
                        <select id="sortSelect"
                            class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500">
                            <option value="name">Name A-Z</option>
                            <option value="era">Era</option>
                            <option value="influence">Influence</option>
                            <option value="works">Most Works</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Results Count -->
            <div class="mt-4 text-sm text-gray-600">
                Showing <span id="resultsCount">24</span> of <span id="totalCount">50</span> scholars
            </div>
        </div>
    </section>

    <!-- Scholars Grid -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div id="scholarsGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Scholar cards will be generated by JavaScript -->
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-16">
                <button id="loadMoreBtn"
                    class="bg-green-600 hover:bg-green-700 text-white px-10 py-4 rounded-xl font-semibold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                    Discover More Scholars
                </button>
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold mb-2"> scholar.name </h3>
              <p class="text-sm text-gray-600 mb-2"> scholar.era </p>
              <p class="text-gray-700 mb-4"> scholar.description </p>
              <div class="flex flex-wrap gap-2 mb-4">
                <span v-for="specialty in scholar.specialties" 
                      :key="specialty"
                      class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                   specialty 
                </span>
              </div>
              <div class="flex justify-between items-center">
                <span class="text-sm text-gray-500"> scholar.works  works</span>
                <a href="{{ route('scholars') }}" 
                   class="inline-flex items-center text-green-600 hover:text-green-800">
                  View Profile
                  <svg class="w-4 h-4 ml-1" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    
      <!-- Timeline Section -->
      <div class="bg-gray-100 py-16">
        <div class="max-w-7xl mx-auto px-4">
          <h2 class="text-3xl font-bold mb-12 text-center">Scholar Timeline</h2>
          <div class="relative">
            <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-green-200"></div>
            <div class="space-y-12">
              <div v-for="event in timelineEvents" 
                   :key="event.year" 
                   class="relative">
                <div class="timeline-dot absolute left-1/2 transform -translate-x-1/2 -translate-y-4 w-4 h-4 bg-green-500 rounded-full"></div>
                <div class="ml-auto mr-8 md:mr-auto md:ml-8 p-6 bg-white rounded-lg shadow-md w-full md:w-96" 
                     :class="event.year % 2 === 0 ? 'md:ml-auto md:mr-8' : 'md:mr-auto md:ml-8'">
                  <span class="text-green-600 font-bold"> event.year </span>
                  <h3 class="font-bold mt-2 mb-2"> event.title </h3>
                  <p class="text-gray-600"> event.description </p>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-12 pt-8 text-center">
                <p class="text-gray-400">
                    &copy; 2025 Yahaya Bawa Islamic Library. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTop">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12" />
        </svg>
    </button>

    <script>
        // Sample scholars data
        const scholarsData = [{
                id: 1,
                name: "Sheik Othman Bn Fodio",
                arabicName: "عثمان بن فودي",
                era: "modern",
                birth: 1754,
                death: 1817,
                region: "West Africa (Nigeria)",
                specializations: ["Theology", "Jurisprudence", "Poetry", "Governance"],
                biography: "Founder of the Sokoto Caliphate and one of the most influential Islamic reformers in West Africa. Known for his jihad against corrupt practices and his establishment of an Islamic state based on Sharia law.",
                majorWorks: ["Ihya al-Sunna", "Bayan Wujub al-Hijra", "Tanbih al-Ikhwan", "Nur al-Albab"],
                influence: 95,
                worksCount: 47,
                featured: true,
                languages: ["Arabic", "Fulfulde", "Hausa"],
                teachers: ["Jibril ibn Umar"],
                students: ["Muhammad Bello", "Abdullahi dan Fodio"]
            },
            {
                id: 2,
                name: "Sheik Abdullahi Bn Fodio",
                arabicName: "عبد الله بن فودي",
                era: "modern",
                birth: 1766,
                death: 1828,
                region: "West Africa (Nigeria)",
                specializations: ["Islamic Law", "History", "Poetry", "Administration"],
                biography: "Brother of Othman dan Fodio and key figure in the Sokoto Caliphate. Known for his extensive writings on Islamic law and his role as an administrator and scholar.",
                majorWorks: ["Diya al-Hukkam", "Ida al-Nusukh", "Tazyid al-Waraqat", "Diya al-Siyasat"],
                influence: 85,
                worksCount: 32,
                featured: false,
                languages: ["Arabic", "Fulfulde", "Hausa"],
                teachers: ["Othman dan Fodio"],
                students: ["Various Sokoto scholars"]
            },
            {
                id: 3,
                name: "Sheik Muhammad Bello",
                arabicName: "محمد بلو",
                era: "modern",
                birth: 1781,
                death: 1837,
                region: "West Africa (Nigeria)",
                specializations: ["Governance", "History", "Astronomy", "Medicine"],
                biography: "Son of Othman dan Fodio and second Caliph of Sokoto. Renowned for his scholarship in multiple fields and his effective leadership of the caliphate.",
                majorWorks: ["Infaq al-Maysur", "Diya al-Siyasat", "Sirr al-Khulafa", "Ghunja"],
                influence: 90,
                worksCount: 38,
                featured: true,
                languages: ["Arabic", "Fulfulde", "Hausa"],
                teachers: ["Othman dan Fodio", "Abdullahi dan Fodio"],
                students: ["Ahmad Rufai", "Abu Bakr Atiku"]
            },
            {
                id: 4,
                name: "Ibn Taymiyyah",
                arabicName: "ابن تيمية",
                era: "medieval",
                birth: 1263,
                death: 1328,
                region: "Syria/Iraq",
                specializations: ["Theology", "Jurisprudence", "Philosophy", "Hadith"],
                biography: "Influential theologian and jurist known for his reformist ideas and opposition to what he considered religious innovations. His works greatly influenced later Islamic reform movements.",
                majorWorks: ["Minhaj as-Sunnah", "Majmu Fatawa", "Iqtida as-Sirat al-Mustaqim",
                    "Al-Aqida al-Wasitiyya"],
                influence: 98,
                worksCount: 67,
                featured: true,
                languages: ["Arabic"],
                teachers: ["Ahmad ibn Abd al-Halim"],
                students: ["Ibn Qayyim al-Jawziyya", "Al-Dhahabi"]
            },
            {
                id: 5,
                name: "Al-Ghazali",
                arabicName: "الغزالي",
                era: "golden",
                birth: 1058,
                death: 1111,
                region: "Persia/Iraq",
                specializations: ["Theology", "Philosophy", "Sufism", "Jurisprudence"],
                biography: "One of the most influential Muslim theologians, philosophers and mystics. Known as 'Hujjat al-Islam' (Proof of Islam), he successfully integrated Islamic orthodox theology with Sufi mysticism.",
                majorWorks: ["Ihya Ulum al-Din", "Tahafut al-Falasifa", "Al-Munqidh min al-Dalal", "Mishkat al-Anwar"],
                influence: 99,
                worksCount: 89,
                featured: true,
                languages: ["Arabic", "Persian"],
                teachers: ["Al-Juwayni"],
                students: ["Numerous scholars across the Islamic world"]
            },
            {
                id: 6,
                name: "Ibn Rushd (Averroes)",
                arabicName: "ابن رشد",
                era: "golden",
                birth: 1126,
                death: 1198,
                region: "Al-Andalus (Spain)",
                specializations: ["Philosophy", "Medicine", "Jurisprudence", "Astronomy"],
                biography: "Renowned philosopher, physician and jurist whose commentaries on Aristotle greatly influenced both Islamic and European thought. Known in the West as Averroes.",
                majorWorks: ["Tahafut al-Tahafut", "Fasl al-Maqal", "Bidayat al-Mujtahid", "Commentaries on Aristotle"],
                influence: 92,
                worksCount: 78,
                featured: false,
                languages: ["Arabic"],
                teachers: ["Ibn Tufail", "Abu Jafar ibn Harun"],
                students: ["European scholastics", "Various Andalusian scholars"]
            },
            {
                id: 7,
                name: "Imam Al-Shafi'i",
                arabicName: "الإمام الشافعي",
                era: "classical",
                birth: 767,
                death: 820,
                region: "Arabia/Egypt",
                specializations: ["Jurisprudence", "Hadith", "Arabic Language", "Poetry"],
                biography: "Founder of the Shafi'i school of Islamic jurisprudence and author of the first work on Islamic legal theory. His systematic approach to Islamic law had lasting influence.",
                majorWorks: ["Al-Risala", "Kitab al-Umm", "Musnad al-Shafi'i", "Diwan al-Shafi'i"],
                influence: 96,
                worksCount: 45,
                featured: true,
                languages: ["Arabic"],
                teachers: ["Malik ibn Anas", "Muhammad ibn al-Hasan"],
                students: ["Ahmad ibn Hanbal", "Al-Muzani"]
            },
            {
                id: 8,
                name: "Ibn Khaldun",
                arabicName: "ابن خلدون",
                era: "medieval",
                birth: 1332,
                death: 1406,
                region: "North Africa",
                specializations: ["History", "Sociology", "Economics", "Political Science"],
                biography: "Historiographer and social scientist often considered the father of sociology and historiography. His work on social cohesion and political dynamics was centuries ahead of its time.",
                majorWorks: ["Muqaddimah", "Kitab al-Ibar", "Al-Ta'rif bi Ibn Khaldun"],
                influence: 94,
                worksCount: 23,
                featured: false,
                languages: ["Arabic"],
                teachers: ["Various scholars in Granada and Fez"],
                students: ["Influenced later historians and social scientists"]
            },
            {
                id: 9,
                name: "Al-Bukhari",
                arabicName: "البخاري",
                era: "classical",
                birth: 810,
                death: 870,
                region: "Central Asia",
                specializations: ["Hadith", "Islamic History", "Jurisprudence"],
                biography: "Compiler of Sahih al-Bukhari, considered the most authentic collection of hadith after the Quran. His rigorous methodology set the standard for hadith authentication.",
                majorWorks: ["Sahih al-Bukhari", "Al-Adab al-Mufrad", "Al-Tarikh al-Kabir", "Al-Tarikh al-Saghir"],
                influence: 97,
                worksCount: 34,
                featured: true,
                languages: ["Arabic", "Persian"],
                teachers: ["Ali ibn al-Madini", "Ahmad ibn Hanbal"],
                students: ["Muslim ibn al-Hajjaj", "Al-Tirmidhi"]
            },
            {
                id: 10,
                name: "Ibn Sina (Avicenna)",
                arabicName: "ابن سينا",
                era: "golden",
                birth: 980,
                death: 1037,
                region: "Persia",
                specializations: ["Philosophy", "Medicine", "Natural Sciences", "Logic"],
                biography: "Polymath who made significant contributions to philosophy, medicine, and natural sciences. His medical works were used in European universities for centuries.",
                majorWorks: ["The Canon of Medicine", "The Book of Healing", "The Book of Salvation",
                    "Remarks and Admonitions"
                ],
                influence: 93,
                worksCount: 156,
                featured: false,
                languages: ["Arabic", "Persian"],
                teachers: ["Al-Natili", "Abu Sahl al-Masihi"],
                students: ["Influenced European and Islamic scholars for centuries"]
            },
            {
                id: 11,
                name: "Imam Malik",
                arabicName: "الإمام مالك",
                era: "classical",
                birth: 711,
                death: 795,
                region: "Arabia (Medina)",
                specializations: ["Jurisprudence", "Hadith", "Islamic Tradition"],
                biography: "Founder of the Maliki school of Islamic jurisprudence and compiler of Al-Muwatta, one of the earliest collections of hadith and legal traditions.",
                majorWorks: ["Al-Muwatta", "Various legal opinions and fatwas"],
                influence: 95,
                worksCount: 12,
                featured: false,
                languages: ["Arabic"],
                teachers: ["Nafi ibn Abi Naim", "Ibn Shihab al-Zuhri"],
                students: ["Al-Shafi'i", "Yahya ibn Yahya al-Laythi"]
            },
            {
                id: 12,
                name: "Al-Tabari",
                arabicName: "الطبري",
                era: "classical",
                birth: 839,
                death: 923,
                region: "Persia/Iraq",
                specializations: ["Quranic Exegesis", "History", "Jurisprudence"],
                biography: "Renowned historian and Quranic commentator whose comprehensive works on Islamic history and Quranic interpretation remain influential today.",
                majorWorks: ["Jami al-Bayan", "Tarikh al-Rusul wa al-Muluk", "Tahdhib al-Athar"],
                influence: 91,
                worksCount: 43,
                featured: false,
                languages: ["Arabic", "Persian"],
                teachers: ["Ahmad ibn Hanbal", "Various scholars"],
                students: ["Influenced generations of historians and exegetes"]
            }
        ];

        // Timeline data for featured scholars
        const timelineData = [{
                year: "8th Century",
                period: "711-795 CE",
                scholar: "Imam Malik",
                event: "Establishes Maliki school of jurisprudence in Medina",
                featured: false
            },
            {
                year: "9th Century",
                period: "767-820 CE",
                scholar: "Imam Al-Shafi'i",
                event: "Develops systematic Islamic legal methodology",
                featured: true
            },
            {
                year: "9th Century",
                period: "810-870 CE",
                scholar: "Al-Bukhari",
                event: "Compiles most authentic hadith collection",
                featured: true
            },
            {
                year: "11th Century",
                period: "1058-1111 CE",
                scholar: "Al-Ghazali",
                event: "Synthesizes Islamic theology and mysticism",
                featured: true
            },
            {
                year: "14th Century",
                period: "1263-1328 CE",
                scholar: "Ibn Taymiyyah",
                event: "Leads Islamic reform and renewal movement",
                featured: true
            },
            {
                year: "19th Century",
                period: "1754-1817 CE",
                scholar: "Othman dan Fodio",
                event: "Establishes Sokoto Caliphate in West Africa",
                featured: true
            }
        ];

        let currentScholars = scholarsData;
        let currentPage = 1;
        const scholarsPerPage = 12;

        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 50,
        });

        // DOM Elements
        const scholarsGrid = document.getElementById('scholarsGrid');
        const filterButtons = document.querySelectorAll('.filter-btn');
        const sortSelect = document.getElementById('sortSelect');
        const searchInput = document.getElementById('mainSearchInput');
        const searchBtn = document.getElementById('mainSearchBtn');
        const loadMoreBtn = document.getElementById('loadMoreBtn');
        const resultsCount = document.getElementById('resultsCount');
        const totalCount = document.getElementById('totalCount');
        const loadingOverlay = document.getElementById('loadingOverlay');
        const scholarTimeline = document.getElementById('scholarTimeline');

        // Mobile menu functionality
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const mobileMenu = document.getElementById('mobileMenu');
        const menuIcon = document.getElementById('menuIcon');

        mobileMenuToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('active');

            if (mobileMenu.classList.contains('active')) {
                menuIcon.setAttribute('d', 'M6 18L18 6M6 6l12 12');
            } else {
                menuIcon.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
            }
        });

        // Create scholar card HTML
        function createScholarCard(scholar, index) {
            const eraColors = {
                'classical': 'from-blue-500 to-indigo-600',
                'golden': 'from-yellow-500 to-orange-600',
                'medieval': 'from-purple-500 to-pink-600',
                'modern': 'from-green-500 to-emerald-600'
            };

            return `
                <div class="scholar-card fade-in ${scholar.featured ? 'featured-scholar' : ''}" data-aos="fade-up" data-aos-delay="${index * 100}" data-era="${scholar.era}">
                    <div class="scholar-avatar h-48 bg-gradient-to-br ${eraColors[scholar.era]} flex items-center justify-center relative">
                        ${scholar.featured ? '<div class="absolute top-4 right-4 pulse-ring bg-yellow-400 rounded-full w-4 h-4"></div>' : ''}
                        <div class="text-center">
                            <div class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4 backdrop-blur-sm">
                                <span class="text-3xl font-bold text-white">${scholar.name.charAt(0)}</span>
                            </div>
                            <div class="era-badge">${scholar.era}</div>
                        </div>
                    </div>
                    
                    <div class="p-6 space-y-4">
                        <div class="text-center space-y-2">
                            <h3 class="font-bold text-xl text-gray-800 leading-tight">${scholar.name}</h3>
                            <p class="text-sm font-arabic text-gray-600">${scholar.arabicName}</p>
                            <div class="text-sm text-gray-500">
                                ${scholar.birth} - ${scholar.death} CE
                            </div>
                            <div class="text-sm text-green-600 font-medium">${scholar.region}</div>
                        </div>
                        
                        <p class="text-gray-600 text-sm leading-relaxed line-clamp-3">${scholar.biography}</p>
                        
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-medium text-gray-500">Specializations:</span>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                ${scholar.specializations.slice(0, 3).map(spec => 
                                    `<span class="specialty-tag">${spec}</span>`
                                ).join('')}
                                ${scholar.specializations.length > 3 ? `<span class="specialty-tag">+${scholar.specializations.length - 3}</span>` : ''}
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <div class="flex items-center space-x-3">
                                <div class="works-counter">${scholar.worksCount}</div>
                                <div class="text-xs text-gray-500">
                                    <div class="font-medium">Works</div>
                                </div>
                            </div>
                            <div class="flex-1 mx-4">
                                <div class="text-xs text-gray-500 mb-1">Influence</div>
                                <div class="influence-meter">
                                    <div class="influence-fill" style="width: ${scholar.influence}%"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="space-y-2 pt-2">
                            <div class="text-xs text-gray-500">
                                <span class="font-medium">Major Works:</span>
                            </div>
                            <div class="text-xs text-gray-600 leading-relaxed">
                                ${scholar.majorWorks.slice(0, 2).join(', ')}${scholar.majorWorks.length > 2 ? '...' : ''}
                            </div>
                        </div>
                        
                        <div class="flex space-x-2 pt-4">
                            <button class="flex-1 bg-green-600 hover:bg-green-700 text-white py-3 px-4 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 flex items-center justify-center text-sm">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                View Profile
                            </button>
                            <button class="p-3 border border-gray-200 hover:border-green-500 rounded-lg transition-colors group">
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            `;
        }

        // Create timeline item HTML
        function createTimelineItem(item, index) {
            return `
                <div class="timeline-item ${item.featured ? 'featured' : ''}" data-aos="fade-right" data-aos-delay="${index * 200}">
                    <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <div class="flex items-start justify-between mb-4">
                            <div>
                                <h3 class="font-bold text-lg text-gray-800">${item.year}</h3>
                                <p class="text-sm text-gray-500">${item.period}</p>
                            </div>
                            ${item.featured ? '<div class="era-badge">Featured</div>' : ''}
                        </div>
                        <h4 class="font-semibold text-green-600 mb-2">${item.scholar}</h4>
                        <p class="text-gray-600 leading-relaxed">${item.event}</p>
                    </div>
                </div>
            `;
        }

        // Render scholars
        function renderScholars(scholars = currentScholars, append = false) {
            if (!append) {
                scholarsGrid.innerHTML = '';
            }

            const scholarsToShow = scholars.slice(0, currentPage * scholarsPerPage);
            const newScholars = append ? scholars.slice((currentPage - 1) * scholarsPerPage, currentPage *
                scholarsPerPage) : scholarsToShow;

            newScholars.forEach((scholar, index) => {
                const scholarElement = document.createElement('div');
                scholarElement.innerHTML = createScholarCard(scholar, index);
                scholarsGrid.appendChild(scholarElement.firstElementChild);
            });

            // Update counts
            resultsCount.textContent = Math.min(scholarsToShow.length, scholars.length);
            totalCount.textContent = scholars.length;

            // Show/hide load more button
            if (scholarsToShow.length >= scholars.length) {
                loadMoreBtn.style.display = 'none';
            } else {
                loadMoreBtn.style.display = 'block';
            }

            // Reinitialize AOS for new elements
            AOS.refresh();

            // Animate influence meters
            setTimeout(() => {
                document.querySelectorAll('.influence-fill').forEach(fill => {
                    fill.style.width = fill.style.width;
                });
            }, 500);
        }

        // Render timeline
        function renderTimeline() {
            scholarTimeline.innerHTML = '';
            timelineData.forEach((item, index) => {
                const timelineElement = document.createElement('div');
                timelineElement.innerHTML = createTimelineItem(item, index);
                scholarTimeline.appendChild(timelineElement.firstElementChild);
            });
        }

        // Filter scholars by era
        function filterScholars(era) {
            showLoading();
            setTimeout(() => {
                if (era === 'all') {
                    currentScholars = scholarsData;
                } else {
                    currentScholars = scholarsData.filter(scholar => scholar.era === era);
                }
                currentPage = 1;
                renderScholars();
                hideLoading();
            }, 500);
        }

        // Sort scholars
        function sortScholars(sortBy) {
            showLoading();
            setTimeout(() => {
                const sortedScholars = [...currentScholars];

                switch (sortBy) {
                    case 'name':
                        sortedScholars.sort((a, b) => a.name.localeCompare(b.name));
                        break;
                    case 'era':
                        const eraOrder = {
                            'classical': 1,
                            'golden': 2,
                            'medieval': 3,
                            'modern': 4
                        };
                        sortedScholars.sort((a, b) => eraOrder[a.era] - eraOrder[b.era]);
                        break;
                    case 'influence':
                        sortedScholars.sort((a, b) => b.influence - a.influence);
                        break;
                    case 'works':
                        sortedScholars.sort((a, b) => b.worksCount - a.worksCount);
                        break;
                }

                currentScholars = sortedScholars;
                currentPage = 1;
                renderScholars();
                hideLoading();
            }, 500);
        }

        // Search scholars
        function searchScholars(query) {
            showLoading();
            setTimeout(() => {
                if (!query.trim()) {
                    currentScholars = scholarsData;
                } else {
                    const searchTerm = query.toLowerCase();
                    currentScholars = scholarsData.filter(scholar =>
                        scholar.name.toLowerCase().includes(searchTerm) ||
                        scholar.arabicName.includes(searchTerm) ||
                        scholar.region.toLowerCase().includes(searchTerm) ||
                        scholar.specializations.some(spec => spec.toLowerCase().includes(searchTerm)) ||
                        scholar.biography.toLowerCase().includes(searchTerm) ||
                        scholar.era.toLowerCase().includes(searchTerm)
                    );
                }
                currentPage = 1;
                renderScholars();
                hideLoading();
            }, 500);
        }

        // Show/hide loading
        function showLoading() {
            loadingOverlay.classList.add('show');
        }

        function hideLoading() {
            loadingOverlay.classList.remove('show');
        }

        // Event listeners
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                filterScholars(this.dataset.era);
            });
        });

        sortSelect.addEventListener('change', function() {
            sortScholars(this.value);
        });

        searchBtn.addEventListener('click', function() {
            searchScholars(searchInput.value);
        });

        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchScholars(this.value);
            }
        });

        loadMoreBtn.addEventListener('click', function() {
            currentPage++;
            renderScholars(currentScholars, true);
        });

        // Scroll progress and navigation effects
        const scrollIndicator = document.getElementById('scrollIndicator');
        const navbar = document.getElementById('navbar');
        const backToTop = document.getElementById('backToTop');

        function updateScrollProgress() {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;

            scrollIndicator.style.width = scrolled + '%';

            if (winScroll > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }

            if (winScroll > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        }

        window.addEventListener('scroll', updateScrollProgress);

        // Back to top functionality
        backToTop.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Close mobile menu when clicking on links
        document.querySelectorAll('#mobileMenu a').forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.remove('active');
                menuIcon.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
            });
        });

        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            renderScholars();
            renderTimeline();
            updateScrollProgress();
        });
    </script>
</body>

</html>
