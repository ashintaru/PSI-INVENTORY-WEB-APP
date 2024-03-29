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
        Schema::create('release_unit', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vehicleid');
            $table->foreign('vehicleidno')->references('vehicleidno')->on('cars')->onDelete('cascade');
            $table->string('photo');
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('release_unit');
    }
};
