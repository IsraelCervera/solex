<?php

namespace App\Http\Requests\Provider;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string|max:250',

            'lastname' => 'required|string|max:250',

            'email' => 'required|email|string|max:250|unique:providers,email,'.
            $this->route('provider')->id.'|max:250',

            'address' => 'nullable|string|max:250',

            'curp' => 'required|string|min:18|unique:providers,curp,'.
            $this->route('provider')->id.'|max:18',

            'phone' => 'required|string|min:10|unique:providers,phone,'.
            $this->route('provider')->id.'|max:10',
        ];
    }
    public function messages()
    {
        return [
             'name.required' => 'El campo nombre es requerido',
             'name.string' => 'El valor no es correcto',
             'name.max' => 'Solo se permiten 250 caracteres',

             'lastname.required' => 'El campo apellido es requerido',
             'lastname.string' => 'El valor no es correcto',
             'lastname.max' => 'Solo se permiten 250 caracteres',

             'email.required' => 'El campo email es requerido',
             'email.email' => 'El campo email no es aceptado',
             'email.string' => 'El valor no es correcto',
             'email.max' => 'Solo se permiten 250 caracteres',
             'email.unique' => 'El email ya esta en uso',

             'address.string' => 'El valor no es correcto',
             'address.max' => 'Solo se permiten 250 caracteres',

             'curp.required' => 'El campo CURP es requerido',
             'curp.string' => 'El valor no es correcto',
             'curp.max' => 'La CURP debe contener 18 caracteres',
             'curp.unique' => 'La CURP ya esta en uso',
             'curp.min' => 'La CURP debe contener 18 caracteres',

             'phone.required' => 'El campo tel??fono es requerido',
             'phone.string' => 'El valor no es correcto',
             'phone.max' => 'El tel??fono debe contener 10 n??meros',
             'phone.unique' => 'El tel??fono ya esta en uso',
             'phone.min' => 'El tel??fono debe contener 10 n??meros',
         ];
    }
}
