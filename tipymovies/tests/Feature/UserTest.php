<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example(){
   /*
        $response = $this->post(route('login'), [
        'email' => 'santiag222o222@gmail.com',
        'password' => 'santiago22222'
    ]);*/

    $this->assertDatabaseHas('users', [
    'email' => 'bf@gmail.com'


]);

    $useremail = User::where('email', 'bf@gmail.com')->first();
    $username= User::where('name', 'berni')->first();
    $this->assertNotNull($useremail);
    $this->assertNotNull($username);
    //$response->assertRedirect(route('home'));
    //$this->assertAuthenticatedAs($user);

    // $response->assertStatus(200);
    //}
}
}
