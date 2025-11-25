<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Scholar;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $user = auth()->user();
        return view('admin.books.index', compact('books', 'user'));
    }

    public function create()
    {
        $scholars = Scholar::all();
        $categories = Category::all();
        $user = auth()->user();
        return view('admin.books.create', compact('scholars', 'categories', 'user'));
    }

    /**
     * Display the specified book.
     */
    public function show($id)
    {
        $book = Book::with(['scholar', 'category'])->findOrFail($id);
        $user = auth()->user();
        return view('admin.books.show', compact('book', 'user'));
    }

    /**
     * Store a newly created book in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'scholar_id' => 'required|integer|exists:scholars,id',
            'category_id' => 'required|integer|exists:categories,id',
            'description' => 'nullable|string',
            'file' => 'required|mimes:pdf,epub,jpg,jpeg,png|max:102400',
        ]);

        $filePath = null;

        if ($request->hasFile('file')) {
            try {
                $filePath = $request->file('file')->store('books');
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['file' => 'Failed to upload file: ' . $e->getMessage()])->withInput();
            }
        }

        Book::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'scholar_id' => $validated['scholar_id'],
            'category_id' => $validated['category_id'],
            'description' => $validated['description'] ?? null,
            'file' => $filePath,
        ]);

        return redirect()->route('dashboard.books.index')->with('success', 'Book created successfully.');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $scholars = Scholar::all();
        $categories = Category::all();
        $user = auth()->user();
        return view('admin.books.edit', compact('book', 'scholars', 'categories', 'user'));
    }

    /**
     * Update the specified book in storage.
     */
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'scholar_id' => 'required|integer|exists:scholars,id',
            'category_id' => 'required|integer|exists:categories,id',
            'description' => 'nullable|string',
            'file' => 'nullable|mimes:pdf,epub,jpg,jpeg,png|max:102400',
        ]);

        // Update slug if title changed
        $updateData = [
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'scholar_id' => $validated['scholar_id'],
            'category_id' => $validated['category_id'],
            'description' => $validated['description'] ?? null,
        ];

        if ($request->hasFile('file')) {
            // Delete the old file if it exists
            if ($book->file) {
                Storage::delete($book->file);
            }

            // Store the new file
            $updateData['file'] = $request->file('file')->store('books');
        }

        $book->update($updateData);

        return redirect()->route('dashboard.books.index')->with('success', 'Book updated successfully.');
    }


    /**
     * Remove the specified book from storage.
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        // Delete the associated file if it exists
        if ($book->file) {
            Storage::delete($book->file);
        }

        $book->delete();

        return redirect()->route('dashboard.books.index')->with('success', 'Book deleted successfully.');
    }

    public function bookPage()
    {
        $books = Book::all();
        $user = auth()->user();
        return view('admin.books.index', compact('books', 'user'));
    }
}
