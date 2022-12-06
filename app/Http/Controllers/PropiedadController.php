<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Propiedad;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PropiedadController extends Controller
{

    var mixed $cmd;
    /**
     *  Los métodos fallan si acceden a esta variable. No sé por qué
     *  $cmd debe tomar el valor de session en cada método
     */
    public function __construct()
    {
        //        $this->cmd= session('cmd_seleccionada');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $cmd = session('cmd_seleccionada');
        $cmd->refresh();
        $propiedades = $cmd->propiedades;

        return view('propiedades.index', ['propiedades' => $propiedades,
            'comunidad' => $cmd]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $cmd = session('cmd_seleccionada');

        $tipos_propiedad = DB::table('tipos_propiedad')->get();
        $users = $cmd->users()->get();
        return view('propiedades.create', compact('cmd', 'tipos_propiedad', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $cmd = session('cmd_seleccionada');

        $prop = new Propiedad($request->all());
        $prop->comunidad_id = $cmd->id;

        $prop->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Propiedad $propiedad
     * @return Response
     */
    public function show(Propiedad $propiedad): Response
    {
        return $this->edit($propiedad);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Propiedad $propiedad
     * @return Response
     */
    public function edit(Propiedad $propiedad)
    {
        $comunidad = session('cmd_seleccionada');

        $tipos_propiedad = DB::table('tipos_propiedad')->get();
        $users = $comunidad->users()->get();
        return view('propiedades.edit', compact('comunidad', 'tipos_propiedad', 'propiedad', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Propiedad $propiedad
     * @return Response
     */
    public function update(Request $request, Propiedad $propiedad): Response
    {
        $propiedad->update($request->all());

        return redirect()->route('propiedades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Propiedad $propiedad
     * @return Response
     */
    public function destroy(Propiedad $propiedad): Response
    {
        $propiedad->delete();

        $msj = "La propiedad: " . $propiedad->denominacion . " ha sido dada de baja";
        return redirect()->route('propiedades.index')->with('status', ['msj' => $msj, 'alert' => 'alert-danger']);
    }

}
