<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as AuthFactory;
use ReallySimpleJWT\TokenValidator;
use App\Transformer\Token as TokenTransformer;
use App\Helper\Environment;
use App\Helper\Id;
use ReallySimpleJWT\Exception\TokenValidatorException;
use Illuminate\Support\Facades\Auth;

class AuthenticateApi
{
    use Environment, Id;

    private $tokenTransformer;

    private $tokenValidator;

    public function __construct(TokenTransformer $tokenTransformer, TokenValidator $tokenValidator)
    {
        $this->tokenTransformer = $tokenTransformer;

        $this->tokenValidator = $tokenValidator;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!$request->has('token')) {
            return response()->json($this->tokenTransformer->error(
                $this->getId(), 400, 'Please supply your token parameter for this request.'
            ), 400);
        }

        try {
            $this->tokenValidator->splitToken($request->input('token'))
                ->validateExpiration()
                ->validateSignature($this->env('TOKEN_SECRET'));
        }
        catch (TokenValidatorException $e) {
            return response()->json($this->tokenTransformer->error(
                $this->getId(), 401, 'This request cannot be authenticated.'
            ), 401);
        }

        return $next($request);
    }
}
