<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComunidadResource extends JsonResource
{

    public $preserveKeys = true;
    public static $wrap = 'pico';

    public function toArray($request)
    {
//        return Comunidad::make($request);

        return [
            'type' => 'comunidades',
            'id' => (string)$this->resource->getRouteKey(),
            'attributes' => [
                'cif' => $this->resource->cif,
                'fechalta' => $this->resource->fechalta,
                'activa' => $this->resource->activa,
                'gratuita' => $this->resource->gratuita,
                'partes' => $this->resource->partes,
                'denom' => $this->resource->denom,
                'email' => $this->resource->email,
                'direccion' => $this->resource->direccion,
                'cp' => $this->resource->cp,
                'pais' => $this->resource->pais,
                'provincia' => $this->resource->provincia,
                'municipio' => $this->resource->municipio,
                'localidad' => $this->resource->localidad,
                'observaciones' => $this->resource->observaciones,
                'presidente' => $this->resource->administrador,
                'secretario' => $this->resource->secretario,
                'administrador' => $this->resource->administrador,
            ],
            'links' => [
                'self' => route('api.v1.comunidades.show', $this->resource->getRouteKey())
            ]
        ];
    }

    function toResponse($request)
    {
        return parent::toResponse($request)->withHeaders([
            'Location' => route('api.v1.comunidades.show', $this->resource),
//                    'Content-Type' => "application/vnd.api+json",   // esta cabecera la añade el middleware 'ValidationJsonApiHeaders'.
        ]);
    }

}
