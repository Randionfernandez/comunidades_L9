<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ComunidadCollection;
use App\Http\Resources\ComunidadResource;
use App\Models\Comunidad;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

/**
 * TODO
 * Añadir validaciones
 * Añadir autenticación
 * Añadir autorización
 */
class ComunidadController extends Controller
{

    function __construct()
    {
        $this->middleware('auth:sanctum', [
            'only' => ['update', 'destroy'],
        ]);
    }

    function index(): ComunidadCollection
    {
//        return Comunidad::all();

//        $comunidades = Comunidad::all();
//        return ComunidadResource::collection($comunidades);
//
// o bien usamos un Collection
        return ComunidadCollection::make(Comunidad::all());
    }

    function show(Comunidad $comunidad):ComunidadResource
    {
        if (!$comunidad) return json_encode(['errors' => __('No existe comunidad')]);

        return ComunidadResource::make($comunidad);
    }

    function store(Request $request): ComunidadResource
    {
            $request->validate([
                'data.attributes.cif' => ['required'],
                'data.attributes.fechalta' => ['required', 'date'],
                'data.attributes.denom' => ['required'],
                'data.attributes.partes' => ['required'],
                'data.attributes.direccion' => ['required'],
                'data.attributes.cp' => ['required'],
                'data.attributes.pais' => ['required'],
            ]);

        $comunidad = Comunidad::create($request->input('data.attributes'));

        return ComunidadResource::make($comunidad);
    }

    /**
     *
     * @param Comunidad $comunidad
     * @param Request $request
     * @return ComunidadResource
     */
    function update(Request $request, Comunidad $comunidad): ComunidadResource
    {
//        dump($request->data);

        $request->validate([
            'data.attributes.cif' => ['required', 'alpha_num', 'size:9',
                Rule::unique('comunidades', 'cif')->ignore($comunidad)],
//                Rule::unique('comunidades')->ignore($this->route('comunidades.update'))],
            'data.attributes.fechalta' => 'required|date',
//            'activa' => ['boolean'], // Estos dos checkbox ya no se manejan por el usuario.
//            'gratuita' => ['boolean'],
            'data.attributes.partes' => ['required', 'integer', 'min:2', 'max:1000'],
            'data.attributes.denom' => 'required|string|max:35',
            'data.attributes.email' => 'nullable|email',
            'data.attributes.direccion' => 'required|string',
            'data.attributes.municipio' => 'nullable',
            'data.attributes.localidad' => 'string|nullable',
            'data.attributes.provincia' => 'string|nullable',
            'data.attributes.cp' => 'required|string|size:5',
            'data.attributes.pais' => 'required|string|size:3',
            'data.attributes.logo' => 'nullable',
            'data.attributes.observaciones' => 'string||nullable',
            'data.attributes.presidente' => 'nullable|string|max:35',
            'data.attributes.secretario' => 'nullable|string|max:35',
            'data.attributes.administrador' => 'nullable|string|max:35',
        ]);
//        $comunidad::update($request->validated());
        $comunidad->update([  // Falta añadir el resto de campos. Estos son sufi para que el test creado funcione.
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

    function destroy(Comunidad $comunidad): Response
    {
        $comunidad->delete();

        return response()->NoContent();
    }

}
