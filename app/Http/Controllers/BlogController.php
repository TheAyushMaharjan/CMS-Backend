<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Categories/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // here's  a code for storing a data
        $validated = $request->validate([
            'c_name' => 'required|string|max:255',
            'i_name' => 'nullable|string|max:255',
            'description' => 'required|string',
            'seo_title' => 'required|string|max:255',
            'seo_keywords' => 'required|string',
            'seo_description' => 'required|string',
            'seo_order' => 'required|integer',
            'is_published' => 'boolean'
        ]);

        $category = Blog::create($validated);
        return redirect()->route('admin.blog.create')->with('success', 'Blog  created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
