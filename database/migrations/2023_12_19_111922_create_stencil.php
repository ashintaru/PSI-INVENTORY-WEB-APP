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
        Schema::create('stencil', function (Blueprint $table) {
            $table->id();
            $table->integer('cars_id');
            $table->string('vehicleidno');
            $table->string('person');
            $table->date('dateFinishStencil');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stencil');
    }
};
