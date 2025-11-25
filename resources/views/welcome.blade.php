@extends('layouts.frontend')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-container">
            <div class="hero-icon">
                <i class="fas fa-check"></i>
            </div>

            <h1 class="hero-title-ar">
                اكتشف الحكمة من<br>
                <span class="highlight">العلماء المعاصرين</span>
            </h1>

            <h2 class="hero-title-en">
                Discover Wisdom from<br>
                Contemporary Scholars
            </h2>

            <p class="hero-description">
                Access authentic Islamic knowledge through curated works, research papers, and scholarly
                publications from distinguished Islamic scholars and researchers worldwide.
            </p>

            <div class="hero-buttons">
                <a href="{{ route('books') }}" class="btn-hero btn-hero-primary">
                    <i class="fas fa-arrow-left" style="transform: rotate(180deg);"></i>
                    استكشف المجموعة
                    <span style="margin-left: 0.5rem;">Explore Collection</span>
                </a>
                <a href="{{ route('categories') }}" class="btn-hero btn-hero-secondary">
                    <i class="fas fa-th-large"></i>
                    Browse Categories
                </a>
            </div>

            <!-- Stats -->
            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-number">{{ number_format($totalBooks) }}</div>
                    <div class="stat-label">Books / الكتب</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">{{ number_format($totalScholars) }}</div>
                    <div class="stat-label">Scholars / العلماء</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">{{ number_format($totalCategories) }}</div>
                    <div class="stat-label">Categories / التصنيفات</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Books Section -->
    @if($books->count() > 0)
    <section class="featured-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title-ar">الكتب المميزة</h2>
                <h3 class="section-title-en">Featured Books</h3>
                <a href="{{ route('books') }}" class="section-link">View All Books <i class="fas fa-arrow-left"></i></a>
            </div>
            <div class="books-grid">
                @foreach($books as $book)
                <div class="book-card">
                    <a href="{{ route('books.details', $book->id) }}" class="book-link">
                        <div class="book-cover">
                            <div class="book-placeholder">
                                <i class="fas fa-book"></i>
                            </div>
                            @if($book->download_count > 0)
                            <div class="download-badge">
                                <i class="fas fa-download"></i>
                                {{ number_format($book->download_count) }}
                            </div>
                            @endif
                        </div>
                        <div class="book-info">
                            <h4 class="book-title">{{ $book->title }}</h4>
                            <p class="book-author">{{ $book->scholar->name ?? 'Unknown Author' }}</p>
                            <p class="book-category">{{ $book->category->name ?? 'Uncategorized' }}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Featured Scholars Section -->
    @if($scholars->count() > 0)
    <section class="featured-section bg-light">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title-ar">العلماء المميزون</h2>
                <h3 class="section-title-en">Featured Scholars</h3>
                <a href="{{ route('scholars') }}" class="section-link">View All Scholars <i class="fas fa-arrow-left"></i></a>
            </div>
            <div class="scholars-grid">
                @foreach($scholars as $scholar)
                <div class="scholar-card">
                    <a href="{{ route('scholars.details', $scholar->id) }}" class="scholar-link">
                        <div class="scholar-avatar">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="scholar-info">
                            <h4 class="scholar-name">{{ $scholar->name }}</h4>
                            @if($scholar->years_active)
                            <p class="scholar-years">{{ $scholar->years_active }}</p>
                            @endif
                            <p class="scholar-books">{{ $scholar->books_count }} {{ $scholar->books_count == 1 ? 'Book' : 'Books' }}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Categories Section -->
    @if($categories->count() > 0)
    <section class="featured-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title-ar">التصنيفات</h2>
                <h3 class="section-title-en">Categories</h3>
                <a href="{{ route('categories') }}" class="section-link">View All Categories <i class="fas fa-arrow-left"></i></a>
            </div>
            <div class="categories-grid">
                @foreach($categories as $category)
                <a href="{{ route('categories.details', $category->id) }}" class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-folder"></i>
                    </div>
                    <div class="category-info">
                        <h4 class="category-name">{{ $category->name }}</h4>
                        <p class="category-count">{{ $category->books_count }} {{ $category->books_count == 1 ? 'Book' : 'Books' }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <style>
        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 3rem;
            margin-top: 3rem;
            flex-wrap: wrap;
        }
        .stat-item {
            text-align: center;
        }
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #fbbf24;
        }
        .stat-label {
            font-size: 0.9rem;
            color: rgba(255,255,255,0.9);
            margin-top: 0.5rem;
        }
        .featured-section {
            padding: 4rem 0;
        }
        .bg-light {
            background: #f8fafc;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }
        .section-title-ar {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }
        .section-title-en {
            font-size: 1.8rem;
            font-weight: 600;
            color: #059669;
            margin-bottom: 1rem;
        }
        .section-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #059669;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s;
        }
        .section-link:hover {
            color: #065f46;
        }
        .books-grid, .scholars-grid, .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 2rem;
        }
        .book-card, .scholar-card, .category-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            text-decoration: none;
            color: inherit;
        }
        .book-card:hover, .scholar-card:hover, .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        .book-link {
            text-decoration: none;
            color: inherit;
            display: block;
        }
        .book-cover {
            height: 200px;
            background: linear-gradient(135deg, #059669 0%, #065f46 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .book-placeholder {
            width: 80px;
            height: 80px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .book-placeholder i {
            font-size: 2rem;
            color: white;
        }
        .download-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(0,0,0,0.7);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
        }
        .book-info {
            padding: 1.5rem;
        }
        .book-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #1f2937;
        }
        .book-author, .book-category {
            font-size: 0.9rem;
            color: #6b7280;
            margin-bottom: 0.3rem;
        }
        .scholar-link {
            text-decoration: none;
            color: inherit;
            display: block;
            padding: 2rem;
            text-align: center;
        }
        .scholar-avatar {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #059669 0%, #065f46 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }
        .scholar-avatar i {
            font-size: 2rem;
            color: white;
        }
        .scholar-name {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #1f2937;
        }
        .scholar-years, .scholar-books {
            font-size: 0.9rem;
            color: #6b7280;
        }
        .category-card {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.5rem;
        }
        .category-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #059669 0%, #065f46 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .category-icon i {
            font-size: 1.5rem;
            color: white;
        }
        .category-name {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.3rem;
            color: #1f2937;
        }
        .category-count {
            font-size: 0.9rem;
            color: #6b7280;
        }
        @media (max-width: 768px) {
            .books-grid, .scholars-grid, .categories-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection