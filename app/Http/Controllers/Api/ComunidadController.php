<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ComunidadRequest;
use App\Http\Resources\ComunidadCollection;
use App\Http\Resources\ComunidadResource;
use App\Models\Comunidad;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * TODO
 * Añadir validaciones
 * Añadir autenticación
 * Añadir autorización
 */
class ComunidadController extends Controller {

    function index(): ComunidadCollection {
//        $comunidades = Comunidad::all();
//        return ComunidadResource::collection($comunidades);
//        
// o bien usamos un Collection
        return ComunidadCollection::make(Comunidad::all());
    }

    function show(Comunidad $comunidad): ComunidadResource {

        return ComunidadResource::make($comunidad);
    }

    function store(Request $request): ComunidadResource {
//    dd($request);
//        $this->withoutExceptionHanling();
        try {
            $request->validate([
                'data.attributes.cif' => ['required'],
                'data.attributes.denom' => ['required']
            ]);
        } catch (Exception $e) {
            $e->getMessage();
        }


        $comunidad = Comunidad::create($request->input('data.attributes'));
        return ComunidadResource::make($comunidad);
    }

    /**
     * Pendiente de completar.  No actualiza
     * 
     * @param Comunidad $comunidad
     * @param Request $request
     * @return ComunidadResource
     */
    function update(Comunidad $comunidad, Request $request): ComunidadResource {
        $request->validate([
            'data.attributes.cif' => ['required'],
            'data.attributes.denom' => ['required'],
        ]);
        $comunidad->update($request->input('data.attributes'));
        return ComunidadResource::make($comunidad);
    }

    function destroy(Comunidad $comunidad): Response {
        $comunidad->delete();

        return response()->NoContent();
    }

}
