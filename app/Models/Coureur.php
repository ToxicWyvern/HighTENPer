<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coureur extends Model
{
    /**
     * Geeft aan of het model tijdstempels moet hebben.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Definieer een relatie van veel naar één met het Team-model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    use HasFactory;
}
