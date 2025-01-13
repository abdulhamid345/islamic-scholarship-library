<?php

namespace App\Http\Controllers;

use App\Models\Scholar;
use Illuminate\Http\Request;

class ScholarController extends Controller
{
    public function index()
    {
        $scholars = Scholar::all();
        return view('scholars.index', compact('scholars'));
    }

    public function create()
    {
        return view('scholars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:scholars',
        ]);

        Scholar::create($request->all());
        return redirect()->route('scholars.index')->with('success', 'Scholar created successfully.');
    }

    public function edit(Scholar $scholar)
    {
        return view('scholars.edit', compact('scholar'));
    }

    public function update(Request $request, Scholar $scholar)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:scholars,email,' . $scholar->id,
        ]);

        $scholar->update($request->all());
        return redirect()->route('scholars.index')->with('success', 'Scholar updated successfully.');
    }
}
