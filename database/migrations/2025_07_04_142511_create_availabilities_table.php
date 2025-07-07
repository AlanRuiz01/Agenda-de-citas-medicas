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
        Schema::create('availabilities', function (Blueprint $table) {
            $table->id();
            $table->enum('day', ['lunes', 'martes', 'miercoles','jueves','viernes','sabado'])->default('lunes');
            $table->foreignId('doctor_id')->constrained('users'); // Foreign key to the users table for the doctor
            $table->date('date'); // Date of the availability
            $table->time('start_time'); // Start time of the availability
            $table->time('end_time'); // End time of the availability
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('availabilities');
    }
};
