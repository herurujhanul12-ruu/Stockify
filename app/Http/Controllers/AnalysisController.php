<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\ProductData;

class AnalysisController extends Controller
{
    // Mengolah seluruh data barang
    public static function processedProducts()
    {
        $products = ProductData::all();
        $results = [];

        foreach ($products as $product) {

            $stockFields = [
                'initial_stock',
                'incoming',
                'outgoing',
                'minimum_stock',
                'target_stock'
            ];

            $isValid = true;

            // Memeriksa data kosong, bukan angka,
            // atau bernilai negatif
            foreach ($stockFields as $field) {
                if (
                    !isset($product[$field]) ||
                    !is_numeric($product[$field]) ||
                    $product[$field] < 0
                ) {
                    $isValid = false;
                }
            }

            // Memeriksa stok target
            if (
                $product['target_stock'] <
                $product['minimum_stock']
            ) {
                $isValid = false;
            }

            // Menghitung stok akhir
            $finalStock = $product['initial_stock']
                + $product['incoming']
                - $product['outgoing'];

            // Stok tidak boleh negatif
            if ($finalStock < 0) {
                $isValid = false;
            }

            // Menentukan status stok
            if (!$isValid) {
                $status = 'Tidak Valid';
            } elseif ($finalStock <= 0) {
                $status = 'Stok Habis';
            } elseif (
                $finalStock <= $product['minimum_stock']
            ) {
                $status = 'Stok Menipis';
            } else {
                $status = 'Stok Aman';
            }

            // Menghitung kebutuhan pengadaan
            $purchase = 0;

            if ($isValid && $finalStock <= $product['minimum_stock']) {
                $purchase = max(
                    0,
                    $product['target_stock'] - $finalStock
                );
            }

            // Menentukan prioritas
            if ($status == 'Stok Habis') {
                $priority = 1;
            } elseif ($status == 'Stok Menipis') {
                $priority = 2;
            } else {
                $priority = 3;
            }

            // Menentukan alasan analisis
            if (!$isValid) {
                $reason = 'Data persediaan tidak valid';
            } elseif ($status == 'Stok Habis') {
                $reason = 'Barang sudah habis dan harus segera dibeli';
            } elseif ($status == 'Stok Menipis') {
                $reason = 'Stok sudah mencapai batas minimum';
            } else {
                $reason = 'Persediaan masih mencukupi';
            }

            // Menggabungkan data asli dan hasil analisis
            $results[] = array_merge($product, [
                'final_stock' => $finalStock,
                'status' => $status,
                'purchase' => $purchase,
                'priority' => $priority,
                'reason' => $reason,
                'is_valid' => $isValid
            ]);
        }

        return $results;
    }

    // Menghitung ringkasan persediaan
    public static function summary()
    {
        $products = self::processedProducts();

        return [
            'total' => count($products),

            'safe' => count(array_filter(
                $products,
                fn($item) => $item['status'] == 'Stok Aman'
            )),

            'low' => count(array_filter(
                $products,
                fn($item) => $item['status'] == 'Stok Menipis'
            )),

            'empty' => count(array_filter(
                $products,
                fn($item) => $item['status'] == 'Stok Habis'
            )),

            'invalid' => count(array_filter(
                $products,
                fn($item) => !$item['is_valid']
            ))
        ];
    }

    // Menampilkan halaman analisis
    public function index()
    {
        $products = self::processedProducts();
        $summary = self::summary();

        return view('analysis.index', compact(
            'products',
            'summary'
        ));
    }

    // Menampilkan rekomendasi pengadaan
    public function recommendations()
    {
        $products = self::processedProducts();

        // Mengambil barang yang perlu dibeli
        $recommendations = array_filter(
            $products,
            fn($item) =>
                $item['is_valid'] &&
                $item['purchase'] > 0
        );

        // Mengurutkan berdasarkan prioritas
        usort($recommendations, function ($a, $b) {

            if ($a['priority'] != $b['priority']) {
                return $a['priority'] <=> $b['priority'];
            }

            return $b['purchase'] <=> $a['purchase'];
        });

        return view(
            'analysis.recommendations',
            compact('recommendations')
        );
    }
}