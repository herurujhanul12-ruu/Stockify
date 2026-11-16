@extends('layouts.app')

@section('title', 'Data Barang - Stockify')

@section('content')

<div class="page-header">
    <h1>Data Barang</h1>
    <p>Daftar seluruh persediaan barang Stockify.</p>
</div>

<div class="content-card">
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Stok Awal</th>
                    <th>Barang Masuk</th>
                    <th>Barang Keluar</th>
                    <th>Stok Akhir</th>
                    <th>Status</th>
                    <th>Detail</th>
                </tr>
            </thead>

            <tbody>
                @foreach($products as $item)
                <tr>
                    <td>{{ $item['id'] }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['category'] }}</td>
                    <td>{{ $item['initial_stock'] }}</td>
                    <td>{{ $item['incoming'] }}</td>
                    <td>{{ $item['outgoing'] }}</td>
                    <td>{{ $item['final_stock'] }}</td>
                    <td>{{ $item['status'] }}</td>
                    <td>
                        <a href="{{ url('/barang/'.$item['id']) }}">
                            Lihat
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
