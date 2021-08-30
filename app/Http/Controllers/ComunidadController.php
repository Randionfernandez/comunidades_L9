<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComunidadRequest;
use App\Models\Comunidad;
use App\Models\Comunidad_User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
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

        if (Gate::allows('crear-comunidad')) {
            return view('comunidades.create');
        }

        Abort(403);
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
            // guarda el fichero en una subcarpeta cuyo nombre es el cif de l
            // a comunidad        
            $comunidad->documentos()->create([
                'carpeta' => "Comunidad",
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                'name' => $request->file('doc')->getClientOriginalName(),
                'hash_name' => $request->file('doc')->store(request()->cif),
            ]);
        }

        $comunidad->usuarios()->attach(auth()->user()->id);

        // asignamos el rol de 'Admin' en la tabla 'comunidad_user'
        $cu = Comunidad_User::where('comunidad_id', $comunidad->id)->first();
        $cu->assignRole('Admin');

        return redirect()->route('comunidades.index')->with('status', ['msj' => "La comunidad $comunidad->denom, fué creada correctamente", 'alert' => 'alert-success']);
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
//        
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Comunidad  $comunidad
     * @return Response
     */
    public function edit(Comunidad $comunidad) {
        //  Abort_unless(Gate::allows('crear-comunidad'), 403);
        //  return view('comunidades.edit', ['comunidad' => $comunidad]);
// Otra forma de autorizar   
        if (Gate::allows('editar-comunidad', $comunidad)) {
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
                'carpeta' => "Comunidad",
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                'name' => $request->file('doc')->getClientOriginalName(),
                'hash_name' => $request->file('doc')->store(request()->cif),
            ]);
        }

        $comunidad->update($request->validated());
        $this->msj = 'La comunidad ' . $comunidad->denom . ', fué actualizada con éxito';

        return redirect()->route('comunidades.index', $comunidad)->with('status', ['msj' => $this->msj, 'alert' => 'alert-info']);
    }

    /**
     * Remove the specified resource from storage.
     * 
     *      Se hace un borrado lógico de la comunidad (SoftDelete) y un borrado físico de las
     * filas de comunidad_user que contienen enlaces con esta comunidad.
     *      También en model_has_role se borrar físicamente los roles con los 'model_id' 
     * borrados en comunidad_user.
     * Nota: 
     *      Como el borrado de 'comunidad' es lógico, los borrados en 'comunidad_user' no se propagan
     * en cascada, como consta en la migración.
     * ToDo:
     *      El procedimiento de borrado de una comunidad tiene fuertes implicaciones en la calidad del 
     * servicio, por tanto, en versiones más evolucionadas debería replantearse; de momento nos sirve esto.
     *
     * @param  Comunidad  $comunidad
     * @return Response
     */
    public function destroy(Comunidad $comunidad) {
        $cu = Comunidad_User::where('comunidad_id', $comunidad->id)->where('user_id', auth()->user()->id)->first();

        if ($cu->hasRole('Admin')) {//  pendiente optimizar para evitar una consulta a la BD
            $cu = Comunidad_User::where('comunidad_id', $comunidad->id)->get();

            $this->msj = "La comunidad -- " . $comunidad->denom . " --, fué eliminada con éxito";

            foreach ($cu as $cmd_usr) {
                $cmd_usr->roles()->detach();
            }
// Elimina los enlaces de usuarios que tienen acceso a la comunidad. No aplica SoftDeletes,
//  a pesar de constar en el modelo Comunidad_User; pendiente de solucionar para no perder esa información
            $comunidad->usuarios()->detach();
            $comunidad->delete();  // marca la comunidad como borrada: softDelete.

            session()->forget('cmd_seleccionada');
            return redirect()->route('comunidades.index')->with('status', ['msj' => $this->msj, 'alert' => 'alert-danger']);
        }

        Abort(403);
    }

    public function seleccionar(Comunidad $comunidad, Request $request) {
        session(['cmd_seleccionada' => $comunidad]);

        return view('dashboard', compact('comunidad'));
    }

}
