<?php

namespace Tests\Unit\Faker;

use Tests\TestCase;
use App\Faker\Faker;
use App\Faker\Account\Score;
use Tests\Helper\FakeUser;
use App\TwitterMapper\Mapper;

class FakerTest extends TestCase
{
    public function testGetFakerScore()
    {
        $fakeUser = new FakeUser;

        $mapper = new Mapper;

        $users = $mapper->buildUsers($fakeUser->getUsers(100, true));

        $faker = new Faker(1, 3456, 'robdwaller', $users);

        $this->assertInstanceOf(Score::class, $faker->getFakerScore());
    }

    public function testBigGetFakerScore()
    {
        $fakeUser = new FakeUser;

        $mapper = new Mapper;

        $users = $mapper->buildUsers($fakeUser->getUsers(2000, true));

        $faker = new Faker(1, 3456, 'robdwaller', $users);

        $this->assertInstanceOf(Score::class, $faker->getFakerScore());
    }

    public function testSmallgGetFakerScore()
    {
        $fakeUser = new FakeUser;

        $mapper = new Mapper;

        $users = $mapper->buildUsers($fakeUser->getUsers(10, true));

        $faker = new Faker(1, 3456, 'robdwaller', $users);

        $this->assertInstanceOf(Score::class, $faker->getFakerScore());
    }
}
