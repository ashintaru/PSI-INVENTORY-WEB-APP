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
        Schema::create('set_tool', function (Blueprint $table) {
            $table->id();
            $table->string('vehicleidno')->unique();
            $table->boolean('toolbag');
            $table->boolean('tirewrench');
            $table->boolean('jack');
            $table->boolean('jackhandle');
            $table->boolean('openwrench');
            $table->boolean('towhook');
            $table->boolean('slottedscrewdriver');
            $table->boolean('philipsscrewdriver');
            $table->boolean('wheels');
            $table->boolean('cigarettelighter');
            $table->string('wheelcap');
            $table->boolean('sparetire');
            $table->boolean('antena');
            $table->boolean('mating');
            $table->string('other');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('set_tool');
    }
};
