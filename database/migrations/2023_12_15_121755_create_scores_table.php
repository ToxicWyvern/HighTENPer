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
        Schema::create('scores', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('race_id')->constrained('races');
            $table->foreignId('tire_id')->constrained('tires'); // Fix: Add 'constrained' method for tire_id
            $table->foreignId('team_id')->constrained('teams');
            $table->string("scoreImage");
            $table->string('driver');
            $table->time("best");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scores');
    }
};
