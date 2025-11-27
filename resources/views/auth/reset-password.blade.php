{{-- resources/views/auth/reset-password.blade.php --}}
@extends('layouts.frontend')

@section('title', 'Reset Password - Islamic Digital Library')

@section('content')
<div class="auth-page">
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <div class="auth-icon">
                    <i class="fas fa-lock"></i>
                </div>
                <h1 class="auth-title">Reset Password</h1>
                <p class="auth-subtitle">Enter your new password below</p>
            </div>

            <form method="POST" action="{{ route('password.store') }}" class="auth-form">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope"></i>
                        Email Address
                    </label>
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        value="{{ old('email', $request->email) }}" 
                        class="form-input @error('email') form-input-error @enderror"
                        placeholder="Enter your email address"
                        required 
                        autofocus 
                        autocomplete="username"
                    />
                    @error('email')
                        <div class="form-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">
                        <i class="fas fa-lock"></i>
                        New Password
                    </label>
                    <input 
                        id="password" 
                        type="password" 
                        name="password" 
                        class="form-input @error('password') form-input-error @enderror"
                        placeholder="Enter your new password"
                        required 
                        autocomplete="new-password"
                    />
                    @error('password')
                        <div class="form-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">
                        <i class="fas fa-lock"></i>
                        Confirm Password
                    </label>
                    <input 
                        id="password_confirmation" 
                        type="password" 
                        name="password_confirmation" 
                        class="form-input"
                        placeholder="Confirm your new password"
                        required 
                        autocomplete="new-password"
                    />
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-auth-primary">
                        <i class="fas fa-check"></i>
                        Reset Password
                    </button>
                </div>

                <div class="auth-links">
                    <a href="{{ route('login') }}" class="auth-link">
                        <i class="fas fa-arrow-left"></i>
                        Back to Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.auth-page {
    min-height: 100vh;
    background: linear-gradient(135deg, #f8fafc 0%, #e5e7eb 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem;
}

.auth-container {
    width: 100%;
    max-width: 500px;
}

.auth-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    padding: 3rem;
}

.auth-header {
    text-align: center;
    margin-bottom: 2rem;
}

.auth-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #059669 0%, #065f46 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
}

.auth-icon i {
    font-size: 2.5rem;
    color: white;
}

.auth-title {
    font-size: 2rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 0.5rem;
}

.auth-subtitle {
    color: #6b7280;
    font-size: 0.95rem;
    line-height: 1.6;
}

.auth-form {
    margin-top: 2rem;
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

.form-actions {
    margin-top: 2rem;
}

.btn-auth-primary {
    width: 100%;
    padding: 1rem;
    background: linear-gradient(135deg, #059669 0%, #065f46 100%);
    color: white;
    border: none;
    border-radius: 12px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: transform 0.3s, box-shadow 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.btn-auth-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(5, 150, 105, 0.3);
}

.auth-links {
    margin-top: 1.5rem;
    text-align: center;
}

.auth-link {
    color: #059669;
    text-decoration: none;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: color 0.3s;
}

.auth-link:hover {
    color: #047857;
}

@media (max-width: 768px) {
    .auth-card {
        padding: 2rem;
    }
    
    .auth-title {
        font-size: 1.5rem;
    }
}
</style>
@endsection
