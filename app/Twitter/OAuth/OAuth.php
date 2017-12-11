<?php

namespace App\Twitter;

use App\Twitter\OAuth\Connection;
/**
 * OAuth Authorisation class for signing user into Twitter
 */
class OAuth
{
    private $twitterConnection;

    public function __construct(Connection $twitterConnection)
    {
        $this->twitterConnection = $twitterConnection->makeConnection();
    }

    public function getOauthUrl()
    {

    }
}
