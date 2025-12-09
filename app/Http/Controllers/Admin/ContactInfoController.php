<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactInfos = ContactInfo::latest()->paginate(10);
        return view('admin.contact-info.index', compact('contactInfos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contact-info.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:address,phone,email,whatsapp,hours',
            'label' => 'nullable|string|max:100',
            'value' => 'required|string',
            'is_primary' => 'boolean',
            'is_active' => 'boolean'
        ]);

        ContactInfo::create([
            'type' => $request->type,
            'label' => $request->label,
            'value' => $request->value,
            'is_primary' => $request->boolean('is_primary'),
            'is_active' => $request->boolean('is_active', true)
        ]);

        return redirect()->route('admin.contact-info.index')
            ->with('success', 'Informasi kontak berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactInfo $contactInfo)
    {
        return view('admin.contact-info.edit', compact('contactInfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactInfo $contactInfo)
    {
        $request->validate([
            'type' => 'required|in:address,phone,email,whatsapp,hours',
            'label' => 'nullable|string|max:100',
            'value' => 'required|string',
            'is_primary' => 'boolean',
            'is_active' => 'boolean'
        ]);

        $contactInfo->update([
            'type' => $request->type,
            'label' => $request->label,
            'value' => $request->value,
            'is_primary' => $request->boolean('is_primary'),
            'is_active' => $request->boolean('is_active', true)
        ]);

        return redirect()->route('admin.contact-info.index')
            ->with('success', 'Informasi kontak berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactInfo $contactInfo)
    {
        $contactInfo->delete();
        return redirect()->route('admin.contact-info.index')
            ->with('success', 'Informasi kontak berhasil dihapus.');
    }
}
