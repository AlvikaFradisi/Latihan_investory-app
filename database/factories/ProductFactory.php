<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category_id' => \App\Models\Category::all()->random()->id,
            'name' => $this->faker->sentence(3),
            'price' => $this->faker->numberBetween(10000, 1000000),
            'stock' => $this->faker->numberBetween(1, 100),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['tersedia', 'habis']),
        ];
    }
}
