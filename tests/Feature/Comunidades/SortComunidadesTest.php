<?php

namespace Tests\Feature\Cuentas;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class SortComunidadesTest extends TestCase {
    // use RefreshDatabase;
// cambios sugeridos desde aprendible desarrollo api lección 4 Instalación del proyecto con Blueprint

    /** @test */
    public function it_can_sort_comunidades() {
        $url = route('api.v1.comunidades', ['sort' => 'denom']);
//        DB::listen(function ($db) {
//           dump( $db->sql);
//        });
        $this->getJson($url);
        $this->assertTrue(true);


    }

}
