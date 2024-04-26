<?php

namespace App\Http\Controllers;

use App\Models\Header;
use App\Models\Page;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Page $page)
    {
        $header = $page->header;
        return view('partials.header.index', compact('header'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('partials.header.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'page_id' => 'required|exists:pages,id',
            'navbar_links' => 'required|json',
        ]);


        $header = new Header();
        $header->page_id = $request->page_id;
        $header->navbar_links = $request->navbar_links;
        $header->save();

        return redirect()->route('pages.header.index')->with('success', 'header created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Header $header)
    {
        return view('pages.header.header', compact('header'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Header $header)
    {
        return view('pages.headers.edit', compact('header'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Header $header)
    {
        $request->validate([
            'page_id' => 'required|exists:pages,id',
            'navbar_links' => 'required|json',
        ]);

        $header->page_id = $request->page_id;
        $header->navbar_links = $request->input('navbar_links');
        $header->save();

        // Redirect the user to a relevant page
        return redirect()->route('header.index')->with('success', 'Header updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Header $header)
    {
        $header->delete();
        return redirect()->route('headers.index')->with('success', 'Header deleted successfully');
    }
}
