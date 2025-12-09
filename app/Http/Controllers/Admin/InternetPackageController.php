<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InternetPackage;
use Illuminate\Http\Request;

class InternetPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = InternetPackage::latest()->paginate(10);
        return view('admin.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'speed_mbps' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'features' => 'nullable|array',
            'is_popular' => 'boolean',
            'is_active' => 'boolean'
        ]);

        InternetPackage::create([
            'name' => $request->name,
            'speed_mbps' => $request->speed_mbps,
            'price' => $request->price,
            'description' => $request->description,
            'features' => $request->features ?? [],
            'is_popular' => $request->boolean('is_popular'),
            'is_active' => $request->boolean('is_active', true)
        ]);

        return redirect()->route('admin.packages.index')->with('success', 'Paket internet berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InternetPackage $package)
    {
        return view('admin.packages.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InternetPackage $package)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'speed_mbps' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'features' => 'nullable|array',
            'is_popular' => 'boolean',
            'is_active' => 'boolean'
        ]);

        $package->update([
            'name' => $request->name,
            'speed_mbps' => $request->speed_mbps,
            'price' => $request->price,
            'description' => $request->description,
            'features' => $request->features ?? [],
            'is_popular' => $request->boolean('is_popular'),
            'is_active' => $request->boolean('is_active', true)
        ]);

        return redirect()->route('admin.packages.index')->with('success', 'Paket internet berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InternetPackage $package)
    {
        $package->delete();
        return redirect()->route('admin.packages.index')->with('success', 'Paket internet berhasil dihapus.');
    }
}
