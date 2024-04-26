<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Page;
use Illuminate\Http\Request;

class InfoController extends Controller
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
        return view('pages.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'email' => 'required',
            'location' => 'required',
            'page_id' => 'required|exists:pages,id',
        ]);


        $info = new Info;
        $info->phone = $request->phone;
        $info->email = $request->email;
        $info->location = $request->location;
        $info->page_id = $request->page_id;
        $info->save();

        return redirect()->route('info.index')->with('success', 'info created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Info $info)
    {
        return view('pages.info.info', compact('info'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Info $info)
    {
        return view('pages.info.edit', compact('info'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Info $info)
    {
        $request->validate([
            'phone' => 'required',
            'email' => 'required',
            'location' => 'required',
            'page_id' => 'required|exists:pages,id',
        ]);

        $info->phone = $request->phone;
        $info->email = $request->email;
        $info->location = $request->location;
        $info->page_id = $request->page_id;

        $info->save();

        // Redirect the user to a relevant page
        return redirect()->route('info.index')->with('success', 'Info updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Info $info)
    {
        $info->delete();
        return redirect()->route('info.index')->with('success', 'Info deleted successfully');
    }
}
