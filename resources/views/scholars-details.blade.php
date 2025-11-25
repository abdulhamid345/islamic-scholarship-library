{{-- resources/views/scholars-details.blade.php --}}
@extends('layouts.frontend')

@section('title', $scholar->name . ' - Islamic Digital Library')

@section('content')
<div class="scholar-details-page">
    <!-- Breadcrumb -->
    <div class="breadcrumb-section">
        <div class="container">
            <nav class="breadcrumb">
                <a href="{{ route('welcome') }}">Home</a>
                <span>/</span>
                <a href="{{ route('scholars') }}">Scholars</a>
                <span>/</span>
                <span>{{ Str::limit($scholar->name, 50) }}</span>
            </nav>
        </div>
    </div>

    <!-- Scholar Details -->
    <div class="scholar-details-section">
        <div class="container">
            <div class="scholar-details-grid">
                <!-- Main Content -->
                <div class="scholar-main">
                    <!-- Scholar Header -->
                    <div class="scholar-header">
                        <div class="scholar-avatar-large">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="scholar-header-info">
                            <h1 class="scholar-name-large">{{ $scholar->name }}</h1>
                            @if($scholar->years_active)
                            <p class="scholar-years-large">{{ $scholar->years_active }}</p>
                            @endif
                            <div class="scholar-stats">
                                <div class="stat-box">
                                    <div class="stat-number">{{ $scholar->books->count() }}</div>
                                    <div class="stat-label">Books</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Biography -->
                    @if($scholar->biography)
                    <div class="scholar-biography-section">
                        <h2 class="section-title">Biography</h2>
                        <div class="biography-content">
                            {!! $scholar->biography !!}
                        </div>
                    </div>
                    @endif

                    <!-- Books by Scholar -->
                    @if($scholar->books->count() > 0)
                    <div class="scholar-books-section">
                        <h2 class="section-title">Books by {{ $scholar->name }}</h2>
                        <div class="books-grid">
                            @foreach($scholar->books as $book)
                            <a href="{{ route('books.details', $book->id) }}" class="book-card-mini">
                                <div class="book-cover-mini">
                                    <i class="fas fa-book"></i>
                                </div>
                                <div class="book-info-mini">
                                    <h4 class="book-title-mini">{{ Str::limit($book->title, 50) }}</h4>
                                    <p class="book-category-mini">{{ $book->category->name ?? 'Uncategorized' }}</p>
                                    <div class="book-stats-mini">
                                        <span><i class="fas fa-download"></i> {{ number_format($book->download_count) }}</span>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="scholar-sidebar">
                    <!-- Quick Info -->
                    <div class="sidebar-card">
                        <h3 class="sidebar-title">Quick Information</h3>
                        <div class="info-list">
                            @if($scholar->years_active)
                            <div class="info-item">
                                <span class="info-label">Years Active</span>
                                <span class="info-value">{{ $scholar->years_active }}</span>
                            </div>
                            @endif
                            <div class="info-item">
                                <span class="info-label">Total Books</span>
                                <span class="info-value">{{ $scholar->books->count() }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Related Scholars -->
                    @if($relatedScholars->count() > 0)
                    <div class="sidebar-card">
                        <h3 class="sidebar-title">Related Scholars</h3>
                        <div class="related-scholars-list">
                            @foreach($relatedScholars as $relatedScholar)
                            <a href="{{ route('scholars.details', $relatedScholar->id) }}" class="related-scholar-item">
                                <div class="related-scholar-avatar">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                <div class="related-scholar-info">
                                    <h4 class="related-scholar-name">{{ Str::limit($relatedScholar->name, 30) }}</h4>
                                    <p class="related-scholar-books">{{ $relatedScholar->books_count }} Books</p>
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
.scholar-details-page {
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

.scholar-details-section {
    padding: 3rem 0;
}

.scholar-details-grid {
    display: grid;
    grid-template-columns: 1fr 350px;
    gap: 3rem;
}

.scholar-main {
    background: white;
    border-radius: 16px;
    padding: 2rem;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

.scholar-header {
    display: flex;
    gap: 2rem;
    margin-bottom: 2rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid #e5e7eb;
}

.scholar-avatar-large {
    width: 150px;
    height: 150px;
    background: linear-gradient(135deg, #059669 0%, #065f46 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
}

.scholar-avatar-large i {
    font-size: 4rem;
            color: white;
}

.scholar-header-info {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.scholar-name-large {
    font-size: 2.5rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 0.5rem;
}

.scholar-years-large {
    font-size: 1.2rem;
    color: #6b7280;
    margin-bottom: 1.5rem;
}

.scholar-stats {
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

.scholar-biography-section,
.scholar-books-section {
    margin-top: 2rem;
}

.section-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 1rem;
}

.biography-content {
    color: #6b7280;
    line-height: 1.8;
    font-size: 1rem;
}

.biography-content p {
    margin-bottom: 1rem;
}

.books-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 1.5rem;
    margin-top: 1.5rem;
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

.book-category-mini {
    font-size: 0.8rem;
    color: #6b7280;
    margin-bottom: 0.5rem;
}

.book-stats-mini {
    font-size: 0.75rem;
    color: #059669;
}

.scholar-sidebar {
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
}

.related-scholars-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.related-scholar-item {
    display: flex;
    gap: 1rem;
    padding: 1rem;
    background: #f9fafb;
    border-radius: 12px;
    text-decoration: none;
    color: inherit;
    transition: background 0.3s;
}

.related-scholar-item:hover {
    background: #f3f4f6;
}

.related-scholar-avatar {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #059669 0%, #065f46 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.related-scholar-avatar i {
    color: white;
    font-size: 1.2rem;
}

.related-scholar-info {
    flex: 1;
}

.related-scholar-name {
    font-size: 0.9rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.3rem;
}

.related-scholar-books {
    font-size: 0.8rem;
    color: #6b7280;
}

@media (max-width: 968px) {
    .scholar-details-grid {
        grid-template-columns: 1fr;
    }
    
    .scholar-header {
        flex-direction: column;
        text-align: center;
    }
    
    .scholar-avatar-large {
        margin: 0 auto;
    }
}

@media (max-width: 768px) {
    .scholar-name-large {
        font-size: 1.8rem;
    }
    
    .books-grid {
        grid-template-columns: 1fr;
    }
}
</style>
@endsection
