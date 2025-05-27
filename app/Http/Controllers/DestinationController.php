<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Category;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DestinationController extends Controller
{
    /**
     * Display a listing of destinations with optional filters.
     */
    public function index(Request $request): View
    {
        $query = Destination::with(['category', 'region']);

        // Filter berdasarkan kategori
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Filter berdasarkan region
        if ($request->filled('region')) {
            $query->where('region_id', $request->region);
        }

        // Pencarian berdasarkan nama destinasi
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Paginasi hasil pencarian
        $destinations = $query->paginate(12);

        // Ambil semua kategori dan region untuk filter dropdown
        $categories = Category::all();
        $regions = Region::all();

        return view('destinations.index', compact('destinations', 'categories', 'regions'));
    }

    /**
     * Show the detail page of a destination.
     */
    public function show(string $slug): View
    {
        // Cari destinasi berdasarkan slug
        $destination = Destination::with(['category', 'region', 'images'])
            ->where('slug', $slug)
            ->firstOrFail();

        // Tambahkan 1 ke jumlah view
        // $destination->increment('views');

        // Ambil destinasi terkait dari kategori yang sama
        $relatedDestinations = Destination::where('category_id', $destination->category_id)
            ->where('id', '!=', $destination->id)
            ->take(3)
            ->get();

        return view('destinations.show', compact('destination', 'relatedDestinations'));
    }
}
