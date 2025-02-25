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
            Route::post('store', [BookController::class, 'store'])->name('store');
            Route::get('edit/{id}', [BookController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [BookController::class, 'update'])->name('update');
            Route::get('show/{id}', [BookController::class, 'show'])->name('show');
            Route::get('destroy/{id}', [BookController::class, 'destroy'])->name('destroy');
        });

        Route::name('category.')->prefix('category')->group(function () {
            Route::get('', [CategoryController::class, ''])->name('index');
            Route::get('create', [CategoryController::class, 'create'])->name('create');
            Route::post('store', [CategoryController::class, 'store'])->name('store');
            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [CategoryController::class, 'update'])->name('update');
            // Route::get('show/{id}', [CategoryController::class, 'show'])->name('show');
            Route::get('destroy/{id}', [CategoryController::class, 'destroy'])->name('destroy');
        });

        Route::name('scholars.')->prefix('scholars')->group(function () {
            Route::get('', [ScholarController::class, 'index'])->name('index');
            Route::get('create', [ScholarController::class, 'create'])->name('create');
            Route::post('store', [ScholarController::class, 'store'])->name('store');
            Route::get('edit/{id}', [ScholarController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [ScholarController::class, 'update'])->name('update');
            Route::get('show/{id}', [ScholarController::class, 'show'])->name('show');
            Route::get('destroy/{id}', [ScholarController::class, 'destroy'])->name('destroy');
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
