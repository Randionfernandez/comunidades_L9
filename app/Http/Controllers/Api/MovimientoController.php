<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movimiento;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use function ddd;

class MovimientoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $movimientos = DB::table('movimientos')->select('siglas', 'fecha', 'propiedad', 'concepto', 'importe', 'saldo')
                ->orderBy('cuenta_id', 'asc')
                ->orderBy('n_op', 'asc')
                ->orderBy('fecha', 'asc')
                ->get();  //->where('importe','>',1700)
        return $movimientos;
//        return MovimientoResource::collection($movimientos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        ddd($request);
        $role = Role::create([
                    'name' => $request->name,
                    'guard_name' => $request->guard_name
        ]);
        return "hola store";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $movimiento = DB::table('movimientos')->select('fecha', 'importe', 'concepto')->orderBy('n_op')->where('id', $id)->get();
        return $movimiento;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $movimiento = DB::table('movimientos')->select('fecha', 'importe', 'concepto')->where('id', $id)->get();
        Movimiento::destroy($id);
        return $movimiento;
    }

}
