{{-- resources/views/profile/edit.blade.php --}}
@extends('layouts.frontend')

@section('title', 'Edit Profile - Islamic Digital Library')

@section('content')
<div class="profile-page">
    <!-- Breadcrumb -->
    <div class="breadcrumb-section">
        <div class="container">
            <nav class="breadcrumb">
                <a href="{{ route('welcome') }}">Home</a>
                <span>/</span>
                <a href="{{ route('user.dashboard') }}">Dashboard</a>
                <span>/</span>
                <span>Edit Profile</span>
            </nav>
        </div>
    </div>

    <!-- Profile Content -->
    <div class="profile-content">
        <div class="container">
            <div class="profile-header">
                <h1 class="profile-title">Edit Profile</h1>
                <p class="profile-subtitle">Update your account information and password</p>
            </div>

            <div class="profile-grid">
                <!-- Main Content -->
                <div class="profile-main">
                    <!-- Profile Information -->
                    <div class="profile-card">
                        <div class="profile-card-header">
                            <h2 class="card-title">
                                <i class="fas fa-user"></i>
                                Profile Information
                            </h2>
                            <p class="card-subtitle">Update your account's profile information and email address.</p>
                        </div>

                        @if (session('status') === 'profile-updated')
                            <div class="alert alert-success">
                                <i class="fas fa-check-circle"></i>
                                Profile updated successfully!
                            </div>
                        @endif

                        <form method="post" action="{{ route('profile.update') }}" class="profile-form">
                            @csrf
                            @method('patch')

                            <div class="form-group">
                                <label for="name" class="form-label">
                                    <i class="fas fa-user"></i>
                                    Name
                                </label>
                                <input 
                                    id="name" 
                                    name="name" 
                                    type="text" 
                                    class="form-input @error('name') form-input-error @enderror"
                                    value="{{ old('name', $user->name) }}" 
                                    required 
                                    autofocus 
                                    autocomplete="name"
                                />
                                @error('name')
                                    <div class="form-error">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope"></i>
                                    Email
                                </label>
                                <input 
                                    id="email" 
                                    name="email" 
                                    type="email" 
                                    class="form-input @error('email') form-input-error @enderror"
                                    value="{{ old('email', $user->email) }}" 
                                    required 
                                    autocomplete="username"
                                />
                                @error('email')
                                    <div class="form-error">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror

                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                    <div class="email-verification-notice">
                                        <p>Your email address is unverified.</p>
                                        <form id="send-verification" method="post" action="{{ route('verification.send') }}" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="verification-link">
                                                Click here to re-send the verification email.
                                            </button>
                                        </form>
                                        @if (session('status') === 'verification-link-sent')
                                            <p class="verification-sent">
                                                A new verification link has been sent to your email address.
                                            </p>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Update Password -->
                    <div class="profile-card">
                        <div class="profile-card-header">
                            <h2 class="card-title">
                                <i class="fas fa-lock"></i>
                                Update Password
                            </h2>
                            <p class="card-subtitle">Ensure your account is using a long, random password to stay secure.</p>
                        </div>

                        @if (session('status') === 'password-updated')
                            <div class="alert alert-success">
                                <i class="fas fa-check-circle"></i>
                                Password updated successfully!
                            </div>
                        @endif

                        <form method="post" action="{{ route('password.update') }}" class="profile-form">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label for="update_password_current_password" class="form-label">
                                    <i class="fas fa-key"></i>
                                    Current Password
                                </label>
                                <input 
                                    id="update_password_current_password" 
                                    name="current_password" 
                                    type="password" 
                                    class="form-input @error('current_password', 'updatePassword') form-input-error @enderror"
                                    autocomplete="current-password"
                                />
                                @error('current_password', 'updatePassword')
                                    <div class="form-error">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="update_password_password" class="form-label">
                                    <i class="fas fa-lock"></i>
                                    New Password
                                </label>
                                <input 
                                    id="update_password_password" 
                                    name="password" 
                                    type="password" 
                                    class="form-input @error('password', 'updatePassword') form-input-error @enderror"
                                    autocomplete="new-password"
                                />
                                @error('password', 'updatePassword')
                                    <div class="form-error">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="update_password_password_confirmation" class="form-label">
                                    <i class="fas fa-lock"></i>
                                    Confirm Password
                                </label>
                                <input 
                                    id="update_password_password_confirmation" 
                                    name="password_confirmation" 
                                    type="password" 
                                    class="form-input"
                                    autocomplete="new-password"
                                />
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn-primary">
                                    <i class="fas fa-save"></i>
                                    Update Password
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Delete Account -->
                    <div class="profile-card profile-card-danger">
                        <div class="profile-card-header">
                            <h2 class="card-title">
                                <i class="fas fa-exclamation-triangle"></i>
                                Delete Account
                            </h2>
                            <p class="card-subtitle">Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>
                        </div>

                        <form method="post" action="{{ route('profile.destroy') }}" class="profile-form" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                            @csrf
                            @method('delete')

                            <div class="form-group">
                                <label for="password" class="form-label">
                                    <i class="fas fa-key"></i>
                                    Password
                                </label>
                                <input 
                                    id="password" 
                                    name="password" 
                                    type="password" 
                                    class="form-input @error('password', 'userDeletion') form-input-error @enderror"
                                    placeholder="Enter your password to confirm"
                                    required
                                />
                                @error('password', 'userDeletion')
                                    <div class="form-error">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn-danger">
                                    <i class="fas fa-trash"></i>
                                    Delete Account
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="profile-sidebar">
                    <div class="sidebar-card">
                        <h3 class="sidebar-title">Quick Links</h3>
                        <div class="sidebar-links">
                            <a href="{{ route('user.dashboard') }}" class="sidebar-link">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                            </a>
                            <a href="{{ route('books') }}" class="sidebar-link">
                                <i class="fas fa-book"></i>
                                Browse Books
                            </a>
                            <a href="{{ route('scholars') }}" class="sidebar-link">
                                <i class="fas fa-user-graduate"></i>
                                View Scholars
                            </a>
                            <a href="{{ route('categories') }}" class="sidebar-link">
                                <i class="fas fa-folder"></i>
                                Categories
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.profile-page {
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

.profile-content {
    padding: 3rem 0;
}

.profile-header {
    margin-bottom: 2rem;
}

.profile-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 0.5rem;
}

.profile-subtitle {
    font-size: 1.1rem;
    color: #6b7280;
}

.profile-grid {
    display: grid;
    grid-template-columns: 1fr 300px;
    gap: 2rem;
}

.profile-main {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.profile-card {
    background: white;
    border-radius: 16px;
    padding: 2rem;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

.profile-card-danger {
    border: 2px solid #fee2e2;
}

.profile-card-header {
    margin-bottom: 1.5rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid #e5e7eb;
}

.card-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.card-title i {
    color: #059669;
}

.card-subtitle {
    color: #6b7280;
    font-size: 0.9rem;
}

.alert {
    padding: 1rem;
    border-radius: 12px;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.alert-success {
    background: #d1fae5;
    color: #065f46;
    border: 1px solid #a7f3d0;
}

.profile-form {
    margin-top: 1.5rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
    color: #374151;
    margin-bottom: 0.5rem;
    font-size: 0.9rem;
}

.form-label i {
    color: #059669;
}

.form-input {
    width: 100%;
    padding: 0.875rem 1rem;
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    font-size: 1rem;
    transition: border-color 0.3s, box-shadow 0.3s;
}

.form-input:focus {
    outline: none;
    border-color: #059669;
    box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.1);
}

.form-input-error {
    border-color: #ef4444;
}

.form-error {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #ef4444;
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

.email-verification-notice {
    margin-top: 0.5rem;
    padding: 0.75rem;
    background: #fef3c7;
    border: 1px solid #fde68a;
    border-radius: 8px;
    font-size: 0.875rem;
    color: #92400e;
}

.verification-link {
    color: #059669;
    text-decoration: underline;
    background: none;
    border: none;
    cursor: pointer;
    font-size: 0.875rem;
}

.verification-sent {
    margin-top: 0.5rem;
    color: #065f46;
    font-weight: 500;
}

.form-actions {
    margin-top: 2rem;
}

.btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #059669 0%, #065f46 100%);
    color: white;
    padding: 0.875rem 1.5rem;
    border: none;
    border-radius: 12px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: transform 0.3s, box-shadow 0.3s;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(5, 150, 105, 0.3);
}

.btn-danger {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: #ef4444;
    color: white;
    padding: 0.875rem 1.5rem;
    border: none;
    border-radius: 12px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s;
}

.btn-danger:hover {
    background: #dc2626;
}

.profile-sidebar {
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

.sidebar-links {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.sidebar-link {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.75rem;
    color: #374151;
    text-decoration: none;
    border-radius: 8px;
    transition: background 0.3s;
}

.sidebar-link:hover {
    background: #f3f4f6;
    color: #059669;
}

.sidebar-link i {
    color: #059669;
    width: 20px;
}

@media (max-width: 968px) {
    .profile-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .profile-title {
        font-size: 1.8rem;
    }
}
</style>
@endsection
