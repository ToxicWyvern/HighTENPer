<?php

namespace App\Models;

<<<<<<< HEAD

=======
>>>>>>> 8fd7b8e7b7fc354e4afac39713d9c939bc43734e
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
<<<<<<< HEAD
//use Illuminate\Contracts\Auth\CanResetPassword
=======
>>>>>>> 8fd7b8e7b7fc354e4afac39713d9c939bc43734e

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * De eigenschappen die massaal toegewezen kunnen worden.
     *
     * @var array<int, string>
     */
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
<<<<<<< HEAD
     * Hash the user's password before saving to the database.
=======
     * Hash het wachtwoord van de gebruiker voor het opslaan in de database.
>>>>>>> 8fd7b8e7b7fc354e4afac39713d9c939bc43734e
     *
     * @param array $attributes
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->password = Hash::make($user->password);
        });
    }

<<<<<<< HEAD
=======
    /**
     * Definieer een één-op-veel relatie met het Score model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
>>>>>>> 8fd7b8e7b7fc354e4afac39713d9c939bc43734e
    public function scores()
    {
        return $this->hasMany(Score::class, 'user_id');
    }
}
