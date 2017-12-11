<?php

namespace App\Faker;

use App\Twitter\Twitter;

class ScoreBuilder
{
    private $twitter;

    public function __construct(Twitter $twitter)
    {
        $this->twitter = $twitter;
    }

    public function getData()
    {
        var_dump($this->twitter->getFollowers());
    }

    public function calculateScore()
    {

    }

    public function storeScore()
    {

    }
}
