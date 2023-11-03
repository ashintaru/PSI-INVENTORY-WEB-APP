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
        Schema::create('inspect', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicleid');
            $table->string('vehicleidno')->unique();
            $table->integer('blockings')->unique();
            $table->string('recieveBy');
            $table->string('settool');
            $table->string('looseitem');
            $table->string('findings');
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
