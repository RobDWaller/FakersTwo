<?php

namespace Tests\Unit\Faker\Account;

use Tests\TestCase;
use App\Faker\Account\Account;

class AccountTest extends TestCase
{
    public function testGetUserId()
    {
        $account = new Account(1, 234, 'robdwaller');

        $this->assertInstanceOf(Account::class, $account);

        $this->assertEquals(1, $account->getUserId());
    }

    public function testGetTwitterId()
    {
        $account = new Account(12, 345345, 'robdwaller');

        $this->assertEquals(345345, $account->getTwitterId());
    }

    public function testGetTwitterHandle()
    {
        $account = new Account(12, 345345, 'statuspeople');

        $this->assertEquals('statuspeople', $account->getTwitterHandle());
    }
}
