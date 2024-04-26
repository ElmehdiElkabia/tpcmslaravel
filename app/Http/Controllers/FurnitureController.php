<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use App\Models\Page;
use Illuminate\Http\Request;

class FurnitureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Page $page)
    {
        $furniture = $page->furniture;
        return view('pages.furniture.index', compact('furniture'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.furniture.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'page_id' => 'required|exists:pages,id',
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('furniture_images');

        $furniture = new Furniture();
        $furniture->page_id = $request->page_id;
        $furniture->name = $request->name;
        $furniture->description = $request->description;
        $furniture->image = $imagePath;
        $furniture->save();

        return redirect()->route('furniture.index')->with('success', 'Furniture created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Furniture $furniture)
    {
        return view('pages.furniture.furniture', compact('furniture'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Furniture $furniture)
    {
        return view('pages.furniture.edit', compact('furniture'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Furniture $furniture)
    {
        $request->validate([
            'page_id' => 'required|exists:pages,id',
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('furniture_images');
            $furniture->image = $imagePath;
        }

        $furniture->page_id = $request->page_id;
        $furniture->name = $request->name;
        $furniture->description = $request->description;
        $furniture->save();

        return redirect()->route('furniture.index')->with('success', 'Furniture updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Furniture $furniture)
    {
        $furniture->delete();
        return redirect()->route('furniture.index')->with('success', 'Furniture deleted successfully.');
    }
}
