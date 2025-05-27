@extends('layouts.frontend')

@section('title', 'Temukan Destinasi Wisata Lokal')

@push('styles')
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar {
            background: white !important;
            border-bottom: 1px solid #e0e0e0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .hero-section {
            background: linear-gradient(135deg, #00b7ff 0%, #1E3A8A 100%);
            color: white;
            padding: 60px 0 40px;
            margin-bottom: 30px;
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .hero-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 0;
        }

        .filter-section {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid #e9ecef;
        }

        .filter-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #212529;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-group {
            margin-bottom: 20px;
        }

        .filter-group:last-child {
            margin-bottom: 0;
        }

        .filter-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 8px;
            display: block;
        }

        .form-select {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 10px 15px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.15);
        }

        .btn-filter {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-filter:hover {
            background: #0056b3;
            transform: translateY(-1px);
        }

        .btn-reset {
            background: #6c757d;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-reset:hover {
            background: #5a6268;
            transform: translateY(-1px);
        }

        .results-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding: 0 5px;
        }

        .results-count {
            font-size: 1.1rem;
            color: #495057;
            font-weight: 500;
        }

        .sort-dropdown {
            min-width: 200px;
        }

        .destinations-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .destination-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid #e9ecef;
            position: relative;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .destination-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .card-image {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .destination-card:hover .card-image img {
            transform: scale(1.05);
        }

        .featured-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            background: #ffc107;
            color: #212529;
            padding: 4px 10px;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 600;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .category-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: rgba(0, 123, 255, 0.9);
            color: white;
            padding: 4px 10px;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 500;
            backdrop-filter: blur(4px);
        }

        .card-content {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .card-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #212529;
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .card-title a {
            color: inherit;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .card-title a:hover {
            color: #007bff;
        }

        .card-location {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .card-description {
            color: #495057;
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 15px;
            flex-grow: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .card-footer {
            padding-top: 15px;
            border-top: 1px solid #f1f3f4;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .price-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .price-domestic {
            color: #28a745;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .price-foreign {
            color: #dc3545;
            font-size: 0.8rem;
        }

        .card-actions {
            display: flex;
            gap: 8px;
        }

        .btn-view {
            background: #007bff;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.8rem;
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .btn-view:hover {
            background: #0056b3;
            color: white;
            transform: translateY(-1px);
        }

        .no-results {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .no-results-icon {
            font-size: 4rem;
            color: #dee2e6;
            margin-bottom: 20px;
        }

        .no-results-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #495057;
            margin-bottom: 10px;
        }

        .no-results-text {
            color: #6c757d;
            margin-bottom: 0;
        }

        .loading-spinner {
            display: none;
            text-align: center;
            padding: 40px;
        }

        .active-filters {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 15px;
        }

        .filter-tag {
            background: #e3f2fd;
            color: #1976d2;
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .filter-tag .remove-filter {
            cursor: pointer;
            font-weight: bold;
            margin-left: 5px;
        }

        .filter-tag .remove-filter:hover {
            color: #d32f2f;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }

            .destinations-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .filter-section {
                padding: 20px;
            }

            .results-header {
                flex-direction: column;
                gap: 15px;
                align-items: stretch;
            }

            .sort-dropdown {
                min-width: auto;
            }
        }
    </style>
@endpush

@section('content')
    {{-- Include Frontend Navbar --}}
    {{-- @include('partials.frontend-navbar') --}}

    {{-- Hero Section --}}
    <div class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="hero-title">Rekomendasi Destinasi</h1>
                    <p class="hero-subtitle">Temukan destinasi wisata terbaik yang sesuai dengan preferensi Anda</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="container">
        {{-- Filter Section --}}
        <div class="filter-section">
            <h2 class="filter-title">
                <i class="bi bi-funnel text-primary"></i>
                Filter Destinasi
            </h2>

            <form method="GET" action="{{ route('recommendations') }}" id="filterForm">
                <div class="row">
                    <div class="col-md-4">
                        <div class="filter-group">
                            <label class="filter-label">Kategori</label>
                            <select name="category" class="form-select" id="categoryFilter">
                                <option value="">Semua Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="filter-group">
                            <label class="filter-label">Wilayah</label>
                            <select name="region" class="form-select" id="regionFilter">
                                <option value="">Semua Wilayah</option>
                                @foreach ($regions as $region)
                                    <option value="{{ $region->id }}"
                                        {{ request('region') == $region->id ? 'selected' : '' }}>
                                        {{ $region->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="filter-group">
                            <label class="filter-label">Urutkan</label>
                            <select name="sort" class="form-select" id="sortFilter">
                                <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>
                                    Nama A-Z
                                </option>
                                <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>
                                    Nama Z-A
                                </option>
                                <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>
                                    Harga Terendah
                                </option>
                                <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>
                                    Harga Tertinggi
                                </option>
                                <option value="featured" {{ request('sort') == 'featured' ? 'selected' : '' }}>
                                    Featured First
                                </option>
                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>
                                    Terbaru
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn-filter">
                                <i class="bi bi-search"></i>
                                Terapkan Filter
                            </button>
                            <a href="{{ route('recommendations') }}" class="btn-reset">
                                <i class="bi bi-arrow-clockwise"></i>
                                Reset
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Active Filters --}}
                <div class="active-filters" id="activeFilters">
                    @if (request('category'))
                        <div class="filter-tag">
                            Kategori: {{ $categories->find(request('category'))->name ?? '' }}
                            <span class="remove-filter" onclick="removeFilter('category')">&times;</span>
                        </div>
                    @endif
                    @if (request('region'))
                        <div class="filter-tag">
                            Wilayah: {{ $regions->find(request('region'))->name ?? '' }}
                            <span class="remove-filter" onclick="removeFilter('region')">&times;</span>
                        </div>
                    @endif
                </div>
            </form>
        </div>

        {{-- Results Header --}}
        <div class="results-header">
            <div class="results-count">
                <strong>{{ $destinations->count() }}</strong> destinasi ditemukan
                @if (request()->hasAny(['category', 'region']))
                    dari total {{ $totalDestinations }} destinasi
                @endif
            </div>
        </div>

        {{-- Loading Spinner --}}
        <div class="loading-spinner" id="loadingSpinner">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mt-3 text-muted">Memuat destinasi...</p>
        </div>

        {{-- Destinations Grid --}}
        <div class="destinations-grid" id="destinationsGrid">
            @forelse($destinations as $destination)
                {{-- DEBUG: Cek data destination --}}
                {{-- @if($loop->first)
                    <div class="alert alert-info">
                        <strong>DEBUG INFO:</strong><br>
                        Destination ID: {{ $destination->id }}<br>
                        Destination Name: {{ $destination->name }}<br>
                        Destination Slug: {{ $destination->slug ?? 'NULL/EMPTY' }}<br>
                        Has Slug Field: {{ isset($destination->slug) ? 'YES' : 'NO' }}
                    </div>
                @endif --}}
                <div class="destination-card">
                    <div class="card-image">
                        @if ($destination->featured_image)
                            <img src="{{ asset('storage/' . $destination->featured_image) }}"
                                alt="{{ $destination->name }}">
                        @else
                            <img src="https://via.placeholder.com/400x200/e9ecef/6c757d?text={{ urlencode($destination->name) }}"
                                alt="{{ $destination->name }}">
                        @endif

                        @if ($destination->is_featured)
                            <div class="featured-badge">
                                <i class="bi bi-star-fill"></i> Featured
                            </div>
                        @endif

                        @if ($destination->category)
                            <div class="category-badge">
                                {{ $destination->category->name }}
                            </div>
                        @endif
                    </div>

                    <div class="card-content">
                        <h3 class="card-title">
                            @if($destination->slug)
                                <a href="{{ route('destinations.show', $destination->slug) }}">
                                    {{ $destination->name }}
                                </a>
                            {{-- @else
                                <a href="{{ route('destinations.show', $destination->id) }}">
                                    {{ $destination->name }} <small class="text-danger">(using ID - no slug)</small>
                                </a> --}}
                            @endif
                        </h3>

                        <div class="card-location">
                            <i class="bi bi-geo-alt"></i>
                            {{ $destination->region ? $destination->region->name : 'Lokasi tidak diketahui' }}
                        </div>

                        @if ($destination->description)
                            <p class="card-description">
                                {{ Str::limit($destination->description, 120) }}
                            </p>
                        @endif

                        <div class="card-footer">
                            <div class="price-info">
                                <div class="price-domestic">
                                    @if ($destination->price_domestic)
                                        Rp {{ number_format($destination->price_domestic, 0, ',', '.') }}
                                    @else
                                        Gratis
                                    @endif
                                </div>
                                @if ($destination->price_foreign && $destination->price_foreign != $destination->price_domestic)
                                    <div class="price-foreign">
                                        Asing: Rp {{ number_format($destination->price_foreign, 0, ',', '.') }}
                                    </div>
                                @endif
                            </div>

                            <div class="card-actions">
                                @if($destination->slug)
                                    <a href="{{ route('destinations.show', $destination->slug) }}" class="btn-view">
                                        <i class="bi bi-eye"></i>
                                        Lihat Detail
                                    </a>
                                @else
                                    <a href="{{ route('destinations.show', $destination->id) }}" class="btn-view">
                                        <i class="bi bi-eye"></i>
                                        Lihat Detail (ID)
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="no-results">
                        <i class="bi bi-search no-results-icon"></i>
                        <h3 class="no-results-title">Tidak ada destinasi ditemukan</h3>
                        <p class="no-results-text">
                            Coba ubah filter pencarian atau hapus beberapa kriteria untuk melihat lebih banyak hasil.
                        </p>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if ($destinations->hasPages())
            <div class="d-flex justify-content-center">
                {{ $destinations->appends(request()->query())->links() }}
            </div>
        @endif
    </div>

    {{-- Include Frontend Footer --}}
    @include('partials.frontend-footer')

@endsection

@push('scripts')
    <script>
        // Auto-submit form when filter changes
        document.addEventListener('DOMContentLoaded', function() {
            const filterForm = document.getElementById('filterForm');
            const selects = filterForm.querySelectorAll('select');

            selects.forEach(select => {
                select.addEventListener('change', function() {
                    // Show loading spinner
                    showLoading();

                    // Submit form after a short delay
                    setTimeout(() => {
                        filterForm.submit();
                    }, 300);
                });
            });
        });

        function showLoading() {
            document.getElementById('loadingSpinner').style.display = 'block';
            document.getElementById('destinationsGrid').style.opacity = '0.5';
        }

        function removeFilter(filterName) {
            const form = document.getElementById('filterForm');
            const input = form.querySelector(`[name="${filterName}"]`);
            if (input) {
                input.value = '';
                showLoading();
                setTimeout(() => {
                    form.submit();
                }, 300);
            }
        }

        // Smooth scroll animation for cards
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.destination-card');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, {
                threshold: 0.1
            });

            cards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(card);
            });
        });
    </script>
@endpush