<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Colocation>
 */
class ColocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = fake()->randomElement(['active', 'cancelled']);
        
        return [
            'name' => fake()->company() . ' House',
            'status' => $status,
            'create_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'updated_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'cancelled_at' => $status === 'cancelled' 
                ? fake()->dateTimeBetween('-6 months', 'now') 
                : null,
        ];
    }
}
