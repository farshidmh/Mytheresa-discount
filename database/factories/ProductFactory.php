<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Product::class;

    public function definition()
    {
        return [
            'sku' => $this->faker->unique()->numerify('00000#'),
            'name' => $this->faker->word(),
            'category_id' => Category::all()->random()->id,
            'price' => $this->faker->numberBetween(10000, 99999),
        ];
    }
}
