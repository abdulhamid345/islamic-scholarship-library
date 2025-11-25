{{-- resources/views/books/index.blade.php --}}
@extends('layouts.frontend')

@section('title', 'Books - Islamic Digital Library')

@section('content')
<div class="books-page">
    <!-- Page Header -->
    <div class="page-header">
        <div class="page-header-container">
            <div class="page-title-section">
                <h1 class="page-title-ar">مكتبة الكتب</h1>
                <h2 class="page-title-en">Islamic Books Library</h2>
                <p class="page-description">
                    Discover our comprehensive collection of authentic Islamic literature and scholarly works from renowned Islamic scholars worldwide.
                </p>
                <div class="page-stats">
                    <div class="stat-item">
                        <span class="stat-number">{{ $books->count() }}</span>
                        <span class="stat-label">Available Books / الكتب المتاحة</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">{{ $books->sum('download_count') }}</span>
                        <span class="stat-label">Total Downloads / إجمالي التحميلات</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">{{ $books->unique('category_id')->count() }}</span>
                        <span class="stat-label">Categories / التصنيفات</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Filters -->
    <div class="filters-section">
        <div class="filters-container">
            <div class="search-wrapper">
                <div class="search-input-group">
                    <i class="fas fa-search search-icon"></i>
                    <input 
                        type="text" 
                        id="searchInput" 
                        class="search-input" 
                        placeholder="Search books, authors, topics... / البحث في الكتب والمؤلفين والمواضيع..."
                    >
                    <button type="button" class="search-clear" id="clearSearch" style="display: none;">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            
            <!-- Filter Options -->
            <div class="filter-options">
                <select id="categoryFilter" class="filter-select">
                    <option value="">All Categories / جميع التصنيفات</option>
                    @foreach($books->unique('category_id') as $book)
                        <option value="{{ $book->category_id }}">{{ $book->category->name ?? 'Unknown Category' }}</option>
                    @endforeach
                </select>
                
                <select id="authorFilter" class="filter-select">
                    <option value="">All Authors / جميع المؤلفين</option>
                    @foreach($books->unique('scholar_id') as $book)
                        <option value="{{ $book->scholar_id }}">{{ $book->scholar->name ?? 'Unknown Author' }}</option>
                    @endforeach
                </select>
                
                <select id="sortFilter" class="filter-select">
                    <option value="title">Sort by Title / ترتيب حسب العنوان</option>
                    <option value="downloads">Most Downloaded / الأكثر تحميلاً</option>
                    <option value="newest">Newest First / الأحدث أولاً</option>
                    <option value="author">Author Name / اسم المؤلف</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Books Grid -->
    <div class="books-section">
        <div class="books-container">
            <div class="books-grid" id="booksGrid">
                @forelse($books as $book)
                <div class="book-card" 
                     data-title="{{ strtolower($book->title) }}" 
                     data-author="{{ strtolower($book->scholar->name ?? '') }}" 
                     data-category="{{ $book->category_id }}" 
                     data-scholar="{{ $book->scholar_id }}"
                     data-downloads="{{ $book->download_count }}">
                    
                    <!-- Book Cover -->
                    <div class="book-cover">
                        <div class="book-image">
                            <div class="book-placeholder">
                                <i class="fas fa-book"></i>
                            </div>
                        </div>
                        <div class="book-overlay">
                            <div class="book-actions">
                                <a href="{{ asset('storage/' . $book->file) }}" 
                                   class="book-action-btn primary" 
                                   target="_blank"
                                   onclick="incrementDownload({{ $book->id }})">
                                    <i class="fas fa-download"></i>
                                    Download
                                </a>
                                <button class="book-action-btn secondary" 
                                        onclick="viewBookDetails({{ $book->id }})">
                                    <i class="fas fa-eye"></i>
                                    Details
                                </button>
                            </div>
                        </div>
                        
                        <!-- Download Count Badge -->
                        @if($book->download_count > 0)
                        <div class="download-badge">
                            <i class="fas fa-download"></i>
                            {{ number_format($book->download_count) }}
                        </div>
                        @endif
                    </div>
                    
                    <!-- Book Information -->
                    <div class="book-info">
                        <h3 class="book-title">{{ $book->title }}</h3>
                        
                        <div class="book-meta">
                            <div class="book-author">
                                <i class="fas fa-user-graduate"></i>
                                <span>{{ $book->scholar->name ?? 'Unknown Author' }}</span>
                            </div>
                            
                            <div class="book-category">
                                <i class="fas fa-folder"></i>
                                <span>{{ $book->category->name ?? 'Uncategorized' }}</span>
                            </div>
                        </div>
                        
                        @if($book->description)
                        <p class="book-description">{{ Str::limit($book->description, 100) }}</p>
                        @endif
                        
                        <div class="book-stats">
                            <div class="stat-item">
                                <i class="fas fa-download"></i>
                                <span>{{ number_format($book->download_count) }} downloads</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-file-pdf"></i>
                                <span>{{ strtoupper(pathinfo($book->file, PATHINFO_EXTENSION)) }}</span>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="book-buttons">
                            <a href="{{ asset('storage/' . $book->file) }}" 
                               class="btn btn-primary" 
                               target="_blank"
                               onclick="incrementDownload({{ $book->id }})">
                                <i class="fas fa-download"></i>
                                Download
                            </a>
                            <button class="btn btn-outline" 
                                    onclick="viewBookDetails({{ $book->id }})">
                                <i class="fas fa-info-circle"></i>
                                Details
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="no-books">
                    <div class="no-books-content">
                        <i class="fas fa-book"></i>
                        <h3>No Books Found</h3>
                        <p>We couldn't find any books matching your criteria.</p>
                    </div>
                </div>
                @endforelse
            </div>
            
            <!-- Load More Button -->
            @if($books->count() > 12)
            <div class="load-more-section">
                <button class="btn btn-outline" id="loadMoreBtn">
                    <i class="fas fa-chevron-down"></i>
                    Load More Books / تحميل المزيد من الكتب
                </button>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Book Details Modal -->
<div id="bookModal" class="modal hidden">
    <div class="modal-overlay" onclick="closeBookModal()"></div>
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="modalTitle">Book Details</h3>
            <button class="modal-close" onclick="closeBookModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body" id="modalBody">
            <!-- Content will be loaded here -->
        </div>
    </div>
</div>

<style>
/* Page Styles */
.books-page {
    background: #f8fafc;
    min-height: 100vh;
}

/* Page Header */
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

/* Filters Section */
.filters-section {
    background: white;
    border-bottom: 1px solid #e5e7eb;
    padding: 2rem 0;
    position: sticky;
    top: 0;
    z-index: 100;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.filters-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
}

.search-wrapper {
    display: flex;
    justify-content: center;
    margin-bottom: 1.5rem;
}

.search-input-group {
    position: relative;
    max-width: 600px;
    width: 100%;
}

.search-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #6b7280;
    z-index: 2;
}

.search-input {
    width: 100%;
    padding: 1rem 1rem 1rem 3rem;
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: #f9fafb;
}

.search-input:focus {
    outline: none;
    border-color: #059669;
    background: white;
    box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.1);
}

.search-clear {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #6b7280;
    cursor: pointer;
    padding: 0.5rem;
    border-radius: 50%;
}

.search-clear:hover {
    background: #f3f4f6;
    color: #ef4444;
}

.filter-options {
    display: flex;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
}

.filter-select {
    padding: 0.8rem 1rem;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    background: white;
    font-size: 0.9rem;
    min-width: 180px;
    transition: border-color 0.3s ease;
}

.filter-select:focus {
    outline: none;
    border-color: #059669;
}

/* Books Section */
.books-section {
    padding: 3rem 0;
}

.books-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
}

.books-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.book-card {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
}

.book-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

.book-cover {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.book-image {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #059669 0%, #065f46 100%);
    display: flex;
    align-items: center;
    justify-content: center;
}

.book-placeholder {
    width: 80px;
    height: 80px;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(10px);
}

.book-placeholder i {
    font-size: 2rem;
    color: white;
}

.book-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(6, 95, 70, 0.9);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.book-card:hover .book-overlay {
    opacity: 1;
}

.book-actions {
    display: flex;
    gap: 1rem;
}

.book-action-btn {
    padding: 0.8rem 1.2rem;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: transform 0.3s ease;
    border: none;
    cursor: pointer;
}

.book-action-btn.primary {
    background: white;
    color: #065f46;
}

.book-action-btn.secondary {
    background: #059669;
    color: white;
}

.book-action-btn:hover {
    transform: scale(1.05);
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
    display: flex;
    align-items: center;
    gap: 0.3rem;
    backdrop-filter: blur(10px);
}

.book-info {
    padding: 1.5rem;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.book-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 1rem;
    line-height: 1.4;
}

.book-meta {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    margin-bottom: 1rem;
}

.book-author,
.book-category {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.9rem;
    color: #6b7280;
}

.book-author i,
.book-category i {
    color: #059669;
    width: 16px;
}

.book-description {
    color: #6b7280;
    font-size: 0.9rem;
    line-height: 1.5;
    margin-bottom: 1rem;
    flex: 1;
}

.book-stats {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.8rem 0;
    border-top: 1px solid #e5e7eb;
    border-bottom: 1px solid #e5e7eb;
    margin-bottom: 1rem;
}

.book-stats .stat-item {
    display: flex;
    align-items: center;
    gap: 0.3rem;
    font-size: 0.8rem;
    color: #6b7280;
}

.book-stats .stat-item i {
    color: #059669;
}

.book-buttons {
    display: flex;
    gap: 0.8rem;
    margin-top: auto;
}

.btn {
    flex: 1;
    padding: 0.8rem 1rem;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    text-align: center;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    font-size: 0.9rem;
    border: none;
    cursor: pointer;
}

.btn-primary {
    background: linear-gradient(135deg, #059669 0%, #065f46 100%);
    color: white;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(5, 150, 105, 0.3);
}

.btn-outline {
    background: white;
    color: #059669;
    border: 2px solid #059669;
}

.btn-outline:hover {
    background: #059669;
    color: white;
}

/* No Books */
.no-books {
    grid-column: 1 / -1;
    text-align: center;
    padding: 4rem 2rem;
}

.no-books-content i {
    font-size: 4rem;
    color: #9ca3af;
    margin-bottom: 1rem;
}

.no-books-content h3 {
    font-size: 1.5rem;
    color: #374151;
    margin-bottom: 1rem;
}

.no-books-content p {
    color: #6b7280;
}

/* Load More */
.load-more-section {
    text-align: center;
    margin-top: 2rem;
}

/* Modal */
.modal {
    position: fixed;
    inset: 0;
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1rem;
}

.modal.hidden {
    display: none;
}

.modal-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.5);
    backdrop-filter: blur(5px);
}

.modal-content {
    background: white;
    border-radius: 16px;
    max-width: 600px;
    width: 100%;
    max-height: 80vh;
    overflow: hidden;
    position: relative;
    z-index: 2;
    box-shadow: 0 20px 60px rgba(0,0,0,0.3);
}

.modal-header {
    padding: 1.5rem;
    border-bottom: 1px solid #e5e7eb;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.modal-header h3 {
    font-size: 1.25rem;
    font-weight: 600;
    color: #1f2937;
}

.modal-close {
    background: none;
    border: none;
    font-size: 1.25rem;
    color: #6b7280;
    cursor: pointer;
    padding: 0.5rem;
    border-radius: 50%;
    transition: background-color 0.3s ease;
}

.modal-close:hover {
    background: #f3f4f6;
}

.modal-body {
    padding: 1.5rem;
    overflow-y: auto;
    max-height: calc(80vh - 80px);
}

/* Responsive Design */
@media (max-width: 768px) {
    .page-title-ar {
        font-size: 2.5rem;
    }
    
    .page-title-en {
        font-size: 1.8rem;
    }
    
    .page-stats {
        gap: 1.5rem;
    }
    
    .filters-container {
        padding: 0 1rem;
    }
    
    .filter-options {
        flex-direction: column;
        align-items: center;
    }
    
    .filter-select {
        width: 100%;
        max-width: 300px;
    }
    
    .books-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .book-actions {
        flex-direction: column;
    }
    
    .book-buttons {
        flex-direction: column;
    }
}
</style>

<script>
// Search and Filter Functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const clearSearch = document.getElementById('clearSearch');
    const categoryFilter = document.getElementById('categoryFilter');
    const authorFilter = document.getElementById('authorFilter');
    const sortFilter = document.getElementById('sortFilter');
    const booksGrid = document.getElementById('booksGrid');
    const bookCards = document.querySelectorAll('.book-card');

    // Search functionality
    searchInput.addEventListener('input', function() {
        const searchValue = this.value.toLowerCase();
        
        if (searchValue.length > 0) {
            clearSearch.style.display = 'block';
        } else {
            clearSearch.style.display = 'none';
        }
        
        filterBooks();
    });

    clearSearch.addEventListener('click', function() {
        searchInput.value = '';
        this.style.display = 'none';
        filterBooks();
    });

    // Filter functionality
    categoryFilter.addEventListener('change', filterBooks);
    authorFilter.addEventListener('change', filterBooks);
    sortFilter.addEventListener('change', filterBooks);

    function filterBooks() {
        const searchValue = searchInput.value.toLowerCase();
        const categoryValue = categoryFilter.value;
        const authorValue = authorFilter.value;
        const sortValue = sortFilter.value;

        let visibleCards = Array.from(bookCards).filter(card => {
            const title = card.dataset.title;
            const author = card.dataset.author;
            const category = card.dataset.category;
            const scholar = card.dataset.scholar;

            // Search filter
            const matchesSearch = !searchValue || 
                title.includes(searchValue) || 
                author.includes(searchValue);

            // Category filter
            const matchesCategory = !categoryValue || category === categoryValue;

            // Author filter
            const matchesAuthor = !authorValue || scholar === authorValue;

            return matchesSearch && matchesCategory && matchesAuthor;
        });

        // Sort books
        visibleCards.sort((a, b) => {
            switch (sortValue) {
                case 'downloads':
                    return parseInt(b.dataset.downloads) - parseInt(a.dataset.downloads);
                case 'author':
                    return a.dataset.author.localeCompare(b.dataset.author);
                case 'newest':
                    // Would need created_at data for this
                    return 0;
                default: // title
                    return a.dataset.title.localeCompare(b.dataset.title);
            }
        });

        // Hide all cards first
        bookCards.forEach(card => {
            card.style.display = 'none';
        });

        // Show filtered and sorted cards
        visibleCards.forEach(card => {
            card.style.display = 'flex';
        });

        // Reorder in DOM
        visibleCards.forEach(card => {
            booksGrid.appendChild(card);
        });
    }
});

// Book actions
function incrementDownload(bookId) {
    // Make AJAX call to increment download count
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

function viewBookDetails(bookId) {
    // Make AJAX call to get book details
    fetch(`/books/${bookId}/details`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('modalTitle').textContent = data.title;
            document.getElementById('modalBody').innerHTML = `
                <div class="space-y-4">
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-2">Author</h4>
                        <p class="text-gray-600">${data.author}</p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-2">Category</h4>
                        <p class="text-gray-600">${data.category}</p>
                    </div>
                    ${data.description ? `
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-2">Description</h4>
                        <p class="text-gray-600">${data.description}</p>
                    </div>
                    ` : ''}
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-2">Downloads</h4>
                        <p class="text-gray-600">${data.download_count} times</p>
                    </div>
                    <div class="pt-4 border-t">
                        <a href="${data.download_url}" 
                           class="btn btn-primary w-full"
                           onclick="incrementDownload(${data.id})">
                            <i class="fas fa-download"></i>
                            Download Book
                        </a>
                    </div>
                </div>
            `;
            document.getElementById('bookModal').classList.remove('hidden');
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

function closeBookModal() {
    document.getElementById('bookModal').classList.add('hidden');
}

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeBookModal();
    }
});
</script>
@endsection