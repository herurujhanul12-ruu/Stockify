@extends('layouts.app')

@section('title', 'Dashboard - Stockify')

@section('content')

<div class="page-header">
    <h1>Dashboard</h1>
    <p>Selamat datang di Sistem Analisis Persediaan Stockify.</p>
</div>

<div class="stats-grid">

    <div class="stat-card">
        <p>Total Barang</p>
        <h2>{{ $summary['total'] }}</h2>
    </div>

    <div class="stat-card safe">
        <p>Stok Aman</p>
        <h2>{{ $summary['safe'] }}</h2>
    </div>

    <div class="stat-card warning">
        <p>Stok Menipis</p>
        <h2>{{ $summary['low'] }}</h2>
    </div>

    <div class="stat-card danger">
        <p>Stok Habis</p>
        <h2>{{ $summary['empty'] }}</h2>
    </div>

    <div class="stat-card invalid">
        <p>Data Tidak Valid</p>
        <h2>{{ $summary['invalid'] }}</h2>
    </div>

</div>

<div class="content-card">
    <h2>Rekomendasi Pengadaan Barang</h2>
    <p>Barang yang perlu segera dilakukan pengadaan.</p>

    @if(count($recommendations) > 0)

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Stok Akhir</th>
                    <th>Jumlah Pengadaan</th>
                </tr>
            </thead>

            <tbody>
                @foreach($recommendations as $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['category'] }}</td>
                    <td>{{ $item['final_stock'] }}</td>
                    <td>{{ $item['purchase'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @else
        <p>Belum ada rekomendasi pengadaan.</p>
    @endif
</div>

@endsection
