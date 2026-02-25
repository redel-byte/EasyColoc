<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\Colocation;
use App\Models\User;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colocations = Colocation::all();
        $users = User::all();

        foreach ($colocations as $colocation) {
            // Create 5-15 payments per colocation
            $paymentCount = rand(5, 15);
            Payment::factory()
                ->count($paymentCount)
                ->create([
                    'colocation_id' => $colocation->id,
                    'payer_id' => $users->random()->id
                ]);
        }
    }
}
