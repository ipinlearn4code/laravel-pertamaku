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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_published' => 'boolean'
        ]);

        $imageData = null;
        if ($request->hasFile('image')) {
            $imageData = $this->compressAndStoreImage($request->file('image'));
        }

        BlogPost::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'summary' => $request->summary,
            'content' => $request->input('content'),
            'image' => $imageData,
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_published' => 'boolean'
        ]);

        $updateData = [
            'title' => $request->title,
            'summary' => $request->summary,
            'content' => $request->input('content'),
            'is_published' => $request->has('is_published'),
            'published_at' => $request->has('is_published') && !$blog->published_at ? now() : $blog->published_at,
        ];

        if ($request->hasFile('image')) {
            $updateData['image'] = $this->compressAndStoreImage($request->file('image'));
        }

        $blog->update($updateData);

        return redirect()->route('admin.blog.index')->with('success', 'Blog post updated successfully!');
    }

    public function destroy(BlogPost $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blog.index')->with('success', 'Blog post deleted successfully!');
    }

    /**
     * Compress and store image as blob
     */
    private function compressAndStoreImage($file)
    {
        try {
            // Simple approach: just get file contents and encode to base64
            // to avoid binary encoding issues with database
            $fileContents = file_get_contents($file->getRealPath());
            
            // For now, return base64 encoded string to avoid UTF-8 issues
            // This is safer for database storage
            return base64_encode($fileContents);
            
        } catch (\Exception $e) {
            // Log error for debugging
            \Log::error('Image compression failed: ' . $e->getMessage());
            return null;
        }
    }
}
