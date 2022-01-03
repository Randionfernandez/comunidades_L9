<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComunidadResource extends JsonResource {

    public function toArray($request) {
//        return Comunidad::make($request);

        return [
            'type' => 'comunidades',
            'id' => (string) $this->resource->getRouteKey(),
            'attributes' => [
                'cif' => $this->resource->cif,
                'denom' => $this->resource->denom,
                'email' => $this->resource->email
            ],
            'links' => [
                'self' => route('api.v1.comunidades.show', $this->resource)
            ]
        ];
    }

}
