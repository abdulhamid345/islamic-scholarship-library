<?php

namespace App\Http\Controllers;

use App\Models\Scholar;
use Illuminate\Http\Request;

class ScholarController extends Controller
{
    /**
     * Display a listing of the scholars.
     */
    public function index()
    {
        $scholars = Scholar::all();
        return view('scholars.index', compact('scholars'));
    }

    /**
     * Show the form for creating a new scholar.
     */
    public function create()
    {
        return view('scholars.create');
    }

    /**
     * Store a newly created scholar in storage.
     */
    public function store(Request $request)
{
    \Log::info($request->all());

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'about' => 'nullable|string',
        'biography' => 'nullable|string',
        'published_works' => 'nullable|string',
        'students' => 'nullable|array',
        'categories' => 'nullable|array', 
        'categories.*' => 'string', 
    ]);

    
    $validated['categories'] = isset($validated['categories']) ? json_encode($validated['categories']) : null;

    
    $validated['published_works'] = isset($validated['published_works']) ? $validated['published_works'] : null;
    $validated['students'] = isset($validated['students']) ? json_encode($validated['students']) : null;

    
    Scholar::create($validated);

    return redirect()->route('scholars.index')->with('success', 'Scholar created successfully!');
}




    /**
     * Show the form for editing the specified scholar.
     */
    public function edit(Scholar $scholar)
    {
        return view('scholars.edit', compact('scholar'));
    }

    /**
     * Update the specified scholar in storage.
     */
    public function update(Request $request, Scholar $scholar)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'about' => 'nullable|string',
            'biography' => 'nullable|string',
            'published_works' => 'nullable|json',
            'students' => 'nullable|json',
            'categories' => 'nullable|json',
        ]);

        $scholar->update($request->all());

        return redirect()->route('scholars.index')->with('success', 'Scholar updated successfully.');
    }

    /**
     * Remove the specified scholar from storage.
     */
    public function destroy(Scholar $scholar)
    {
        $scholar->delete();

        return redirect()->route('scholars.index')->with('success', 'Scholar deleted successfully.');
    }
}
