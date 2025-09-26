<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF token untuk keperluan AJAX/JS -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Sistem Toko - Auth')</title>

    <!-- Jika kamu memakai asset publik -->
    <link rel="stylesheet" href="{{ asset('css/toko.css') }}">

    <!-- Atau kalau pakai Vite, uncomment baris ini dan hapus atau sesuaikan asset() -->
    {{-- @vite('resources/css/app.css') --}}

    <!-- Tempat untuk style tambahan per-halaman -->
    @stack('styles')
</head>
<body>
    <main role="main" class="auth-container">
        <div class="auth-box">
            @yield('content')
        </div>
    </main>

    <!-- Tempat untuk script tambahan per-halaman -->
    @stack('scripts')
</body>
</html>
