<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */
define('LARAVEL_START', microtime(true));

/*
  |--------------------------------------------------------------------------
  | Check If Application Is Under Maintenance
  |--------------------------------------------------------------------------
  |
  | If the application is maintenance / demo mode via the "down" command we
  | will require this file so that any prerendered template can be shown
  | instead of starting the framework, which could cause an exception.
  |
 */

if (file_exists(__DIR__ . '/../storage/framework/maintenance.php')) {
    require __DIR__ . '/../storage/framework/maintenance.php';
}

/* Register The Auto Loader
  |--------------------------------------------------------------------------
  |
  | Composer provides a convenient¿Cómo retornar una función en , automatically generated class loader for
  | our application. We just need to utilize it! We'll simply require it
  | into the script here so that we don't have to worry about manual
  | loading any of our classes later on. It feels great to relax.
  |
 */
require __DIR__ . '/../vendor/autoload.php';

/*
  |--------------------------------------------------------------------------
  | Turn On The Lights
  |--------------------------------------------------------------------------
  |
  | We need to illuminate PHP development, so let us turn on the lights.
  | This bootstraps the framework and gets it ready for use, then it
  | will load up this application so that we can run it and send
  | the responses back to the browser and delight our users.
  |
 */

$app = require_once __DIR__ . '/../bootstrap/app.php';

/*
  |--------------------------------------------------------------------------
  | Run The Application
  |--------------------------------------------------------------------------
  | Once we have the application, we can handle the incoming request using
  | the application's HTTP kernel. Then, we will send the response back
  | to this client's browser, allowing them to enjoy our application.
  |
 */
$kernel = $app->make(Kernel::class);

$response = tap($kernel->handle(
                $request = Request::capture()
        ))->send();

$kernel->terminate($request, $response);

