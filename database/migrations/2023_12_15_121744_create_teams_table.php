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
        /* De code `Schema::create('teams', function (Blueprint ) { ... })` maakt een nieuwe
        databasetabel aan met de naam "teams" met behulp van Laravel's Schema Builder. */
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('team');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
