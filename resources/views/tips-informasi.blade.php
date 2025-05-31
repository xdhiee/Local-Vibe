{{-- resources/views/tips-informasi.blade.php --}}
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tips & Informasi Wisata - Local Vibe</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1E3A8A 0%, #00b7ff 100%);
            min-height: 100vh;
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

        .hero-section {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 25px;
            padding: 60px 30px;
            margin: 30px 0 50px 0;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .hero-title {
            color: white;
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 15px;
            text-shadow: 0 4px 15px rgba(0,0,0,0.3);
        }

        .hero-subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.2rem;
            margin-bottom: 30px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .search-container {
            max-width: 500px;
            margin: 0 auto;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 18px 60px 18px 25px;
            border: none;
            border-radius: 30px;
            font-size: 16px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
            transform: translateY(-2px);
        }

        .search-btn {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            background: linear-gradient(135deg, #ff6b6b, #ffa726);
            border: none;
            padding: 12px 20px;
            border-radius: 25px;
            color: white;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .search-btn:hover {
            transform: translateY(-50%) scale(1.05);
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 60px;
        }

        .category-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            border-radius: 25px;
            padding: 35px 25px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .category-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }

        .category-card:hover::before {
            left: 100%;
        }

        .category-card:hover {
            transform: translateY(-15px) scale(1.02);
            background: rgba(255, 255, 255, 0.25);
            box-shadow: 0 25px 50px rgba(0,0,0,0.2);
        }

        .category-icon {
            font-size: 4rem;
            margin-bottom: 20px;
            display: block;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.3));
        }

        .category-title {
            color: white;
            font-size: 1.4rem;
            font-weight: bold;
            margin-bottom: 12px;
            text-shadow: 0 2px 8px rgba(0,0,0,0.3);
        }

        .category-desc {
            color: rgba(255, 255, 255, 0.85);
            font-size: 1rem;
            line-height: 1.6;
        }

        .section-title {
            text-align: center;
            color: white;
            font-size: 2.5rem;
            font-weight: bold;
            margin: 70px 0 40px 0;
            text-shadow: 0 4px 15px rgba(0,0,0,0.3);
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, #ff6b6b, #ffa726);
            border-radius: 2px;
        }

        .tips-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
            gap: 35px;
            margin-bottom: 60px;
        }

        .tip-card {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 25px;
            padding: 35px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            transition: all 0.4s ease;
            border: 1px solid rgba(255, 255, 255, 0.3);
            position: relative;
            overflow: hidden;
        }

        .tip-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(135deg, #ff6b6b, #ffa726);
        }

        .tip-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 30px 60px rgba(0,0,0,0.15);
        }

        .tip-number {
            background: linear-gradient(135deg, #ff6b6b, #ffa726);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.3rem;
            margin-bottom: 25px;
            box-shadow: 0 8px 20px rgba(255, 107, 107, 0.3);
        }

        .tip-title {
            color: #2c3e50;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 18px;
            line-height: 1.3;
        }

        .tip-content {
            color: #555;
            line-height: 1.8;
            margin-bottom: 25px;
            font-size: 1rem;
        }

        .tip-highlight {
            background: linear-gradient(135deg, #ffeaa7, #fdcb6e);
            padding: 18px;
            border-radius: 15px;
            border-left: 5px solid #e17055;
            margin: 20px 0;
            box-shadow: 0 5px 15px rgba(253, 203, 110, 0.3);
        }

        .tip-highlight strong {
            color: #d63031;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }

        .info-card {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 25px;
            padding: 35px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border-top: 5px solid #6c5ce7;
        }

        .info-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
        }

        .info-title {
            color: #2c3e50;
            font-size: 1.6rem;
            font-weight: bold;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .info-list {
            list-style: none;
            padding: 0;
        }

        .info-list li {
            padding: 12px 0;
            border-bottom: 1px solid #f1f2f6;
            color: #555;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .info-list li:last-child {
            border-bottom: none;
        }

        .info-list li:hover {
            background: #f8f9fa;
            padding-left: 10px;
            border-radius: 8px;
        }

        .info-list li::before {
            content: "✓";
            color: #27ae60;
            font-weight: bold;
            margin-right: 12px;
            font-size: 1.1rem;
        }

        /* Floating Elements */
        .floating-elements {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .floating-circle {
            position: absolute;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            animation: float 8s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { 
                transform: translateY(0px) rotate(0deg); 
                opacity: 0.8;
            }
            50% { 
                transform: translateY(-30px) rotate(180deg); 
                opacity: 0.4;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.2rem;
            }
            
            .hero-subtitle {
                font-size: 1rem;
            }
            
            .categories-grid {
                grid-template-columns: 1fr;
            }
            
            .tips-grid {
                grid-template-columns: 1fr;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .tip-card, .info-card {
                padding: 25px;
            }
        }

        @media (max-width: 480px) {
            .hero-section {
                padding: 40px 20px;
                margin: 20px 0 30px 0;
            }
            
            .search-input {
                padding: 15px 50px 15px 20px;
                font-size: 14px;
            }
            
            .category-card {
                padding: 25px 20px;
            }
            
            .category-icon {
                font-size: 3rem;
            }
        }
    </style>
</head>

<body>
    {{-- Include Frontend Navbar --}}
    @include('partials.frontend-navbar')

    <!-- Floating Background Elements -->
    <div class="floating-elements">
        <div class="floating-circle" style="width: 120px; height: 120px; top: 15%; left: 8%; animation-delay: 0s;"></div>
        <div class="floating-circle" style="width: 180px; height: 180px; top: 25%; right: 10%; animation-delay: 3s;"></div>
        <div class="floating-circle" style="width: 100px; height: 100px; bottom: 25%; left: 12%; animation-delay: 6s;"></div>
        <div class="floating-circle" style="width: 150px; height: 150px; bottom: 15%; right: 15%; animation-delay: 2s;"></div>
        <div class="floating-circle" style="width: 90px; height: 90px; top: 60%; left: 50%; animation-delay: 4s;"></div>
    </div>

    <div class="container-fluid">
        <div class="container">
            <!-- Hero Section -->
            <div class="hero-section">
                <h1 class="hero-title">🏞️ Tips & Informasi Wisata</h1>
                <p class="hero-subtitle">
                    Panduan lengkap untuk petualangan wisata terbaik di Indonesia. 
                    Temukan tips, trik, dan informasi penting untuk perjalanan yang tak terlupakan!
                </p>
                <div class="search-container">
                    <input type="text" class="search-input" placeholder="Cari tips wisata, destinasi, atau informasi..." id="searchInput">
                    <button class="search-btn" onclick="performSearch()">
                        <i class="fas fa-search"></i> Cari
                    </button>
                </div>
            </div>

            <!-- Categories Section -->
            <div class="categories-grid">
                <div class="category-card" onclick="filterByCategory('persiapan')">
                    <span class="category-icon">🎒</span>
                    <div class="category-title">Persiapan Wisata</div>
                    <div class="category-desc">
                        Tips packing, budget planning, dan persiapan lengkap sebelum bepergian
                    </div>
                </div>
                
                <div class="category-card" onclick="filterByCategory('keamanan')">
                    <span class="category-icon">🛡️</span>
                    <div class="category-title">Keamanan</div>
                    <div class="category-desc">
                        Panduan keselamatan, tips traveling aman, dan proteksi diri
                    </div>
                </div>
                
                <div class="category-card" onclick="filterByCategory('kuliner')">
                    <span class="category-icon">🍜</span>
                    <div class="category-title">Kuliner Lokal</div>
                    <div class="category-desc">
                        Rekomendasi makanan khas, tempat makan terbaik, dan food hunting
                    </div>
                </div>
                
                <div class="category-card" onclick="filterByCategory('transportasi')">
                    <span class="category-icon">🚗</span>
                    <div class="category-title">Transportasi</div>
                    <div class="category-desc">
                        Info transportasi, rental kendaraan, dan akses ke destinasi
                    </div>
                </div>
            </div>

            <!-- Main Tips Section -->
            <h2 class="section-title">💡 Tips Wisata Terpopuler</h2>
            
            <div class="tips-grid" id="tipsGrid">
                <div class="tip-card" data-category="persiapan">
                    <div class="tip-number">1</div>
                    <h3 class="tip-title">Rencanakan Itinerary dengan Matang</h3>
                    <div class="tip-content">
                        Buat rencana perjalanan yang detail namun tetap fleksibel. Riset destinasi, jam operasional, 
                        estimasi waktu perjalanan antar lokasi, dan siapkan plan B untuk kondisi darurat.
                    </div>
                    <div class="tip-highlight">
                        <strong>Pro Tip:</strong> Gunakan aplikasi maps offline dan simpan semua lokasi penting sebelum berangkat. 
                        Download peta area yang akan dikunjungi untuk antisipasi sinyal lemah!
                    </div>
                </div>

                <div class="tip-card" data-category="persiapan">
                    <div class="tip-number">2</div>
                    <h3 class="tip-title">Budget Realistis & Terencana</h3>
                    <div class="tip-content">
                        Siapkan budget 20-25% lebih dari perkiraan awal. Buat breakdown detail untuk transportasi, 
                        akomodasi, makanan, tiket masuk, souvenir, dan dana darurat.
                    </div>
                    <div class="tip-highlight">
                        <strong>Breakdown Ideal:</strong> 35% akomodasi, 30% makanan & minuman, 25% transportasi, 10% lain-lain & darurat
                    </div>
                </div>

                <div class="tip-card" data-category="persiapan">
                    <div class="tip-number">3</div>
                    <h3 class="tip-title">Packing Smart & Efisien</h3>
                    <div class="tip-content">
                        Bawa pakaian yang bisa di-mix and match dengan maksimal 3 warna dominan. 
                        Prioritaskan barang multifungsi dan sesuaikan dengan cuaca serta aktivitas destinasi.
                    </div>
                    <div class="tip-highlight">
                        <strong>Must-Have Items:</strong> Power bank 20.000mAh, P3K lengkap, obat pribadi, 
                        dokumen dalam waterproof bag, dan charger universal
                    </div>
                </div>

                <div class="tip-card" data-category="keamanan">
                    <div class="tip-number">4</div>
                    <h3 class="tip-title">Keamanan & Proteksi Diri</h3>
                    <div class="tip-content">
                        Selalu informasikan itinerary ke keluarga/teman. Simpan copy dokumen penting di cloud storage. 
                        Hindari memamerkan barang berharga dan selalu waspada di tempat ramai.
                    </div>
                    <div class="tip-highlight">
                        <strong>Safety First:</strong> Daftar kontak darurat, asuransi perjalanan, dan selalu percayai insting Anda
                    </div>
                </div>

                <div class="tip-card" data-category="kuliner">
                    <div class="tip-number">5</div>
                    <h3 class="tip-title">Eksplorasi Kuliner Lokal</h3>
                    <div class="tip-content">
                        Cari rekomendasi dari locals, bukan hanya review online. Mulai dengan porsi kecil untuk mencoba 
                        berbagai makanan. Perhatikan kebersihan tempat makan dan pilih yang ramai pengunjung lokal.
                    </div>
                    <div class="tip-highlight">
                        <strong>Food Safety:</strong> Pilih makanan yang dimasak fresh, hindari es batu di tempat tidak higienis, 
                        dan bawa obat pencernaan
                    </div>
                </div>

                <div class="tip-card" data-category="transportasi">
                    <div class="tip-number">6</div>
                    <h3 class="tip-title">Transportasi Efektif</h3>
                    <div class="tip-content">
                        Riset transportasi umum di destinasi. Untuk jarak jauh, pertimbangkan kereta vs pesawat vs bus. 
                        Booking transportasi minimal H-7 untuk harga terbaik, terutama saat high season.
                    </div>
                    <div class="tip-highlight">
                        <strong>Smart Move:</strong> Gabungkan transportasi umum dengan ojek online untuk efisiensi waktu dan biaya
                    </div>
                </div>
            </div>

            <!-- Information Section -->
            <h2 class="section-title">📋 Informasi Penting Wisatawan</h2>

            <div class="info-grid">
                <div class="info-card">
                    <h3 class="info-title">🚨 Nomor Darurat Indonesia</h3>
                    <ul class="info-list">
                        <li><strong>Polisi:</strong> 110</li>
                        <li><strong>Pemadam Kebakaran:</strong> 113</li>
                        <li><strong>Ambulans:</strong> 118 / 119</li>
                        <li><strong>SAR (Search and Rescue):</strong> 115</li>
                        <li><strong>PLN (Listrik):</strong> 123</li>
                        <li><strong>Posko Bencana BNPB:</strong> 129</li>
                        <li><strong>Call Center Polda:</strong> 021-72773732</li>
                    </ul>
                </div>

                <div class="info-card">
                    <h3 class="info-title">📱 Aplikasi Wajib Traveler</h3>
                    <ul class="info-list">
                        <li><strong>Navigasi:</strong> Google Maps, Maps.me (offline)</li>
                        <li><strong>Booking:</strong> Traveloka, Tiket.com, Agoda</li>
                        <li><strong>Transport:</strong> Grab, Gojek, InDriver</li>
                        <li><strong>Kuliner:</strong> Zomato, Google Review, GoFood</li>
                        <li><strong>Cuaca:</strong> AccuWeather, Weather & Radar</li>
                        <li><strong>Translate:</strong> Google Translate (offline mode)</li>
                        <li><strong>Banking:</strong> Mobile banking, e-wallet</li>
                    </ul>
                </div>

                <div class="info-card">
                    <h3 class="info-title">💰 Tips Hemat Budget Wisata</h3>
                    <ul class="info-list">
                        <li>Book akomodasi 2-4 minggu sebelumnya</li>
                        <li>Cari promo flash sale tiket transportasi</li>
                        <li>Makan di warung lokal, bukan restoran turis</li>
                        <li>Gunakan transportasi umum sebisa mungkin</li>
                        <li>Beli oleh-oleh di pasar tradisional</li>
                        <li>Manfaatkan free walking tour atau guide lokal</li>
                        <li>Travel saat weekday atau low season</li>
                    </ul>
                </div>

                <div class="info-card">
                    <h3 class="info-title">🌦️ Panduan Musim Wisata</h3>
                    <ul class="info-list">
                        <li><strong>Kemarau (Apr-Okt):</strong> Ideal untuk pantai & outdoor</li>
                        <li><strong>Hujan (Nov-Mar):</strong> Cocok untuk museum & indoor</li>
                        <li><strong>Peak Season:</strong> Jun-Jul, Des-Jan (hindari jika ingin sepi)</li>
                        <li><strong>Weekday Travel:</strong> Lebih murah & tidak crowded</li>
                        <li><strong>Festival Lokal:</strong> Experience authentic culture</li>
                        <li><strong>Ramadan:</strong> Perhatikan jam operasional tempat wisata</li>
                        <li><strong>Liburan Sekolah:</strong> Expect higher prices</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Include Frontend Footer --}}
    @include('partials.frontend-footer')

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Search functionality
        function performSearch() {
            const query = document.getElementById('searchInput').value.toLowerCase();
            const tipCards = document.querySelectorAll('.tip-card');
            const infoCards = document.querySelectorAll('.info-card');
            
            if (query.trim() === '') {
                // Show all cards
                [...tipCards, ...infoCards].forEach(card => {
                    card.style.display = 'block';
                    card.style.opacity = '1';
                });
                return;
            }
            
            // Search in tip cards
            tipCards.forEach(card => {
                const title = card.querySelector('.tip-title').textContent.toLowerCase();
                const content = card.querySelector('.tip-content').textContent.toLowerCase();
                
                if (title.includes(query) || content.includes(query)) {
                    card.style.display = 'block';
                    card.style.opacity = '1';
                    // Highlight search results
                    card.style.transform = 'scale(1.02)';
                    setTimeout(() => {
                        card.style.transform = 'scale(1)';
                    }, 300);
                } else {
                    card.style.display = 'none';
                }
            });
            
            // Search in info cards
            infoCards.forEach(card => {
                const title = card.querySelector('.info-title').textContent.toLowerCase();
                const items = card.querySelectorAll('.info-list li');
                let found = title.includes(query);
                
                if (!found) {
                    items.forEach(item => {
                        if (item.textContent.toLowerCase().includes(query)) {
                            found = true;
                        }
                    });
                }
                
                if (found) {
                    card.style.display = 'block';
                    card.style.opacity = '1';
                } else {
                    card.style.display = 'none';
                }
            });
            
            // Smooth scroll to results
            document.querySelector('.section-title').scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
        
        // Filter by category
        function filterByCategory(category) {
            const tipCards = document.querySelectorAll('.tip-card');
            
            // Visual feedback for category selection
            document.querySelectorAll('.category-card').forEach(card => {
                card.style.transform = 'scale(1)';
                card.style.opacity = '0.7';
            });
            
            event.target.closest('.category-card').style.transform = 'scale(1.05)';
            event.target.closest('.category-card').style.opacity = '1';
            
            // Filter tips
            tipCards.forEach(card => {
                const cardCategory = card.getAttribute('data-category');
                if (cardCategory === category) {
                    card.style.display = 'block';
                    card.style.opacity = '1';
                    // Add highlight effect
                    card.style.boxShadow = '0 30px 60px rgba(102, 126, 234, 0.3)';
                    setTimeout(() => {
                        card.style.boxShadow = '0 20px 40px rgba(0,0,0,0.1)';
                    }, 1000);
                } else {
                    card.style.display = 'none';
                }
            });
            
            // Smooth scroll to tips section
            setTimeout(() => {
                document.querySelector('.section-title').scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }, 200);
            
            // Reset filter after 5 seconds
            setTimeout(() => {
                tipCards.forEach(card => {
                    card.style.display = 'block';
                    card.style.opacity = '1';
                });
                document.querySelectorAll('.category-card').forEach(card => {
                    card.style.transform = 'scale(1)';
                    card.style.opacity = '1';
                });
            }, 5000);
        }
        
        // Search on Enter key
        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performSearch();
            }
        });
        
        // Floating circles animation variety
        document.querySelectorAll('.floating-circle').forEach((circle, index) => {
            circle.style.animationDuration = (6 + index * 0.5) + 's';
            circle.style.animationDelay = index * 0.8 + 's';
        });
        
        // Intersection Observer for scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                } else {
                    entry.target.style.opacity = '0';
                    entry.target.style.transform = 'translateY(20px)';
                }