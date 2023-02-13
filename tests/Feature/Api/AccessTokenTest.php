<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Database\Seeders\PaisSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\PersonalAccessToken;
use Tests\TestCase;

class AccessTokenTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed([
            //      DatabaseSeeder::class,
//            DivisaSeeder::class,
            PaisSeeder::class,
            //    UserSeeder::class,
        ]);
    }

    /**
     * A basic feature test example.
     *
     * @test
     * @return void
     */
    public function can_issue_access_tokens()
    {
        $user = User::factory()->create();

        $data = $this->validCredentials(
            [
                'email' => $user->email,
                'password' => 'secretos',
                'device_name' => 'MiToken'
            ]);
        $response = $this->postJson(route('api.v1.login'),
            $data,
            [
//                'Accept' => 'application/vnd.api+json',   // no es necesaria, añadida en TestCase
                'content-type' => 'application/vnd.api+json',
            ]
        );

        $token = $response->json('plain-text-token');

        $dbToken = PersonalAccessToken::findToken($token);

        $this->assertTrue($dbToken->tokenable->is($user));

        $response->assertOk();

    }


    /**
     * @test
     *
     * @return void
     */
    public function email_is_required()
    {
        $data = [
            'password' => 'secretos',
//            'device_name' => 'MiToken',
        ];

        $response = $this->postJson(
            route('api.v1.login'),
            $data,
            ['content-type' => 'application/vnd.api+json',]
        );

        $response->assertJsonStructure([
            "errors" => [
                ['title', 'detail', 'source' => ['pointer']]
            ]
        ]);
//dump($response);
//        $response->assertJsonFragment([
//            "source" => ['pointer' => 'data.attributes.email']
//        ]);

//        $response->assertJsonApiValidationErrors('email');
//        $response->assertJsonValidationErrorFor('data.attributes.email');
    }

    protected function validCredentials(array $data): array
    {
        return array_merge(
            [
                'email' => 'randion@cifpfbmoll.eu',
                'password' => 'secretos',
                'device_name' => 'MiToken',
            ], $data);
    }
}
