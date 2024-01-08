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
        Schema::create('pdi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('car_id');
            $table->string('vehicleidno');
            $table->longText('pdi_summary');
            $table->longText('underchassis_sumary');
            $table->date('dateFinish');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pdi');
    }
};
