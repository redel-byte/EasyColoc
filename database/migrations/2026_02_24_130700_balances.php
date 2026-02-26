<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('colocation_id')->references('id')->on('colocation')->onDelete('cascade');
            $table->foreignId('debtor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('creditor_id')->references('id')->on('users')->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->timestamp('calculated_at');
            $table->timestamps();

            // Ensure a user can't have multiple balance entries with the same creditor in same colocation
            $table->unique(['colocation_id', 'debtor_id', 'creditor_id'], 'unique_balance_per_colocation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balances');
    }
};
