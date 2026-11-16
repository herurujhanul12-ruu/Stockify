<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Stockify')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <div class="sidebar">
        <h2>STOCKIFY</h2>
        <p class="sidebar-subtitle">Inventory Management</p>

        <nav>
            <a href="/">Dashboard</a>
            <a href="/barang">Data Barang</a>
            <a href="/kategori">Kategori</a>
            <a href="/analisis">Analisis Stok</a>
            <a href="/rekomendasi">Rekomendasi</a>
        </nav>
    </div>

    <main class="main-content">
        @yield('content')
    </main>

</body>
</html>
