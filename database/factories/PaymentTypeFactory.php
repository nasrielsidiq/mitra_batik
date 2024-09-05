<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaymentType>
 */
class PaymentTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => "Bank Syariah Indonesia",
            "payment_type" => "bank",
            "account_id" => "26736987687",
            "id_user" => fake()->unique()->numberBetween(1,11)
        ];
    }
}
