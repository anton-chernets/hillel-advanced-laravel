<?php


namespace Tests\Feature;


use App\Models\User;
use Tests\TestCase;

class AuthenticatesUserTest extends TestCase
{
    public function test_authenticates_user()
    {
        $user = User::factory()->create([
            'password' => 'password'
        ]);

        $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $this->assertAuthenticatedAs($user);
    }
}
