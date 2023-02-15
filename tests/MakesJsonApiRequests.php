<?php

namespace Tests;

use Illuminate\Testing\TestResponse;

trait MakesJsonApiRequests
{
    /**
     * Añadido para evitar insertar la cabecera 'accept' en cada método derivado
     * de json(): getJson, postJson, etc.
     *
     * Aprendible.com va más allá. Modifica los post y path para que añadan la
     * cabecera 'content-type', y todas estas modificaciones las agrupa en este trait
     * @param type $method
     * @param type $uri
     * @param array $data
     * @param array $headers
     * @return type
     */
    public function json($method, $uri, array $data = [], array $headers = []): TestResponse
    {
        $headers['accept'] = 'application/vnd.api+json';

        return parent::json($method, $uri, $data, $headers);
    }

    public function getJson($uri, array $data = [], array $headers = []): TestResponse
    {
        return $this->json('GET', $uri, $data, $headers);
    }

    public function postJson($uri, array $data = [], array $headers = []): TestResponse
    {
        $headers['Content-Type'] = 'application/vnd.api+json';

        return $this->json('POST', $uri, $data, $headers);
    }

    public function patchJson($uri, array $data = [], array $headers = []): TestResponse
    {
        $headers['Content-Type'] = 'application/vnd.api+json';

        return $this->json('patch', $uri, $data, $headers);
    }

    /**
     * Pendiente de comprobar
     *
     * @param $uri
     * @param array $data
     * @param array $headers
     * @return TestResponse
     */
    public function deleteJson($uri, array $data = [], array $headers = []): TestResponse
    {
        return $this->json('delete', $uri, $data, $headers);
    }
}

