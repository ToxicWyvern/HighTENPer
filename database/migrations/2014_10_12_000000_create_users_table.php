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
        /*  is een migratiebestand in Laravel, dat wordt gebruikt om
        databasetabellen te definiëren en aan te passen. */
        Schema::create('users', function (Blueprint $table) { //maakt alle columns aan in de tabel 'users'
        /* Hier is een overzicht van wat elke regel doet: */
            $table->id();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string("profileImage")->default('/images/default.png');
            $table->integer("trophies")->default(0);
            $table->rememberToken();
            $table->boolean('admin')->default(false); //zorgt er voor dat iedereen normaal gesproken geen admin is, behalve als het anders aangegeven is
            $table->boolean('blocked')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
