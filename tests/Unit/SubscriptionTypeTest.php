<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\SubscriptionType;

class SubscriptionTypeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testFactory()
    {
        $subscriptionType = factory(SubscriptionType::class)->make();

        $this->assertTrue(isset($subscriptionType->id));
        $this->assertTrue(isset($subscriptionType->type));
    }
}
