<?php

namespace App\Http\Controllers;

use App\Models\Comunidad;
use App\Models\User;
use App\Http\Requests\SaveComunidadRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComunidadController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // Obtenemos la instancia del usuario autenticado
        //$user = auth()->user();
        //también podemos obtener solo el identificador
        //$user_id = auth()->id();
        // obtenemos todas las comunidades de las que es miembro el usuario autenticado
        //return auth()->user()->comunidades;
        return view('comunidades.index', [// llamamos al Modelo
            'comunidades' => Comunidad::orderBy('id', 'asc')->latest()->paginate(15)
        ]);

//      $resultado = DB::select('select otroscampos, p.role from comunidades c, comunidad_usr p ....');
//      return $resultado;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view('comunidades.create', ['comunidad' => new Comunidad]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveComunidadRequest $request) {
        //
        Comunidad::create($request->validated());

        return redirect()->route('comunidades.index')->with('status', 'La comunidad fué creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function show(Comunidad $comunidad) {
        //
        return view('comunidades.show', [
            'comunidad' => $comunidad
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Comunidad $comunidad) {
        //
        return view('comunidades.edit', [
            'comunidad' => $comunidad
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function update(Comunidad $comunidad, SaveComunidadRequest $request) {
        //
        $comunidad->update();

        return redirect()->route('comunidades.show', $community)->with('status', 'La comunidad fué actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comunidad $comunidad) {
        //
        $comunidad->delete();
        return redirect()->route('comunidades.index', $comunidad)->with('status', 'La comunidad fué eliminada con éxito');
    }

}
