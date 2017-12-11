<?php

namespace App\Twitter\OAuth;

/**
 * Auth object used for authorizing via OAuth with Twitter
 */
class Auth
{
    private $key;

    private $secret;

    public function __construct(string $key, string $secret)
    {
        $this->key = $key;

        $this->secret = $secret;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function getSecret()
    {
        return $this->secret;
    }
}
