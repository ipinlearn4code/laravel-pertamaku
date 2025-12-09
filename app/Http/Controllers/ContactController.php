<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use App\Models\InternetPackage;
use App\Models\ContactInfo;
use App\Models\ServiceArea;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $packages = InternetPackage::active()->get();
        $contactInfo = ContactInfo::active()->get()->groupBy('type');
        $serviceAreas = ServiceArea::covered()->get();
        
        return view('contact', compact('packages', 'contactInfo', 'serviceAreas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'phone' => 'required|min:10|max:20',
            'email' => 'nullable|email|max:255',
            'whatsapp' => 'nullable|min:10|max:20',
            'address' => 'required|min:10|max:500',
            'package_id' => 'nullable|exists:internet_packages,id',
            'installation_time' => 'nullable|in:weekday-morning,weekday-afternoon,weekend,flexible',
            'notes' => 'nullable|max:1000',
            'newsletter_consent' => 'boolean'
        ], [
            'name.required' => 'Nama wajib diisi',
            'name.min' => 'Nama minimal 3 karakter',
            'name.max' => 'Nama maksimal 255 karakter',
            'phone.required' => 'Nomor telepon wajib diisi',
            'phone.min' => 'Nomor telepon minimal 10 karakter',
            'phone.max' => 'Nomor telepon maksimal 20 karakter',
            'email.email' => 'Format email tidak valid',
            'email.max' => 'Email maksimal 255 karakter',
            'whatsapp.min' => 'Nomor WhatsApp minimal 10 karakter',
            'whatsapp.max' => 'Nomor WhatsApp maksimal 20 karakter',
            'address.required' => 'Alamat wajib diisi',
            'address.min' => 'Alamat minimal 10 karakter',
            'address.max' => 'Alamat maksimal 500 karakter',
            'package_id.exists' => 'Paket yang dipilih tidak valid',
            'installation_time.in' => 'Waktu instalasi tidak valid',
            'notes.max' => 'Catatan maksimal 1000 karakter'
        ]);

        // Save contact submission to database
        ContactSubmission::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'address' => $request->address,
            'package_id' => $request->package_id,
            'installation_time' => $request->installation_time,
            'notes' => $request->notes,
            'newsletter_consent' => $request->boolean('newsletter_consent'),
            'status' => 'pending'
        ]);
        
        return redirect()->route('contact')->with('success', 'Terima kasih! Data Anda sudah kami terima. Tim kami akan menghubungi Anda segera.');
    }
}
