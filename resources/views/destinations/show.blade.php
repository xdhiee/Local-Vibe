<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $destination->name }} - Local Vibe</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

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

        .content-wrapper {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            min-height: 100vh;
        }

        .main-content {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            grid-template-rows: 1fr 1fr;
            gap: 4px;
            height: 400px;
            margin-bottom: 0;
        }

        .gallery-item {
            background: #e9ecef;
            overflow: hidden;
            position: relative;
        }

        .gallery-item:first-child {
            grid-row: 1 / 3;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .content-section {
            padding: 30px;
        }

        .destination-title {
            font-size: 2rem;
            font-weight: 700;
            color: #212529;
            margin-bottom: 8px;
        }

        .destination-location {
            color: #6c757d;
            font-size: 1rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .description-text {
            line-height: 1.7;
            color: #495057;
            text-align: justify;
            margin-bottom: 30px;
            font-size: 1rem;
        }

        .info-section {
            margin-bottom: 25px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid #007bff;
        }

        .info-title {
            font-weight: 600;
            color: #212529;
            margin-bottom: 15px;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid #e9ecef;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            color: #6c757d;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .info-value {
            color: #212529;
            font-weight: 600;
            text-align: right;
        }

        .price-domestic {
            color: #28a745;
            font-weight: bold;
        }

        .price-foreign {
            color: #dc3545;
            font-weight: bold;
        }

        .opening-hours-dropdown {
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .opening-hours-dropdown:hover {
            border-color: #007bff;
            box-shadow: 0 2px 8px rgba(0, 123, 255, 0.1);
        }

        .dropdown-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            color: #212529;
        }

        .dropdown-icon {
            transition: transform 0.3s ease;
        }

        .dropdown-icon.rotated {
            transform: rotate(180deg);
        }

        .dropdown-content {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #e9ecef;
            display: none;
        }

        .dropdown-content.show {
            display: block;
        }

        .hours-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid #f1f3f4;
        }

        .hours-item:last-child {
            border-bottom: none;
        }

        .day-name {
            font-weight: 500;
            color: #495057;
        }

        .hours-time {
            font-weight: 600;
            color: #212529;
            font-size: 0.9rem;
        }

        .map-section {
            margin-top: 30px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .map-container {
            background: #e9ecef;
            height: 250px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            border: 2px dashed #dee2e6;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
        }

        .btn-custom {
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-back {
            background: #6c757d;
            color: white;
        }

        .btn-back:hover {
            background: #5a6268;
            color: white;
        }

        .btn-share {
            background: #007bff;
            color: white;
        }

        .btn-share:hover {
            background: #0056b3;
            color: white;
        }

        .featured-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #ffc107;
            color: #212529;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .category-badge {
            display: inline-block;
            background: #007bff;
            color: white;
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .hours-status {
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-open {
            background: #d4edda;
            color: #155724;
        }

        .status-closed {
            background: #f8d7da;
            color: #721c24;
        }

        .status-24h {
            background: #d1ecf1;
            color: #0c5460;
        }

        .status-unknown {
            background: #e2e3e5;
            color: #6c757d;
        }

        @media (max-width: 768px) {
            .gallery-grid {
                grid-template-columns: 1fr;
                grid-template-rows: 250px 100px 100px 100px 100px;
                height: auto;
            }

            .gallery-item:first-child {
                grid-row: 1;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .content-section {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    {{-- Include Frontend Navbar --}}
    @include('partials.frontend-navbar')

    {{-- Main Content --}}
    <div class="container-fluid py-4">
        <div class="main-content">

            {{-- Gallery Grid --}}
            <div class="gallery-grid">
                <div class="gallery-item">
                    @if ($destination->featured_image)
                        <img src="{{ asset('storage/' . $destination->featured_image) }}"
                            alt="{{ $destination->name }}">
                    @endif
                    @if ($destination->is_featured)
                        <div class="featured-badge">
                            <i class="bi bi-star-fill"></i> Featured
                        </div>
                    @endif
                </div>
                {{-- Placeholder untuk gallery tambahan --}}
                <div class="gallery-item">
                    <img src="https://via.placeholder.com/300x200/e9ecef/6c757d?text=Gallery+1" alt="Gallery">
                </div>
                <div class="gallery-item">
                    <img src="https://via.placeholder.com/300x200/e9ecef/6c757d?text=Gallery+2" alt="Gallery">
                </div>
                <div class="gallery-item">
                    <img src="https://via.placeholder.com/300x200/e9ecef/6c757d?text=Gallery+3" alt="Gallery">
                </div>
                <div class="gallery-item">
                    <img src="https://via.placeholder.com/300x200/e9ecef/6c757d?text=Gallery+4" alt="Gallery">
                </div>
            </div>

            <div class="content-section">
                {{-- Destination Info --}}
                <h1 class="destination-title">{{ $destination->name }}</h1>
                {{-- <div class="destination-description">
                    <i class="bi bi-geo-alt-fill text-danger"></i>
                    <span>{{ $destination->description }}</span>
                    @if ($destination->category)
                        <span class="category-badge ms-2">{{ $destination->category->name }}</span>
                    @endif
                </div> --}}

                {{-- Description --}}
                @if ($destination->description)
                    <div class="description-text">
                        {{ $destination->description }}
                    </div>
                @endif

                {{-- Action Buttons --}}
                <div class="action-buttons">
                    <a href="{{ route('home') }}" class="btn-custom btn-back">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <a href="#" class="btn-custom btn-share">
                        <i class="bi bi-share"></i> Bagikan
                    </a>
                </div>

                {{-- Opening Hours Dropdown --}}
                @if ($destination->opening_hours)
                    <div class="info-section">
                        <div class="info-title">
                            <i class="bi bi-clock text-primary"></i>
                            Jam Operasional
                        </div>

                        <div class="opening-hours-dropdown" onclick="toggleDropdown()">
                            <div class="dropdown-header">
                                <span>Lihat Jam Operasional</span>
                                <i class="bi bi-chevron-down dropdown-icon" id="dropdownIcon"></i>
                            </div>

                            <div class="dropdown-content" id="dropdownContent">
                                @php
                                    $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                                    $openingHours = json_decode($destination->opening_hours, true);
                                @endphp
                                @foreach ($days as $dayName)
                                    <div class="hours-item">
                                        <span class="day-name">{{ $dayName }}</span>
                                        <span class="hours-time">
                                            @if (isset($openingHours[$dayName]) && $openingHours[$dayName] !== '-')
                                                @if ($openingHours[$dayName] === 'tutup')
                                                    <span class="hours-status status-closed">Tutup</span>
                                                @elseif($openingHours[$dayName] === '24 Jam')
                                                    <span class="hours-status status-24h">24 Jam</span>
                                                @else
                                                    <span
                                                        class="hours-status status-open">{{ $openingHours[$dayName] }}</span>
                                                @endif
                                            @else
                                                <span class="hours-status status-unknown">Tidak Diketahui</span>
                                            @endif
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Price Information --}}
                <div class="info-section">
                    <div class="info-title">
                        <i class="bi bi-tag text-primary"></i>
                        Informasi Harga
                    </div>
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label">Tiket Domestik</span>
                            <span class="info-value price-domestic">
                                @if ($destination->price_domestic)
                                    Rp {{ number_format($destination->price_domestic, 0, ',', '.') }}
                                @else
                                    Gratis
                                @endif
                            </span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Tiket Asing</span>
                            <span class="info-value price-foreign">
                                @if ($destination->price_foreign)
                                    Rp {{ number_format($destination->price_foreign, 0, ',', '.') }}
                                @else
                                    Gratis
                                @endif
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Additional Information --}}
                <div class="info-section">
                    <div class="info-title">
                        <i class="bi bi-info-circle text-primary"></i>
                        Informasi Tambahan
                    </div>
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label">Kategori</span>
                            <span class="info-value">
                                {{ $destination->category ? $destination->category->name : 'Tidak dikategorikan' }}
                            </span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Wilayah</span>
                            <span class="info-value">
                                {{ $destination->region ? $destination->region->name : 'Tidak diketahui' }}
                            </span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Status</span>
                            <span class="info-value">
                                @if ($destination->is_featured)
                                    <span class="badge bg-warning text-dark">Featured</span>
                                @else
                                    <span class="badge bg-secondary">Regular</span>
                                @endif
                            </span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Terakhir Update</span>
                            <span class="info-value">
                                {{ $destination->updated_at ? $destination->updated_at->format('d M Y') : '-' }}
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Map Section --}}
                <div class="map-section mt-4">
                    <div class="info-title mb-2">
                        <i class="bi bi-map text-primary"></i>
                        Lokasi
                    </div>

                    <div class="map-container border rounded overflow-hidden shadow-sm" style="height: 400px;">
                        @if (Str::contains($destination->location, 'https://www.google.com/maps/embed'))
                            <iframe src="{{ $destination->location }}" width="100%" height="100%"
                                frameborder="0" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade" class="w-100 h-100 rounded">
                            </iframe>
                        @else
                            <div
                                class="d-flex flex-column align-items-center justify-content-center h-100 text-muted text-center p-4">
                                <i class="bi bi-geo-alt fs-1 mb-2"></i>
                                <strong>{{ $destination->location }}</strong>
                                <small>Peta interaktif akan segera tersedia</small>
                            </div>
                        @endif
                    </div>
                </div>


            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function toggleDropdown() {
            const dropdownContent = document.getElementById('dropdownContent');
            const dropdownIcon = document.getElementById('dropdownIcon');

            if (dropdownContent.classList.contains('show')) {
                dropdownContent.classList.remove('show');
                dropdownIcon.classList.remove('rotated');
            } else {
                dropdownContent.classList.add('show');
                dropdownIcon.classList.add('rotated');
            }
        }
    </script>
</body>

</html>