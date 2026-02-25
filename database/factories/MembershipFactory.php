<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Membership>
 */
class MembershipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'role' => fake()->randomElement(['owner', 'member']),
            'joined_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'is_active' => fake()->boolean(90), // 90% chance of being active
            'name' => fake()->firstName() . "'s Membership",
            'description' => fake()->sentence(),
            'colocation_id' => \App\Models\Colocation::factory(),
        ];
    }
}
