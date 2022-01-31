<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListMovimientosTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->getJson(route('api.v1.movimientos.index'));

        $response->assertExactJson([
            'data' =>[
                'type' => 'movimientos',
                'id' => (string) $mo
            ]
        ]);
    }
}
