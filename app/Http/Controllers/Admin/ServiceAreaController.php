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
    public function index(Request $request)
    {
        $query = ServiceArea::query();
        
        // Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('area', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%")
                  ->orWhere('district', 'like', "%{$search}%");
            });
        }
        
        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        $serviceAreas = $query->latest()->paginate(10);
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
            'area' => 'required|string|max:100',
            'name' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:100',
            'rt' => 'nullable|string|max:10',
            'rw' => 'nullable|string|max:10',
            'status' => 'required|in:active,planned,maintenance',
            'description' => 'nullable|string'
        ]);

        ServiceArea::create([
            'area' => $request->area,
            'name' => $request->name,
            'district' => $request->district,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'status' => $request->status,
            'description' => $request->description
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
            'area' => 'required|string|max:100',
            'name' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:100',
            'rt' => 'nullable|string|max:10',
            'rw' => 'nullable|string|max:10',
            'status' => 'required|in:active,planned,maintenance',
            'description' => 'nullable|string'
        ]);

        $serviceArea->update([
            'area' => $request->area,
            'name' => $request->name,
            'district' => $request->district,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'status' => $request->status,
            'description' => $request->description
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
