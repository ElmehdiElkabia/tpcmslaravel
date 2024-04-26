<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::all();
        return view('pages.dashboard.index', compact('pages'));
    }
    // dashboard
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // Validate the request data
        $request->validate([
        'title' => 'required|string',
    ]);

    // Create a new Page instance
    $page = new Page();
    $page->title = $request->title;
    $page->save();
    return redirect()->route('pages.index')->with('success', 'Page created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        // Validate the request data
        $request->validate([
         'title' => 'required|string',
     ]);
 
     $page->title = $request->title;
     $page->save();

     return redirect()->route('pages.index')->with('success', 'Page updated successfully');
 
     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();
 return redirect()->route('pages.index')->with('success', 'Page deleted successfully');
    }
}
