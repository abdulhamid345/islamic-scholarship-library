{{-- resources/views/categories-details.blade.php --}}
@extends('layouts.frontend')

@section('title', $category->name . ' - Islamic Digital Library')

@section('content')
<div class="category-details-page">
    <!-- Breadcrumb -->
    <div class="breadcrumb-section">
        <div class="container">
            <nav class="breadcrumb">
                <a href="{{ route('welcome') }}">Home</a>
                <span>/</span>
                <a href="{{ route('categories') }}">Categories</a>
                <span>/</span>
                <span>{{ Str::limit($category->name, 50) }}</span>
            </nav>
        </div>
    </div>

    <!-- Category Details -->
    <div class="category-details-section">
        <div class="container">
            <div class="category-details-grid">
                <!-- Main Content -->
                <div class="category-main">
                    <!-- Category Header -->
                    <div class="category-header">
                        <div class="category-icon-large">
                            <i class="fas fa-folder"></i>
                        </div>
                        <div class="category-header-info">
                            <h1 class="category-name-large">{{ $category->name }}</h1>
                            @if($category->description)
                            <p class="category-description-large">{{ $category->description }}</p>
                            @endif
                            <div class="category-stats-large">
                                <div class="stat-box">
                                    <div class="stat-number">{{ $category->books->count() }}</div>
                                    <div class="stat-label">Books</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Books in Category -->
                    @if($category->books->count() > 0)
                    <div class="category-books-section">
                        <h2 class="section-title">Books in {{ $category->name }}</h2>
                        <div class="books-grid">
                            @foreach($category->books as $book)
                            <a href="{{ route('books.details', $book->id) }}" class="book-card-mini">
                                <div class="book-cover-mini">
                                    <i class="fas fa-book"></i>
                                </div>
                                <div class="book-info-mini">
                                    <h4 class="book-title-mini">{{ Str::limit($book->title, 50) }}</h4>
                                    <p class="book-author-mini">{{ $book->scholar->name ?? 'Unknown Author' }}</p>
                                    <div class="book-stats-mini">
                                        <span><i class="fas fa-download"></i> {{ number_format($book->download_count) }}</span>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @else
                    <div class="no-books-message">
                        <i class="fas fa-book"></i>
                        <h3>No Books Yet</h3>
                        <p>There are no books in this category yet. Check back later!</p>
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="category-sidebar">
                    <!-- Quick Info -->
                    <div class="sidebar-card">
                        <h3 class="sidebar-title">Category Information</h3>
                        <div class="info-list">
                            <div class="info-item">
                                <span class="info-label">Total Books</span>
                                <span class="info-value">{{ $category->books->count() }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Slug</span>
                                <span class="info-value">{{ $category->slug }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Related Categories -->
                    @if($relatedCategories->count() > 0)
                    <div class="sidebar-card">
                        <h3 class="sidebar-title">Related Categories</h3>
                        <div class="related-categories-list">
                            @foreach($relatedCategories as $relatedCategory)
                            <a href="{{ route('categories.details', $relatedCategory->id) }}" class="related-category-item">
                                <div class="related-category-icon">
                                    <i class="fas fa-folder"></i>
                                </div>
                                <div class="related-category-info">
                                    <h4 class="related-category-name">{{ Str::limit($relatedCategory->name, 30) }}</h4>
                                    <p class="related-category-books">{{ $relatedCategory->books_count }} Books</p>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.category-details-page {
    background: #f8fafc;
    min-height: 100vh;
}

.breadcrumb-section {
    background: white;
    border-bottom: 1px solid #e5e7eb;
    padding: 1rem 0;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
}

.breadcrumb {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.9rem;
}

.breadcrumb a {
    color: #059669;
    text-decoration: none;
}

.breadcrumb a:hover {
    text-decoration: underline;
}

.breadcrumb span {
    color: #6b7280;
}

.category-details-section {
    padding: 3rem 0;
}

.category-details-grid {
    display: grid;
    grid-template-columns: 1fr 350px;
    gap: 3rem;
}

.category-main {
    background: white;
    border-radius: 16px;
    padding: 2rem;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

.category-header {
    display: flex;
    gap: 2rem;
    margin-bottom: 2rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid #e5e7eb;
}

.category-icon-large {
    width: 120px;
    height: 120px;
    background: linear-gradient(135deg, #059669 0%, #065f46 100%);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
}

.category-icon-large i {
    font-size: 3.5rem;
    color: white;
}

.category-header-info {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.category-name-large {
    font-size: 2.5rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 1rem;
}

.category-description-large {
    font-size: 1.1rem;
    color: #6b7280;
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

.category-stats-large {
    display: flex;
    gap: 2rem;
}

.stat-box {
    text-align: center;
    padding: 1rem 2rem;
    background: #f9fafb;
    border-radius: 12px;
}

.stat-number {
    font-size: 2rem;
    font-weight: 700;
    color: #059669;
}

.stat-label {
    font-size: 0.9rem;
    color: #6b7280;
    margin-top: 0.3rem;
}

.category-books-section {
    margin-top: 2rem;
}

.section-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 1.5rem;
}

.books-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 1.5rem;
}

.book-card-mini {
    background: #f9fafb;
    border-radius: 12px;
    padding: 1rem;
    text-decoration: none;
    color: inherit;
    transition: transform 0.3s, box-shadow 0.3s;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.book-card-mini:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
}

.book-cover-mini {
    width: 60px;
    height: 80px;
    background: linear-gradient(135deg, #059669 0%, #065f46 100%);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 0.8rem;
}

.book-cover-mini i {
    color: white;
    font-size: 1.5rem;
}

.book-title-mini {
    font-size: 0.9rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.3rem;
}

.book-author-mini {
    font-size: 0.8rem;
    color: #6b7280;
    margin-bottom: 0.5rem;
}

.book-stats-mini {
    font-size: 0.75rem;
    color: #059669;
}

.no-books-message {
    text-align: center;
    padding: 4rem 2rem;
}

.no-books-message i {
    font-size: 4rem;
    color: #9ca3af;
    margin-bottom: 1rem;
}

.no-books-message h3 {
    font-size: 1.5rem;
    color: #374151;
    margin-bottom: 1rem;
}

.no-books-message p {
    color: #6b7280;
}

.category-sidebar {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.sidebar-card {
    background: white;
    border-radius: 16px;
    padding: 1.5rem;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

.sidebar-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 1rem;
}

.info-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.info-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 1rem;
    border-bottom: 1px solid #e5e7eb;
}

.info-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
}

.info-label {
    color: #6b7280;
    font-size: 0.9rem;
}

.info-value {
    color: #1f2937;
    font-weight: 600;
    font-size: 0.85rem;
}

.related-categories-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.related-category-item {
    display: flex;
    gap: 1rem;
    padding: 1rem;
    background: #f9fafb;
    border-radius: 12px;
    text-decoration: none;
    color: inherit;
    transition: background 0.3s;
}

.related-category-item:hover {
    background: #f3f4f6;
}

.related-category-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #059669 0%, #065f46 100%);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.related-category-icon i {
    color: white;
    font-size: 1.2rem;
}

.related-category-info {
    flex: 1;
}

.related-category-name {
    font-size: 0.9rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.3rem;
}

.related-category-books {
    font-size: 0.8rem;
    color: #6b7280;
}

@media (max-width: 968px) {
    .category-details-grid {
        grid-template-columns: 1fr;
    }
    
    .category-header {
        flex-direction: column;
        text-align: center;
    }
    
    .category-icon-large {
        margin: 0 auto;
    }
}

@media (max-width: 768px) {
    .category-name-large {
        font-size: 1.8rem;
    }
    
    .books-grid {
        grid-template-columns: 1fr;
    }
}
</style>
@endsection

