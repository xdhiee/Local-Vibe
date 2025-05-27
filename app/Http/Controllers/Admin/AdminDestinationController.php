<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Category;
use App\Models\Region;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminDestinationController extends Controller
{
    /**
     * Tampilkan semua destinasi
     */
    public function index()
    {
        $destinations = Destination::latest()->paginate(10);
        return view('admin.destinations.index', compact('destinations'));
    }

    /**
     * Tampilkan form untuk menambah destinasi baru
     */
    public function create()
    {
        $categories = Category::all();
        $regions = Region::all();
        return view('admin.destinations.create', compact('categories', 'regions'));
    }

    /**
     * Simpan destinasi baru ke database
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'region_id' => 'nullable|exists:regions,id',
            'price_domestic' => 'nullable|integer|min:0',
            'price_foreign' => 'nullable|integer|min:0',
            'opening_hours' => 'nullable|array',
            'opening_hours.*' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'featured_image' => 'nullable|image|max:2048',
        ]);

        $featuredImagePath = null;
        if ($request->hasFile('featured_image')) {
            $featuredImagePath = $request->file('featured_image')->store('featured_images', 'public');
        }

        // Generate slug yang unik
        $slug = Str::slug($validated['name']);
        $originalSlug = $slug;
        $counter = 1;
        
        while (Destination::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        // Simpan ke database
        Destination::create([
            'name' => $validated['name'],
            'slug' => $slug,
            'description' => $validated['description'] ?? null,
            'location' => $validated['location'] ?? null,
            'category_id' => $validated['category_id'] ?? null,
            'region_id' => $validated['region_id'] ?? null,
            'price_domestic' => $validated['price_domestic'] ?? null,
            'price_foreign' => $validated['price_foreign'] ?? null,
            'opening_hours' => json_encode($validated['opening_hours'] ?? []),
            'featured_image' => $featuredImagePath,
            'is_featured' => $validated['is_featured'] ?? false,
        ]);

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destinasi berhasil ditambahkan!');
    }

    /**
     * Tampilkan form untuk edit destinasi
     */
    public function edit(Destination $destination)
    {
        $regions = Region::all();
        $categories = Category::all();
        return view('admin.destinations.edit', compact('destination', 'regions', 'categories'));
    }

    /**
     * Update destinasi
     */
    public function update(Request $request, $id)
    {
        $destination = Destination::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'region_id' => 'nullable|exists:regions,id',
            'category_id' => 'nullable|exists:categories,id',
            'price_domestic' => 'nullable|numeric',
            'price_foreign' => 'nullable|numeric',
            'opening_hours' => 'nullable|array',
            'opening_hours.*' => 'nullable|string',
            'featured_image' => 'nullable|image|max:2048',
            'is_featured' => 'nullable|boolean',
        ]);

        // Generate slug unik jika nama berubah
        if ($destination->name !== $validated['name']) {
            $slug = Str::slug($validated['name']);
            $originalSlug = $slug;
            $counter = 1;
            
            while (Destination::where('slug', $slug)->where('id', '!=', $destination->id)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }
            $destination->slug = $slug;
        }

        // Update data
        $destination->name = $validated['name'];
        $destination->description = $validated['description'] ?? null;
        $destination->location = $validated['location'] ?? null;
        $destination->region_id = $validated['region_id'] ?? null;
        $destination->category_id = $validated['category_id'] ?? null;
        $destination->price_domestic = $validated['price_domestic'] ?? null;
        $destination->price_foreign = $validated['price_foreign'] ?? null;
        $destination->opening_hours = json_encode($validated['opening_hours'] ?? []);
        $destination->is_featured = $request->has('is_featured') ? true : false;

        // Handle file upload
        if ($request->hasFile('featured_image')) {
            // Hapus gambar lama jika ada
            if ($destination->featured_image && Storage::disk('public')->exists($destination->featured_image)) {
                Storage::disk('public')->delete($destination->featured_image);
            }
            
            // Upload gambar baru
            $destination->featured_image = $request->file('featured_image')->store('featured_images', 'public');
        }

        $destination->save();

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Data destinasi berhasil diperbarui.');
    }

    /**
     * Hapus destinasi
     */
    public function destroy(Destination $destination)
    {
        // Hapus gambar jika ada
        if ($destination->featured_image && Storage::disk('public')->exists($destination->featured_image)) {
            Storage::disk('public')->delete($destination->featured_image);
        }

        $destination->delete();
        
        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destinasi berhasil dihapus.');
    }
}