<?php

namespace Tests\Browser;

use App\User;
use http\Exception;
use Illuminate\Support\Facades\Hash;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Throwable;

class RegisterTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A register test.
     *
     * @return void
     * @throws Exception
     * @throws Throwable
     */
    public function testRegister()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->type('name', 'dude')
                ->type('email', 'user@user.com')
                ->type('password', 'secret')
                ->type('password_confirmation', 'secret')
                ->click("button[type='submit']")
            ->screenshot('registered');
        });

        $user = User::query()->where('name', 'dude')
            ->where('email', 'user@user.com')
            ->first();

        $validCredentials = Hash::check('secret', $user->getAuthPassword());

        $this->assertTrue($validCredentials);
    }
}
