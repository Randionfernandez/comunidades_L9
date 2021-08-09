<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComunidadRequest;
use App\Models\Comunidad;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use function auth;
use function back;
use function redirect;
use function session;
use function view;

class ComunidadController extends Controller {

    private $msj = '';

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $user = auth()->user();

        return view('comunidades.index', ['comunidades' => $user->comunidades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
//
//        if (auth()->user()->comunidades->count() >= env('APP_MAX_FREE_COMMUNITIES', 2)) {
//
//            // comprobar si tiene licencia para crear comunidades de pago (pendiente)
//        } else {

        return view('comunidades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Comunidad $comunidad, ComunidadRequest $request) {
        $cmd = Comunidad::create($request->validated());
        $cmd->usuarios()->attach(auth()->user()->id);

        return redirect()->route('comunidades.index')->with('status', "La comunidad ha sido creada correctamente");
    }

    /**
     * Eliminado este método, solo considero 'edit'
     * 
     * 
     * Display the specified resource.
     *
     * @param  Comunidad  $comunidad
     * @return Response
     */
//    public function show(Comunidad $comunidad) {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Comunidad  $comunidad
     * @return Response
     */
    public function edit(Comunidad $comunidad) {
        return view('comunidades.edit', ['comunidad' => $comunidad]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Comunidad  $comunidad
     * @return Response
     */
    public function update(Comunidad $comunidad, ComunidadRequest $request) {

        $this->msj = 'La comunidad fué actualizada con éxito';

        $comunidad->update($request->validated());

        return redirect()->route('comunidades.index', $comunidad)->with('status', [$this->msj, 'alert-primary']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Comunidad  $comunidad
     * @return Response
     */
    public function destroy(Comunidad $comunidad) {

        $this->msj = 'La comunidad fué eliminada con éxito';

        $comunidad->delete();
        session()->forget('cmd_seleccionada');

        return redirect()->route('comunidades.index')->with('status', [$this->msj, 'alert-info']);
    }

    public function seleccionar(Comunidad $comunidad, Request $request) {
        session(['cmd_seleccionada' => $comunidad]);

        return view('dashboard', compact('comunidad'));
    }

}
