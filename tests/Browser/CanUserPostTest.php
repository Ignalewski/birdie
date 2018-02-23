<?php

namespace Tests\Browser;

use App\Tweet;
use App\User;
use http\Exception;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Throwable;

class CanUserPostTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     * @throws Exception
     * @throws Throwable
     */
    public function testCanUserPost()
    {
        $user = factory(User::class)->create();
        $tweet = Tweet::create(['content' => 'This is my first tweet', 'user_id' => $user->id]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/' . $user->username)
                    ->assertSee('Laravel');
        });
    }
}
