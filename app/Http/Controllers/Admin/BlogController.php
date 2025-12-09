<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::with('author')->latest()->paginate(10);
        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'summary' => 'required|max:500',
            'content' => 'required',
            'is_published' => 'boolean'
        ]);

        BlogPost::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'content' => $request->input('content'),
            'author_id' => auth()->id(),
            'is_published' => $request->has('is_published'),
            'published_at' => $request->has('is_published') ? now() : null,
        ]);

        return redirect()->route('admin.blog.index')->with('success', 'Blog post created successfully!');
    }

    public function show(BlogPost $blog)
    {
        return view('admin.blog.show', compact('blog'));
    }

    public function edit(BlogPost $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, BlogPost $blog)
    {
        $request->validate([
            'title' => 'required|max:255',
            'summary' => 'required|max:500',
            'content' => 'required',
            'is_published' => 'boolean'
        ]);

        $blog->update([
            'title' => $request->title,
            'summary' => $request->summary,
            'content' => $request->input('content'),
            'is_published' => $request->has('is_published'),
            'published_at' => $request->has('is_published') && !$blog->published_at ? now() : $blog->published_at,
        ]);

        return redirect()->route('admin.blog.index')->with('success', 'Blog post updated successfully!');
    }

    public function destroy(BlogPost $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blog.index')->with('success', 'Blog post deleted successfully!');
    }
}
