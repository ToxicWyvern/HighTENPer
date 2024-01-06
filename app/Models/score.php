<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class score extends Model
{
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

    public $timestamps = true;
    public function user() {
        return $this->belongsTo(user::class);
    }
    public function race() {
        return $this->belongsTo(race::class);
    }
    public function team() {
        return $this->belongsTo(team::class);
    }
    public function tire() {
        return $this->belongsTo(Tire::class);
    }
    use HasFactory;
}
