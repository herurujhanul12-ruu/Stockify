<?php

namespace App\Data;

class ProductData
{
    public static function all()
    {
        return [
            // KATEGORI SEMBAKO
            ['id'=>1, 'name'=>'Beras Premium', 'category'=>'Sembako', 'initial_stock'=>50, 'incoming'=>20, 'outgoing'=>55, 'minimum_stock'=>10, 'target_stock'=>40],
            ['id'=>2, 'name'=>'Gula Pasir', 'category'=>'Sembako', 'initial_stock'=>30, 'incoming'=>5, 'outgoing'=>28, 'minimum_stock'=>10, 'target_stock'=>35],
            ['id'=>3, 'name'=>'Minyak Goreng', 'category'=>'Sembako', 'initial_stock'=>40, 'incoming'=>10, 'outgoing'=>50, 'minimum_stock'=>15, 'target_stock'=>45],
            ['id'=>4, 'name'=>'Tepung Terigu', 'category'=>'Sembako', 'initial_stock'=>25, 'incoming'=>15, 'outgoing'=>10, 'minimum_stock'=>8, 'target_stock'=>30],
            ['id'=>5, 'name'=>'Telur Ayam', 'category'=>'Sembako', 'initial_stock'=>60, 'incoming'=>10, 'outgoing'=>65, 'minimum_stock'=>15, 'target_stock'=>50],

            // KATEGORI MINUMAN
            ['id'=>6, 'name'=>'Air Mineral', 'category'=>'Minuman', 'initial_stock'=>100, 'incoming'=>30, 'outgoing'=>50, 'minimum_stock'=>20, 'target_stock'=>100],
            ['id'=>7, 'name'=>'Teh Botol', 'category'=>'Minuman', 'initial_stock'=>40, 'incoming'=>10, 'outgoing'=>45, 'minimum_stock'=>15, 'target_stock'=>50],
            ['id'=>8, 'name'=>'Kopi Sachet', 'category'=>'Minuman', 'initial_stock'=>80, 'incoming'=>20, 'outgoing'=>30, 'minimum_stock'=>15, 'target_stock'=>80],
            ['id'=>9, 'name'=>'Susu UHT', 'category'=>'Minuman', 'initial_stock'=>20, 'incoming'=>5, 'outgoing'=>25, 'minimum_stock'=>10, 'target_stock'=>35],
            ['id'=>10, 'name'=>'Jus Kemasan', 'category'=>'Minuman', 'initial_stock'=>35, 'incoming'=>10, 'outgoing'=>15, 'minimum_stock'=>10, 'target_stock'=>40],

            // KATEGORI PERLENGKAPAN
            ['id'=>11, 'name'=>'Sabun Mandi', 'category'=>'Perlengkapan', 'initial_stock'=>45, 'incoming'=>10, 'outgoing'=>40, 'minimum_stock'=>15, 'target_stock'=>50],
            ['id'=>12, 'name'=>'Deterjen', 'category'=>'Perlengkapan', 'initial_stock'=>30, 'incoming'=>10, 'outgoing'=>35, 'minimum_stock'=>12, 'target_stock'=>40],
            ['id'=>13, 'name'=>'Pasta Gigi', 'category'=>'Perlengkapan', 'initial_stock'=>50, 'incoming'=>10, 'outgoing'=>20, 'minimum_stock'=>15, 'target_stock'=>50],
            ['id'=>14, 'name'=>'Sampo', 'category'=>'Perlengkapan', 'initial_stock'=>20, 'incoming'=>5, 'outgoing'=>22, 'minimum_stock'=>10, 'target_stock'=>30],
            ['id'=>15, 'name'=>'Tisu', 'category'=>'Perlengkapan', 'initial_stock'=>70, 'incoming'=>20, 'outgoing'=>30, 'minimum_stock'=>15, 'target_stock'=>70],
        ];
    }
}