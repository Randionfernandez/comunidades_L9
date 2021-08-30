<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use Illuminate\Http\Request;

class CuentaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // $user = auth()->user();

        $comunidad = session('cmd_seleccionada');
        return view('cuentas.index', ['cuentas' => $comunidad->cuentas,
            'comunidad' => $comunidad]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('cuentas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $cmd = session('cmd_seleccionada');

        if (request()->hasFile('doc')) {
            // guarda el documento en una subcarpeta cuyo nombre es el cif de la comunidad        
            $cmd->documentos()->create([
                'carpeta' => "Cuentas",
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                'name' => $request->file('doc')->getClientOriginalName(),
                'hash_name' => $request->file('doc')->store($cmd->cif),
            ]);
        }

        $cmd->cuentas()->create($request->all());
        $cmd->refresh();   // ver también push() en Eloquent: Relationships

        return view('cuentas.index', ['cuentas' => $cmd->cuentas, 'comunidad' => $cmd])->with('status', ['msj' => "La cuenta ha sido creada correctamente", 'alert' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function show(Cuenta $cuenta) {
        $this->edit($cuenta);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuenta $cuenta) {
        return view('cuentas.edit', ['cuenta' => $cuenta]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cuenta $cuenta) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuenta $cuenta) {
        //
    }

}
