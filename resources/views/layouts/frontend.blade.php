<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Local Vibe')</title>

    <!-- Bootstrap & Icon CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Tambahan Style -->
    @stack('styles')

    <style>
        body::-webkit-scrollbar {
            display: none;
        }

        /* Tambahan untuk navbar transparan agar terlihat di halaman home */
        .navbar-custom-home {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            position: absolute;
            width: 100%;
            z-index: 1030;
        }
    </style>
</head>

<body class="position-relative">

    {{-- Navbar --}}
    @include('partials.frontend-navbar')

    {{-- Konten Halaman --}}
    <main>
        @yield('content')
    </main>

    {{-- Script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
