<?php

namespace App\Http\Controllers;

use App\Data\ProductData;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan seluruh barang
    public function index()
    {
        $products = AnalysisController::processedProducts();

        return view('products.index', compact('products'));
    }

    // Menampilkan daftar kategori
    public function categories()
    {
        $categories = array_unique(
            array_column(ProductData::all(), 'category')
        );

        return view('products.categories', compact('categories'));
    }

    // Menampilkan barang berdasarkan kategori
    public function category($kategori)
    {
        $allProducts = AnalysisController::processedProducts();

        $products = array_filter(
            $allProducts,
            fn($item) =>
                strtolower($item['category']) == strtolower($kategori)
        );

        if (empty($products)) {
            abort(404, 'Kategori tidak ditemukan');
        }

        return view('products.index', compact('products'));
    }

    // Menampilkan detail barang berdasarkan ID
    public function detail($id)
    {
        $products = AnalysisController::processedProducts();

        $product = null;

        foreach ($products as $item) {
            if ($item['id'] == $id) {
                $product = $item;
                break;
            }
        }

        if (!$product) {
            abort(404, 'Barang tidak ditemukan');
        }

        return view('products.detail', compact('product'));
    }
}
