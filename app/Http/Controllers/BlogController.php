<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        // Get published posts with pagination
        $perPage = 3;
        $posts = BlogPost::published()->latest()->paginate($perPage);

        return view('pages.blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = BlogPost::published()
                        ->where('slug', $slug)
                        ->with('author')
                        ->firstOrFail();

        return view('pages.blog.show', compact('post'));
    }
}
