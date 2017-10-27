<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoreHistory extends Model
{
    protected $table = 'score_history';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
