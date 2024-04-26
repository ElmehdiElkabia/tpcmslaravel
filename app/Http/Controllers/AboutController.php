<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Page;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Page $page)
    {
        $about = $page->about;
        return view('pages.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'about_us' => 'required|text',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imagePath = $request->file('image')->store('about_images', 'public');
        $about = new About();
        $about->page_id = $request->page_id; 
        $about->about_us = $request->about_us;
        $about->image = $imagePath;
        $about->save();

        return redirect()->route('about.index')->with('success', 'About page content has been created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        return view('pages.about.about', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('pages.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $validatedData = $request->validate([
            'about_us' => 'required|text',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
        $about->update([
            'about_us' => $validatedData['about_us'],
            'image' => $validatedData['image']->store('images', 'public'),
        ]);
        return redirect()->route('about.index')->with('success', 'About information updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        $about->delete();
        return redirect()->route('about.index')->with('success', 'About information deleted successfully');
    }
}
