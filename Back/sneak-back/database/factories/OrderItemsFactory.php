<?php

namespace Database\Factories;

use App\Models\Orders;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItems>
 */
class OrderItemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Orders::all()->random->id,
            'product_id' => Product::all()->random->id,
            'quantity' => fake()->numberBetween(1,5),
            'price' => fake()->numberBetween(100,10000),
        ];
    }
}