<?php

namespace Tests;

use Database\Seeders\PaisSeeder;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Str;
use Illuminate\Testing\TestResponse;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication,
        MakesJsonApiRequests;
    // Añadido por mí para que inserte las headers 'Accept' y 'Content-Type' cuando proceda, en las peticiones




}
