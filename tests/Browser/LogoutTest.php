<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LogoutTest extends DuskTestCase
{
    public function testLogoutDirect()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/authenticate/logout')
                ->assertPathIs('/')
                ->assertSee('You have logged out.');
        });
    }

    public function testLoginLogout()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->click('#connect')
                ->type('#username_or_email', env('TWITTER_USERNAME'))
                ->type('#password', env('TWITTER_PASSWORD'))
                ->click('#allow')
                ->assertPathIs('/dashboard')
                ->assertSee('Logout')
                ->click('#logout')
                ->assertPathIs('/')
                ->assertSee('You have logged out.');
        });
    }
}
