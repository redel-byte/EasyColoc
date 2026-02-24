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
        Schema::create('expenses',function(Blueprint $table){
            $table->id();
            $table->foreignId('colocation_id')->references('id')->on('colocation');
            $table->foreignId('payer_id')->references('id')->on('users');
            $table->foreignId('category_id')->references('id')->on('categories');
            $table->string('title');
            $table->date('expence_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
