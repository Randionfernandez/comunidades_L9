<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use MakesJsonApiRequests;  // Añadido por mí para que inserte las headers 'Accept' y 'Content-Type' cuando proceda, en las peticiones



}
