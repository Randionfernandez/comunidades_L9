<?php

namespace Tests\Feature\Api;

use App\Http\Middleware\ValidateJsonApiDocument;
use App\Http\Middleware\ValidateJsonApiHeaders;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class ValidateJsonApiDocumentTest extends TestCase
{
    use RefreshDatabase;


    protected function setup(): void
    {
        parent::setup();
        Route::any('test_route', fn() => 'OK')
            ->middleware([
                ValidateJsonApiHeaders::class,
                ValidateJsonApiDocument::class,
            ]);

    }


    /**
     * @test
     * pendiente
     *
     */
    public function data_is_required()
    {
        $response = $this->postJson('test_route');

        $response->assertJsonApiValidationErrors('data');  //  El método es una macro definido en TestResponse

    }

    public function data_type_is_required()
    {
    }

    public function data_type_must_be_a_string()
    {
    }

    public function data_attributes_is_required()
    {
    }

    public function data_attributes_must_be_a_array()
    {
    }

    /**
     * @test
     * @return void
     */
    public function data_id_is_required()  // 'data.id' required solo en PATCH
    {
        $response = $this->patchJson('test_route', [
            'data' => [
                'type' => 'string',
                'attributes' => [
                    'name' => 'test',
                ]
            ]
        ],
            ['Content-type' => 'application/vnd.api+json']);

        $response->assertJsonApiValidationErrors('data.id');
    }

    public function data_id_must_be_a_string()
    {
    }

    public function only_accept_valid_json_api_document()
    {
    }
}


