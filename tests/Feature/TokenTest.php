<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\User;
use App\Aggregates\Token;
use ReallySimpleJWT\TokenValidator;
use ReallySimpleJWT\TokenBuilder;

class TokenTest extends TestCase
{
    public function testGetToken()
    {
        $user = User::find(1);

        $response = $this->json('post', '/api/token', ['password' => $user->password]);

        $response->assertStatus(200)
            ->assertJson(['type' => 'token'])
            ->assertJsonStructure(['type', 'id', 'links' => ['self', 'related']]);
    }

    public function testUpdateToken()
    {
        $token = new Token(new User, new TokenBuilder, new TokenValidator);

        $token = $token->getToken(1);

        $response = $this->json('patch', '/api/token/update', ['token' => $token]);

        $response->assertStatus(200)
            ->assertJson(['type' => 'token'])
            ->assertJsonStructure(['type', 'id', 'links' => ['self']]);
    }

    public function testWrongPassword()
    {
        $response = $this->json('post', '/api/token', ['password' => '123']);

        $response->assertStatus(401)
            ->assertJsonStructure(['errors' => [0 => ['id', 'code', 'title']]]);
    }

    public function testNoPassword()
    {
        $response = $this->json('post', '/api/token');

        $response->assertStatus(400)
            ->assertJsonStructure(['errors' => [0 => ['id', 'code', 'title']]]);
    }

    public function testWrongToken()
    {
        $response = $this->json('patch', '/api/token/update', ['token' => '123']);

        $response->assertStatus(401)
            ->assertJsonStructure(['errors' => [0 => ['id', 'code', 'title']]]);
    }

    public function testNoToken()
    {
        $response = $this->json('patch', '/api/token/update');

        $response->assertStatus(400)
            ->assertJsonStructure(['errors' => [0 => ['id', 'code', 'title']]]);
    }
}
