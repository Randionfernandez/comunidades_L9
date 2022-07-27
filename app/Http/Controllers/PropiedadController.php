<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Comunidad;
use App\Models\Propiedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropiedadController extends Controller {

    var $cmd;

// los métodos fallan si acceden a esta variable. No sé por qué
// $cmd debe tomar el valor de session en cada método
    public function __construct() {
        $this->cmd = session('cmd_seleccionada');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $cmd = session('cmd_seleccionada');
        $cmd->refresh();
        return view('propiedades.index', ['propiedades' => $cmd->propiedades,
            'comunidad' => $cmd]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $cmd = session('cmd_seleccionada');
        $tipos_propiedad = DB::table('tipos_propiedad')->get();
        $users = $cmd->usuarios()->get();
        return view('propiedades.create', compact('cmd', 'tipos_propiedad', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $cmd = session('cmd_seleccionada');

        $prop = new Propiedad($request->all());
        $prop->comunidad_id = $cmd->id;

        $prop->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function show(Propiedad $propiedad) {
        $this->edit($propiedad);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function edit(Propiedad $propiedad) {
        // Incompleto, duda de miquel
        $comunidad = session('cmd_seleccionada');
        $tipos_propiedad = DB::table('tipos_propiedad')->get();
        $users = $comunidad->usuarios()->get();
        return view('propiedades.edit', compact('comunidad', 'tipos_propiedad', 'propiedad', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Propiedad $propiedad) {
        $propiedad->update($request->all());

        return redirect()->route('propiedades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propiedad $propiedad) {
        $propiedad->delete();

        $msj = "La propiedad: " . $propiedad->denominacion . " ha sido dada de baja";
        return redirect()->route('propiedades.index')->with('status', ['msj' => $msj, 'alert' => 'alert-danger']);
    }

}
