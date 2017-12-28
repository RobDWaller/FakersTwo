<?php

namespace App\Faker\Account;

use App\Faker\Follower\Status\Collection;
use App\Faker\Account\Account;

class Score
{
    private $account;

    private $followerStatuses;

    public function __construct(Account $account, Collection $followerStatuses)
    {
        $this->account = $account;

        $this->followerStatuses = $followerStatuses->getStatuses();
    }

    public function getAccountDetails(): Account
    {
        return $this->account;
    }

    public function getTotalCount(): int
    {
        return $this->followerStatuses->count();
    }

    public function getFakeCount(): int
    {
        $fake = $this->followerStatuses->filter(function($follower){
            return $follower->getStatusString() === 'fake';
        });

        return $fake->count();
    }

    public function getInactiveCount(): int
    {
        $inactive = $this->followerStatuses->filter(function($follower){
            return $follower->getStatusString() === 'inactive';
        });

        return $inactive->count();
    }

    public function getGoodCount(): int
    {
        $good = $this->followerStatuses->filter(function($follower){
            return $follower->getStatusString() === 'good';
        });

        return $good->count();
    }

    public function getFakeScore(): int
    {
        return round(($this->getFakeCount() / $this->getTotalCount()) * 100, 0);
    }

    public function getInactiveScore(): int
    {
        return round(($this->getInactiveCount() / $this->getTotalCount()) * 100, 0);
    }

    public function getGoodScore(): int
    {
        return 100 - ($this->getFakeScore() + $this->getInactiveScore());
    }
}
