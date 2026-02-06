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
        Schema::create('agregate_dhs2s', function (Blueprint $table) {
            $table->id();
            $table->string('dataSet');
            $table->string('completeDate')->nullable();
            $table->string('period')->nullable();
            $table->string('orgUnit')->nullable();
            $table->text('dataValues')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agregate_dhs2s');
    }
};
