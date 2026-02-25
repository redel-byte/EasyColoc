<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'colocation_id' => \App\Models\Colocation::factory(),
            'payer_id' => \App\Models\User::factory(),
            'amount' => fake()->randomFloat(2, 50, 1000),
            'payment_date' => fake()->date(),
            'is_marked' => fake()->boolean(80), // 80% chance of being marked
            'create_at' => fake()->dateTimeBetween('-6 months', 'now'),
        ];
    }
}
