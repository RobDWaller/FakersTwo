<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testHomePage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertTitle('Fakers App Home')
                ->assertInputValue('connect', 'Connect to Twitter');
        });
    }

    public function testTwitterOauthLoginPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->click('#connect')
                ->assertSee('Authorise StatusPeople Fake Followers');
        });
    }

    public function testTwitterFullAuthorisation()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->click('#connect')
                ->assertSee('Authorise StatusPeople Fake Followers')
                ->type('#username_or_email', env('TWITTER_USERNAME'))
                ->type('#password', env('TWITTER_PASSWORD'))
                ->click('#allow')
                ->assertTitle('Fakers App Dashboard')
                ->assertPathIs('/dashboard')
                ->assertSee('@' . env('TWITTER_USERNAME'));
        });
    }

    public function testTwitterCancelAuthorisation()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->click('#connect')
                ->click('#cancel')
                ->assertSee('Return to StatusPeople Fake Followers')
                ->click('.button.maintain-context')
                ->assertTitle('Fakers App Home')
                ->assertSee('Login failed or cancelled please connect to Twitter to login.');
        });
    }

    public function testNoTwitterOauthVerifier()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/authenticate/return')
                ->assertSee('Login failed or cancelled please connect to Twitter to login.');
        });
    }

    public function testBadTwitterOauthVerifier()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/authenticate/return?oauth_verifier=123213asdasd')
                ->assertSee('There was an error with the login process, please try again.');
        });
    }
}
