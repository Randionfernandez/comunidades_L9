<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccessTokenTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @test
     * @return void
     */
    public function can_issue_access_tokens()
    {
        $user = User::factory()->create();

        $this->postJson(route('api/v1/login'),
            ['email' => $user->email,
                'password' => 'password',
                'device_name' => 'My Device'],
            []);
        $response->dump();

    }
}
