<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{


    public function run(): void
    {


        Product::firstOrCreate(
            [
                'sku' => '000001',
                'name' => 'BV Lean leather ankle boots',
                'category_id' => 1,
                'price' => 89000,
            ]
        );

        Product::firstOrCreate(
            [
                'sku' => '000002',
                'name' => 'BV Lean leather ankle boots',
                'category_id' => 1,
                'price' => 99000,
            ]
        );

        Product::firstOrCreate(
            [
                'sku' => '000003',
                'name' => 'Ashlington leather ankle boots',
                'category_id' => 1,
                'price' => 71000,
            ]
        );

        Product::firstOrCreate(
            [
                'sku' => '000004',
                'name' => 'Naima embellished suede sandals',
                'category_id' => 2,
                'price' => 79500,
            ]
        );

        Product::firstOrCreate(
            [
                'sku' => '000005',
                'name' => 'Nathane leather sneakers',
                'category_id' => 3,
                'price' => 59000,
            ]
        );


    }
}
