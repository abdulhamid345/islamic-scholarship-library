{{-- resources/views/user/dashboard.blade.php --}}
@extends('layouts.frontend')

@section('title', 'My Dashboard - Islamic Digital Library')

@section('content')
<div class="user-dashboard-page">
    <!-- Page Header -->
    <div class="dashboard-header">
        <div class="dashboard-header-container">
            <div class="dashboard-welcome">
                <h1 class="dashboard-title">Welcome back, {{ $user->name }}! 👋</h1>
                <p class="dashboard-subtitle">Manage your account and explore the library</p>
            </div>
            <div class="dashboard-actions">
                <a href="{{ route('profile.edit') }}" class="btn-dashboard">
                    <i class="fas fa-user-edit"></i>
                    Edit Profile
                </a>
            </div>
        </div>
    </div>

    <!-- Dashboard Content -->
    <div class="dashboard-content">
        <div class="dashboard-container">
            <!-- Stats Cards -->
            <div class="dashboard-stats-grid">
                <div class="stat-card">
                    <div class="stat-icon" style="background: linear-gradient(135deg, #059669 0%, #065f46 100%);">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-number">{{ \App\Models\Book::count() }}</div>
                        <div class="stat-label">Total Books</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-number">{{ \App\Models\Scholar::count() }}</div>
                        <div class="stat-label">Scholars</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);">
                        <i class="fas fa-folder"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-number">{{ \App\Models\Category::count() }}</div>
                        <div class="stat-label">Categories</div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="dashboard-section">
                <h2 class="section-title">Quick Actions</h2>
                <div class="quick-actions-grid">
                    <a href="{{ route('books') }}" class="action-card">
                        <div class="action-icon" style="background: linear-gradient(135deg, #059669 0%, #065f46 100%);">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <h3 class="action-title">Browse Books</h3>
                        <p class="action-description">Explore our collection of Islamic books</p>
                    </a>
                    <a href="{{ route('scholars') }}" class="action-card">
                        <div class="action-icon" style="background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <h3 class="action-title">View Scholars</h3>
                        <p class="action-description">Discover Islamic scholars and their works</p>
                    </a>
                    <a href="{{ route('categories') }}" class="action-card">
                        <div class="action-icon" style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);">
                            <i class="fas fa-folder-open"></i>
                        </div>
                        <h3 class="action-title">Browse Categories</h3>
                        <p class="action-description">Explore books by category</p>
                    </a>
                    <a href="{{ route('profile.edit') }}" class="action-card">
                        <div class="action-icon" style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);">
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <h3 class="action-title">Edit Profile</h3>
                        <p class="action-description">Update your account information</p>
                    </a>
                </div>
            </div>

            <!-- Recent Books -->
            @if($userBooks->count() > 0)
            <div class="dashboard-section">
                <h2 class="section-title">Recent Books</h2>
                <div class="books-grid">
                    @foreach($userBooks as $book)
                    <a href="{{ route('books.details', $book->id) }}" class="book-card-mini">
                        <div class="book-cover-mini">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="book-info-mini">
                            <h4 class="book-title-mini">{{ Str::limit($book->title, 40) }}</h4>
                            <p class="book-author-mini">{{ $book->scholar->name ?? 'Unknown Author' }}</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
.user-dashboard-page {
    background: #f8fafc;
    min-height: 100vh;
}

.dashboard-header {
    background: linear-gradient(135deg, #059669 0%, #065f46 100%);
    color: white;
    padding: 3rem 0;
}

.dashboard-header-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 2rem;
}

.dashboard-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.dashboard-subtitle {
    font-size: 1.1rem;
    opacity: 0.9;
}

.btn-dashboard {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: white;
    color: #059669;
    padding: 0.75rem 1.5rem;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 600;
    transition: transform 0.3s, box-shadow 0.3s;
}

.btn-dashboard:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}

.dashboard-content {
    padding: 3rem 0;
}

.dashboard-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
}

.dashboard-stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.stat-card {
    background: white;
    border-radius: 16px;
    padding: 2rem;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    display: flex;
    align-items: center;
    gap: 1.5rem;
    transition: transform 0.3s, box-shadow 0.3s;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.15);
}

.stat-icon {
    width: 70px;
    height: 70px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.stat-icon i {
    font-size: 2rem;
    color: white;
}

.stat-number {
    font-size: 2rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 0.3rem;
}

.stat-label {
    font-size: 0.9rem;
    color: #6b7280;
}

.dashboard-section {
    margin-bottom: 3rem;
}

.section-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 1.5rem;
}

.quick-actions-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
}

.action-card {
    background: white;
    border-radius: 16px;
    padding: 2rem;
    text-decoration: none;
    color: inherit;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s, box-shadow 0.3s;
    text-align: center;
}

.action-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.15);
}

.action-icon {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
}

.action-icon i {
    font-size: 2rem;
    color: white;
}

.action-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 0.5rem;
}

.action-description {
    font-size: 0.9rem;
    color: #6b7280;
}

.books-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 1.5rem;
}

.book-card-mini {
    background: white;
    border-radius: 12px;
    padding: 1rem;
    text-decoration: none;
    color: inherit;
    transition: transform 0.3s, box-shadow 0.3s;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.book-card-mini:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
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
}

@media (max-width: 768px) {
    .dashboard-title {
        font-size: 1.8rem;
    }
    
    .dashboard-stats-grid,
    .quick-actions-grid {
        grid-template-columns: 1fr;
    }
}
</style>
@endsection


