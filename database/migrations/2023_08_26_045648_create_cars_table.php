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
            $table->string('mmpcmodelcode')->nullable();
            $table->year('mmpcmodelyear')->nullable();
            $table->string('mmpcoptioncode')->nullable();
            $table->string('extcolorcode')->nullable();
            $table->string('modeldescription')->nullable();
            $table->string('exteriorcolor')->nullable();
            $table->string('csno');
            $table->date('bilingdate')->nullable();
            $table->string('vehicleidno')->primary();
            $table->string('engineno');
            $table->integer('productioncbunumber')->nullable();
            $table->bigInteger('bilingdocuments')->nullable();
            $table->string('vehiclestockyard')->nullable();
            $table->string('blockings')->nullable();
            $table->timestamps('dateIn');
            $table->date('dateEncode')->nullable();
            $table->date('dateReleased')->nullable();
            $table->string('releasedBy')->nullable();
            $table->string('dealer')->nullable();
            $table->longText('remark')->nullable();
            $table->int('status');
            $table->int('invoiceBlock')->nullable();
            $table->string('movedBy')->nullable();
            $table->integer('touchBy')->nullable();
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
