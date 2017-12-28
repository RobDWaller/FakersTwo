<?php

namespace App\Faker;

use Illuminate\Support\Collection;
use App\Faker\Account\Score;
use App\Faker\Account\Account;
use App\Faker\Follower\Answers\Builder as AnswerBuilder;
use App\Faker\Follower\Status\Collection as StatusCollection;
use App\Faker\Follower\Status\Builder as StatusBuilder;
use App\Faker\Follower\Score as FollowerScore;
use App\Faker\Follower\Checks\Fake;
use App\Faker\Follower\Checks\Inactive;
use App\Faker\Follower\Checks\Good;

class Faker
{
    private $userId;

    private $twitterId;

    private $twitterHandle;

    private $users;

    public function __construct(int $userId, int $twitterId, string $twitterHandle, Collection $users)
    {
        $this->userId = $userId;

        $this->twitterId = $twitterId;

        $this->twitterHandle = $twitterHandle;

        $this->users = $users;
    }

    public function getFakerScore(): Score
    {
        $account = new Account($this->userId, $this->twitterId, $this->twitterHandle);

        $answerBuilder = new AnswerBuilder(new Fake, new Inactive, new Good);

        $statusCollection = new StatusCollection;

        foreach ($this->users as $user) {
            $answerCollection = $answerBuilder->run($user);

            $score = new FollowerScore($answerCollection);

            $status = new StatusBuilder($score);

            $statusCollection->addStatus($status->getStatus());
        }

        return new Score($account, $statusCollection);
    }
}
