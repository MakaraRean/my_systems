<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;

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
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'code' => Str::random(10),
            'qty' => 5,
            'purchase_price' => 5,
            'sell_price' => 6,
            'desc' => Str::random(10),
            'category_id' => 1,
            'unit_id' => 1
        ];
    }
}
