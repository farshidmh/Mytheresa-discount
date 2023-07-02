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

        Category::firstOrCreate(['name' => 'Books']);

        Category::firstOrCreate(['name' => 'Boots']);

        Category::firstOrCreate(['name' => 'Sneakers']);

        Category::firstOrCreate(['name' => 'Sandals']);

    }
}
