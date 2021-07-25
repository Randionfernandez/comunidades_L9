<?php
namespace App\Http\Controllers;

use App\Models\Comunidad;
use App\Models\User;
use App\Models\Comunidad_User;
use App\Http\Requests\ComunidadRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComunidadController extends Controller {

    private $msj = '';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $user = auth()->user();

        return view('comunidades.index', ['comunidades' => $user->comunidades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('comunidades.create', ['comunidad' => new Comunidad]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComunidadRequest $request) {

        $this->msj = 'La comunidad fué creada con éxito';

        $gratuita = true;

        if (auth()->user()->comunidades->count() >= env('APP_LIMIT_MAX_FREE_COMMUNITIES')) {
            $gratuita = false;
        }

        $request->merge([
            'activa' => true,
            'gratuita' => $gratuita
        ]);

        Comunidad::create($request->validated());

        $new_comunidad = Comunidad::orderBy('created_at', 'desc')->first();

        $user = auth()->user();

        Comunidad_User::create([
            'comunidad_id' => $new_comunidad->id,
            'user_id' => $user->id,
            'role_id' => '2',
            'created_at' => $new_comunidad->created_at,
            'updated_at' => $new_comunidad->updated_at
        ]);


        return redirect()->route('comunidades.index')->with('status', [$this->msj, 'alert-primary']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function show(Comunidad $comunidad) {
        return view('comunidades.show', [
            'comunidad' => $comunidad,
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
    public function update(Comunidad $comunidad, ComunidadRequest $request) {

        $this->msj = 'La comunidad fué actualizada con éxito';

        $comunidad->update();

        return redirect()->route('comunidades.show', $community)->with('status', [$this->msj, 'alert-primary']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comunidad $comunidad) {
//     No es necesario pasarla a false, no es lo mismo desactivar que borrar. Eliminar estos comentarios en versión final
//        $comunidad->activa = false;
//        $comunidad->update();

        $this->msj = 'La comunidad fué eliminada con éxito';

        $comunidad->delete();

        return redirect()->route('comunidades.index', $comunidad)->with('status', [$this->msj, 'alert-info']);
    }

    public function seleccionar(Comunidad $comunidad) {
        session(['cmd_seleccionada'=>$comunidad]);

        return view('dashboard',['denominacion'=> $comunidad->denom]);
    }

}
