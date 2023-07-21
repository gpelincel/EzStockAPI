<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'price_cost' => fake()->randomFloat(2, 0, 999),
            'price_sale' => fake()->randomFloat(2, 0, 999),
            'quantity' => fake()->randomFloat(2,0, 999),
            'fabricated_at' => fake()->date(),
            'valid_until' => fake()->date(),
            'id_metric' => fake()->randomNumber(2),
            'id_supplier' => fake()->randomNumber(2),
            'id_brand' => fake()->randomNumber(2)
        ];
    }
}
