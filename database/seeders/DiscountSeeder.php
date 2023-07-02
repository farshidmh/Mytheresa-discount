<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    public function run(): void
    {

       Category::where('name','Boots')->get()->first()->discounts()->firstOrCreate([
            'percentage' => 30.00
        ]);

       Product::where('sku','000003')->get()->first()->discounts()->firstOrCreate([
            'percentage' => 10.00
        ]);

    }
}
