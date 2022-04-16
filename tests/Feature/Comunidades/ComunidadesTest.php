<?php
declare(strict_types=1);

namespace Tests\Feature\Comunidades;

use App\Models\Comunidad;
use Database\Seeders\PaisSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class ComunidadesTest extends TestCase {

// No ejecuta los seeders, ni las migraciones, (si estuviesen
// actualizadas)
    use RefreshDatabase;

//    protected $seed = true;  // Ejecuta los seeders
// cambios sugeridos desde aprendible desarrollo api lección 4 Instalación del proyecto con Blueprint
    public function setUp(): void {
        parent::setUp();
        $this->seed([
            PaisSeeder::class
        ]);
    }

    /**
     * @test
     */
    public function can_fetch_all_comunidades() {
        $this->withoutExceptionHandling();

        $comunidades = Comunidad::factory()->count(3)->create();

        $response = $this->getJson(route('api.v1.comunidades.index'));

        $response->assertStatus(200);

        $response->assertJson([
            'data' => [
                [
                    'type' => 'comunidades',
                    'id' => (string) $comunidades[0]->getRouteKey(),
                    'attributes' => [
                        'cif' => $comunidades[0]->cif,
                        'denom' => $comunidades[0]->denom,
                        'email' => $comunidades[0]->email,
                    ],
                    'links' => [
                        'self' => route('api.v1.comunidades.show', $comunidades[0]->getRouteKey())
                    ],
                ],
                [
                    'type' => 'comunidades',
                    'id' => (string) $comunidades[1]->getRouteKey(),
                    'attributes' => [
                        'cif' => $comunidades[1]->cif,
                        'denom' => $comunidades[1]->denom,
                        'email' => $comunidades[1]->email,
                    ],
                    'links' => [
                        'self' => route('api.v1.comunidades.show', $comunidades[1]->getRouteKey())
                    ],
                ],
                [
                    'type' => 'comunidades',
                    'id' => (string) $comunidades[2]->getRouteKey(),
                    'attributes' => [
                        'cif' => $comunidades[2]->cif,
                        'denom' => $comunidades[2]->denom,
                        'email' => $comunidades[2]->email,
                    ],
                    'links' => [
                        'self' => route('api.v1.comunidades.show', $comunidades[2]->getRouteKey())
                    ],
                ],
            ],
        ]);
    }

    /**
     * @test
     */
    public function can_fetch_single_comunidad() {
        $this->withoutExceptionHandling();

        $comunidad = Comunidad::factory()->create();

        $response = $this->getJson(route('api.v1.comunidades.show', $comunidad));

        $response->assertStatus(200);

        $response->assertHeader(
                'Content-Type', "application/vnd.api+json"
        );

        $response->assertJson([
            'data' => [
                'type' => 'comunidades',
                'id' => (string) $comunidad->getRouteKey(),
                'attributes' => [
                    'cif' => $comunidad->cif,
                    'denom' => $comunidad->denom,
                    'email' => $comunidad->email,
                    'direccion' => $comunidad->direccion,
                    'cp' => $comunidad->cp
                ],
                'links' => [
                    'self' => route('api.v1.comunidades.show', $comunidad->getRouteKey())
                ]
            ],
        ]);
    }

    /**
     * @test
     */
    public function can_create_comunidad() {
        $this->withoutExceptionHandling();

        $response = $this->postJson(route('api.v1.comunidades.store'), [
            'data' => [
                'type' => 'comunidades',
                'attributes' => [
                    'cif' => "12345678w",
                    'fechalta' => "2022-02-28",
                    'denom' => "Testeando comunidad",
                    'partes' => 10,
                    'email' => "123456@gmail.com",
                    'direccion' => "quinto pino",
                    'cp' => '07007'
                ],
            ]
                ], [
            'Content-Type' => 'application/vnd.api+json'
        ]);

        $response->assertCreated();

        $comunidad = Comunidad::first();
        $response->assertHeader(
                'Location', route('api.v1.comunidades.show', $comunidad),
        );
        $response->assertHeader(
                'Content-Type', "application/vnd.api+json"
        );

        $response->assertJson([
            'data' => [
                'type' => 'comunidades',
                'id' => (string) $comunidad->getRouteKey(),
                'attributes' => [
                    'cif' => "12345678w",
                    'denom' => "Testeando comunidad",
                    'fechalta' => $comunidad->fechalta,
                    'email' => "123456@gmail.com",
                    'partes' => 10,
                    'direccion' => "quinto pino",
                    'cp' => '07007'
                ],
            ]
        ]);
    }

    /**  En desarrollo, no pasa el test
     *  @test
     */
    public function can_update_comunidad() {
        $this->withoutExceptionHandling();

        $comunidad = Comunidad::factory()->create();

        $response = $this->patchJson(route('api.v1.comunidades.update', $comunidad), [
                    'data' => [
                        'type' => 'comunidades',
                        'attributes' => [
                            'cif' => "12345678w",
                            'fechalta' => "2022-02-28",
                            'partes' => 10,
                            'denom' => "Testeando comunidad",
                            'email' => "123456@gmail.com",
                            'direccion' => "quinto pino",
                            'cp' => '07007',
                            'pais' => "ESP",
                            'provincia' => '',
                            'municipio' => 'Palma de Mallorca',
                        ],
                    ]
                        ], [
                    'Content-Type' => 'application/vnd.api+json'
                ]);

        $response->assertOk();

        $response->assertHeader(
                'Location', route('api.v1.comunidades.show', $comunidad),
        );
        $response->assertHeader(
                'Content-Type', "application/vnd.api+json"
        );

        $response->assertJson([
            'data' => [
                'type' => 'comunidades',
                'id' => (string) $comunidad->getRouteKey(),
                'attributes' => [
                    'cif' => "12345678w",
                    'denom' => "Testeando comunidad",
//                    'fechalta' => $comunidad->fechalta,
                    'email' => "123456@gmail.com",
                    'partes' => 10,
                    'direccion' => "quinto pino",
                    'cp' => '07007'
                ],
            ]
        ]);
    }

    /**
     * @test
     */
    function can_delete_comunidad() {
        $comunidad = Comunidad::factory()->create();

        $this->deleteJson(route('api.v1.comunidades.destroy', $comunidad))
                ->assertNoContent();

        $this->assertSoftDeleted($comunidad);
    }

    /**
     * @test
     */
    function denom_is_required() {
//        $this->withoutExceptionhandling();

        $response = $this->postJson(route('api.v1.comunidades.store'), [
                    'data' => [
                        'type' => 'comunidades',
                        'attributes' => [
//                            'cif' => "12345678w",
                            'fechalta' => "2022-02-28",
                            'denom' => "Testeando comunidad",
                            'partes' => 10,
                            'email' => "123456@gmail.com",
                            'direccion' => "quinto pino",
                            'cp' => '07007'
                        ],
                    ]
                        ], [
                    'Content-Type' => 'application/vnd.api+json'
                ]);

        $response->assertJsonStructure([
            "errors" => [
                ['title', 'detail', 'source' => ['pointer']]
                
            ]
        ]);
//        $response->assertJsonValidationErrors('data.attributes.title');
    }

    /**
     * 
     */
    public function it_can_returns_a_json_api_error_object_when_a_comunidad_is_not_found() {
        $this->withoutExceptionHandling();

        $response = $this->getJson(route('api.v1.comunidades.show', '1234'));

//        $response->assertJsonApiError();
//        $response->dump()->assertJsonStructure([
//            'errors' => [
//                '*' => []
//            ]
//        ]);
    }

}
