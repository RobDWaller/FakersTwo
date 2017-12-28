<?php

namespace App\Faker\Account;

class Account
{
    private $userId;

    private $twitterId;

    private $twitterHandle;

    public function __construct(int $userId, int $twitterId, string $twitterHandle)
    {
        $this->userId = $userId;

        $this->twitterId = $twitterId;

        $this->twitterHandle = $twitterHandle;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getTwitterId(): int
    {
        return $this->twitterId;
    }

    public function getTwitterHandle(): string
    {
        return $this->twitterHandle;
    }
}
