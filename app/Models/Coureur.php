<?php
/* De klasse Coureur is een model in de naamruimte App\Models dat een hardloper vertegenwoordigt en een
relatie heeft met het teammodel. */
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
     * return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    /**
     * De functie "team" definieert een relatie tussen de huidige klasse en de klasse "Team" in PHP.
     * return De functie `team()` retourneert een relatie tussen het huidige model en het
     * `Team`-model. Het gebruikt de methode `belongsTo()` om een één-op-veel-relatie te definiëren,
     * waarmee wordt aangegeven dat het huidige model tot een team behoort.
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    use HasFactory;
}
