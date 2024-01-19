<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* De klasse Follow is een model dat een relatie tussen een gebruiker en een andere entiteit
vertegenwoordigt. */
class Follow extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}
