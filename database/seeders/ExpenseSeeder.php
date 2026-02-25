<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Expense;
use App\Models\Colocation;
use App\Models\User;
use App\Models\Category;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colocations = Colocation::all();
        $users = User::all();

        foreach ($colocations as $colocation) {
            $categories = $colocation->Category;
            
            // Skip if no categories exist
            if (!$categories || $categories->isEmpty()) {
                continue;
            }
            
            // Create 10-25 expenses per colocation
            $expenseCount = rand(10, 25);
            for ($i = 0; $i < $expenseCount; $i++) {
                Expense::factory()->create([
                    'colocation_id' => $colocation->id,
                    'payer_id' => $users->random()->id,
                    'category_id' => $categories->random()->id
                ]);
            }
        }
    }
}
