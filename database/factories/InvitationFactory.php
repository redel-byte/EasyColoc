<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invitation>
 */
class InvitationFactory extends Factory
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
            'email' => fake()->unique()->safeEmail(),
            'token' => fake()->sha256(),
            'expires_at' => fake()->dateTimeBetween('now', '+30 days'),
            'is_accepted' => fake()->boolean(30), // 30% chance of being accepted
            'create_at' => fake()->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
