<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pais;
use App\Models\Localidad;
use App\Models\Comunidad;

class PaisProvinciaLocalidad extends Component
{
    public $paises;
    public $provincias;
    public $localidades;
    
    public $selectedPais = null;
    public $selectedProvincia = null;
    
    public function mount() {
        $this->paises = Pais::all();
        $this->provincias = collect();
        $this->localidades = collect();
    }
    
    public function render()
    {
        //return view('livewire.pais-provincia-localidad');
        return view('comunidades.create', ['comunidad' => new Comunidad]);
    }
    
    public function updatedSelectedPais($pais) {
        $this->localidades = Localidad::where('pais_id', $pais)->get();
        $this->selectedLocalidad = null;
    }
    
    public function updatedSelectedProvincia($provincia) {
        if (!is_null($provincia)) {
            $this->localidades = Localidad::where('provincia_id', $provincia)->get();
        }
    }
}
