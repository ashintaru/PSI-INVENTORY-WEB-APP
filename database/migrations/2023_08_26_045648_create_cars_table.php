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
            $table->string('mmpcmodelcode');
            $table->year('mmpcmodelyear');
            $table->string('mmpcoptioncode');
            $table->string('extcolorcode');
            $table->string('modeldescription');
            $table->string('exteriorcolor');
            $table->string('csno');
            $table->date('bilingdate');
            $table->string('vehicleidno')->primary();
            $table->string('engineno');
            $table->integer('productioncbunumber');
            $table->bigInteger('bilingdocuments');
            $table->string('vehiclestockyard');
            $table->string('blockings');
            $table->timestamps('dateIn');
            $table->date('dateEncode');
            $table->date('dateReleased');
            $table->string('blockings');
            $table->string('blockings');

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
