@extends('layouts.app')

@section('title', 'Dashboard Stockify')

@section('content')

<div class="page-header">
    <h1>Dashboard Stockify</h1>
    <p>Sistem Analisis Persediaan dan Rekomendasi Pengadaan Barang</p>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <h3>Total Barang</h3>
        <h2>{{ $summary['total'] }}</h2>
    </div>

    <div class="stat-card">
        <h3>Stok Aman</h3>
        <h2>{{ $summary['safe'] }}</h2>
    </div>

    <div class="stat-card">
        <h3>Stok Menipis</h3>
        <h2>{{ $summary['low'] }}</h2>
    </div>

    <div class="stat-card">
        <h3>Stok Habis</h3>
        <h2>{{ $summary['empty'] }}</h2>
    </div>

    <div class="stat-card">
        <h3>Data Tidak Valid</h3>
        <h2>{{ $summary['invalid'] }}</h2>
    </div>
</div>

<div class="content-card">
    <h2>Rekomendasi Pengadaan</h2>

    @if(count($recommendations) > 0)
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
    @else
        <p>Tidak ada rekomendasi pengadaan.</p>
    @endif
</div>

@endsection
