<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AnalysisController;

// 1. Halaman utama
Route::get('/', [DashboardController::class, 'index']);

// 2. Daftar seluruh barang
Route::get('/barang', [ProductController::class, 'index']);

// 3. Daftar kategori
Route::get('/kategori', [ProductController::class, 'categories']);

// 4. Barang berdasarkan kategori
Route::get('/barang/kategori/{kategori}', [ProductController::class, 'category']);

// 5. Detail barang berdasarkan ID
Route::get('/barang/{id}', [ProductController::class, 'detail']);

// 6. Halaman analisis stok
Route::get('/analisis', [AnalysisController::class, 'index']);

// 7. Halaman rekomendasi pengadaan
Route::get('/rekomendasi', [AnalysisController::class, 'recommendations']);