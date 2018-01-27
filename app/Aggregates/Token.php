<?php

namespace App\Aggregates;

use ReallySimpleJWT\TokenBuilder;
use ReallySimpleJWT\TokenValidator;
use Carbon\Carbon;
use App\Helper\Environment;
use App\User;

class Token
{
    use Environment;

    private $user;

    private $tokenBuilder;

    private $tokenValidator;

    public function __construct(User $user, TokenBuilder $tokenBuilder, TokenValidator $tokenValidator)
    {
        $this->user = $user;

        $this->tokenBuilder = $tokenBuilder;

        $this->tokenValidator = $tokenValidator;
    }

    public function checkPassword(string $password): bool
    {
        return $this->user->where('password', $password)->count() === 1;
    }

    public function getUserIdByPassword(string $password): int
    {
        return $this->user->where('password', $password)->first()->id;
    }

    public function getToken(int $userId): string
    {
        return $this->tokenBuilder->addPayload(['key' => 'id', 'value' => $userId])
            ->setSecret($this->env('TOKEN_SECRET'))
            ->setExpiration(Carbon::now()->addMinutes(2)->toDateTimeString())
            ->setIssuer('StatusPeople')
            ->build();
    }

    public function getUserIdFromToken(string $token): int
    {
        return $this->tokenValidator->splitToken($token)->getPayloadDecodeJson()->id;
    }
}
