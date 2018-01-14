<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class NoAuthTest extends DuskTestCase
{
    public function testDashboardNoAuth()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/dashboard')
                ->assertPathIs('/')
                ->assertSee('You cannot access this page, please login first.');
        });
    }
}
