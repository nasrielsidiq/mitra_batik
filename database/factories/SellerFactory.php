<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use function Laravel\Prompts\text;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seller>
 */
class SellerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_users' => fake()->unique()->numberBetween(1,10),
            'is_active' => true,
            'name' => fake()->company(),
            'description' => fake()->text(100),
            'address' => fake()->address(),
            'tags' => fake()->slug(),
        ];
    }
}
