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
            'year_from' => 'required|string',
            'year_to' => 'required|string',
        ]);

        Scholar::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'biography' => $validated['biography'],
            'years_active' => ($validated['year_from'] ?? '') . ' - ' . ($validated['year_to'] ?? ''),
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
        $scholar = Scholar::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'biography' => 'nullable|string',
            'year_from' => 'nullable|string',
            'year_to' => 'nullable|string',
            'years_active' => 'nullable|string',
        ]);

        // Build years_active from year_from and year_to if provided
        $yearsActive = $validated['years_active'] ?? null;
        if (isset($validated['year_from']) || isset($validated['year_to'])) {
            $yearFrom = $validated['year_from'] ?? '';
            $yearTo = $validated['year_to'] ?? '';
            $yearsActive = trim($yearFrom . ' - ' . $yearTo, ' -');
        }

        $scholar->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'biography' => $validated['biography'] ?? null,
            'years_active' => $yearsActive,
        ]);

        return redirect()->route('dashboard.scholars.index')->with('success', 'Scholar updated successfully.');
    }

    /**
     * Display the specified scholar.
     */
    public function show($id)
    {
        $scholar = Scholar::with('books')->findOrFail($id);
        $user = auth()->user();
        return view('admin.scholars.show', compact('scholar', 'user'));
    }

    /**
     * Remove the specified scholar from storage.
     */
    public function destroy($id)
    {
        $scholar = Scholar::findOrFail($id);

        $scholar->delete();

        return redirect()->route('dashboard.scholars.index')->with('success', 'Scholar deleted successfully.');
    }

    public function scholarPage() {
        $scholars = Scholar::all();
        $user = auth()->user();
        return view('scholars', compact('scholars', 'user'));
    }
}
