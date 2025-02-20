<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
{
    $books = Book::all();
    return view('books.index', compact('books'));
}


    public function create()
{
    return view('books.create');
}

public function show($id)
{
    $book = Book::findOrFail($id);

    return view('books-details', compact('book'));
}


public function store(Request $request)
{
    
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'description' => 'nullable|string',
        'file' => 'nullable|file|mimes:pdf,epub|max:10240', 
        'language' => 'required|string|max:255',
        'categories' => 'required|string|in:fiqh,aqeedah,history,poetry,philosophy',
        'number_of_pages' => 'required|integer|min:1',
        'year_written' => 'required|integer|digits:4',
    ]);

    
    if ($request->hasFile('file')) {
        $validated['file_path'] = $request->file('file')->store('books');
    }

    
    Book::create($validated);

    return redirect()->route('books.index')->with('success', 'Book created successfully.');
}

public function edit(Book $book)
{
    return view('books.edit', compact('book'));
}

public function update(Request $request, Book $book)
{
    
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'description' => 'nullable|string',
        'file' => 'nullable|file|mimes:pdf,epub|max:10240', 
        'language' => 'required|string|max:255',
        'categories' => 'required|string|in:fiqh,aqeedah,history,poetry,philosophy',
        'number_of_pages' => 'required|integer|min:1',
        'year_written' => 'required|integer|digits:4',
    ]);

    
    if ($request->hasFile('file')) {
        if ($book->file_path) {
            Storage::delete($book->file_path);
        }

        $validated['file_path'] = $request->file('file')->store('books');
    }

    
    $book->update($validated);

    return redirect()->route('books.index')->with('success', 'Book updated successfully.');
}

public function destroy($id)
{
    
    $book = Book::findOrFail($id);
    
    $book->delete();

    
    return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
}

}
