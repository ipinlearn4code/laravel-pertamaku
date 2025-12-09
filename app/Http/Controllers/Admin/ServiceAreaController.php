<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceArea;
use Illuminate\Http\Request;

class ServiceAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serviceAreas = ServiceArea::latest()->paginate(10);
        return view('admin.service-areas.index', compact('serviceAreas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service-areas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'area_name' => 'required|string|max:100',
            'is_covered' => 'boolean',
            'coverage_quality' => 'required|in:excellent,good,fair,limited',
            'notes' => 'nullable|string'
        ]);

        ServiceArea::create([
            'area_name' => $request->area_name,
            'is_covered' => $request->boolean('is_covered', true),
            'coverage_quality' => $request->coverage_quality,
            'notes' => $request->notes
        ]);

        return redirect()->route('admin.service-areas.index')
            ->with('success', 'Area layanan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceArea $serviceArea)
    {
        return view('admin.service-areas.edit', compact('serviceArea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceArea $serviceArea)
    {
        $request->validate([
            'area_name' => 'required|string|max:100',
            'is_covered' => 'boolean',
            'coverage_quality' => 'required|in:excellent,good,fair,limited',
            'notes' => 'nullable|string'
        ]);

        $serviceArea->update([
            'area_name' => $request->area_name,
            'is_covered' => $request->boolean('is_covered', true),
            'coverage_quality' => $request->coverage_quality,
            'notes' => $request->notes
        ]);

        return redirect()->route('admin.service-areas.index')
            ->with('success', 'Area layanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceArea $serviceArea)
    {
        $serviceArea->delete();
        return redirect()->route('admin.service-areas.index')
            ->with('success', 'Area layanan berhasil dihapus.');
    }
}
