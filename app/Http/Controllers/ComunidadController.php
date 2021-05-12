<?php

namespace App\Http\Controllers;

use App\Models\Comunidad;
use App\Models\User;
use \App\Models\Comunidad_User;
use App\Models\TeamUser;
use App\Http\Requests\SaveComunidadRequest;
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
        // Obtenemos la instancia del usuario autenticado
        //$user = auth()->user();
        //también podemos obtener solo el identificador
        //$user_id = auth()->id();
        // obtenemos todas las comunidades de las que es miembro el usuario autenticado
        //return auth()->user()->comunidades;
        //dd(auth()->user()->currentTeam);
        
        return view('comunidades.index', [// llamamos al Modelo
            'user' => auth()->user()
                
        ]);

//      $resultado = DB::select('select otroscampos, p.role from comunidades c, comunidad_usr p ....');
//      return $resultado;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
        if ( !auth()->user()->hasTeamPermission(Team::find(auth()->user()->team), 'create')) {
            abort(401, 'You cannot see');
        }
        
        return view('comunidades.create', ['comunidad' => new Comunidad]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveComunidadRequest $request) {
        
        $this->msj = 'La comunidad fué creada con éxito';
        
        
        if (Comunidad::where('cif', '=', $request->input('cif'))->count() == 0) {
            
            Comunidad::create($request->validated());
            
            $new_comunidad = Comunidad::orderBy('created_at', 'desc')->first();
            
            $user = auth()->user();
                        
            if (Comunidad_User::where('comunidad_id', '=', $new_comunidad->id, 'and', 'user_id', '=', $user->id)->count() == 0) {
                Comunidad_User::create([
                    'comunidad_id' => $new_comunidad->id,
                    'user_id' => $user->id,
                    'role_id' => '2',
                    'created_at' => $new_comunidad->created_at,
                    'updated_at' => $new_comunidad->updated_at
                ]);        
            }

            if (TeamUser::where('team_id', '=', $user->currentTeam->id, 'and', 'user_id', '=', $user->id)->count() == 0) {
                TeamUser::create($request->validated(), [
                    'team_id' => $user->currentTeam->id,
                    'user_id' => $user->id,
                    'role' => '2',
                    'created_at' => $new_comunidad->created_at,
                    'updated_at' => $new_comunidad->updated_at
                ]);
            }
        } else {
            $msj = 'La comunidad no ha podido ser creada con éxito';
        }
        
        return redirect()->route('comunidades.index')->with('status', $this->msj);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function show(Comunidad $comunidad) {
        //
        return view('comunidades.show', [
            'comunidad' => $comunidad
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
    public function update(Comunidad $comunidad, SaveComunidadRequest $request) {
        
        $this->msj = 'La comunidad fué actualizada con éxito';
        
        $comunidad->update();

        return redirect()->route('comunidades.show', $community)->with('status', $this->msj);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comunidad  $comunidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comunidad $comunidad) {
        
        $this->msj = 'La comunidad fué eliminada con éxito';
        
        $comunidad->delete();
        return redirect()->route('comunidades.index', $comunidad)->with('status', $this->msj);
    }
    
    public function select(Comunidad $comunidad) {
        
        $this->msj = "Has seleccionado la comunidad ";
        
        return $this->msj . $comunidad;
    }
}