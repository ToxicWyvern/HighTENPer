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
        Schema::create('scores', function (Blueprint $table) {  //maakt alle columns aan in de tabel 'scores'
            $table->foreignId('user_id')->constrained('users'); //foreignkey van de tabel 'users'
            $table->foreignId('race_id')->constrained('races'); //foreignkey van de tabel 'races'
            $table->foreignId('tire_id')->constrained('tires'); //foreignkey van de tabel 'tires'
            $table->foreignId('team_id')->constrained('teams'); //foreignkey van de tabel 'teams'
            $table->string("scoreImage");
            $table->string('driver')->default('UnknownDriver'); //zorgt ervoor dat als de driver for some reason niet bekend is, dat dat wordt aangeven met 'UnknownDriver'
            $table->time("best");
            $table->boolean('verified')->default(false); //zorgt dat een ingevoerde score eerst al nog niet geverifiërd wordt aangegeven
            $table->timestamps();

            $table->unique(['user_id', 'driver']); //user id en driver moeten altijd uniek zijn, want 2 exact dezelfde namen wordt erg lastig

            $table->foreign('driver')->references('name')->on('users'); //driver moet het zelfde zijn als de 'name' in tabel 'users'
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
