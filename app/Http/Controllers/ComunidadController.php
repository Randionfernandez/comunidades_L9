<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ComunidadRequest;
use App\Models\Comunidad;
use App\Models\Comunidad_User;
//use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
//use Illuminate\Http\Response;
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
        $user=auth()->user()->comunidades;
        return view('comunidades.index', ['comunidades' => $user]);
//        return view('comunidades.index', ['comunidades' => auth()->user()->comunidades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        // comprobar si tiene licencia para crear comunidades de pago (pendiente)
        if (Gate::allows('create-comunidad'))
            return view('comunidades.create');

        Abort(403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ComunidadRequest $request) {
        $this->authorize('create-comunidad');

        $comunidad = Comunidad::create($request->all());

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

        $comunidad->usuarios()->attach(auth()->user()->id);

// asignamos el rol de 'Admin' en la tabla 'comunidad_user'
        $cu = Comunidad_User::where('comunidad_id', $comunidad->id)->first();
        $cu->role_name= 'Admin';
        $cu->save();
        $comunidad->refresh();
        auth()->user()->comunidades->refresh();

        return redirect()->route('comunidades.index')->with('status', [
                    'msj' => "La comunidad $comunidad->denom, fue creada correctamente",
                    'alert' => 'alert-success']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Comunidad  $comunidad
     * @return Response
     */
    public function edit(Comunidad $comunidad) {
        $this->authorize('edit-comunidad', $comunidad);

        return view('comunidades.edit', ['comunidad' => $comunidad]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Comunidad  $comunidad
     * @param  ComunidadRequest  $request
     * @return Response
     */
    public function update(Comunidad $comunidad, ComunidadRequest $request) {
        $this->authorize('edit-comunidad', $comunidad);

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
        $this->msj = 'La comunidad ' . $comunidad->denom . ', fue actualizada con éxito';

        return redirect()->route('comunidades.index', $comunidad)->with('status', ['msj' => $this->msj, 'alert' => 'alert-info']);
    }

    /**
     * Remove the specified resource from storage.
     * 
     *      Se hace un borrado lógico de la comunidad (SoftDelete) y un borrado físico de las
     * filas de comunidad_user que contienen enlaces con esta comunidad.
     *      También en model_has_role se borra físicamente los roles con los 'model_id' 
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
        if (!Gate::allows('delete-comunidad')) {
            Abort(403);
        }

        $cu = Comunidad_User::where('comunidad_id', $comunidad->id)->get();
        $aux = $cu->where('user_id', auth()->id())->first();
        if ($aux->hasRole('Admin')) {//  $aux ¿accede a la BD? comprobar
            $cu = Comunidad_User::where('comunidad_id', $comunidad->id)->get();

            $this->msj = "La comunidad -- " . $comunidad->denom . " --, fue eliminada con éxito";

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

    public function seleccionar(Comunidad $comunidad) {
//  falta tratamiento de errores al determinar el rol
        $role = DB::table('comunidad_user')
                        ->where('user_id', auth()->user()->id)
                        ->where('comunidad_id', $comunidad->id)->get();

        session([
            'cmd_seleccionada' => $comunidad,
            'role' => $role->first()->role_name
        ]);

        return view('dashboard', compact('comunidad'));
    }

}
