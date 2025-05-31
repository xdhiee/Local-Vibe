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

        body::-webkit-scrollbar {
            display: none;
        }

        .content-wrapper {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            min-height: 100vh;
        }

        .main-content {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        /* Enhanced Gallery Grid */
        .gallery-container {
            position: relative;
            margin-bottom: 0;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            grid-template-rows: 1fr 1fr;
            gap: 6px;
            height: 450px;
            margin-bottom: 0;
        }

        .gallery-item {
            background: #e9ecef;
            overflow: hidden;
            position: relative;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s ease, filter 0.3s ease;
        }

        .gallery-item:hover {
            transform: scale(1.02);
            filter: brightness(1.1);
        }

        .gallery-item:first-child {
            grid-row: 1 / 3;
            border-radius: 12px 12px 0 0;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.05);
        }

        /* Gallery Overlay */
        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.7));
            color: white;
            padding: 15px;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }

        .gallery-item:hover .gallery-overlay {
            transform: translateY(0);
        }

        /* Show More Images Button */
        .more-images-btn {
            position: absolute;
            bottom: 15px;
            right: 15px;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .more-images-btn:hover {
            background: rgba(0, 0, 0, 0.9);
            transform: scale(1.05);
        }

        .content-section {
            padding: 35px;
        }

        .destination-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #212529;
            margin-bottom: 12px;
            line-height: 1.2;
        }

        .destination-location {
            color: #6c757d;
            font-size: 1.1rem;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .description-text {
            line-height: 1.8;
            color: #495057;
            text-align: justify;
            margin-bottom: 35px;
            font-size: 1.1rem;
        }

        .info-section {
            margin-bottom: 30px;
            padding: 25px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 12px;
            border-left: 4px solid #007bff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .info-title {
            font-weight: 600;
            color: #212529;
            margin-bottom: 20px;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #dee2e6;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            color: #6c757d;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .info-value {
            color: #212529;
            font-weight: 600;
            text-align: right;
        }

        .price-domestic {
            color: #28a745;
            font-weight: bold;
            font-size: 1.1rem;
        }

        .price-foreign {
            color: #dc3545;
            font-weight: bold;
            font-size: 1.1rem;
        }

        /* Enhanced Opening Hours Dropdown */
        .opening-hours-dropdown {
            background: white;
            border: 2px solid #dee2e6;
            border-radius: 12px;
            padding: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .opening-hours-dropdown:hover {
            border-color: #007bff;
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.15);
        }

        .dropdown-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            color: #212529;
            font-size: 1.1rem;
        }

        .dropdown-icon {
            transition: transform 0.3s ease;
            font-size: 1.2rem;
        }

        .dropdown-icon.rotated {
            transform: rotate(180deg);
        }

        .dropdown-content {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px solid #e9ecef;
            display: none;
        }

        .dropdown-content.show {
            display: block;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hours-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #f1f3f4;
        }

        .hours-item:last-child {
            border-bottom: none;
        }

        .day-name {
            font-weight: 500;
            color: #495057;
            font-size: 1rem;
        }

        .hours-time {
            font-weight: 600;
            color: #212529;
            font-size: 0.95rem;
        }

        .map-section {
            margin-top: 35px;
            padding: 25px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .map-container {
            background: #e9ecef;
            height: 400px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            border: 3px dashed #dee2e6;
            overflow: hidden;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            margin-bottom: 35px;
            flex-wrap: wrap;
        }

        .btn-custom {
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1rem;
            border: none;
            cursor: pointer;
        }

        .btn-back {
            background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
            color: white;
        }

        .btn-back:hover {
            background: linear-gradient(135deg, #5a6268 0%, #495057 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-share {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            color: white;
        }

        .btn-share:hover {
            background: linear-gradient(135deg, #0056b3 0%, #004085 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
        }

        .btn-gallery {
            background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%);
            color: white;
        }

        .btn-gallery:hover {
            background: linear-gradient(135deg, #1e7e34 0%, #155724 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
        }

        .featured-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%);
            color: #212529;
            padding: 8px 16px;
            border-radius: 25px;
            font-size: 0.85rem;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            z-index: 10;
        }

        .category-badge {
            display: inline-block;
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            color: white;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .hours-status {
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 0.85rem;
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

        /* Modal Styles for Gallery */
        .gallery-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
        }

        .gallery-modal-content {
            position: relative;
            margin: auto;
            padding: 0;
            width: 90%;
            max-width: 1200px;
            height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .gallery-modal img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            border-radius: 8px;
        }

        .gallery-close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
        }

        .gallery-close:hover {
            color: #bbb;
        }

        .gallery-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 16px;
            font-size: 24px;
            cursor: pointer;
            border-radius: 50%;
        }

        .gallery-prev {
            left: 20px;
        }

        .gallery-next {
            right: 20px;
        }

        .gallery-nav:hover {
            background: rgba(0, 0, 0, 0.8);
        }

        @media (max-width: 768px) {
            .gallery-grid {
                grid-template-columns: 1fr;
                grid-template-rows: 300px repeat(4, 120px);
                height: auto;
                gap: 4px;
            }

            .gallery-item:first-child {
                grid-row: 1;
                border-radius: 12px 12px 0 0;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .content-section {
                padding: 25px;
            }

            .destination-title {
                font-size: 2rem;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn-custom {
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .content-section {
                padding: 20px;
            }

            .destination-title {
                font-size: 1.8rem;
            }

            .gallery-grid {
                height: auto;
                grid-template-rows: 250px repeat(4, 100px);
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

            {{-- Enhanced Gallery Grid --}}
            <div class="gallery-container">
                <div class="gallery-grid">
                    {{-- Main Featured Image --}}
                    <div class="gallery-item" onclick="openGallery(0)">
                        @if ($destination->featured_image)
                            <img src="{{ asset('storage/' . $destination->featured_image) }}"
                                alt="{{ $destination->name }}">
                        @else
                            <img src="https://via.placeholder.com/600x400/e9ecef/6c757d?text=No+Image" alt="No Image">
                        @endif
                        @if ($destination->is_featured)
                            <div class="featured-badge">
                                <i class="bi bi-star-fill"></i> Featured
                            </div>
                        @endif
                        <div class="gallery-overlay">
                            <h6 class="mb-1">{{ $destination->name }}</h6>
                            <small>Gambar Utama</small>
                        </div>
                    </div>

                    {{-- Additional Gallery Images from Database --}}
                    @if ($destination->images && $destination->images->count() > 0)
                        @foreach ($destination->images->take(4) as $index => $image)
                            <div class="gallery-item" onclick="openGallery({{ $index + 1 }})">
                                <img src="{{ asset('storage/' . $image->image_path) }}"
                                    alt="Gallery {{ $index + 1 }}">
                                <div class="gallery-overlay">
                                    <small>Galeri {{ $index + 1 }}</small>
                                </div>
                            </div>
                        @endforeach

                        {{-- Show remaining count if more than 4 images --}}
                        @if ($destination->images->count() > 4)
                            <button class="more-images-btn" onclick="openGallery(0)">
                                <i class="bi bi-plus-circle"></i> +{{ $destination->images->count() - 4 }} foto lagi
                            </button>
                        @endif
                    @else
                        {{-- Placeholder images if no additional images --}}
                        @for ($i = 1; $i <= 4; $i++)
                            <div class="gallery-item">
                                <img src="https://via.placeholder.com/300x200/e9ecef/6c757d?text=Gallery+{{ $i }}"
                                    alt="Gallery {{ $i }}">
                                <div class="gallery-overlay">
                                    <small>Galeri {{ $i }}</small>
                                </div>
                            </div>
                        @endfor
                    @endif
                </div>
            </div>

            <div class="content-section">
                {{-- Destination Info --}}
                <h1 class="destination-title">{{ $destination->name }}</h1>
                <div class="destination-location">
                    <i class="bi bi-geo-alt-fill text-danger"></i>
                    <span>{{ $destination->region ? $destination->region->name : 'Lokasi tidak diketahui' }}</span>
                    @if ($destination->category)
                        <span class="category-badge ms-2">{{ $destination->category->name }}</span>
                    @endif
                </div>

                {{-- Description --}}
                @if ($destination->description)
                    <div class="description-text">
                        {{ $destination->description }}
                    </div>
                @endif

                {{-- Enhanced Action Buttons --}}
                <div class="action-buttons">
                    <a href="{{ route('home') }}" class="btn-custom btn-back">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button class="btn-custom btn-share" onclick="shareDestination()">
                        <i class="bi bi-share"></i> Bagikan
                    </button>
                    <button class="btn-custom btn-gallery" onclick="openGallery(0)">
                        <i class="bi bi-images"></i> Lihat Galeri
                    </button>
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
                            <span class="info-label">Total Gambar</span>
                            <span class="info-value">
                                <span class="badge bg-info">
                                    {{ ($destination->images ? $destination->images->count() : 0) + 1 }} foto
                                </span>
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Enhanced Map Section --}}
                <div class="map-section">
                    <div class="info-title mb-3">
                        <i class="bi bi-map text-primary"></i>
                        Lokasi & Peta
                    </div>

                    <div class="map-container">
                        @if (Str::contains($destination->location, 'https://www.google.com/maps/embed'))
                            <iframe src="{{ $destination->location }}" width="100%" height="100%"
                                frameborder="0" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade" class="w-100 h-100 rounded">
                            </iframe>
                        @else
                            <div
                                class="d-flex flex-column align-items-center justify-content-center h-100 text-muted text-center p-4">
                                <i class="bi bi-geo-alt fs-1 mb-3"></i>
                                <h5 class="mb-2">{{ $destination->location ?: $destination->name }}</h5>
                                <p class="mb-0">Peta interaktif akan segera tersedia</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Enhanced Gallery Modal --}}
    <div id="galleryModal" class="gallery-modal">
        <div class="gallery-modal-content">
            <span class="gallery-close" onclick="closeGallery()">&times;</span>
            <button class="gallery-nav gallery-prev" onclick="changeGalleryImage(-1)">
                <i class="bi bi-chevron-left"></i>
            </button>
            <img id="galleryImage" src="" alt="Gallery Image">
            <button class="gallery-nav gallery-next" onclick="changeGalleryImage(1)">
                <i class="bi bi-chevron-right"></i>
            </button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Toggle Dropdown
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

        // Gallery functionality
        let currentImageIndex = 0;
        let galleryImages = [];

        // Initialize gallery images
        document.addEventListener('DOMContentLoaded', function() {
            // Add featured image
            @if ($destination->featured_image)
                galleryImages.push({
                    src: "{{ asset('storage/' . $destination->featured_image) }}",
                    alt: "{{ $destination->name }} - Gambar Utama"
                });
            @endif

            // Add additional images from database
            @if ($destination->images && $destination->images->count() > 0)
                @foreach ($destination->images as $image)
                    galleryImages.push({
                        src: "{{ asset('storage/' . $image->image_path) }}",
                        alt: "{{ $destination->name }} - Galeri"
                    });
                @endforeach
            @endif
        });

        function openGallery(index) {
            if (galleryImages.length === 0) return;

            currentImageIndex = index;
            const modal = document.getElementById('galleryModal');
            const img = document.getElementById('galleryImage');

            img.src = galleryImages[currentImageIndex].src;
            img.alt = galleryImages[currentImageIndex].alt;
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        function closeGallery() {
            const modal = document.getElementById('galleryModal');
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        function changeGalleryImage(direction) {
            if (galleryImages.length === 0) return;

            currentImageIndex += direction;

            if (currentImageIndex >= galleryImages.length) {
                currentImageIndex = 0;
            } else if (currentImageIndex < 0) {
                currentImageIndex = galleryImages.length - 1;
            }

            const img = document.getElementById('galleryImage');
            img.src = galleryImages[currentImageIndex].src;
            img.alt = galleryImages[currentImageIndex].alt;
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('galleryModal');
            if (event.target == modal) {
                closeGallery();
            }
        }

        // Keyboard navigation
        document.addEventListener('keydown', function(event) {
            const modal = document.getElementById('galleryModal');
            if (modal.style.display === 'block') {
                if (event.key === 'Escape') {
                    closeGallery();
                } else if (event.key === 'ArrowLeft') {
                    changeGalleryImage(-1);
                } else if (event.key === 'ArrowRight') {
                    changeGalleryImage(1);
                }
            }
        });

        // Share functionality
        function shareDestination() {
            if (navigator.share) {
                navigator.share({
                    title: '{{ $destination->name }} - Local Vibe',
                    text: '{{ Str::limit($destination->description, 100) }}',
                    url: window.location.href
                }).then(() => {
                    console.log('Thanks for sharing!');
                }).catch(console.error);
            } else {
                // Fallback: copy to clipboard
                navigator.clipboard.writeText(window.location.href).then(() => {
                    // Show toast notification
                    showToast('Link berhasil disalin ke clipboard!');
                }).catch(() => {
                    showToast('Gagal menyalin link');
                });
            }
        }

        // Toast notification
        function showToast(message) {
            // Create toast element
            const toast = document.createElement('div');
            toast.className = 'toast-notification';
            toast.innerHTML = `
                <div class="toast-content">
                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                    <span>${message}</span>
                </div>
            `;

            // Add toast styles
            toast.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: white;
                border: 1px solid #dee2e6;
                border-radius: 8px;
                padding: 12px 20px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                z-index: 9999;
                animation: slideInRight 0.3s ease;
            `;

            document.body.appendChild(toast);

            // Remove toast after 3 seconds
            setTimeout(() => {
                toast.style.animation = 'slideOutRight 0.3s ease';
                setTimeout(() => {
                    document.body.removeChild(toast);
                }, 300);
            }, 3000);
        }

        // Add animation styles
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideInRight {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
            
            @keyframes slideOutRight {
                from {
                    transform: translateX(0);
                    opacity: 1;
                }
                to {
                    transform: translateX(100%);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add loading states for images
        document.querySelectorAll('img').forEach(img => {
            img.addEventListener('load', function() {
                this.style.opacity = '1';
            });

            img.addEventListener('error', function() {
                this.src = 'https://via.placeholder.com/400x300/e9ecef/6c757d?text=Image+Not+Found';
                this.alt = 'Image not found';
            });
        });

        // Add intersection observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'fadeInUp 0.6s ease forwards';
                }
            });
        }, observerOptions);

        // Observe info sections
        document.querySelectorAll('.info-section').forEach(section => {
            section.style.opacity = '0';
            section.style.transform = 'translateY(20px)';
            observer.observe(section);
        });

        // Add fadeInUp animation
        const fadeStyle = document.createElement('style');
        fadeStyle.textContent = `
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        `;
        document.head.appendChild(fadeStyle);
    </script>
</body>

</html>
