<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comunidad;

class ComunidadController extends Controller {

    function show(Comunidad $comunidad) {
            
        dd(response()->json($comunidad));
        return response()->json($comunidad);
    }

}
