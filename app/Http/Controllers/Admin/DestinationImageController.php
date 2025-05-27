<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DestinationImage;
use Illuminate\Support\Facades\Storage;
use App\Models\Destination;

class DestinationImageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'destination_id' => 'required|exists:destination,id', // <- table harus benar
            'images.*' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $uploadedImages = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $path = $imageFile->store('uploads/destinations', 'public');

                $image = DestinationImage::create([
                    'destination_id' => $request->destination_id,
                    'image_path' => $path,
                ]);

                $uploadedImages[] = $image;
            }
        }

        // Ambil data destinasi untuk redirect ke halaman edit
        $destination = Destination::findOrFail($request->destination_id);

        return redirect()->route('admin.destinations.edit', $destination->id)
                         ->with('success', 'Gambar berhasil diupload!');
    }

    public function destroy($id)
{
    $image = DestinationImage::findOrFail($id);
    $destinationId = $image->destination_id;

    // Hapus file dari storage
    if (Storage::disk('public')->exists($image->image_path)) {
        Storage::disk('public')->delete($image->image_path);
    }

    $image->delete();

    return back()->with('success', 'Foto berhasil dihapus.');
}

}
