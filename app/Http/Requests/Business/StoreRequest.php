<?php

namespace App\Http\Requests\Business;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|unique:products|max:250',
            'description' => 'required',
            'description_long' => 'required',
            'mail' => 'required',
        ];
    }
    public function messages()
    {
        return [
             'name.required' => 'El campo nombre es requerido',
             'name.string' => 'El valor no es correcto',
             'name.unique' => 'El producto ya esta registrado',
             'name.max' => 'Solo se permiten 250 caracteres',
             
             'description.required' => 'El campo acerca de es requerido',

             'description_long.required' => 'El campo descripción requerido',

             'mail.required' => 'El correo es requerido',
         ];
    }
}
