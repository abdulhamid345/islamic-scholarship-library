<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Scholar;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ScholarController extends Controller
{
    /**
     * Display a listing of the scholars.
     */
    public function showWelcomePage()
    {
        $books = Book::all();
        $scholars = Scholar::get()->take(3);
        $user = auth()->user();
        return view('welcome', compact('scholars', 'books', 'user'));
    }

    public function index()
    {
        $scholars = Scholar::all();
        $user = auth()->user();
        return view('admin.scholars.index', compact('scholars', 'user'));
    }

    /**
     * Show the form for creating a new scholar.
     */
    public function create()
    {
        $user = auth()->user();
        return view('admin.scholars.create', compact('user'));
    }

    /**
     * Store a newly created scholar in storage.
     */
    public function store(Request $request)
    {
        // \Log::info($request->all());

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'biography' => 'nullable|string',
            'years_active' => 'nullable|string',
        ]);

        Scholar::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'biography' => $validated['biography'],
            'years_active' => $validated['years_active'],
        ]);

        return redirect()->route('dashboard.scholars.index')->with('success', 'Scholar created successfully!');
    }

    /**
     * Show the form for editing the specified scholar.
     */
    public function edit($id)
    {
        $scholar = Scholar::findOrFail($id); // Ensure scholar exists
        $user = auth()->user();
        return view('admin.scholars.edit', compact('scholar', 'user'));
    }

    /**
     * Update the specified scholar in storage.
     */
    public function update(Request $request, $id)
    {
        $scholar = Scholar::findOrfail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'biography' => 'nullable|string',
            'published_works' => 'nullable|string',
            'categories' => 'nullable|array',
            'categories.*' => 'string',
            'years_active' => 'nullable|string',
        ]);

        $scholar->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'biography' => $validated['biography'] ?? null,
            'published_works' => $validated['published_works'] ?? null,
            'years_active' => $validated['years_active'] ?? null,
        ]);

        return redirect()->route('dashboard.scholars.index')->with('success', 'Scholar updated successfully.');
    }

    /**
     * Remove the specified scholar from storage.
     */
    public function destroy($id)
    {
        $scholar = Scholar::find($id);

        if (!$scholar) {
            return redirect()->route('dashboard.scholars.index')->with('error', 'Scholar not found.');
        }

        $scholar->delete();

        return redirect()->route('dashboard.scholars.index')->with('success', 'Scholar deleted successfully.');
    }

    public function scholarPage() {
        $scholars = Scholar::all();
        $user = auth()->user();
        return view('scholars', compact('scholars', 'user'));
    }
}
