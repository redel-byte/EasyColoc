<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Colocation;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colocations = Colocation::all();
        
        $defaultCategories = [
            'Rent',
            'Utilities',
            'Groceries',
            'Internet',
            'Cleaning Supplies',
            'Maintenance',
            'Entertainment',
            'Transportation'
        ];

        foreach ($colocations as $colocation) {
            foreach ($defaultCategories as $categoryName) {
                Category::factory()->create([
                    'colocation_id' => $colocation->id,
                    'name' => $categoryName,
                    'description' => "Default category for {$categoryName} expenses"
                ]);
            }
        }
    }
}
