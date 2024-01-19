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
        /* De code `Schema::create('coureurs', function (Blueprint ) { ... })` maakt een nieuwe
        tabel aan met de naam "coureurs" in het databaseschema. */
        Schema::create('coureurs', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("photo");
            $table->text("bio");
            $table->string('team_id')->constrained('teams');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coureurs');
    }
};
