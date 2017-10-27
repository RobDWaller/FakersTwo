<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCredential extends Model
{
    protected $table = 'user_credentials';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
