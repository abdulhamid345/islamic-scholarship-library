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
        'file' => 'mimes:pdf,epub,jpg,jpeg,png|max:10240', 
        'language' => 'required|string|max:255',
        'categories' => 'required|string',
        'number_of_pages' => 'required|integer|min:1',
        'year_written' => 'required|integer|digits:4',
    ]);

    $filePath = null; // Initialize file path variable

    if ($request->hasFile('file')) {
        try {
            // Store the file and get the path
            $filePath = $request->file('file')->store('books'); // Store in 'books' directory
        } catch (\Exception $e) {
            // Return with error message if file upload fails
            return redirect()->back()->withErrors(['file' => 'Failed to upload file: ' . $e->getMessage()]);
        }
    }

    // Add the file path to the validated data if a file was uploaded
    // if ($filePath) {
    //     $validated['file'] = $filePath; // Assuming you have a 'file_path' column in your 'books' table
    // }

    // dd($filePath);

    // Create the book record
    Book::create([
        'title' => $validated['title'],
        'author' => $validated['author'],
        'description' => $validated['description'],
        'language' => $validated['language'],
        'categories' => $validated['categories'],
        'number_of_pages' => $validated['number_of_pages'],
        'year_written' => $validated['year_written'],
        'file' => $filePath,
    ]);

    // Redirect with success message
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
