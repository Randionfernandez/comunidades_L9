<?php

namespace Tests\Feature\Propiedades;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Propiedad;
use Illuminate\Database\Seeder;

class DeletePropiedadTest extends TestCase {
//    use RefreshDatabase;

    /** @test */
    public function can_delete_propiedades() {
        $propiedad = Propiedad::factory()->create();

        $response = $this->deleteJson(route('api.v1.propiedades.destroy', $propiedad))
                ->assertNoContent();    // devuelve status 204 según especificación JSON::API
      
        $this->assertSoftDeleted($propiedad);
//          $response->dump();
    }

}
