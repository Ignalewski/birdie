<?php

namespace Tests\Feature;

use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CanUserPostTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test if a logged in user can post notes.
     *
     * @return void
     */
    public function testIfLoggedInUserCanPostNotes()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this->post('/post_note', ['title' => 'My note', 'contents' => 'This is my first note!']);

        $response->assertRedirect('/user/'.$user->id);
        $this->get('/user/'.$user->id)
            ->assertSee('My note')
            ->assertSee('This is my first note!');
        $this->assertEquals($user->notes()->count(), 1);
    }

    /**
     * Test if a logged out user can post notes.
     *
     * @return void
     */
    public function testIfLoggedOutUserCannotPostNotes()
    {
        $response = $this->post('/post_note', ['title' => 'My note', 'contents' => 'This is my first note!']);

        $response->assertRedirect('/login');
    }

    /**
     * Test if banned user cannot post notes.
     *
     * @return void
     */
    public function testIfBannedUserCannotPostNotes()
    {
        $user = factory(User::class)->create();
        $user->update(['banned_at' => Carbon::yesterday()]);
        $this->actingAs($user);

        $response = $this->post('/post_note', ['title' => 'My note', 'contents' => 'This is my first note!']);

        while ($response->isRedirect()) {
            $response = $this->get($response->headers->get('Location'));
        }

        $response
            ->assertSee('Your account has been banned.');
    }
}
