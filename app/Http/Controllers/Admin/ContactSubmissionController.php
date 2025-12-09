<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use App\Models\InternetPackage;
use Illuminate\Http\Request;

class ContactSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $submissions = ContactSubmission::with('package')
            ->latest()
            ->paginate(15);
        
        return view('admin.submissions.index', compact('submissions'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactSubmission $submission)
    {
        $submission->load('package');
        return view('admin.submissions.show', compact('submission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactSubmission $submission)
    {
        $packages = InternetPackage::active()->get();
        return view('admin.submissions.edit', compact('submission', 'packages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactSubmission $submission)
    {
        $request->validate([
            'status' => 'required|in:pending,contacted,scheduled,completed',
            'package_id' => 'nullable|exists:internet_packages,id',
            'installation_time' => 'nullable|in:weekday-morning,weekday-afternoon,weekend,flexible',
            'notes' => 'nullable|string'
        ]);

        $submission->update([
            'status' => $request->status,
            'package_id' => $request->package_id,
            'installation_time' => $request->installation_time,
            'notes' => $request->notes
        ]);

        return redirect()->route('admin.submissions.index')
            ->with('success', 'Status pendaftaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactSubmission $submission)
    {
        $submission->delete();
        return redirect()->route('admin.submissions.index')
            ->with('success', 'Data pendaftaran berhasil dihapus.');
    }
}
