<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Category;
use App\Models\Region;

class RecommendationsController extends Controller
{
    public function index(Request $request)
    {
        // Get all categories and regions for filter options
        $categories = Category::orderBy('name')->get();
        $regions = Region::orderBy('name')->get();
        
        // Get total destinations count
        $totalDestinations = Destination::count();
        
        // Start building the query
        $query = Destination::select('id', 'name', 'slug', 'price_domestic', 'price_foreign', 'featured_image', 'category_id', 'region_id', 'is_featured', 'created_at')
            ->with(['category', 'region']);

        
        // Apply category filter
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
        
        // Apply region filter
        if ($request->filled('region')) {
            $query->where('region_id', $request->region);
        }
        
        // Apply search filter (if you want to add search functionality)
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('description', 'LIKE', '%' . $request->search . '%');
            });
        }
        
        // Apply sorting
        $sort = $request->get('sort', 'name_asc');
        
        switch ($sort) {
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
            case 'price_low':
                $query->orderByRaw('COALESCE(price_domestic, 0) ASC');
                break;
            case 'price_high':
                $query->orderByRaw('COALESCE(price_domestic, 0) DESC');
                break;
            case 'featured':
                $query->orderBy('is_featured', 'desc')->orderBy('name');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'name_asc':
            default:
                $query->orderBy('name', 'asc');
                break;
        }
        
        // Paginate results
        $destinations = $query->paginate(12);
        
        return view('recommendations.index', compact(
            'destinations',
            'categories', 
            'regions',
            'totalDestinations'
        ));
    }
}