<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Local Vibe</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1E3A8A;
            --secondary-color: #6c757d;
            --success-color: #28a745;
            --info-color: #00b7ff;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-color);
        }

        body::-webkit-scrollbar {
            display: none;
        }

        .navbar {
            background: white !important;
            border-bottom: 1px solid #e0e0e0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: white !important;
        } */

        /* .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            transition: color 0.3s ease;
        } */

        /* .nav-link:hover,
        .nav-link.active {
            color: white !important;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
        } */

        .hero-section {
            background: linear-gradient(135deg, var(--primary-color), var(--info-color));
            color: white;
            padding: 80px 0 60px;
            margin-bottom: 0;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .hero-section p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .search-box {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-top: -50px;
            position: relative;
            z-index: 10;
        }

        .search-input {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 15px 20px;
            font-size: 1.1rem;
            transition: border-color 0.3s ease;
        }

        .search-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
        }

        .btn-search {
            background: var(--primary-color);
            border: none;
            border-radius: 10px;
            padding: 15px 30px;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-search:hover {
            background: var(--info-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .faq-section {
            padding: 80px 0;
        }

        .faq-category {
            margin-bottom: 50px;
        }

        .category-title {
            color: var(--primary-color);
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
        }

        .category-title i {
            margin-right: 15px;
            font-size: 2rem;
        }

        .accordion-item {
            border: none;
            margin-bottom: 15px;
            border-radius: 10px !important;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .accordion-button {
            background: white;
            border: none;
            padding: 20px 25px;
            font-weight: 600;
            color: var(--dark-color);
            font-size: 1.1rem;
        }

        .accordion-button:not(.collapsed) {
            background: var(--primary-color);
            color: white;
            box-shadow: none;
        }

        .accordion-button:focus {
            box-shadow: none;
            border: none;
        }

        .accordion-body {
            padding: 25px;
            background: #f8f9fa;
            color: var(--dark-color);
            line-height: 1.6;
        }

        .contact-section {
            background: linear-gradient(135deg, var(--dark-color), var(--secondary-color));
            color: white;
            padding: 60px 0;
            margin-top: 50px;
        }

        .contact-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-5px);
        }

        .contact-card i {
            font-size: 3rem;
            margin-bottom: 20px;
            color: var(--warning-color);
        }

        .stats-section {
            background: white;
            padding: 50px 0;
            margin: 50px 0;
        }

        .stat-item {
            text-align: center;
            padding: 20px;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: bold;
            color: var(--primary-color);
            display: block;
        }

        .stat-label {
            color: var(--secondary-color);
            font-weight: 500;
            margin-top: 10px;
        }

        .footer {
            background: var(--dark-color);
            color: white;
            padding: 40px 0 20px;
        }

        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2rem;
            }

            .search-box {
                padding: 30px 20px;
                margin-top: -30px;
            }

            .category-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    @include('partials.frontend-navbar')

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container text-center">
            <h1><i class="fas fa-question-circle me-3"></i>Frequently Asked Questions</h1>
            <p>Temukan jawaban atas pertanyaan yang sering ditanyakan seputar Local Vibe</p>
        </div>
    </section>

    <!-- Search Box -->
    <div class="container">
        <div class="search-box">
            <div class="row">
                <div class="col-md-10">
                    <input type="text" class="form-control search-input" id="faqSearch"
                        placeholder="Cari pertanyaan atau kata kunci...">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-search w-100" onclick="searchFAQ()">
                        <i class="fas fa-search me-2"></i>Cari
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <span class="stat-number">500+</span>
                        <div class="stat-label">Tempat Wisata</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <span class="stat-number">1000+</span>
                        <div class="stat-label">Review Pengguna</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <span class="stat-number">50+</span>
                        <div class="stat-label">Kota/Kabupaten</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <span class="stat-number">24/7</span>
                        <div class="stat-label">Customer Support</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <!-- Tentang Local Vibe -->
            <div class="faq-category">
                <h2 class="category-title">
                    <i class="fas fa-info-circle"></i>
                    Tentang Local Vibe
                </h2>
                <div class="accordion" id="aboutAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#about1">
                                Apa itu Local Vibe?
                            </button>
                        </h2>
                        <div id="about1" class="accordion-collapse collapse show" data-bs-parent="#aboutAccordion">
                            <div class="accordion-body">
                                Local Vibe adalah platform digital yang membantu Anda menemukan destinasi wisata lokal
                                terbaik di Indonesia. Kami menyediakan rekomendasi tempat wisata, kuliner, dan aktivitas
                                menarik berdasarkan lokasi Anda dengan informasi yang akurat dan terpercaya.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#about2">
                                Bagaimana cara kerja Local Vibe?
                            </button>
                        </h2>
                        <div id="about2" class="accordion-collapse collapse" data-bs-parent="#aboutAccordion">
                            <div class="accordion-body">
                                Local Vibe menggunakan teknologi geolokasi untuk menampilkan rekomendasi tempat wisata
                                terdekat dari lokasi Anda. Kami juga menganalisis preferensi pengguna dan review dari
                                komunitas untuk memberikan rekomendasi yang personal dan berkualitas.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#about3">
                                Apakah Local Vibe gratis?
                            </button>
                        </h2>
                        <div id="about3" class="accordion-collapse collapse" data-bs-parent="#aboutAccordion">
                            <div class="accordion-body">
                                Ya, Local Vibe dapat digunakan secara gratis! Anda dapat mengakses rekomendasi tempat
                                wisata, membaca review, dan menggunakan fitur pencarian tanpa biaya. Kami juga
                                menyediakan layanan premium dengan fitur tambahan untuk pengalaman yang lebih lengkap.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cara Menggunakan -->
            <div class="faq-category">
                <h2 class="category-title">
                    <i class="fas fa-cogs"></i>
                    Cara Menggunakan
                </h2>
                <div class="accordion" id="usageAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#usage1">
                                Bagaimana cara mencari tempat wisata?
                            </button>
                        </h2>
                        <div id="usage1" class="accordion-collapse collapse" data-bs-parent="#usageAccordion">
                            <div class="accordion-body">
                                Anda dapat mencari tempat wisata dengan beberapa cara: 1) Gunakan fitur pencarian
                                berdasarkan lokasi, 2) Pilih kategori wisata yang diinginkan (alam, budaya, kuliner,
                                dll), 3) Lihat rekomendasi berdasarkan lokasi terdekat, atau 4) Gunakan filter untuk
                                menyesuaikan hasil pencarian.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#usage2">
                                Bagaimana cara memberikan review?
                            </button>
                        </h2>
                        <div id="usage2" class="accordion-collapse collapse" data-bs-parent="#usageAccordion">
                            <div class="accordion-body">
                                Untuk memberikan review, kunjungi halaman detail tempat wisata yang ingin Anda review,
                                kemudian klik tombol "Tulis Review". Anda dapat memberikan rating bintang, menulis
                                pengalaman Anda, dan mengunggah foto. Review Anda akan membantu wisatawan lain dalam
                                memilih destinasi.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        {{-- <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#usage3">
                                Apakah saya perlu mendaftar akun?
                            </button>
                        </h2> --}}
                        <div id="usage3" class="accordion-collapse collapse" data-bs-parent="#usageAccordion">
                            <div class="accordion-body">
                                Tidak wajib, namun dengan mendaftar akun Anda dapat: menyimpan tempat favorit,
                                memberikan review dan rating, mendapatkan rekomendasi personal, serta mengakses
                                fitur-fitur premium. Registrasi mudah dan cepat menggunakan email atau akun media
                                sosial.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informasi Tempat Wisata -->
            <div class="faq-category">
                <h2 class="category-title">
                    <i class="fas fa-map-marked-alt"></i>
                    Informasi Tempat Wisata
                </h2>
                <div class="accordion" id="infoAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#info1">
                                Seberapa akurat informasi yang disediakan?
                            </button>
                        </h2>
                        <div id="info1" class="accordion-collapse collapse" data-bs-parent="#infoAccordion">
                            <div class="accordion-body">
                                Kami berkomitmen menyediakan informasi yang akurat dan terkini. Informasi kami berasal
                                dari survey lapangan, kerjasama dengan pengelola wisata, dan kontribusi komunitas.
                                Namun, kami menyarankan untuk selalu mengonfirmasi informasi penting seperti jam
                                operasional dan harga tiket sebelum berkunjung.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#info2">
                                Bagaimana jika informasi yang saya temukan tidak akurat?
                            </button>
                        </h2>
                        <div id="info2" class="accordion-collapse collapse" data-bs-parent="#infoAccordion">
                            <div class="accordion-body">
                                Jika Anda menemukan informasi yang tidak akurat, silakan laporkan melalui fitur
                                "Laporkan Error" di halaman tempat wisata tersebut, atau hubungi customer service kami.
                                Kami akan segera memverifikasi dan memperbarui informasi yang diperlukan.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#info3">
                                Bisakah saya menambahkan tempat wisata baru?
                            </button>
                        </h2>
                        <div id="info3" class="accordion-collapse collapse" data-bs-parent="#infoAccordion">
                            <div class="accordion-body">
                                Tentu saja! Kami sangat menghargai kontribusi komunitas. Anda dapat menambahkan tempat
                                wisata baru melalui fitur "Tambah Tempat" di website atau aplikasi. Tim kami akan
                                memverifikasi informasi yang Anda berikan sebelum mempublikasikannya.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Teknis & Troubleshooting -->
            <div class="faq-category">
                <h2 class="category-title">
                    <i class="fas fa-tools"></i>
                    Teknis & Troubleshooting
                </h2>
                <div class="accordion" id="techAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#tech1">
                                Mengapa lokasi saya tidak terdeteksi?
                            </button>
                        </h2>
                        <div id="tech1" class="accordion-collapse collapse" data-bs-parent="#techAccordion">
                            <div class="accordion-body">
                                Pastikan Anda telah mengizinkan akses lokasi di browser atau aplikasi. Jika masih
                                bermasalah, coba: 1) Refresh halaman, 2) Periksa koneksi internet, 3) Pastikan GPS aktif
                                di perangkat mobile, atau 4) Masukkan lokasi secara manual menggunakan fitur pencarian.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#tech2">
                                Website/aplikasi berjalan lambat, apa yang harus dilakukan?
                            </button>
                        </h2>
                        <div id="tech2" class="accordion-collapse collapse" data-bs-parent="#techAccordion">
                            <div class="accordion-body">
                                Beberapa langkah yang dapat dicoba: 1) Periksa koneksi internet Anda, 2) Clear cache dan
                                cookies browser, 3) Tutup tab atau aplikasi lain yang tidak perlu, 4) Restart browser
                                atau aplikasi, 5) Gunakan browser yang lebih baru atau update aplikasi ke versi terbaru.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#tech3">
                                Apakah ada aplikasi mobile Local Vibe?
                            </button>
                        </h2>
                        <div id="tech3" class="accordion-collapse collapse" data-bs-parent="#techAccordion">
                            <div class="accordion-body">
                                Ya! Aplikasi mobile Local Vibe tersedia di Google Play Store dan Apple App Store.
                                Aplikasi mobile menawarkan pengalaman yang lebih optimal dengan fitur offline,
                                notifikasi lokasi, dan interface yang disesuaikan untuk perangkat mobile.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Privasi & Keamanan -->
            <div class="faq-category">
                <h2 class="category-title">
                    <i class="fas fa-shield-alt"></i>
                    Privasi & Keamanan
                </h2>
                <div class="accordion" id="privacyAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#privacy1">
                                Bagaimana Local Vibe melindungi data pribadi saya?
                            </button>
                        </h2>
                        <div id="privacy1" class="accordion-collapse collapse" data-bs-parent="#privacyAccordion">
                            <div class="accordion-body">
                                Kami sangat serius dalam melindungi privasi pengguna. Data pribadi Anda dienkripsi dan
                                disimpan dengan sistem keamanan berlapis. Kami tidak membagikan data personal kepada
                                pihak ketiga tanpa izin Anda dan hanya menggunakan data untuk meningkatkan layanan
                                sesuai kebijakan privasi kami.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#privacy2">
                                Apakah data lokasi saya akan disimpan?
                            </button>
                        </h2>
                        <div id="privacy2" class="accordion-collapse collapse" data-bs-parent="#privacyAccordion">
                            <div class="accordion-body">
                                Data lokasi hanya digunakan untuk memberikan rekomendasi yang relevan dan tidak disimpan
                                secara permanen. Anda dapat mengatur preferensi privasi di pengaturan akun untuk
                                mengontrol bagaimana data lokasi Anda digunakan atau bahkan menonaktifkan fitur
                                pelacakan lokasi.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#privacy3">
                                Bagaimana cara menghapus akun saya?
                            </button>
                        </h2>
                        <div id="privacy3" class="accordion-collapse collapse" data-bs-parent="#privacyAccordion">
                            <div class="accordion-body">
                                Anda dapat menghapus akun melalui pengaturan profil dengan memilih "Hapus Akun" atau
                                menghubungi customer service kami. Proses penghapusan akan menghilangkan semua data
                                pribadi dari sistem kami dalam waktu 30 hari, kecuali data yang diwajibkan untuk
                                disimpan oleh regulasi.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Masih Ada Pertanyaan?</h2>
                <p>Tim customer service kami siap membantu Anda 24/7</p>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="contact-card">
                        <i class="fas fa-envelope"></i>
                        <h4>Email Support</h4>
                        <p>support@localvibe.id</p>
                        <small>Respon dalam 2-4 jam</small>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="contact-card">
                        <i class="fas fa-phone"></i>
                        <h4>Telepon</h4>
                        <p>0812-3701-7636</p>
                        <small>Senin-Minggu 08:00-22:00</small>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="contact-card">
                        <i class="fas fa-comments"></i>
                        <h4>Live Chat</h4>
                        <p>Chat langsung dengan kami</p>
                        <small>Tersedia 24 jam</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5><i class="fas fa-map-marker-alt me-2"></i>Local Vibe</h5>
                    <p>Jelajahi keindahan Indonesia bersama kami</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="social-links">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p>&copy; 2024 Local Vibe. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Search functionality
        function searchFAQ() {
            const searchTerm = document.getElementById('faqSearch').value.toLowerCase();
            const accordionItems = document.querySelectorAll('.accordion-item');

            accordionItems.forEach(item => {
                const title = item.querySelector('.accordion-button').textContent.toLowerCase();
                const content = item.querySelector('.accordion-body').textContent.toLowerCase();

                if (title.includes(searchTerm) || content.includes(searchTerm)) {
                    item.style.display = 'block';
                    // Highlight search term
                    if (searchTerm && !title.includes(searchTerm)) {
                        item.querySelector('.accordion-collapse').classList.add('show');
                    }
                } else {
                    item.style.display = searchTerm ? 'none' : 'block';
                }
            });

            // Show/hide category sections
            document.querySelectorAll('.faq-category').forEach(category => {
                const visibleItems = category.querySelectorAll(
                        '.accordion-item[style*="block"],
                    .accordion - item: not([style])
                ');
                category.style.display = visibleItems.length > 0 ? 'block' : 'none';
            });
        }

        // Real-time search
        document.getElementById('faqSearch').addEventListener('input', searchFAQ);

        // Smooth scrolling for navigation
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

        // Auto
