{{-- resources/views/books-details.blade.php --}}
@extends('layouts.frontend')

@section('title', $book->title . ' - Islamic Digital Library')

@section('content')
<div class="book-details-page">
    <!-- Breadcrumb -->
    <div class="breadcrumb-section">
        <div class="container">
            <nav class="breadcrumb">
                <a href="{{ route('welcome') }}">Home</a>
                <span>/</span>
                <a href="{{ route('books') }}">Books</a>
                <span>/</span>
                <span>{{ Str::limit($book->title, 50) }}</span>
            </nav>
        </div>
    </div>

    <!-- Book Details -->
    <div class="book-details-section">
        <div class="container">
            <div class="book-details-grid">
                <!-- Main Content -->
                <div class="book-main">
                    <!-- Book Header -->
                    <div class="book-header">
                        <div class="book-cover-large">
                            <div class="book-placeholder-large">
                                <i class="fas fa-book"></i>
                            </div>
                            @if($book->download_count > 0)
                            <div class="download-badge-large">
                                <i class="fas fa-download"></i>
                                {{ number_format($book->download_count) }} downloads
                            </div>
                            @endif
                        </div>
                        <div class="book-header-info">
                            <h1 class="book-title-large">{{ $book->title }}</h1>
                            <div class="book-meta-large">
                                <div class="meta-item">
                                    <i class="fas fa-user-graduate"></i>
                                    <div>
                                        <span class="meta-label">Author</span>
                                        <a href="{{ route('scholars.details', $book->scholar->id) }}" class="meta-value">
                                            {{ $book->scholar->name ?? 'Unknown Author' }}
                                        </a>
                                    </div>
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-folder"></i>
                                    <div>
                                        <span class="meta-label">Category</span>
                                        <a href="{{ route('categories.details', $book->category->id) }}" class="meta-value">
                                            {{ $book->category->name ?? 'Uncategorized' }}
                                        </a>
                                    </div>
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-calendar"></i>
                                    <div>
                                        <span class="meta-label">Added</span>
                                        <span class="meta-value">{{ $book->created_at->format('M d, Y') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="book-actions-large">
                                @php
                                    $fileUrl = \Illuminate\Support\Facades\Storage::url($book->file);
                                @endphp
                                <a href="{{ $fileUrl }}" target="_blank" class="btn-download" onclick="incrementDownload({{ $book->id }})">
                                    <i class="fas fa-download"></i>
                                    Download Book
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    @if($book->description)
                    <div class="book-description-section">
                        <h2 class="section-title">Description</h2>
                        <p class="book-description-text">{{ $book->description }}</p>
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="book-sidebar">
                    <!-- Quick Info -->
                    <div class="sidebar-card">
                        <h3 class="sidebar-title">Quick Information</h3>
                        <div class="info-list">
                            <div class="info-item">
                                <span class="info-label">Downloads</span>
                                <span class="info-value">{{ number_format($book->download_count) }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Format</span>
                                <span class="info-value">{{ strtoupper(pathinfo($book->file, PATHINFO_EXTENSION)) }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Category</span>
                                <span class="info-value">{{ $book->category->name ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Related Books -->
                    @if($relatedBooks->count() > 0)
                    <div class="sidebar-card">
                        <h3 class="sidebar-title">Related Books</h3>
                        <div class="related-books-list">
                            @foreach($relatedBooks as $relatedBook)
                            <a href="{{ route('books.details', $relatedBook->id) }}" class="related-book-item">
                                <div class="related-book-cover">
                                    <i class="fas fa-book"></i>
                                </div>
                                <div class="related-book-info">
                                    <h4 class="related-book-title">{{ Str::limit($relatedBook->title, 40) }}</h4>
                                    <p class="related-book-author">{{ $relatedBook->scholar->name ?? 'Unknown' }}</p>
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
.book-details-page {
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

.book-details-section {
    padding: 3rem 0;
}

.book-details-grid {
    display: grid;
    grid-template-columns: 1fr 350px;
    gap: 3rem;
}

.book-main {
    background: white;
    border-radius: 16px;
    padding: 2rem;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

.book-header {
    display: grid;
    grid-template-columns: 200px 1fr;
    gap: 2rem;
    margin-bottom: 2rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid #e5e7eb;
}

.book-cover-large {
    width: 200px;
    height: 280px;
    background: linear-gradient(135deg, #059669 0%, #065f46 100%);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
}

.book-placeholder-large {
    width: 100px;
    height: 100px;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.book-placeholder-large i {
    font-size: 3rem;
    color: white;
}

.download-badge-large {
    position: absolute;
    bottom: 1rem;
    left: 50%;
    transform: translateX(-50%);
    background: rgba(0,0,0,0.8);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    white-space: nowrap;
}

.book-header-info {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.book-title-large {
    font-size: 2rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 1.5rem;
    line-height: 1.3;
}

.book-meta-large {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.meta-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
}

.meta-item i {
    color: #059669;
    font-size: 1.2rem;
    margin-top: 0.2rem;
}

.meta-label {
    display: block;
    font-size: 0.8rem;
    color: #6b7280;
    margin-bottom: 0.3rem;
}

.meta-value {
    display: block;
    font-size: 1rem;
    color: #1f2937;
    font-weight: 600;
    text-decoration: none;
}

.meta-value:hover {
    color: #059669;
}

.book-actions-large {
    margin-top: auto;
}

.btn-download {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #059669 0%, #065f46 100%);
    color: white;
    padding: 1rem 2rem;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 600;
    transition: transform 0.3s, box-shadow 0.3s;
}

.btn-download:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(5, 150, 105, 0.3);
}

.book-description-section {
    margin-top: 2rem;
}

.section-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 1rem;
}

.book-description-text {
    color: #6b7280;
    line-height: 1.8;
    font-size: 1rem;
}

.book-sidebar {
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

.related-books-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.related-book-item {
    display: flex;
    gap: 1rem;
    padding: 1rem;
    background: #f9fafb;
    border-radius: 12px;
    text-decoration: none;
    color: inherit;
    transition: background 0.3s;
}

.related-book-item:hover {
    background: #f3f4f6;
}

.related-book-cover {
    width: 50px;
    height: 70px;
    background: linear-gradient(135deg, #059669 0%, #065f46 100%);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.related-book-cover i {
    color: white;
    font-size: 1.2rem;
}

.related-book-info {
    flex: 1;
}

.related-book-title {
    font-size: 0.9rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.3rem;
}

.related-book-author {
    font-size: 0.8rem;
    color: #6b7280;
}

@media (max-width: 968px) {
    .book-details-grid {
        grid-template-columns: 1fr;
    }
    
    .book-header {
        grid-template-columns: 1fr;
        text-align: center;
    }
    
    .book-cover-large {
        margin: 0 auto;
    }
}

@media (max-width: 768px) {
    .book-title-large {
        font-size: 1.5rem;
    }
}
</style>

<script>
function incrementDownload(bookId) {
    fetch(`/books/${bookId}/download`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        console.log('Download count updated');
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
</script>
@endsection
