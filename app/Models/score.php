<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    /**
     * De eigenschappen die massaal toegewezen kunnen worden.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'race_id',
        'tire_id',
        'team_id',
        'scoreImage',
        'driver',
        'best',
        'verified',
    ];

    /**
     * Geeft aan of het model tijdstempels moet hebben.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Definieer een relatie van veel naar één met het User-model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'scores_users');
    }

    /**
     * Definieer een relatie van veel naar één met het Race-model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function race()
    {
        return $this->belongsTo(Race::class);
    }

    /**
     * Definieer een relatie van veel naar één met het Team-model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * Definieer een relatie van veel naar één met het Tire-model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tire()
    {
        return $this->belongsTo(Tire::class);
    }

    use HasFactory;
}
