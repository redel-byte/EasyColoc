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
        //
        Schema::create('payments', function(Blueprint $table){
            $table->id();
            $table->foreignId('colocation_id')->references('id')->on('colocation');
            $table->foreignId('payer_id')->references('id')->on('users');
            $table->decimal('amount');
            $table->date('payment_date');
            $table->boolean('is_marked');
            $table->timestamp('create_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
