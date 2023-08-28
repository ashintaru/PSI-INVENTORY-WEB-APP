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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('mmpcmodelcode');
            $table->year('mmpcmodelyear');
            $table->string('mmpcoptioncode');
            $table->string('extcolorcode');
            $table->string('modeldescription');
            $table->string('exteriorcolor');
            $table->string('csno')->nullable();
            $table->date('bilingdate');
            $table->string('vehicleidno')->unique()->nullable();
            $table->string('engineno')->nullable();
            $table->integer('productioncbunumber')->nullable();
            $table->bigInteger('bilingdocuments')->nullable();
            $table->string('vehiclestockyard')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
