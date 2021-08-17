<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComunidadRequest;
use App\Models\Comunidad;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;


class ComunidadController extends Controller {

    private $msj = '';

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return view('comunidades.index', ['comunidades' => auth()->user()->comunidades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
//  (pendiente) Controlar si el usuario tiene permiso para crear comunidades y no supera su límite
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
    public function store(ComunidadRequest $request) {
        $comunidad = Comunidad::create($request->all());

        if (request()->hasFile('doc')) {
            // guarda el fichero en una subcarpeta cuyo nombre es el cif de la comunidad        
            $comunidad->documentos()->create([
                'name' => $request->file('doc')->getClientOriginalName(),
                'hash_name' => $request->file('doc')->store(request()->cif),
            ]);
        }

        $comunidad->usuarios()->attach(auth()->user()->id);

        return redirect()->route('comunidades.index')->with('status', ['msj' => "La comunidad ha sido creada correctamente", 'alert' => 'alert-success']);
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
        Abort_unless(Gate::allows('crear-comunidad'), 403);
        
        if (Gate::allows('crear-comunidad')) {
            return view('comunidades.edit', ['comunidad' => $comunidad]);
        }
        Abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Comunidad  $comunidad
     * @return Response
     */
    public function update(Comunidad $comunidad, ComunidadRequest $request) {

        if (request()->hasFile('doc')) {
            // guarda el fichero en una subcarpeta cuyo nombre es el cif de la comunidad        
            $comunidad->documentos()->create([
                'name' => $request->file('doc')->getClientOriginalName(),
                'hash_name' => $request->file('doc')->store(request()->cif),
            ]);
        }

        $comunidad->update($request->validated());
        $this->msj = 'La comunidad fué actualizada con éxito';

        return redirect()->route('comunidades.index', $comunidad)->with('status', ['msj'=> $this->msj, 'alert'=> 'alert-info']);
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

        return redirect()->route('comunidades.index')->with('status', ['msj' => $this->msj,'alert' => 'alert-danger']);
    }

    public function seleccionar(Comunidad $comunidad, Request $request) {
        session(['cmd_seleccionada' => $comunidad]);

        return view('dashboard', compact('comunidad'));
    }

}
