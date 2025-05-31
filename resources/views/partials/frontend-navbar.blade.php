<!-- Navbar dengan Search Functionality -->
<nav class="navbar navbar-expand-lg navbar-light 
     {{ request()->routeIs('home') ? 'bg-transparent position-absolute w-100' : 'bg-white shadow-sm' }}"
    style="{{ request()->routeIs('home') ? 'z-index: 1000; top: 0;' : '' }}">

    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}"
            style="color: {{ request()->routeIs('home') ? '#fff' : '#000' }};">
            <img src="{{ asset('storage/background/LocalVibe.png') }}" alt="Local Vibe"
                style="height: 65px; margin-right: 15px; 
                        filter: {{ request()->routeIs('home') ? 'brightness(0) invert(1)' : 'none' }};">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            style="border-color: {{ request()->routeIs('home') ? 'rgba(255,255,255,0.8)' : '' }};">
            <span class="navbar-toggler-icon"
                style="{{ request()->routeIs('home') ? 'filter: brightness(0) invert(1);' : '' }}"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto gap-3">
                <li class="nav-item">
                    <a class="nav-link fw-medium" href="{{ route('home') }}"
                        style="color: {{ request()->routeIs('home') ? '#fff' : '#000' }}; 
                              transition: all 0.3s ease;">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium" href="{{ route('recommendations') }}"
                        style="color: {{ request()->routeIs('home') ? '#fff' : '#000' }}; 
                              transition: all 0.3s ease;">
                        Rekomendasi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium" href="{{ route('tips.index') }}"
                        style="color: {{ request()->routeIs('home') ? '#fff' : '#000' }}; 
                              transition: all 0.3s ease;">
                        Tips & Informasi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium" href="{{ route('faq.index') }}"
                        style="color: {{ request()->routeIs('home') ? '#fff' : '#000' }}; 
                              transition: all 0.3s ease;">
                        FAQ
                    </a>
                </li>
            </ul>

            <!-- Form Search yang mengarah ke recommendations -->
            <form action="{{ route('recommendations') }}" method="GET" class="d-flex ms-3" style="width: 220px;">
                <div class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="Cari destinasi..."
                        value="{{ request('search') }}"
                        style="{{ request()->routeIs('home')
                            ? 'background: rgba(255,255,255,0.9); 
                                                             border-color: rgba(255,255,255,0.9); 
                                                             color: #000;'
                            : '' }}">
                    <button class="btn {{ request()->routeIs('home') ? 'btn-outline-light' : 'btn-outline-primary' }}"
                        type="submit"
                        style="{{ request()->routeIs('home')
                            ? 'background: rgba(255,255,255,0.9); 
                                                             border-color: rgba(255,255,255,0.9); 
                                                             color: #000;'
                            : '' }}">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</nav>

<!-- JavaScript untuk handle search -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle search form submission
        const searchForm = document.querySelector('form[action*="recommendations"]');
        const searchInput = searchForm.querySelector('input[name="search"]');

        // Tambahkan event listener untuk enter key
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                searchForm.submit();
            }
        });

        // Tambahkan loading state pada button
        searchForm.addEventListener('submit', function() {
            const button = this.querySelector('button[type="submit"]');
            const icon = button.querySelector('i');

            // Ganti icon menjadi loading
            icon.className = 'spinner-border spinner-border-sm';
            button.disabled = true;

            // Reset setelah 3 detik (fallback)
            setTimeout(function() {
                icon.className = 'bi bi-search';
                button.disabled = false;
            }, 3000);
        });
    });
</script>
