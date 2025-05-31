@extends('layouts.frontend')

@section('title', 'Temukan Destinasi Wisata Lokal')

@push('styles')
    <style>
        .hero-section {
            background-image: url('/storage/background/Background.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            position: relative;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            z-index: 1;
            padding-top: 70px;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 800px;
            padding: 0 20px;
        }

        .hero-content h1 {
            font-weight: bold;
            font-size: 3.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            margin-bottom: 20px;
        }

        .hero-content p {
            font-size: 1.3rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);
            margin-bottom: 30px;
        }

        .btn-explore {
            background: #ffc107;
            border: none;
            color: #000;
            font-weight: bold;
            padding: 12px 30px;
            font-size: 1.1rem;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .btn-explore:hover {
            background: #ffb300;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 193, 7, 0.4);
        }

        .section-title {
            color: #0066cc;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .card-destination img {
            height: 200px;
            object-fit: cover;
        }

        .card-destination {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-destination:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        /* Navbar Transparent Styles */
        .navbar.bg-transparent {
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0)) !important;
            backdrop-filter: blur(15px);
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .navbar.bg-transparent:hover {
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0)) !important;
        }

        /* Search bar dengan kontras lebih baik */
        .navbar.bg-transparent .form-control {
            background: rgba(255, 255, 255, 0.9) !important;
            border-color: rgba(255, 255, 255, 0.9) !important;
            color: #000 !important;
        }

        .navbar.bg-transparent .form-control::placeholder {
            color: rgba(0, 0, 0, 0.6) !important;
        }

        .navbar.bg-transparent .form-control:focus {
            background: rgba(255, 255, 255, 0.95) !important;
            border-color: #ffc107 !important;
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25) !important;
            color: #000 !important;
        }

        /* Button search dengan kontras lebih baik */
        .navbar.bg-transparent .btn-outline-light {
            background: rgba(255, 255, 255, 0.9) !important;
            border-color: rgba(255, 255, 255, 0.9) !important;
            color: #000 !important;
        }

        .navbar.bg-transparent .btn-outline-light:hover {
            background: #ffc107 !important;
            border-color: #ffc107 !important;
            color: #000 !important;
        }

        /* Nav links dengan shadow untuk kontras */
        .navbar.bg-transparent .nav-link {
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);
            font-weight: 600 !important;
        }

        .navbar.bg-transparent .nav-link:hover {
            color: #ffc107 !important;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.9);
            transform: translateY(-1px);
        }

        /* Hamburger menu untuk mobile dengan kontras lebih baik */
        @media (max-width: 991.98px) {
            .navbar.bg-transparent .navbar-collapse {
                background: rgba(255, 255, 255, 0.95) !important;
                backdrop-filter: blur(10px);
                margin-top: 1rem;
                padding: 1.5rem;
                border-radius: 12px;
                border: 1px solid rgba(255, 255, 255, 0.2);
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            }

            .navbar.bg-transparent .navbar-collapse .nav-link {
                color: #000 !important;
                text-shadow: none;
                padding: 0.75rem 0;
                border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            }

            .navbar.bg-transparent .navbar-collapse .nav-link:hover {
                color: #0066cc !important;
                background-color: rgba(0, 102, 204, 0.1);
                padding-left: 1rem;
                border-radius: 8px;
            }

            .navbar.bg-transparent .navbar-collapse .input-group {
                margin-top: 1rem;
                width: 100% !important;
            }

            .navbar.bg-transparent .navbar-collapse .form-control {
                background: rgba(248, 249, 250, 1) !important;
                border-color: rgba(0, 0, 0, 0.2) !important;
            }

            .navbar.bg-transparent .navbar-collapse .btn-outline-light {
                background: #0066cc !important;
                border-color: #0066cc !important;
                color: #fff !important;
            }
        }

        /* Navbar brand dengan shadow */
        .navbar.bg-transparent .navbar-brand {
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);
            font-weight: bold;
        }

        /* Hamburger button dengan kontras lebih baik */
        .navbar.bg-transparent .navbar-toggler {
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid rgba(255, 255, 255, 0.9) !important;
            padding: 8px 12px;
            border-radius: 8px;
        }

        .navbar.bg-transparent .navbar-toggler:focus {
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
        }

        .navbar.bg-transparent .navbar-toggler-icon {
            filter: brightness(0) !important;
        }

        /* Responsive adjustments */
        @media (max-width: 991.98px) {
            .navbar.bg-transparent .navbar-collapse {
                background: rgba(0, 0, 0, 0.9);
                backdrop-filter: blur(10px);
                margin-top: 1rem;
                padding: 1rem;
                border-radius: 8px;
            }
        }

        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }

            .hero-content p {
                font-size: 1.1rem;
            }
        }
    </style>
@endpush

@section('content')
    {{-- Hero Section --}}
    <div class="hero-section">
        <div class="hero-content">
            <h1>Temukan <span class="text-warning">Pesona Lokal</span>, Tanpa Batas</h1>
            <p>Yuk jelajahi yang Deket-Deket Dulu!</p>
            <a href="#featured" class="btn btn-explore">Jelajahi</a>
        </div>
    </div>

    {{-- Featured Section --}}
    <div class="featured-section" id="featured">
        <div class="container">
            <h2 class="text-center section-title">
                <i class="bi bi-geo-alt-fill"></i> Wisata Lokal yang Patut Kamu Coba
            </h2>

            <div class="row g-4">
                @foreach ($featuredDestinations as $destination)
                    <div class="col-md-3 col-sm-6">
                        <a href="{{ route('destinations.show', $destination->slug) }}"
                            class="text-decoration-none text-dark">
                            <div class="card card-destination shadow-sm border-0 h-100">
                                @if ($destination->featured_image)
                                    <img src="{{ asset('storage/' . $destination->featured_image) }}" class="card-img-top"
                                        alt="{{ $destination->name }}">
                                @else
                                    <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top"
                                        alt="{{ $destination->name }}">
                                @endif
                                <div class="card-body">
                                    <h6 class="card-title fw-bold">{{ $destination->name }}</h6>
                                    <p class="card-text small text-muted">
                                        <i class="bi bi-geo-alt-fill text-danger"></i>
                                        @if ($destination->category)
                                            <span class="category-badge ms-2">{{ $destination->category->name }}</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- Include Frontend Footer --}}
        @include('partials.frontend-footer')
    </div>

@endsection
