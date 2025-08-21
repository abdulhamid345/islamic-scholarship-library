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
                {{-- <a href="{{ route('explore') }}" class="btn-hero btn-hero-primary"> --}}
                <a href="#" class="btn-hero btn-hero-primary">
                    <i class="fas fa-arrow-left" style="transform: rotate(180deg);"></i>
                    استكشف المجموعة
                    <span style="margin-left: 0.5rem;">Explore Collection</span>
                </a>
                {{-- <a href="{{ route('categories') }}" class="btn-hero btn-hero-secondary"> --}}
                <a href="#" class="btn-hero btn-hero-secondary">
                    <i class="fas fa-th-large"></i>
                    Browse Categories
                </a>
            </div>
        </div>
    </section>
@endsection