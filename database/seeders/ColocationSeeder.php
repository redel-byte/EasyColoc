<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Colocation;

class ColocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Colocation::factory()
            ->count(10)
            ->create();
    }
}
