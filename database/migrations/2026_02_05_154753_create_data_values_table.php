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
        Schema::create('data_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agregate_dhs2_id')->constrained('agregate_dhs2s');
            $table->string('dataElement');
            $table->string('value');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_values');
    }
};
