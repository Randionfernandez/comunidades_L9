<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\{Comunidad, Cuenta, Documento};
use Illuminate\Http\Request;

//use Illuminate\Support\Facades\DB;

class CuentaController extends Controller
{

    public $cmd;

    public function __construct(Comunidad $comunidad)
    {
        $this->authorizeResource(Cuenta::class, 'cuenta');
//        $this->cmd = session('cmd_seleccionada');    //no funciona
        $this->comunidad = $comunidad;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\ResponseMovimiento
     */
    public function index()
    {
//        $user = auth()->user();

        $cmd = session('cmd_seleccionada');
        $cuentas = $cmd->cuentas()->get();

        return view('cuentas.index', ['cuentas' => $cuentas,
            'comunidad' => $cmd]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cuentas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(
            [
                'iban' => ['required', 'string', 'max:24'],
                'fecha_apertura' => ['required', 'date'],
                'siglas' => ['required', 'string', 'min:3', 'max:4'],
                'denominacion' => ['required', 'string', 'max:35'],
            ]);
        $cmd = session('cmd_seleccionada');

        if (request()->hasFile('doc')) {
            // guarda el documento en una subcarpeta cuyo nombre es el cif de la comunidad
            $cmd->documentos()->create([
                'carpeta' => "Cuentas",
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                'name' => $request->file('doc')->getClientOriginalName(),
                'hash_name' => $request->file('doc')->store($this->cmd->cif),
            ]);
        }

        $cmd->cuentas()->create($request->all());
        $cmd->refresh();   // ver también push() en Eloquent: Relationships

        return view('cuentas.index', [
            'cuentas' => $cmd->cuentas,
            'comunidad' => $cmd])->with('status',
            ['msj' => "La cuenta ha sido creada correctamente", 'alert' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Cuenta $cuenta
     * @return \Illuminate\Http\Response
     */
    public function show(Cuenta $cuenta)
    {
        //se debe comprobar la autorización y la vinculación a la cmd_seleccionada.
        $this->edit($cuenta);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Cuenta $cuenta
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuenta $cuenta)
    {
        return view('cuentas.edit', [
            'cuenta' => $cuenta,
            'comunidad' => $cuenta->comunidad]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Cuenta $cuenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cuenta $cuenta)
    {
        request()->validate(
            [
                'iban' => ['required', 'string', 'max:24'],
                'fecha_apertura' => ['required', 'date'],
                'siglas' => ['required', 'string', 'min:3', 'max:4'],
                'denominacion' => ['required', 'string', 'max:35'],
            ]);

        $cmd = session('cmd_seleccionada');
        if (request()->hasFile('doc')) {
            // guarda el fichero en una subcarpeta cuyo nombre es el {cif de la comunidad}/cuentas
            Documento::Insert([
                'comunidad_id' => $cmd->id,
                'model_id' => $cuenta->id,
                'model' => "Cuenta",
                'carpeta' => "cuentas",
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                'name' => $request->file('doc')->getClientOriginalName(),
                'hash_name' => $request->file('doc')->store($cmd->cif . "/cuentas"),
            ]);
        }

        $cuenta->update($request->all());
        $cmd->refresh();
        $msj = 'La cuenta ' . $cuenta->denominacion . ', fue actualizada con éxito';

        return redirect()->route('cuentas.index')->with('status', ['msj' => $msj, 'alert' => 'alert-info']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Cuenta $cuenta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuenta $cuenta)
    {
        // autorizar operación

        $cuenta->delete();

        $msj = "La cuenta con IBAN: " . $cuenta->iban . " ha sido dada de baja";
        return redirect()->route('cuentas.index')->with('status', ['msj' => $msj, 'alert' => 'alert-danger']);
    }

}
