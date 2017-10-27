<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fake extends Model
{
    protected $table = 'fakes';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
