{{-- resources/views/categories.blade.php --}}
@extends('layouts.frontend')

@section('title', 'Categories - Islamic Digital Library')

@section('content')
<div class="categories-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="page-header-container">
            <div class="page-title-section">
                <h1 class="page-title-ar">التصنيفات</h1>
                <h2 class="page-title-en">Book Categories</h2>
                <p class="page-description">
                    Browse our comprehensive collection of Islamic book categories covering various topics from Quranic studies to Islamic history and jurisprudence.
                </p>
                <div class="page-stats">
                    <div class="stat-item">
                        <span class="stat-number">{{ $categories->count() }}</span>
                        <span class="stat-label">Categories / التصنيفات</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">{{ $categories->sum('books_count') }}</span>
                        <span class="stat-label">Total Books / إجمالي الكتب</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories Grid -->
    <div class="categories-section">
        <div class="categories-container">
            <div class="categories-grid" id="categoriesGrid">
                @forelse($categories as $category)
                <a href="{{ route('categories.details', $category->id) }}" class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-folder"></i>
                    </div>
                    <div class="category-info">
                        <h3 class="category-name">{{ $category->name }}</h3>
                        @if($category->description)
                        <p class="category-description">{{ Str::limit($category->description, 100) }}</p>
                        @endif
                        <div class="category-stats">
                            <span class="category-count">
                                <i class="fas fa-book"></i>
                                {{ $category->books_count }} {{ $category->books_count == 1 ? 'Book' : 'Books' }}
                            </span>
                        </div>
                    </div>
                </a>
                @empty
                <div class="no-categories">
                    <div class="no-categories-content">
                        <i class="fas fa-folder-open"></i>
                        <h3>No Categories Found</h3>
                        <p>Categories will appear here once they are added.</p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<style>
.categories-page {
    background: #f8fafc;
    min-height: 100vh;
}

.page-header {
    background: linear-gradient(135deg, #059669 0%, #065f46 100%);
    color: white;
    padding: 4rem 0;
    position: relative;
    overflow: hidden;
}

.page-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M30 30c0-16.569 13.431-30 30-30v60c-16.569 0-30-13.431-30-30zM0 30c0 16.569 13.431 30 30 30V0C13.431 0 0 13.431 0 30z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E") repeat;
}

.page-header-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
    position: relative;
    z-index: 2;
    text-align: center;
}

.page-title-ar {
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.3);
}

.page-title-en {
    font-size: 2.5rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
    color: rgba(255,255,255,0.9);
}

.page-description {
    font-size: 1.2rem;
    line-height: 1.6;
    margin-bottom: 2.5rem;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
    color: rgba(255,255,255,0.9);
}

.page-stats {
    display: flex;
    justify-content: center;
    gap: 3rem;
    flex-wrap: wrap;
}

.stat-item {
    text-align: center;
}

.stat-number {
    display: block;
    font-size: 2.5rem;
    font-weight: 700;
    color: #fbbf24;
    text-shadow: 0 2px 4px rgba(0,0,0,0.3);
}

.stat-label {
    font-size: 0.9rem;
    color: rgba(255,255,255,0.8);
}

.categories-section {
    padding: 3rem 0;
}

.categories-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
}

.categories-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 2rem;
}

.category-card {
    background: white;
    border-radius: 16px;
    padding: 2rem;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-decoration: none;
    color: inherit;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.category-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

.category-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #059669 0%, #065f46 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.5rem;
}

.category-icon i {
    font-size: 2rem;
    color: white;
}

.category-info {
    width: 100%;
}

.category-name {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 1rem;
}

.category-description {
    color: #6b7280;
    font-size: 0.9rem;
    line-height: 1.5;
    margin-bottom: 1rem;
}

.category-stats {
    margin-top: 1rem;
    padding-top: 1rem;
    border-top: 1px solid #e5e7eb;
}

.category-count {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: #059669;
    font-weight: 600;
    font-size: 0.9rem;
}

.no-categories {
    grid-column: 1 / -1;
    text-align: center;
    padding: 4rem 2rem;
}

.no-categories-content i {
    font-size: 4rem;
    color: #9ca3af;
    margin-bottom: 1rem;
}

.no-categories-content h3 {
    font-size: 1.5rem;
    color: #374151;
    margin-bottom: 1rem;
}

.no-categories-content p {
    color: #6b7280;
}

@media (max-width: 768px) {
    .page-title-ar {
        font-size: 2.5rem;
    }
    
    .page-title-en {
        font-size: 1.8rem;
    }
    
    .categories-grid {
        grid-template-columns: 1fr;
    }
}
</style>
@endsection

