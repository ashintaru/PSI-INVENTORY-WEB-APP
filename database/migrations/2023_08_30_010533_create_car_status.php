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
        Schema::create('carstatus', function (Blueprint $table) {
            $table->id();
            $table->string('vehicleidno')->unique();
            $table->boolean('havebeenpassed');
            $table->boolean('havebeenchecked');
            $table->boolean('havebeenreleased');
            $table->boolean('havebeenstored');
            $table->boolean('hasloosetool');
            $table->boolean('hassettool');
            $table->boolean('hasdamage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
