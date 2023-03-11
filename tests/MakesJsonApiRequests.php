<?php

namespace Tests;

use Closure;
use Database\Seeders\PaisSeeder;
use Illuminate\Support\Str;
use Illuminate\Testing\TestResponse;

trait MakesJsonApiRequests
{

    // protected $seed = true;  // Ejecuta los seeders
    protected function setup(): void
    {
        parent::setUp();

        $this->seed([
            PaisSeeder::class,
        ]);

        TestResponse::macro(
            'assertJsonApiValidationErrors',
            $this->assertJsonApiValidationErrors()
        );
    }


    /**
     * Añadido para evitar insertar la cabecera 'accept' en cada método derivado
     * de json(): getJson, postJson, etc.
     *
     * No es necesario sobrescribir getJson ni deleteJson.
     *
     * Aprendible.com va más allá. Modifica los post y path para que añadan la
     * cabecera 'content-type', y todas estas modificaciones las agrupa en este trait
     * @param type $method
     * @param type $uri
     * @param array $data
     * @param array $headers
     * @return type
     */
    public function json($method, $uri, array $data = [], array $headers = []): TestResponse
    {
        $headers['accept'] = 'application/vnd.api+json';

        return parent::json($method, $uri, $data, $headers);
    }

    public function postJson($uri, array $data = [], array $headers = []): TestResponse
    {
        $headers['Content-Type'] = 'application/vnd.api+json';

        return $this->json('POST', $uri, $data, $headers);
    }

    public function patchJson($uri, array $data = [], array $headers = []): TestResponse
    {
        $headers['Content-Type'] = 'application/vnd.api+json';

        return $this->json('patch', $uri, $data, $headers);
    }


    protected function assertJsonApiValidationErrors(): Closure
    {
        return function ($attribute) {
            $pointer = Str::of($attribute)->startsWith('data')
                ? "/" . str_replace('.', '/', $attribute)
                : "/data/attributes/{$attribute}";

//            $this->assertJsonStructure([
//                    "errors" => [
//                        ['title', 'detail', 'source' => ['pointer']]
//                    ]
//                ]
//            );

            $this->assertStatus(422);

            $this->assertJsonFragment([
                'source' => ['pointer' => $pointer]
            ]);

            $this->assertHeader('Content-Type', 'application/vnd.api+json');

//                $this->>assertJsonValidationErrorFor('0'); // OK, pero el array parece no generarse adecuadamente

        };
    }
}

