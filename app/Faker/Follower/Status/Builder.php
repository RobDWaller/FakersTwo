<?php

namespace App\Faker\Follower\Status;

use App\Faker\Follower\Score;
use App\Faker\Follower\Status\Status;

class Builder
{
    private $score;

    public function __construct(Score $score)
    {
        $this->score = $score;
    }

    public function getStatus(): Status
    {
        return new Status(
            $this->getStatusString(),
            $this->score->getFakeScore(),
            $this->score->getInactiveScore(),
            $this->score->getGoodScore()
        );
    }

    private function getStatusString(): string
    {
        if ($this->score->getFakeScore() > 50) {
            return 'fake';
        }

        if ($this->score->getInactiveScore() > 50) {
            return 'inactive';
        }

        return 'good';
    }
}
