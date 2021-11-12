<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComunidadResource extends JsonResource {


    public function show(Comunidad $comunidad): ComunidadResource {
        return Comunidad::make($comunidad);
    }

}
