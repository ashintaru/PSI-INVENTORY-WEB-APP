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
        Schema::create('invoces', function (Blueprint $table) {
            $table->id();
            $table->string('vehicleidno');
            $table->boolean('status');
            $table->string('stp');
            $table->string('vehicletype');
            $table->string('modeltype');
            $table->string('salesremark');
            $table->string('csmo');
            $table->string('csrtype');
            $table->date('csrdate');
            $table->date('dateModified')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoces');
    }
};
