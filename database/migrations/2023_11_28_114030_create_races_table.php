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
        /* De code `Schema::create('races', function (Blueprint ) { ... })` maakt een nieuwe
        databasetabel aan met de naam "races" met behulp van Laravel's Schema Builder. */
        Schema::create('races', function (Blueprint $table) { 
            $table->id();
            $table->string("name");
            $table->date("date");
            $table->boolean("active")->default(false);
            $table->string("image");
            $table->string("flag");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('races');
    }
};
