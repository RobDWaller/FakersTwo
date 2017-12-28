<?php

namespace Tests\Unit\Twitter\OAuth;

use Tests\TestCase;
use App\Twitter\OAuth\Auth;

class AuthTest extends TestCase
{
    public function testBuildAuth()
    {
        $auth = new Auth('123', 'ABC');

        $this->assertInstanceOf(Auth::class, $auth);
    }

    public function testGetKey()
    {
        $auth = new Auth('Car', 'Park');

        $this->assertEquals($auth->getKey(), 'Car');
    }

    public function testGetSecret()
    {
        $auth = new Auth('Car', 'Park');

        $this->assertEquals($auth->getSecret(), 'Park');
    }
}
