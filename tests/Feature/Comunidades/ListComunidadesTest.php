<?php

namespace Tests\Feature\Cuentas;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Comunidad;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ListCuentasTest extends TestCase {

    //  use RefreshDatabase;
// cambios sugeridos desde aprendible desarrollo api lección 4 Instalación del proyecto con Blueprint


    public function setUp(): void {
        parent::setUp();
        //    $this->seed();
    }

    /** @test */
    public function can_fetch_single_cuenta() {
        $cmd = Comunidad::factory()->create();

        $response = $this->getJson('/api/v1/comunidades/' . $cmd->id);

        
        $response->assertJson([
            'data' => [
                'type' => 'comunidades',
                'id' => $cmd->id,
                'attributes' => [
                    'denom' => $cmd->denom,
                    'provincia' => $cmd->provincia,
                ],
                'links' => [
                    'self' => url('/api/v1/comunidades/' . $cmd->id)
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
