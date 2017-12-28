<?php

namespace App\Faker\Follower\Status;

use App\Faker\Follower\Status\Status;
use Illuminate\Support\Collection as IlluminateCollection;

class Collection
{
    private $statuses = [];

    public function getStatuses(): IlluminateCollection
    {
        return new IlluminateCollection($this->statuses);
    }

    public function addStatus(Status $status)
    {
        $this->statuses[] = $status;
    }
}
