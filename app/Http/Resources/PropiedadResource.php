<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropiedadResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {
//        return parent::toArray($request);
        return [
            'data' => [
                'type' => 'propiedades',
                'id' => (string) $this->resource->getRouteKey(),
                'attributes' => [
                    'comunidad_id' => $this->resource->comunidad_id,
                    'denominacion' => $this->resource->denominacion,
                    'parte' => $this->resource->parte,
                    'coeficiente' => $this->resource->coeficiente,
                    'iban' => $this->resource->iban,
                    'bic' => $this->resource->bic,
                    'tipo' => $this->resource->tipo,
                    'valor_catastral' => $this->resource->valor_catastral,
                    'observaciones' => $this->resource->observaciones
                ],
                'links' => [
                    'self' => route('api.v1.propiedades.show', $this->resource->getRouteKey())
                ]
        ]];
    }

    function toResponse($request) {
        return parent::toResponse($request)->withHeaders([
                    'Location' => route('api.v1.propiedades.show', $this->resource->getRouteKey()),
                    'Content-Type' => "application/vnd.api+json"
        ]);
    }

}
