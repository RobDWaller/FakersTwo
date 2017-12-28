<?php

namespace Tests\Unit\Faker\Follower\Status;

use Tests\TestCase;
use App\Faker\Follower\Status\Status;
use App\Faker\Follower\Status\Collection;
use Illuminate\Support\Collection as IlluminateCollection;
use Tests\Helper\FakeStatus;

class CollectionTest extends TestCase
{
    public function testBuildStatusCollection()
    {
        $statusCollection = new Collection;

        $fakeStatus = new FakeStatus;

        $statuses = $fakeStatus->getStatuses(20);

        foreach ($statuses as $status) {
            $statusCollection->addStatus($status);
        }

        $this->assertInstanceOf(IlluminateCollection::class, $statusCollection->getStatuses());

        $this->assertInstanceOf(Status::class, $statusCollection->getStatuses()->first());
    }
}
