@extends('layouts.app')

@section('title', 'Rekomendasi Pengadaan - Stockify')

@section('content')

<div class="page-header">
    <h1>Rekomendasi Pengadaan</h1>
    <p>Daftar barang yang membutuhkan pengadaan berdasarkan kondisi stok.</p>
</div>

<div class="content-card">

    <h2>Daftar Prioritas Pengadaan</h2>

    <p>
        Sistem mengurutkan barang berdasarkan kondisi stok.
        Stok habis memiliki prioritas lebih tinggi daripada stok menipis.
    </p>

    @if(count($recommendations) > 0)

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Prioritas</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Stok Akhir</th>
                    <th>Target Stok</th>
                    <th>Jumlah Pengadaan</th>
                    <th>Alasan</th>
                </tr>
            </thead>

            <tbody>
                @foreach($recommendations as $item)
                <tr>
                    <td>
                        @if($item['priority'] == 1)
                            <span class="status-empty">Prioritas 1</span>
                        @else
                            <span class="status-low">Prioritas 2</span>
                        @endif
                    </td>

                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['category'] }}</td>
                    <td>{{ $item['final_stock'] }}</td>
                    <td>{{ $item['target_stock'] }}</td>
                    <td>{{ $item['purchase'] }}</td>
                    <td>{{ $item['reason'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @else
        <p>Tidak ada barang yang membutuhkan pengadaan.</p>
    @endif

</div>

<div class="content-card" style="margin-top: 20px;">
    <h2>Keterangan Prioritas</h2>

    <p>
        <span class="status-empty">Prioritas 1</span>
        Stok barang habis dan harus segera dibeli.
    </p>

    <p>
        <span class="status-low">Prioritas 2</span>
        Stok barang menipis dan perlu segera ditambah.
    </p>
</div>

@endsection
