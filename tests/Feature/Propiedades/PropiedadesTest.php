<?php
declare(strict_types=1);

namespace Tests\Feature\Propiedades;

use App\Models\Comunidad;
use App\Models\Propiedad;
use Database\Seeders\PaisSeeder;
use Database\Seeders\TiposPropiedadSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Test Incompleto, con fallos
 * group excluidos
 */
class PropiedadesTest extends TestCase {

    use RefreshDatabase;

    public function setUp(): void {
        parent::setUp();
        $this->seed([
            PaisSeeder::class,
            TiposPropiedadSeeder::class
        ]);
    }

    /** @test */
    public function can_create_propiedad() {
        $this->withoutExceptionHandling();

        $comunidad = Comunidad::Factory()->create();

        $response = $this->postJson(route('api.v1.propiedades.store'), [
            'data' => [
                'type' => 'propiedades',
                'attributes' => [
                    'comunidad_id' => (string) $comunidad->id,
                    'denominacion' => 'Local A',
                    'parte' => 100,
                    'tipo' => 'LOC',
                    'coeficiente' => 4.51,
                    'iban' => null,
                    'bic' => null,
                    'valor_catastral' => null,
                    'observaciones' => null
                ]
            ]], [
            'Accept' => 'application/vnd.api+json',  // revisar si es requerida esta cabecera
            'Content-Type' => 'application/vnd.api+json'
        ]);
        $propiedad= Propiedad::first();

        $response->assertStatus(201);   // Podríamos usar assertCreated() que comprueba 201
        $response->assertHeader(
                'Location', route('api.v1.propiedades.show', $propiedad)
        );
        $response->assertJson([
            'data' => [
                'type' => 'propiedades',
//                'id' => (string) 26,
                'attributes' => [
                    'comunidad_id' => (string) $comunidad->id,
                    'denominacion' => 'Local A',
                    'parte' => 100,
                    'tipo' => 'LOC',
                    'coeficiente' => 4.51,
                    'iban' => null,
                    'bic' => null,
                    'valor_catastral' => null,
                    'observaciones' => null
                ],
                'links' => [
                    'self' => route('api.v1.propiedades.show', $propiedad)
                ]
        ]]);
    }

    /** @test */
    public function can_delete_propiedades() {
        $propiedad = Propiedad::factory()->create();

        $response = $this->deleteJson(route('api.v1.propiedades.destroy', $propiedad))
                ->assertNoContent();    // devuelve status 204 según especificación JSON::API

        $this->assertSoftDeleted($propiedad);
    }

}
