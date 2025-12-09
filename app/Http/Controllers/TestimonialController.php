<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'message' => 'required|string|min:10',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        Testimonial::create([
            'name' => $request->name,
            'location' => $request->location,
            'message' => $request->message,
            'email' => $request->email,
            'phone' => $request->phone,
            'is_published' => false, // Default unpublished
        ]);

        Session::flash('success', 'Terima kasih! Testimoni Anda telah dikirim dan akan ditinjau terlebih dahulu.');
        return redirect()->route('testimonials.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        return view('admin.testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'message' => 'required|string|min:10',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $testimonial->update([
            'name' => $request->name,
            'location' => $request->location,
            'message' => $request->message,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        Session::flash('success', 'Testimoni berhasil diupdate.');
        return redirect()->route('admin.testimonials.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        Session::flash('success', 'Testimoni berhasil dihapus.');
        return redirect()->route('admin.testimonials.index');
    }

    /**
     * Toggle publish status
     */
    public function togglePublish(Testimonial $testimonial)
    {
        $testimonial->update([
            'is_published' => !$testimonial->is_published,
            'published_at' => $testimonial->is_published ? null : now(),
        ]);

        $status = $testimonial->is_published ? 'dipublish' : 'di-unpublish';
        Session::flash('success', "Testimoni berhasil {$status}.");
        
        return redirect()->route('admin.testimonials.index');
    }

    /**
     * Admin methods
     */
    public function adminIndex()
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }
}
