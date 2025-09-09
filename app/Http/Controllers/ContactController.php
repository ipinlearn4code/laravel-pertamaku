<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|min:5|max:255',
            'message' => 'required|min:10|max:1000'
        ], [
            'name.required' => 'Nama wajib diisi',
            'name.min' => 'Nama minimal 3 karakter',
            'name.max' => 'Nama maksimal 255 karakter',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.max' => 'Email maksimal 255 karakter',
            'subject.required' => 'Subject wajib diisi',
            'subject.min' => 'Subject minimal 5 karakter',
            'subject.max' => 'Subject maksimal 255 karakter',
            'message.required' => 'Pesan wajib diisi',
            'message.min' => 'Pesan minimal 10 karakter',
            'message.max' => 'Pesan maksimal 1000 karakter'
        ]);

        // Simulasi pengiriman pesan (dalam aplikasi nyata, ini bisa dikirim ke email atau disimpan ke database)
        
        return redirect()->route('contact.index')->with('success', 'Pesan Anda berhasil dikirim! Terima kasih atas feedback Anda.');
    }
}
