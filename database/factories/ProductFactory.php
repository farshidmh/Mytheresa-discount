<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
            'sku' => $this->faker->unique()->numerify('#'),
            'name' => $this->faker->word(),
            'category' => $this->faker->randomElement(['boots', 'sandals', 'sneakers']),
            'price' => $this->faker->numberBetween(10000, 99999),
        ];
    }
}
