<?php

namespace App\Twitter;

use App\Twitter\OAuth\Factory;
use App\Twitter\OAuth\Auth;

class TwitterOAuth
{
    private $request;

    public function __construct(Auth $auth, Factory $factory)
    {
        $this->request = $factory->make($auth);
    }
}
