<?php

namespace App;

class User
{
    protected $table = 'users';

    protected $fillable = [
        'twitter_id'
    ];

    public function userCredential()
    {
        return $this->hasOne('App\UserCredential');
    }

    public function userSubscription()
    {
        return $this->hasOne('App\UserSubscription');
    }

    public function subscription()
    {
        return $this->hasOne('App\Subscription');
    }

    public function scoreHistory()
    {
        return $this->hasMany('App\ScoreHistory');
    }

    public function score()
    {
        return $this->hasOne('App\Score');
    }

    public function payment()
    {
        return $this->hasMany('App\Payment');
    }

    public function fake()
    {
        return $this->hasMany('App\Fake');
    }
}
