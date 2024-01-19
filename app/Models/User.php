<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\CanResetPassword;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * De eigenschappen die massaal toegewezen kunnen worden.
     *
     * @var array<int, string>
     */
   /* De eigenschap `protected ` in het `User`-model wordt gebruikt om te specificeren welke
   attributen kunnen worden toegewezen.  In dit geval kunnen de attributen `name`,
   `email`, `password` en `admin`, wat betekent dat ze kunnen worden
   ingesteld met behulp van een array van waarden. */
    protected $fillable = [
        'name',
        'email',
        'password',
        'admin',
    ];

    /**
     * De eigenschappen die verborgen moeten worden bij serialisatie.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * De eigenschappen die gecast moeten worden.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'admin' => 'boolean',
    ];

    /**

     * Hash the user's password before saving to the database.
     * Hash het wachtwoord van de gebruiker voor het opslaan in de database.

     *
     * @param array $attributes
     * @return void
     */
    public static function boot()
    {
        parent::boot();
    }


    /**
     * Definieer een veel-op-veel relatie met het Score model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */

     /**
      * De functie definieert relaties tussen het huidige model en de Score en Follow-modellen in een
      * PHP-applicatie.
      * 
      * return De methode `scores()` retourneert een `hasMany`-relatie met het `Score`-model. Dit
      * betekent dat aan het 'Gebruiker'-model meerdere 'Score'-modellen zijn gekoppeld.
      */
     public function scores()
     {
         return $this->hasMany(Score::class);
     }

    public function follows() {
        return $this->hasMany(Follow::class);
    }
    
}
