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
            $table->foreignId('user_id')->constrained(table:'users');
            $table->foreignId('race_id')->constrained(table:'races');
            $table->float("position");
            $table->string('driver');
            $table->string("team");
            $table->time("best");
            $table->time("time");
            $table->float("stops");
            $table->float("grid");
            $table->float("points");
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
