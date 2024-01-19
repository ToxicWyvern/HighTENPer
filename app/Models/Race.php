<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    /* De eigenschap `protected ` in het `Race`-model wordt gebruikt om te specificeren welke
    attributen massaal toewijsbaar mogen zijn. Met andere woorden, het bepaalt welke attributen
    kunnen worden ingesteld met behulp van de methoden `create` of `update` van het model. */
    protected $fillable = [
        'name',
        'location',
        'length',
    ];
}
