<?php

namespace App\Http\Controllers;

use App\Models\Comunidad;
use App\Models\User;
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
        return auth()->user()->comunidades;

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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function show(Comunidad $comunidad) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Comunidad $comunidad) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comunidad $comunidad) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comunidad $comunidad) {
        //
    }

}
