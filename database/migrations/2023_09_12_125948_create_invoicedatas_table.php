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
        Schema::create('invoicedatas', function (Blueprint $table) {
            $table->id();
            $table->integer('invoiceid')->unique();
            $table->string('name');
            $table->date('date');
            $table->string('block');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoicedatas');
    }
};
