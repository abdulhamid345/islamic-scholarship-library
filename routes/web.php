<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScholarController;


Route::get('/', [ScholarController::class, 'showWelcomePage']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::name('dashboard.')->prefix('dashboard')->group(function () {

        Route::name('books.')->prefix('books')->group(function () {
            Route::get('', [BookController::class, 'index'])->name('index');
            Route::get('create', [BookController::class, 'create'])->name('create');
            Route::get('store', [BookController::class, 'store'])->name('store');
            Route::get('edit', [BookController::class, 'edit'])->name('edit');
            Route::get('update', [BookController::class, 'update'])->name('update');
            Route::get('show', [BookController::class, 'show'])->name('show');
            Route::get('destroy', [BookController::class, 'destroy'])->name('destroy');
        });

        Route::name('category.')->prefix('category')->group(function () {
            Route::get('', [CategoryController::class, ''])->name('index');
            Route::get('create', [CategoryController::class, 'create'])->name('create');
            Route::get('store', [CategoryController::class, 'store'])->name('store');
            Route::get('edit', [CategoryController::class, 'edit'])->name('edit');
            Route::get('update', [CategoryController::class, 'update'])->name('update');
            // Route::get('show', [CategoryController::class, 'show'])->name('show');
            Route::get('destroy', [CategoryController::class, 'destroy'])->name('destroy');
        });

        Route::name('scholars.')->prefix('scholars')->group(function () {
            Route::get('', [ScholarController::class, 'index'])->name('index');
            Route::get('create', [ScholarController::class, 'create'])->name('create');
            Route::get('store', [ScholarController::class, 'store'])->name('store');
            Route::get('edit', [ScholarController::class, 'edit'])->name('edit');
            Route::get('update', [ScholarController::class, 'update'])->name('update');
            Route::get('show', [ScholarController::class, 'show'])->name('show');
            Route::get('destroy', [ScholarController::class, 'destroy'])->name('destroy');
        });
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication Routes
require __DIR__ . '/auth.php';
