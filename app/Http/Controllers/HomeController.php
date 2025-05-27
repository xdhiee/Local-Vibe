<?php

namespace App\Http\Controllers;

use App\Models\Destination;

class HomeController extends Controller
{
    public function index()
    {
        $featuredDestinations = Destination::where('is_featured', true)->take(4)->get();
        return view('welcome', compact('featuredDestinations'));
    }
}
