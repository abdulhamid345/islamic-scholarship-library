<?php

namespace App\Http\Controllers;

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

public function store(Request $request)
{
    
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'description' => 'nullable|string',
        'file' => 'nullable|file|mimes:pdf,epub|max:10240', 
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

}
