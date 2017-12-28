<?php

namespace App\Faker\Follower\Answers;

use App\Faker\Follower\Answers\Answer;
use Illuminate\Support\Collection as IlluminateCollection;

class Collection
{
    private $answers = [];

    public function getAnswers(): IlluminateCollection
    {
        return new IlluminateCollection($this->answers);
    }

    public function addAnswer(Answer $answer)
    {
        $this->answers[] = $answer;
    }
}
