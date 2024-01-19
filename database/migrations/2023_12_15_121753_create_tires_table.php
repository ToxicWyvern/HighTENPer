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
        /* De code `Schema::create('tires', function (Blueprint ) { ... })` maakt een nieuwe
        tabel aan met de naam 'tires' in het databaseschema. */
        Schema::create('tires', function (Blueprint $table) {  //maakt alle columns aan in de tabel 'tires'
            $table->id();
            $table->string('tire');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tires');
    }
};
