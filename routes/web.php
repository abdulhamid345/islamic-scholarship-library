<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScholarController;
use App\Http\Controllers\CategoryController;


require __DIR__.'/auth.php';

// Home Page
Route::get('/', function () {
    $books = \App\Models\Book::with(['scholar', 'category'])->latest()->take(6)->get();
    $scholars = \App\Models\Scholar::withCount('books')->latest()->take(6)->get();
    $categories = \App\Models\Category::withCount('books')->latest()->take(8)->get();
    $totalBooks = \App\Models\Book::count();
    $totalScholars = \App\Models\Scholar::count();
    $totalCategories = \App\Models\Category::count();
    return view('welcome', compact('books', 'scholars', 'categories', 'totalBooks', 'totalScholars', 'totalCategories'));
})->name('welcome');

// Books Pages
Route::get('/books', function () {
    $books = \App\Models\Book::with(['scholar', 'category'])->latest()->get();
    return view('books', compact('books'));
})->name('books');

Route::get('/books/{id}', function($id) {
    $book = \App\Models\Book::with(['scholar', 'category'])->findOrFail($id);
    $relatedBooks = \App\Models\Book::where('category_id', $book->category_id)
        ->where('id', '!=', $book->id)
        ->with(['scholar', 'category'])
        ->take(4)
        ->get();
    return view('books-details', compact('book', 'relatedBooks'));
})->name('books.details');

// Scholars Pages
Route::get('/scholars', function () {
    $scholars = \App\Models\Scholar::withCount('books')->latest()->get();
    return view('scholars', compact('scholars'));
})->name('scholars');

Route::get('/scholars/{id}', function($id) {
    $scholar = \App\Models\Scholar::with(['books.category'])->findOrFail($id);
    $relatedScholars = \App\Models\Scholar::where('id', '!=', $scholar->id)
        ->withCount('books')
        ->take(4)
        ->get();
    return view('scholars-details', compact('scholar', 'relatedScholars'));
})->name('scholars.details');

// Categories Pages
Route::get('/categories', function () {
    $categories = \App\Models\Category::withCount('books')->latest()->get();
    return view('categories', compact('categories'));
})->name('categories');

Route::get('/categories/{id}', function($id) {
    $category = \App\Models\Category::with(['books.scholar'])->findOrFail($id);
    $relatedCategories = \App\Models\Category::where('id', '!=', $category->id)
        ->withCount('books')
        ->take(4)
        ->get();
    return view('categories-details', compact('category', 'relatedCategories'));
})->name('categories.details');

Route::get('/dashboard', function () {
    $user = auth()->user();
    
    // Get accurate counts from the database
    $totalUsers = \App\Models\User::count();
    $totalScholars = \App\Models\Scholar::count();
    $totalBooks = \App\Models\Book::count();
    $totalCategories = \App\Models\Category::count();
    
    return view('admin.index', compact('user', 'totalUsers', 'totalScholars', 'totalBooks', 'totalCategories'));
})->middleware(['auth', 'verified', AdminMiddleware::class])->name('dashboard');


Route::middleware(['auth', 'verified', AdminMiddleware::class])->group(function () {
    Route::name('dashboard.')->prefix('dashboard')->group(function () {
        Route::name('books.')->prefix('books')->group(function () {
            Route::get('', [BookController::class, 'index'])->name('index');
            Route::get('create', [BookController::class, 'create'])->name('create');
            Route::post('store', [BookController::class, 'store'])->name('store');
            Route::get('edit/{id}', [BookController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [BookController::class, 'update'])->name('update');
            Route::get('show/{id}', [BookController::class, 'show'])->name('show');
            Route::delete('destroy/{id}', [BookController::class, 'destroy'])->name('destroy');
        });

        Route::name('category.')->prefix('category')->group(function () {
            Route::get('', [CategoryController::class, 'index'])->name('index');
            Route::get('create', [CategoryController::class, 'create'])->name('create');
            Route::post('store', [CategoryController::class, 'store'])->name('store');
            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [CategoryController::class, 'update'])->name('update');
            Route::get('show/{id}', [CategoryController::class, 'show'])->name('show');
            Route::delete('destroy/{id}', [CategoryController::class, 'destroy'])->name('destroy');
        });

        Route::name('scholars.')->prefix('scholars')->group(function () {
            Route::get('', [ScholarController::class, 'index'])->name('index');
            Route::get('create', [ScholarController::class, 'create'])->name('create');
            Route::post('store', [ScholarController::class, 'store'])->name('store');
            Route::get('edit/{id}', [ScholarController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [ScholarController::class, 'update'])->name('update');
            Route::get('show/{id}', [ScholarController::class, 'show'])->name('show');
            Route::delete('destroy/{id}', [ScholarController::class, 'destroy'])->name('destroy');
        });
    });
});

// User Dashboard and Profile Routes
Route::middleware('auth')->group(function () {
    // User Dashboard
    Route::get('/user/dashboard', function () {
        $user = auth()->user();
        $userBooks = \App\Models\Book::whereHas('scholar', function($query) use ($user) {
            // Get books downloaded by user (if you have a downloads table)
            // For now, just show recent books
        })->latest()->take(6)->get();
        
        return view('user.dashboard', compact('user', 'userBooks'));
    })->name('user.dashboard');
    
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication Routes
require __DIR__ . '/auth.php';
