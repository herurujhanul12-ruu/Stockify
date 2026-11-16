<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $summary = AnalysisController::summary();

        $products = AnalysisController::processedProducts();

        // Mengambil barang yang perlu segera dibeli
        $recommendations = array_filter(
            $products,
            fn($item) => $item['purchase'] > 0
        );

        return view('dashboard', compact(
            'summary',
            'products',
            'recommendations'
        ));
    }
}
