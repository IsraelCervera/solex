<?php

namespace App\Http\Requests\Post;

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
            'title' => 'required|string|max:250',
            'excerpt' => 'required',
            'body' => 'required',
            
        ];
    }
    public function messages()
    {
        return [
             'title.required' => 'El campo titulo es requerido',
             'title.string' => 'El valor no es correcto',
             'title.max' => 'Solo se permiten 250 caracteres',
             

             'excerpt.required' => 'El extracto del blog es requerido',

             'body.required' => 'La información del blog es requerido',

             
         ];
    }
}