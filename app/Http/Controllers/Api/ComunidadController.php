<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ComunidadApiRequest;
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

    function __construct() {
        $this->middleware('auth:sanctum', [
            'only' => ['store', 'update','destroy'],
        ]);
    }

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
//        dd($request);
        try {
            $request->validate([
                'data.attributes.cif' => ['required'],
//                'data.attributes.fechalta' => ['required', 'date'],
                'data.attributes.denom' => ['required'],
                'data.attributes.partes' => ['required'],
                'data.attributes.direccion' => ['required'],
                'data.attributes.cp' => ['required'],
                'data.attributes.pais' => ['required'],
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
    function update(Request $request, Comunidad $comunidad): ComunidadResource {
//        $request->validate('data.attributes');
//            'data.attributes.cif' => ['required'],
//            'data.attributes.denom' => ['required'],
//        ]);
        $comunidad->update([
            'cif' => $request->input('data.attributes.cif'),
            'fechalta' => $request->input('data.attributes.fechalta'),
            'partes' => $request->input('data.attributes.partes'),
            'denom' => $request->input('data.attributes.denom'),
            'email' => $request->input('data.attributes.email'),
            'direccion' => $request->input('data.attributes.direccion'),
            'cp' => $request->input('data.attributes.cp'),
            'pais' => $request->input('data.attributes.pais'),
            'provincia' => $request->input('data.attributes.provincia'),
            'municipio' => $request->input('data.attributes.municipio'),
        ]);
            
//        $comunidad->update($request->input('data.attributes'));
        return ComunidadResource::make($comunidad);
    }

    function destroy(Comunidad $comunidad): Response {
        $comunidad->delete();

        return response()->NoContent();
    }

}
