<?php

namespace App\Http\Requests\Product;

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

            'name' => 'required|string|unique:products,name,'.
            $this->route('product')->id.'|max:250',

            'sell_price' => 'required',
            'category_id' => 'integer|required|exists:App\Category,id',
            'provider_id' => 'integer|required|exists:App\Provider,id',
        ];

    }

        public function messages()
        {
        return [
             'name.required' => 'El campo nombre es requerido',
             'name.string' => 'El valor no es correcto',
             'name.unique' => 'El producto ya esta registrado',
             'name.max' => 'Solo se permiten 250 caracteres',
             
             'sell_price.required' => 'El campo precio es requerido',

             'category_id.integer' => 'El valor tiene que ser entero',
             'category_id.required' => 'El id de la categoria es requerido',
             'category_id.exists' => 'La categoria no existe',

             'provider_id.integer' => 'El valor tiene que ser entero',
             'provider_id.required' => 'El id del provedor es requerido',
             'provider_id.exists' => 'El provedor no existe',
         ];
        }
}
