<nav class="navbar navbar-expand-lg navbar-light"
    style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px);">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary fs-4" href={{ route('home') }}>Local Vibe</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active fw-semibold" href={{ route('home') }}>Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('recommendations') }}">Rekomendasi</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('tips.index') }}" class="nav-link">Tips &
                        Informasi</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('faq.index') }}">FAQ</a></li>
            </ul>
            <div class="d-flex ms-3">
                <input class="form-control me-2" type="search" placeholder="Search..." style="width: 200px;">
                <button class="btn btn-outline-primary" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
    </div>
</nav>
