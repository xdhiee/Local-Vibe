<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminDestinationController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminRegionController;
use App\Http\Controllers\Admin\DestinationImageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\RecommendationsController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Halaman utama (home)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman detail destinasi
Route::get('/destinasi/{slug}', [DestinationController::class, 'show'])->name('destinations.show');
Route::get('/rekomendasi', [RecommendationsController::class, 'index'])->name('recommendations');

Route::get('/tips-informasi', function () {
    return view('tips-informasi');
})->name('tips.index');

Route::get('/faq', function () {
    return view('faq');
})->name('faq.index');


/*
|--------------------------------------------------------------------------
| Dashboard (hanya untuk user login)
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Routes yang membutuhkan autentikasi
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // Profile user
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin area
    Route::prefix('admin')->name('admin.')->group(function () {
        // CRUD untuk destinasi
        Route::resource('destinations', AdminDestinationController::class);

        // CRUD sederhana untuk kategori dan region
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('regions', AdminRegionController::class);
    });

    // Manajemen gambar destinasi
    Route::post('/destination-images', [DestinationImageController::class, 'store'])->name('destination-images.store');
    Route::delete('/destination-images/{id}', [DestinationImageController::class, 'destroy'])->name('destination-images.destroy');
});

// Routes bawaan autentikasi (login, register, dll)
require __DIR__ . '/auth.php';
