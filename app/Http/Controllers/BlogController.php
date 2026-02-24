<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //prob get data from database.
        $blogs = Blog::paginate(8);
        return Inertia::render('blogs/Index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('blogs/Create', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:500',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('blogs', 'public');
            $data['image_path'] = $path;
        }

        Blog::create(array_merge(
            $data,
            ['user_id' => Auth::id()]
        ));

        return redirect()->route('blogs.index')
            ->with('success', 'Blog uploaded with success.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $blog->load('user');
        return Inertia::render('blogs/View', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        Gate::authorize('update', $blog);
        return Inertia::render('blogs/Edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        Gate::authorize('update', $blog);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:500',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            //remove the old image.
            if ($blog->image_path && Storage::disk('public')->exists($blog->image_path)) {
                Storage::disk('public')->delete($blog->image_path);
            }

            $path = $request->file('image')->store('blogs', 'public');
            $data['image_path'] = $path;
        }

        $blog->update(array_merge(
            $data,
        ));

        return redirect()->route('blogs.index')
            ->with('success', 'Blog edited with success.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        Gate::authorize('update', $blog);
        $blog->delete();

        return redirect()->route('blogs.index')
            ->with('success', 'Blog deleted.');
        //
    }
}
