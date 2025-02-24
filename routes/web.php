<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScholarController;


Route::get('/', [ScholarController::class, 'showWelcomePage']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/all-books', function () {
    return view('books');
})->name('all-books');

Route::get('/scholars', function () {
    return view('scholars');
})->name('scholars');

Route::get('/works', function() {
    return view('works');
})->name('works');

Route::get('/scholar', function() {
    return view('scholar');
})->name('scholar');




Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('books', BookController::class);
    Route::resource('scholars', ScholarController::class);
    Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication Routes
require __DIR__ . '/auth.php';
