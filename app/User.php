<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
    protected $table = 'users';

    protected $fillable = [
        'twitter_id',
        'remember'
    ];

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->id;
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->remember;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->remember = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember';
    }

    public function userCredential()
    {
        return $this->hasOne('App\UserCredential');
    }

    public function userDetail()
    {
        return $this->hasOne('App\UserDetail');
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
