<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->slug(),
            'cost' => fake()->randomNumber(5),
            'stocks' => fake()->randomNumber(),
            'description' => fake()->text(50),
            'id_type' => fake()->numberBetween(1,20),
            'id_seller' => fake()->numberBetween(1,10)
        ];
    }
}
