<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
//use Illuminate\Support\Facades\Gate;
//use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class ComunidadApiRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {

        return true;
        // podemos acceder al usuario con $this->user()
        // podemos verificar que es administrador con
        // $this->user()->isAdmin()
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'data.attributes.cif' => ['required', 'alpha_num', 'size:9',
                Rule::unique('comunidades')->ignore($this->route('comunidad'))],
            'data.attributes.fechalta' => 'required|date',
//            'activa' => ['boolean'], // Estos dos checkbox ya no se manejan por el usuario.
//            'gratuita' => ['boolean'],
            'data.attributes.partes' => ['required', 'integer', 'min:2', 'max:1000'],
            'data.attributes.denom' => 'required|string|max:35',
            'data.attributes.email' => 'nullable|email',
            'data.attributes.direccion' => 'required|string',
            'data.attributes.municipio' => 'nullable',
            'data.attributes.localidad' => 'string|nullable',
            'data.attributes.provincia' => 'string|nullable',
            'data.attributes.cp' => 'required|string|size:5',
            'data.attributes.pais' => 'required|string|size:3',
            'data.attributes.logo' => 'nullable',
            'data.attributes.observaciones' => 'string||nullable',
            'data.attributes.presidente' => 'nullable|string|max:35',
            'data.attributes.secretario' => 'nullable|string|max:35',
            'data.attributes.administrador' => 'nullable|string|max:35',
        ];
    }
// Eliminar este constructor
//    public function __construct($request->data.attributes) {
//        parent::__construct();
//    }

    public function messages(): array
    {
        return [
            'denom.required' => __('The community needs a name'),
            'cif.required' => __('The community needs an unique cif')
        ];
    }

}
