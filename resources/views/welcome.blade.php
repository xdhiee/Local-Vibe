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
                        <a href="{{ route('destinations.show', $destination->slug) }}" class="text-decoration-none text-dark">
                            <div class="card card-destination shadow-sm border-0 h-100">
                                @if ($destination->featured_image)
                                    <img src="{{ asset('storage/' . $destination->featured_image) }}" class="card-img-top" alt="{{ $destination->name }}">
                                @else
                                    <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top" alt="{{ $destination->name }}">
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
