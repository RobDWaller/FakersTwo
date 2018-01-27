<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\AbstractApiController;
use Illuminate\Http\Request;
use App\Aggregates\Token;
use App\Transformer\Token as TokenTransformer;

class TokenController extends AbstractApiController
{
    private $token;

    private $tokenTransformer;

    public function __construct(Token $token, TokenTransformer $tokenTransformer)
    {
        $this->token = $token;

        $this->tokenTransformer = $tokenTransformer;
    }

    public function get(Request $request)
    {
        if (!$request->has('password')) {
            return $this->response(400, $this->tokenTransformer->error(
                $this->getId(), 400, 'Please supply your password parameter for this request.'
            ));
        }

        if (!$this->token->checkPassword($request->input('password'))) {
            return $this->response(401, $this->tokenTransformer->error(
                $this->getId(), 401, 'Password supplied is invalid, authentication failed.'
            ));
        }

        return $this->response(200, $this->tokenTransformer->passwordResponse(
            $this->token->getToken($this->token->getUserIdByPassword($request->input('password')))
        ));
    }

    public function update(Request $request)
    {
        return $this->tokenTransformer->tokenResponse(
            $this->token->getToken($this->token->getUserIdFromToken($request->input('token')))
        );
    }
}
