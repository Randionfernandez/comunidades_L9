<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveComunidadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
        // podemos acceder al usuario con $this->user()
        // podemos verificar que es administrador con
        // $this->user()->isAdmin()
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cif' => 'required|unique:comunidades,cif',
            'fechalta' => 'required|date',
            'activa' => 'boolean',
            'gratuita' => 'boolean',
            'partes' => 'integer',
            'denom' => 'required|string',
            'direccion' => 'required|string',
            'localidad' => 'required|string',
            'provincia' => 'required|string',
            'cp' => 'required|size:5',
            'pais' => 'required|string',
            'logo' => '',
            'observaciones' => 'string',
            'president' => 'string',
            'secretary' => 'string',
            'responsable' => 'string',
            'banksuf' => 'required',
            'doorway' => 'required',
            'block' => '',
            'stair' => '',
            'floor' => 'required|integer',
            'door' => 'required',
            'countrycode' => 'required'
    ];
    }
    
    public function messages() {
        return [
            'name.required' => __('The community needs a name'),
            'cif.required' => __('The community needs an cif')
        ];
    }
}