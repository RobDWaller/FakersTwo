<?php

namespace Tests\Unit\Faker\Follower\Status;

use Tests\TestCase;
use App\Faker\Follower\Status\Status;

class StatusTest extends TestCase
{
    public function testBuildStatus()
    {
        $status = new Status('good', 12.0, 13.3, 56.5);

        $this->assertInstanceOf(Status::class, $status);

        $this->assertEquals('good', $status->getStatusString());

        $this->assertEquals(12.0, $status->getFakeScore());
        $this->assertEquals(13.3, $status->getInactiveScore());
        $this->assertEquals(56.5, $status->getGoodScore());
    }
}
