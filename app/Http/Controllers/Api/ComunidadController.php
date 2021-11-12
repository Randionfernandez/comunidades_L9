<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comunidad;
use App\Http\Resources\ComunidadResource;

class ComunidadController extends Controller {

    function index() {
        
    }

    function show(Comunidad $comunidad) {

//        return \App\Http\Resources\ComunidadResource::make($comunidad);
      return  response()->json([
             "data" => [
                "type" => "comunidades",
                "id" => (string) $comunidad->getRouteKey(),
                "attributes" => [
                    "denom" => $comunidad->denom,
                    "provincia" => $comunidad->provincia,
                ],
                "links" => [
                    "self" => url(route('api.v1.comunidades.show', $comunidad->getRouteKey()))
                ],
            ],
        ]);
    }

}
