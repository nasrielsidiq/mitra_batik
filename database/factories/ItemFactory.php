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
            'name' => fake()->firstName(),
            'cost' => fake()->randomNumber(5 ,true),
            'stocks' => fake()->randomNumber(3,true),
            'description' => fake()->text(200),
            'id_type' => fake()->numberBetween(1,20),
            'image' => 'dumy'.fake()->numberBetween(1,5).'.webp'
        ];
    }
}
