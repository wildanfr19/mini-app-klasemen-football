<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $fillable = ['name', 'city'];

    public function homeScores()
    {
        return $this->hasMany(Score::class, 'home_club_id');
    }

    public function awayScores()
    {
        return $this->hasMany(Score::class, 'away_club_id');
    }
}
