<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Rent', 'Utilities', 'Groceries', 'Internet', 'Cleaning', 'Maintenance', 'Entertainment', 'Transport']),
            'description' => fake()->sentence(),
            'colocation_id' => \App\Models\Colocation::factory(),
            'create_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
