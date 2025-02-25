<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    // public function show($id)
    // {
    //     $book = Category::findOrFail($id);

    //     return view('books-details', compact('book'));
    // }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // dd($validated);

        Category::create([
            'name' => $validated['name'],
        ]);

        return redirect()->route('category.index')->with('success', 'Book created successfully.');
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('book'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($validated);

        return redirect()->route('category.index')->with('success', 'Book updated successfully.');
    }

    public function destroy($id)
    {
        $book = Category::findOrFail($id);

        $book->delete();


        return redirect()->route('category.index')->with('success', 'Book deleted successfully.');
    }
}
