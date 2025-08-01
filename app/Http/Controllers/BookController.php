<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Scholar;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $scholars = Scholar::all();
        $categories = Category::all();
        return view('books.create', compact('scholars', 'categories'));
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
            'scholar_id' => 'required|string|max:255',
            'category_id' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'mimes:pdf,epub,jpg,jpeg,png|max:102400',
        ]);

        $filePath = null;

        if ($request->hasFile('file')) {
            try {
                $filePath = $request->file('file')->store('books');
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['file' => 'Failed to upload file: ' . $e->getMessage()]);
            }
        }

        Book::create([
            'title' => $validated['title'],
            'scholar_id' => $validated['scholar_id'],
            'category_id' => $validated['category_id'],
            'description' => $validated['description'],
            'year_written' => $validated['year_written'],
            'file' => $filePath,
        ]);

        return redirect()->route('dashboard.books.index')->with('success', 'Book created successfully.');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $scholars = Scholar::all();
        $categories = Category::all();
        return view('books.edit', compact('book', 'scholars', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'scholar_id' => 'required|string|max:255',
            'category_id' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|mimes:pdf,epub,jpg,jpeg,png|max:102400',
        ]);

        if ($request->hasFile('file')) {
            // Delete the old file if it exists
            if ($book->file) {
                Storage::delete($book->file);
            }

            // Store the new file
            $validated['file'] = $request->file('file')->store('books');
        }

        $book->update($validated);

        return redirect()->route('dashboard.books.index')->with('success', 'Book updated successfully.');
    }


    public function destroy($id)
    {

        $book = Book::findOrFail($id);

        $book->delete();

        return redirect()->route('dashbaord.books.index')->with('success', 'Book deleted successfully.');
    }

    public function bookPage()
    {
        $books = Book::all();
        return view('books', compact('books'));
    }
}
