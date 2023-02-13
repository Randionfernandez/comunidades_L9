<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\PaisSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\App;
use Laravel\Sanctum\PersonalAccessToken;
use Tests\TestCase;

/**
 *
 */
class AccessTokenTest extends TestCase
{

    use RefreshDatabase;

// cambios sugeridos desde aprendible.com 'desarrollo api' Lección 4.- Instalación del proyecto con Blueprint
    public function setUp(): void
    {
        parent::setUp();
        $this->seed([
            PaisSeeder::class,
        ]);
    }

    /**
     * @test
     */

    public function can_issue_access_token()
    {
        $user = User::factory()->create();

        $data = $this->validCredentials([
            'email' => $user->email,
        ]);

        $response = $this->postJson(route('api.v1.login'), $data);

        $token = $response->json('plain-text-token');
        $dbToken = PersonalAccessToken::findToken($token);

        //verify the token
        $this->assertTrue($dbToken->tokenable->is($user));
    }

    /**
     * @test
     */
    public function password_must_be_valid()
    {
        $user = User::factory()->create();

        $data = $this->validCredentials([
            'email' => $user->email,
            'password' => 'incorrect'
        ]);

        $response = $this->postJson(route('api.v1.login'), $data, ['Content-Type' => 'application/vnd.api+json']);
        $response->assertStatus(200);
        $response->assertJsonValidationErrorFor('password');  // En el original la clave era email en vez de password
    }

    /**
     * @test
     */
    public function user_must_be_registered()
    {

        $data = $this->validCredentials();

        $response = $this->postJson(route('api.v1.login'), $data, ['Content-Type' => 'application/vnd.api+json']);
//        $response->dump();
        $response->assertJsonValidationErrorFor('email');
    }

    /**
     * @test
     */
    public function email_is_required()
    {
        App::setLocale('en');
        $data = $this->validCredentials([
            'email' => null,
        ]);

        $response = $this->postJson(
            route('api.v1.login'),
            $data,
            ['Content-Type' => 'application/vnd.api+json']);
        $response->assertJsonValidationErrors('email');
        dump($response);
    }

    /**
     * @test
     */
    public function email_must_be_valid()
    {
        App::setLocale('en');
        $data = $this->validCredentials([
            'email' => 'invalid-email',
        ]);

        $response = $this->postJson(route('api.v1.login'), $data, ['Content-Type' => 'application/vnd.api+json']);

        $response->assertJsonValidationErrors(['email' => 'email']);
    }

    /**
     * @test
     */
    public function password_is_required()
    {
        App::setLocale('en');
        $data = $this->validCredentials([
            'password' => null,
        ]);

        $response = $this->postJson(route('api.v1.login'), $data, ['Content-Type' => 'application/vnd.api+json']);

        $response->assertJsonValidationErrors(['password' => 'required']);
    }

    /**
     * @test
     */
    public function device_name_is_required()
    {
        App::setLocale('en');
        $data = $this->validCredentials([
            'device_name' => null,
        ]);

        $response = $this->postJson(route('api.v1.login'), $data, ['Content-Type' => 'application/vnd.api+json']);

        $response->assertJsonValidationErrors(['device_name' => 'required']);
    }

    /**
     * Credencial válida según seeder UserSeeder
     *
     * @param mixed $overrides
     * @return array
     */
    protected function validCredentials(mixed $overrides = []): array
    {
        return array_merge([
            'email' => 'randion@cifpfbmoll.eu',
            'password' => 'secretos', // password generada por nuestro factory
            'device_name' => 'Torcuato',
        ], $overrides);
    }

}
