@extends('layouts.app')

@section('title', 'Analisis Stok - Stockify')

@section('content')

<div class="page-header">
    <h1>Analisis Persediaan Barang</h1>
    <p>Hasil perhitungan dan evaluasi kondisi persediaan barang.</p>
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

    <h2>Hasil Analisis Stok</h2>
    <p>
        Stok akhir dihitung menggunakan rumus:
        Stok Awal + Barang Masuk - Barang Keluar.
    </p>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Stok Awal</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                    <th>Stok Akhir</th>
                    <th>Stok Minimum</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach($products as $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['initial_stock'] }}</td>
                    <td>{{ $item['incoming'] }}</td>
                    <td>{{ $item['outgoing'] }}</td>
                    <td>{{ $item['final_stock'] }}</td>
                    <td>{{ $item['minimum_stock'] }}</td>
                    <td>
                        @if($item['status'] == 'Stok Aman')
                            <span class="status-safe">Stok Aman</span>
                        @elseif($item['status'] == 'Stok Menipis')
                            <span class="status-low">Stok Menipis</span>
                        @elseif($item['status'] == 'Stok Habis')
                            <span class="status-empty">Stok Habis</span>
                        @else
                            <span class="status-invalid">Tidak Valid</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
