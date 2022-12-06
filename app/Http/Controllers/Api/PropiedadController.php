<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PropiedadResource;
use App\Models\Propiedad;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PropiedadController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
//        dd($request->all());
        $propiedad = Propiedad::create([
//                    'comunidad_id' => $request->input('data.attributes.comunidad_id'),
//            'user_id' => auth()->user(),
                    'comunidad_id' => 1,
                    'denominacion' => $request->input('data.attributes.denominacion'),
                    'parte' => $request->input('data.attributes.parte'),
                    'coeficiente' => $request->input('data.attributes.coeficiente'),
                        ]
        );
        return PropiedadResource::make($propiedad);
//        return response()->json($propiedad, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Propiedad $propiedad): Response {
        $propiedad->delete();
        return response()->NoContent();
    }

}
