@extends('layouts.app')

@section('title', 'Kategori - Stockify')

@section('content')

<div class="page-header">
    <h1>Kategori Barang</h1>
    <p>Pilih kategori untuk melihat daftar barang.</p>
</div>

<div class="stats-grid">

    @foreach($categories as $category)

    <div class="content-card">
        <h2>{{ $category }}</h2>

        <p>
            Lihat persediaan kategori {{ $category }}.
        </p>

        <a href="{{ url('/barang/kategori/'.urlencode($category)) }}">
            Lihat Barang
        </a>
    </div>

    @endforeach

</div>

@endsection
