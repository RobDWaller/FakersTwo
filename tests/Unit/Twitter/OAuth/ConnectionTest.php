<?php

namespace Tests\Unit\Twitter\OAuth;

use Tests\TestCase;
use App\Twitter\OAuth\Connection;
use App\Twitter\OAuth\Auth;
use Abraham\TwitterOAuth\TwitterOAuth;

class ConnectionTest extends TestCase
{
    public function testBuildConnection()
    {
        $auth = new Auth('456', 'BNH');

        $connection = new Connection($auth);

        $this->assertInstanceOf(Connection::class, $connection);
    }

    public function testMakeConnection()
    {
        $auth = new Auth('456', 'BNH');

        $connection = new Connection($auth);

        $this->assertInstanceOf(TwitterOauth::class, $connection->makeConnection());
    }
}
