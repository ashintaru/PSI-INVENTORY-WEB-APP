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
        Schema::create('loose_tool', function (Blueprint $table) {
            $table->id();
            $table->boolean('ownermanual');
            $table->boolean('warantybooklet');
            $table->string('key');
            $table->boolean('remotecontrol');
            $table->string('others');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loose_tool');
    }
};
