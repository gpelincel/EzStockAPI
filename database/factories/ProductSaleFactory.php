<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductSale>
 */
class ProductSaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'total_unit' => fake()->randomFloat(2,0, 999),
            'quantity' => fake()->randomFloat(2,0, 999),
            'id_product' => fake()->randomNumber(2),
            'id_sale' => fake()->randomNumber(2)
        ];
    }
}
