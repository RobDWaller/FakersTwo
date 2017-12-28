<?php

namespace Tests\Unit\Faker\Account;

use Tests\TestCase;
use App\Faker\Account\Score;
use App\Faker\Account\Account;
use App\Faker\Follower\Status\Collection;
use Tests\Helper\FakeStatus;

class ScoreTest extends TestCase
{
    public function testBuildScore()
    {
        $account = new Account(1, 123459823, 'robdwaller');

        $statusCollection = new Collection;

        $fakeStatus = new FakeStatus;

        $statuses = $fakeStatus->getStatuses(20);

        foreach ($statuses as $status) {
            $statusCollection->addStatus($status);
        }

        $score = new Score($account, $statusCollection);

        $this->assertInstanceOf(Score::class, $score);
    }

    public function testGetTotalCount()
    {
        $account = new Account(1, 123459823, 'robdwaller');

        $statusCollection = new Collection;

        $fakeStatus = new FakeStatus;

        $statuses = $fakeStatus->getStatuses(20);

        foreach ($statuses as $status) {
            $statusCollection->addStatus($status);
        }

        $score = new Score($account, $statusCollection);

        $this->assertTrue(is_int($score->getTotalCount()));
    }

    public function testGetFakeCount()
    {
        $account = new Account(1, 123459823, 'robdwaller');

        $statusCollection = new Collection;

        $fakeStatus = new FakeStatus;

        $statuses = $fakeStatus->getStatuses(20);

        foreach ($statuses as $status) {
            $statusCollection->addStatus($status);
        }

        $score = new Score($account, $statusCollection);

        $this->assertTrue(is_int($score->getFakeCount()));
    }

    public function testGetInactiveCount()
    {
        $account = new Account(1, 123459823, 'robdwaller');

        $statusCollection = new Collection;

        $fakeStatus = new FakeStatus;

        $statuses = $fakeStatus->getStatuses(20);

        foreach ($statuses as $status) {
            $statusCollection->addStatus($status);
        }

        $score = new Score($account, $statusCollection);

        $this->assertTrue(is_int($score->getInactiveCount()));
    }

    public function testGetGoodCount()
    {
        $account = new Account(1, 123459823, 'robdwaller');

        $statusCollection = new Collection;

        $fakeStatus = new FakeStatus;

        $statuses = $fakeStatus->getStatuses(20);

        foreach ($statuses as $status) {
            $statusCollection->addStatus($status);
        }

        $score = new Score($account, $statusCollection);

        $this->assertTrue(is_int($score->getGoodCount()));
    }

    public function testGetFakeScore()
    {
        $account = new Account(1, 123459823, 'robdwaller');

        $statusCollection = new Collection;

        $fakeStatus = new FakeStatus;

        $statuses = $fakeStatus->getStatuses(20);

        foreach ($statuses as $status) {
            $statusCollection->addStatus($status);
        }

        $score = new Score($account, $statusCollection);

        $this->assertTrue(is_int($score->getFakeScore()));
        $this->assertLessThanOrEqual(100, $score->getFakeScore());
    }

    public function testGetInactiveScore()
    {
        $account = new Account(1, 123459823, 'robdwaller');

        $statusCollection = new Collection;

        $fakeStatus = new FakeStatus;

        $statuses = $fakeStatus->getStatuses(20);

        foreach ($statuses as $status) {
            $statusCollection->addStatus($status);
        }

        $score = new Score($account, $statusCollection);

        $this->assertTrue(is_int($score->getInactiveScore()));
        $this->assertLessThanOrEqual(100, $score->getInactiveScore());
    }

    public function testGetGoodScore()
    {
        $account = new Account(1, 123459823, 'robdwaller');

        $statusCollection = new Collection;

        $fakeStatus = new FakeStatus;

        $statuses = $fakeStatus->getStatuses(20);

        foreach ($statuses as $status) {
            $statusCollection->addStatus($status);
        }

        $score = new Score($account, $statusCollection);

        $this->assertTrue(is_int($score->getGoodScore()));
        $this->assertLessThanOrEqual(100, $score->getGoodScore());
    }

    public function testScoresEqual100()
    {
        $account = new Account(1, 123459823, 'robdwaller');

        $statusCollection = new Collection;

        $fakeStatus = new FakeStatus;

        $statuses = $fakeStatus->getStatuses(20);

        foreach ($statuses as $status) {
            $statusCollection->addStatus($status);
        }

        $score = new Score($account, $statusCollection);

        $this->assertEquals(100, ($score->getFakeScore() + $score->getInactiveScore() + $score->getGoodScore()));
    }

    public function testGetAccountDetails()
    {
        $account = new Account(1, 123459823, 'robdwaller');

        $statusCollection = new Collection;

        $fakeStatus = new FakeStatus;

        $statuses = $fakeStatus->getStatuses(20);

        foreach ($statuses as $status) {
            $statusCollection->addStatus($status);
        }

        $score = new Score($account, $statusCollection);

        $this->assertInstanceOf(Account::class, $score->getAccountDetails());
    }
}
