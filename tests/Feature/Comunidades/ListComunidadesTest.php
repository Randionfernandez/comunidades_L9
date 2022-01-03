<?php

namespace Tests\Feature\Comunidades;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Comunidad;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ListComunidadesTest extends TestCase {
//  use RefreshDatabase;
// cambios sugeridos desde aprendible desarrollo api lección 4 Instalación del proyecto con Blueprint
//    public function setUp(): void {
//        parent::setUp();
//        //    $this->seed();
//    }

    /** @test */
    public function can_fetch_single_comunidad() {
        $this->withoutExceptionHandling();

//        $response->assertExactJson([
//            'data' => [
//                'type' => 'articles',
//                'id' => (string) $article->getRouteKey(),
//                'attributes' => [
//                    'title' => $article->title,
//                    'slug' => $article->slug,
//                    'content' => $article->content
//                ],
//                'links' => [
//                    'self' => route('api.v1.articles.show', $article)
//                ]
//            ]
//        ]);

        $comunidad = Comunidad::factory()->create();

        $response = $this->getJson(route('api.v1.comunidades.show', $comunidad));

        $response->assertJson([
            'data' => [
                'type' => 'comunidades',
                'id' =>  $comunidad->getRouteKey(),
                'attributes' => [
                    'denom' => $comunidad->denom,
                    'provincia' => $comunidad->provincia,
                ],
                'links' => [
                    'self' => route('/api/v1/comunidades/', $comunidad->getRouteKey())
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
