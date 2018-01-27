<?php

namespace Tests\Unit\Transformer;

use Tests\TestCase;
use App\Transformer\Token;

class TokenTest extends TestCase
{
    public function testSingle()
    {
        $token = new Token;

        $this->assertInstanceOf(Token::class, $token);

        $data = [
            'token' => '123Abc',
            'links' => ['self' => 'http://google.com']
        ];

        $response = $token->single($data);

        $this->assertEquals('token', $response['type']);
        $this->assertEquals('123Abc', $response['id']);
        $this->assertEquals('http://google.com', $response['links']['self']);
    }

    public function testPasswordResponse()
    {
        $token = new Token;

        $response = $token->passwordResponse('world');

        $this->assertEquals('token', $response['type']);
        $this->assertEquals('world', $response['id']);
        $this->assertStringEndsWith('/api/token', $response['links']['self']);
        $this->assertStringEndsWith('/api/token/update', $response['links']['related']);
    }

    public function testTokenResponse()
    {
        $token = new Token;

        $response = $token->tokenResponse('foo');

        $this->assertEquals('token', $response['type']);
        $this->assertEquals('foo', $response['id']);
        $this->assertStringEndsWith('/api/token/update', $response['links']['self']);
    }
}
