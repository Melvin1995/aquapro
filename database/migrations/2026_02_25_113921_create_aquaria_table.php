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
        Schema::create('aquaria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aquarium_type_id')->constrained('aquarium_types')->cascadeOnDelete();
            $table->string('name');
            $table->dateTime('last_time_maintenance')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aquaria');
    }
};
