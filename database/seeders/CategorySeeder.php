<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::firstOrCreate(['id' => 1, 'name' => 'Boots']);
        Category::firstOrCreate(['id' => 2, 'name' => 'Sandals']);
        Category::firstOrCreate(['id' => 3, 'name' => 'Sneakers']);
    }
}
