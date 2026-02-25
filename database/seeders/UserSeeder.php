<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(20)
            ->create();

        // Create a specific admin user for testing (only if doesn't exist)
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::factory()->create([
                'first_name' => 'Admin',
                'last_name' => 'User',
                'email' => 'admin@example.com',
                'is_admin' => true,
                'reputation' => 100,
            ]);
        }
    }
}
