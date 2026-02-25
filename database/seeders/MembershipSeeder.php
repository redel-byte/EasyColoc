<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Membership;
use App\Models\User;
use App\Models\Colocation;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colocations = Colocation::all();
        $users = User::all();

        foreach ($colocations as $colocation) {
            // Create owner membership (first user becomes owner)
            Membership::factory()->create([
                'colocation_id' => $colocation->id,
                'user_id' => $users->random()->id,
                'role' => 'owner',
                'is_active' => true,
                'name' => 'Owner Membership',
                'description' => 'Primary owner of the colocation'
            ]);

            // Create 2-4 member memberships
            $memberCount = rand(2, 4);
            for ($i = 0; $i < $memberCount; $i++) {
                Membership::factory()->create([
                    'colocation_id' => $colocation->id,
                    'user_id' => $users->random()->id,
                    'role' => 'member'
                ]);
            }
        }
    }
}
