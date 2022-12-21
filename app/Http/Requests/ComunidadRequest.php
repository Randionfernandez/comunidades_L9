<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;


class ComunidadRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool {

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
            'cif' => ['required', 'alpha_num', 'size:9',
                Rule::unique('  comunidades')->ignore(request('comunidad'))],
// Abajo la forma original del Rule:unique, debe verificarse que la de arriba es correcta. Propuesta en curso 'Refactorización'.
//                Rule::unique('comunidades')->ignore($this->route('comunidad'))],
            'fechalta' => 'required|date',
//            'activa' => ['boolean'], // Estos dos checkbox ya no se manejan por el usuario.
//            'gratuita' => ['boolean'],
            'partes' => ['required', 'integer', 'min:2','max:1000'],
            'denom' => 'required|string|max:35',
            'email' => 'nullable|email',
            'direccion' => 'required|string',
            'municipio' => 'nullable',
            'localidad' => 'string|nullable',
            'provincia' => 'string|nullable',
            'cp' => 'required|string|size:5',
            'pais' => 'required|string|size:3',
            'logo' => 'nullable',
            'observaciones' => 'string||nullable',
            'presidente' => 'nullable|string|max:35',
            'secretario' => 'nullable|string|max:35',
            'administrador' => 'nullable|string|max:35',
        ];
    }

    public function messages(): array
    {
        return [
            'denom.required' => __('The community needs a name'),
            'cif.required' => __('The community needs an unique cif')
        ];
    }

}
