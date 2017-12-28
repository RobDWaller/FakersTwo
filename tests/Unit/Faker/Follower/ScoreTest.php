<?php

namespace Tests\Unit\Faker\Follower;

use Tests\TestCase;
use Tests\Helper\FakeUser;
use App\TwitterMapper\Mapper;
use App\Faker\Follower\Score;
use App\Faker\Follower\Answers\Builder;
use App\Faker\Follower\Checks\Fake;
use App\Faker\Follower\Checks\Inactive;
use App\Faker\Follower\Checks\Good;

class ScoreTest extends TestCase
{
    public function testBuildScore()
    {
        $mapper = new Mapper;

        $fakeUser = new FakeUser;

        $user = $mapper->buildUser($fakeUser->getUser());

        $answerBuilder = new Builder(new Fake, new Inactive, new Good);

        $answers = $answerBuilder->run($user);

        $score = new Score($answers);

        $this->assertTrue(is_float($score->getFakeScore()));
        $this->assertTrue(is_float($score->getInactiveScore()));
        $this->assertTrue(is_float($score->getGoodScore()));
    }

    public function testCheckScore()
    {
        $mapper = new Mapper;

        $fakeUser = new FakeUser;

        $user = $mapper->buildUser($fakeUser->getUser());

        $answerBuilder = new Builder(new Fake, new Inactive, new Good);

        $answers = $answerBuilder->run($user);

        $score = new Score($answers);

        $this->assertLessThanOrEqual(100, $score->getFakeScore());
        $this->assertLessThanOrEqual(100, $score->getInactiveScore());
        $this->assertLessThanOrEqual(100, $score->getGoodScore());
    }
}
