<?php

namespace Tests\Unit\Faker\Follower\Answers;

use Tests\TestCase;
use App\Faker\Follower\Answers\Answer;
use App\Faker\Follower\Answers\Collection as AnswersCollection;
use Illuminate\Support\Collection;

class AnswerCollectionTest extends TestCase
{
    public function testBuildCollection()
    {
        $answers = new AnswersCollection;

        $answer = new Answer('fake', 5, 6);

        $answers->addAnswer($answer);

        $result = $answers->getAnswers();

        $this->assertInstanceOf(Collection::class, $result);
    }

    public function testCheckAnswerResults()
    {
        $answers = new AnswersCollection;

        $answer = new Answer('fake', 4, 5);

        $answers->addAnswer($answer);

        $result = $answers->getAnswers();

        $this->assertEquals(1, $result->count());

        $this->assertEquals('fake', $result->first()->getType());
        $this->assertEquals(4, $result->first()->getActualScore());
        $this->assertEquals(5, $result->first()->getPossibleScore());
    }
}
