@extends('layouts.frontend')

@section('content')
    <!-- Page Header -->
    <section class="scholars-hero">
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

        <div class="scholars-hero-container">
            <div class="scholars-hero-content">
                <div class="scholars-badge">
                    <svg class="w-5 h-5 mr-3 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2L3 7v11a1 1 0 001 1h3v-8h6v8h3a1 1 0 001-1V7l-7-5z" />
                    </svg>
                    Preserving Islamic Scholarship Through the Ages
                </div>

                <h1 class="scholars-hero-title">
                    Islamic
                    <span class="scholars-hero-title-highlight">Scholars</span>
                </h1>
                <p class="scholars-hero-description">
                    Explore the lives, works, and lasting contributions of <span
                        class="font-semibold text-yellow-300">renowned Islamic scholars</span> who shaped Islamic
                    thought and jurisprudence across centuries
                </p>

                <!-- Search Bar -->
                <div class="scholars-search-container">
                    <div class="scholars-search-wrapper">
                        <i class="fas fa-search scholars-search-icon"></i>
                        <input id="mainSearchInput" type="text"
                            class="scholars-search-input"
                            placeholder="Search scholars by name, era, or specialization...">
                        <button id="mainSearchBtn" class="scholars-search-btn">
                            Search
                        </button>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="scholars-stats-grid">
                    <div class="scholars-stat-item">
                        <div class="scholars-stat-number">{{ $scholars->count() }}</div>
                        <div class="scholars-stat-label">Scholars</div>
                    </div>
                    <div class="scholars-stat-item">
                        <div class="scholars-stat-number">{{ $scholars->sum('books_count') }}</div>
                        <div class="scholars-stat-label">Total Works</div>
                    </div>
                    <div class="scholars-stat-item">
                        <div class="scholars-stat-number">{{ $scholars->whereNotNull('years_active')->count() }}</div>
                        <div class="scholars-stat-label">With History</div>
                    </div>
                    <div class="scholars-stat-item">
                        <div class="scholars-stat-number">{{ round($scholars->avg('books_count'), 1) }}</div>
                        <div class="scholars-stat-label">Avg Books</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Filters and Controls -->
    <section class="scholars-filters">
        <div class="scholars-filters-container">
            <div class="scholars-filters-content">
                <!-- Sort and View Controls -->
                <div class="scholars-sort-controls">
                    <label class="scholars-sort-label">Sort by:</label>
                    <select id="sortSelect" class="scholars-sort-select">
                        <option value="name">Name A-Z</option>
                        <option value="era">Era</option>
                        <option value="influence">Influence</option>
                        <option value="works">Most Works</option>
                    </select>
                </div>
            </div>
        </div>
    </section>

    <!-- Scholars Grid -->
    <section class="scholars-grid-section">
        <div class="scholars-grid-container">
            <div id="scholarsGrid" class="scholars-grid">
                @forelse($scholars as $scholar)
                <div class="scholar-card">
                    <a href="{{ route('scholars.details', $scholar->id) }}" class="block">
                        <div class="scholar-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="scholar-info">
                            <h3 class="scholar-name">{{ $scholar->name }}</h3>
                            @if($scholar->years_active)
                            <p class="scholar-years">{{ $scholar->years_active }}</p>
                            @endif
                            <p class="scholar-books">{{ $scholar->books_count }} {{ $scholar->books_count == 1 ? 'Book' : 'Books' }}</p>
                            @if($scholar->biography)
                            <p class="scholar-bio-preview">{{ Str::limit(strip_tags($scholar->biography), 100) }}</p>
                            @endif
                        </div>
                    </a>
                </div>
                @empty
                <div class="scholars-empty">
                    <i class="fas fa-user-graduate"></i>
                    <h3>No Scholars Found</h3>
                    <p>Scholars will appear here once they are added.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <style>
        /* Hero Section */
        .scholars-hero {
            background: linear-gradient(135deg, #0f4a2a 0%, #166534 50%, #22c55e 100%);
            padding: 6rem 0 5rem;
            position: relative;
            overflow: hidden;
        }

        .scholars-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M30 30c0-16.569 13.431-30 30-30v60c-16.569 0-30-13.431-30-30zM0 30c0 16.569 13.431 30 30 30V0C13.431 0 0 13.431 0 30z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E") repeat;
        }

        .scholars-hero-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .scholars-hero-content {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .scholars-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            margin: 0 auto 1.5rem;
        }

        .scholars-badge svg {
            width: 1.25rem;
            height: 1.25rem;
            margin-right: 0.75rem;
            color: #fbbf24;
        }

        .scholars-hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            color: white;
            line-height: 1.2;
            margin-bottom: 1rem;
        }

        .scholars-hero-title-highlight {
            display: block;
            color: #fbbf24;
        }

        .scholars-hero-description {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.9);
            max-width: 56rem;
            margin: 0 auto;
            line-height: 1.6;
        }

        .scholars-hero-description span {
            font-weight: 600;
            color: #fbbf24;
        }

        /* Search Container */
        .scholars-search-container {
            max-width: 42rem;
            margin: 2.5rem auto 0;
        }

        .scholars-search-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .scholars-search-icon {
            position: absolute;
            left: 1rem;
            color: #6b7280;
            font-size: 1.5rem;
            z-index: 2;
        }

        .scholars-search-input {
            width: 100%;
            padding: 1.25rem 1.25rem 1.25rem 3.5rem;
            background: white;
            border-radius: 1rem;
            border: none;
            font-size: 1.125rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .scholars-search-input:focus {
            outline: none;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 0 0 3px rgba(5, 150, 105, 0.1);
        }

        .scholars-search-btn {
            position: absolute;
            right: 0.5rem;
            background: #059669;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            font-weight: 500;
            border: none;
            cursor: pointer;
            transition: background 0.3s;
        }

        .scholars-search-btn:hover {
            background: #047857;
        }

        /* Stats Grid */
        .scholars-stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
            max-width: 56rem;
            margin: 3rem auto 0;
        }

        .scholars-stat-item {
            text-align: center;
        }

        .scholars-stat-number {
            font-size: 2.25rem;
            font-weight: 700;
            color: #fbbf24;
            margin-bottom: 0.5rem;
        }

        .scholars-stat-label {
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
        }

        /* Filters Section */
        .scholars-filters {
            background: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 4rem;
            z-index: 40;
        }

        .scholars-filters-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1.5rem 2rem;
        }

        .scholars-filters-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .scholars-sort-controls {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .scholars-sort-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
        }

        .scholars-sort-select {
            padding: 0.5rem 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            background: white;
        }

        .scholars-sort-select:focus {
            outline: none;
            border-color: #059669;
            box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.1);
        }

        /* Scholars Grid Section */
        .scholars-grid-section {
            padding: 4rem 0;
            background: #f9fafb;
        }

        .scholars-grid-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .scholars-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }

        .scholar-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .scholar-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .scholar-card a {
            text-decoration: none;
            color: inherit;
            display: block;
            padding: 2rem;
            text-align: center;
        }

        .scholar-avatar {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #059669 0%, #065f46 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
        }

        .scholar-avatar i {
            font-size: 2.5rem;
            color: white;
        }

        .scholar-name {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }

        .scholar-years {
            font-size: 1rem;
            color: #6b7280;
            margin-bottom: 0.5rem;
        }

        .scholar-books {
            font-size: 0.9rem;
            color: #059669;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .scholar-bio-preview {
            font-size: 0.85rem;
            color: #6b7280;
            line-height: 1.5;
            margin-top: 1rem;
        }

        .scholars-empty {
            grid-column: 1 / -1;
            text-align: center;
            padding: 4rem 2rem;
        }

        .scholars-empty i {
            font-size: 4rem;
            color: #9ca3af;
            margin-bottom: 1rem;
        }

        .scholars-empty h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #374151;
            margin-bottom: 0.5rem;
        }

        .scholars-empty p {
            color: #6b7280;
        }

        /* Responsive */
        @media (min-width: 1024px) {
            .scholars-hero-title {
                font-size: 4.5rem;
            }

            .scholars-stats-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        @media (max-width: 768px) {
            .scholars-hero {
                padding: 4rem 0 3rem;
            }

            .scholars-hero-title {
                font-size: 2.5rem;
            }

            .scholars-hero-description {
                font-size: 1rem;
            }

            .scholars-search-input {
                font-size: 1rem;
                padding: 1rem 1rem 1rem 3rem;
            }

            .scholars-search-btn {
                padding: 0.5rem 1rem;
                font-size: 0.875rem;
            }

            .scholars-stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }

            .scholars-stat-number {
                font-size: 1.75rem;
            }

            .scholars-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection
