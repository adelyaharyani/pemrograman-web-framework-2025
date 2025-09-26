<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Toko')</title>
    <link rel="stylesheet" href="{{ asset('css/toko.css') }}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">🛒 Toko Mahasiswa</div>
        <ul>
            <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('/products') }}">Product</a></li>
            <li><a href="{{ url('/pelanggan') }}">Pelanggan</a></li>
            <li><a href="{{ url('/transaksi') }}">Transaksi</a></li>

            @auth
                <!-- Jika user sudah login -->
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout-btn">Logout</button>
                    </form>
                </li>
            @else
                <!-- Jika user belum login -->
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @endauth
        </ul>
    </nav>

    <!-- Konten -->
    <main class="container">
        @yield('content')
    </main>
</body>
</html>
