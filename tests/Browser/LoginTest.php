<?php

namespace Tests\Browser;

use App\User;
use http\Exception;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Throwable;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A login test.
     *
     * @return void
     * @throws Exception
     * @throws Throwable
     */
    public function testLogin()
    {
        $user = factory(User::class)->create(['email' => 'user@user.com', 'password' => bcrypt('secret')]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', 'user@user.com')
                    ->type('password', 'secret')
                    ->click("button[type='submit']")
                    ->screenshot('logged_in')
                    ->assertAuthenticatedAs($user);
        });
    }
}
