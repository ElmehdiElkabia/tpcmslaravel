<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
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
        'title' => 'required|string',
        'text' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $imagePath = $request->file('image')->store('about_images', 'public');
    $slider = new Slider();
    $slider->title = $request->title;
    $slider->text = $request->text;
    $slider->image = $imagePath;
    $slider->save();

    return redirect()->route('slider.index')->with('success', 'Slider created successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        return view('pages.slider.slider', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('pages.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'required|string',
            'text' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $slider->title = $request->title;
        $slider->text = $request->text;
        $imagePath = $request->file('image')->store('about_images', 'public');
        $slider->image = $imagePath;


        $slider->save();

        return redirect()->route('slider.index')->with('success', 'Slider updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('slider.index')->with('success', 'Slider deleted successfully');
    }
}
