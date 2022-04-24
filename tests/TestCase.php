<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    
    /**
     * Añadido para evitar insertar las cabecera 'accept' en cada método derivado 
     * de json(): getJson, postJson, etc.
     * 
     * Aprendible.com va más allá. Modifica los post y path para que añadan la
     * cabecera 'content-type', y todas estas modificaciones las agrupa en un trait
     * que usa en esta clase.
     * 
     * @param type $method
     * @param type $uri
     * @param array $data
     * @param array $headers
     * @return type
     */
    public function json($method, $uri, array $data = [], array $headers = [])
    {
        $headers['accept']= 'application/vnd.api+json';
        
        return  parent::json($method, $uri, $data, $headers);
    }

}
