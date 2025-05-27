<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;

class AdminRegionController extends Controller
{
    // Tampilkan semua wilayah
    public function index()
    {
        $regions = Region::all();
        return view('admin.regions.index', compact('regions'));
    }

    // Form tambah wilayah
    public function create()
    {
        return view('admin.regions.create');
    }

    // Simpan wilayah baru
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Region::create($request->only('name'));

        return redirect()->route('admin.regions.index')->with('success', 'Wilayah berhasil ditambahkan.');
    }

    // Form edit wilayah
    public function edit($id)
    {
        $region = Region::findOrFail($id);
        return view('admin.regions.edit', compact('region'));
    }

    // Update wilayah
    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|string|max:255']);

        $region = Region::findOrFail($id);
        $region->update($request->only('name'));

        return redirect()->route('admin.regions.index')->with('success', 'Wilayah berhasil diperbarui.');
    }

    // Hapus wilayah
    public function destroy($id)
    {
        $region = Region::findOrFail($id);
        $region->delete();

        return redirect()->route('admin.regions.index')->with('success', 'Wilayah berhasil dihapus.');
    }
}
