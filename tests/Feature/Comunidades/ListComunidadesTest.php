<?php

namespace Tests\Feature\Comunidades;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Comunidad;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ListComunidadesTest extends TestCase {
//  use RefreshDatabase; // No ejecuta las migraciones

// // cambios sugeridos desde aprendible desarrollo api lección 4 Instalación del proyecto con Blueprint
//    public function setUp(): void {
//        parent::setUp();
//        //    $this->seed();
//    }

    /** @test */
    public function can_fetch_single_comunidad() {
        $this->withoutExceptionHandling();

        $comunidad = Comunidad::factory()->create();

        $response = $this->getJson(route('api.v1.comunidades.show', $comunidad));

        $response->assertExactJson([
            'data' => [
                'type' => 'comunidades',
                'id' => (string) $comunidad->getRouteKey(),
                'attributes' => [
                    'cif' => $comunidad->cif,
                    'denom' => $comunidad->denom,
                    'email' => $comunidad->email,
                ],
                'links' => [
                    'self' => route('api.v1.comunidades.show', $comunidad)
                ],
            ],
        ]);
    }

    ////////////////   test en desarrollo

    /** @test */
    public function can_fetch_all_comunidades() {
        $this->withoutExceptionHandling();

        $comunidades = Comunidad::factory()->count(3)->create();

        $response = $this->getJson(route('api.v1.comunidades.index'));
        $response->asserExacttJson([
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
                        'self' => route('api.v1.comunidades.index')
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
                        'self' => route('api.v1.comunidades.index')
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
                        'self' => route('api.v1.comunidades.index')
                    ],
                ],
            ],
        ]);
    }

    public function test_ejemplo_sencillo() {
        $response = $this->get('/comunidades');
//        $response->assertJson();

        $this->assertSame(1, 1);
    }

}
