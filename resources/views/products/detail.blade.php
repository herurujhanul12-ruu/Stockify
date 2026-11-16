@extends('layouts.app')

@section('title', 'Detail Barang - Stockify')

@section('content')

<div class="page-header">
    <h1>Detail Barang</h1>
    <p>Informasi lengkap persediaan barang.</p>
</div>

<div class="content-card">

    <h2>{{ $product['name'] }}</h2>

    <table>
        <tr>
            <th>ID Barang</th>
            <td>{{ $product['id'] }}</td>
        </tr>

        <tr>
            <th>Kategori</th>
            <td>{{ $product['category'] }}</td>
        </tr>

        <tr>
            <th>Stok Awal</th>
            <td>{{ $product['initial_stock'] }}</td>
        </tr>

        <tr>
            <th>Barang Masuk</th>
            <td>{{ $product['incoming'] }}</td>
        </tr>

        <tr>
            <th>Barang Keluar</th>
            <td>{{ $product['outgoing'] }}</td>
        </tr>

        <tr>
            <th>Stok Akhir</th>
            <td>{{ $product['final_stock'] }}</td>
        </tr>

        <tr>
            <th>Stok Minimum</th>
            <td>{{ $product['minimum_stock'] }}</td>
        </tr>

        <tr>
            <th>Target Stok</th>
            <td>{{ $product['target_stock'] }}</td>
        </tr>

        <tr>
            <th>Status</th>
            <td>{{ $product['status'] }}</td>
        </tr>

        <tr>
            <th>Rekomendasi Pengadaan</th>
            <td>{{ $product['purchase'] }}</td>
        </tr>
    </table>

    <br>

    <a href="{{ url('/barang') }}">Kembali ke Data Barang</a>

</div>

@endsection
