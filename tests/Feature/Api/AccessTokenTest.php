<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\PersonalAccessToken;
use Tests\TestCase;

//use GuzzleHttp\Psr7\Request;

class AccessTokenTest extends TestCase
{
    use RefreshDatabase;

//protected $request;
    public function setUp(): void
    {
        parent::setUp();
        $this->seed([
//                  DatabaseSeeder::class,
//            DivisaSeeder::class,
//               PaisSeeder::class,
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
//        $this->withoutJsonApiDocumentFormatting();

        $user = User::factory()->create();

        $data = [
            'data' => [
                'type' => 'personal_access_tokens',
                'attributes' => [
                    'email' => $user->email,
                    'password' => 'secretos',
                    'device_name' => 'MiToken'
                ]
            ]
        ];

        $response = $this->postJson(
            route('api.v1.login'),
            $data,
        );


        $token = $response->json('plainTextToken');

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
        $user = User::factory()->create();

//        $data = $this->validCredentials(
//            [
//                'email' => $user->email,
//                'password' => 'secretos',
//                'device_name' => 'MiToken'
//            ]);

        $data = [
            'data' => [
                'type' => 'personal_access_tokens',
                'attributes' => [
//                'email' => $user->email,
                    'password' => 'secretos',
                    'device_name' => 'MiToken'
                ]
            ]
        ];

        $response = $this->postJson(
            route('api.v1.login'),
            $data
        );

        $response->assertJsonApiValidationErrors('email');
    }

    /**
     * @test
     * @return void
     */
    public function email_must_be_valid()
    {
        $data = [
            'data' => [
                'type' => 'personal_access_tokens',
                'attributes' => [
                    'email' => 'falsoemail',
                    'password' => 'secretos',
                    'device_name' => 'MiToken',
                ]]

        ];

        $response = $this->postJson(
            route('api.v1.login'),
            $data
        );

        $response->assertJsonApiValidationErrors('email');
    }

    /**
     * @test
     * @return void
     */
    public function password_is_required()
    {
        $user = User::factory()->create();

        $data = [
            'data' => [
                'type' => 'personal_access_tokens',
                'attributes' => [
                    'email' => $user->email,
                    'device_name' => 'MiToken',
                ]]

        ];

        $response = $this->postJson(
            route('api.v1.login'),
            $data
        );

        $response->assertJsonApiValidationErrors('password');
    }

    /**
     * @test
     * @return void
     */
    public function password_must_be_valid()
    {
        $user = User::factory()->create();
        $attributes = $this->validCredentials(
            [
                'email' => $user->email,
                'password' => 'dd',
                'device_name' => 'MiToken'
            ]);
        $data = [
            'data' => [
                'type' => 'personal_access_tokens',
                'attributes' => $attributes
            ]

        ];

        $response = $this->postJson(
            route('api.v1.login'),
            $data,
        );

        $response->assertJsonApiValidationErrors('password');
    }

    public function device_name_is_required()
    {
    }

    public function user_must_be_registered()
    {
    }

    protected function validCredentials(mixed $attributes): array
    {
        return array_merge(
            [
                'email' => 'randion@cifpfbmoll.eu',
                'password' => 'secretos',
                'device_name' => 'MiToken',
            ], $attributes);
    }
}
