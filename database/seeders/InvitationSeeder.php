<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invitation;
use App\Models\Colocation;

class InvitationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colocations = Colocation::all();

        foreach ($colocations as $colocation) {
            // Create 1-3 invitations per colocation
            $invitationCount = rand(1, 3);
            Invitation::factory()
                ->count($invitationCount)
                ->create(['colocation_id' => $colocation->id]);
        }
    }
}
