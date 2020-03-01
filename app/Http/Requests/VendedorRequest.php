<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendedorRequest extends FormRequest
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
            'nombre'=>['required'],
            'telefono'=>['required'],
            'direccion'=>['required'],
            'mail'=>['required']
        ];
    }

    public function messages(){

        return [
            'nombre.required'=>'El campo nombre es obligatorio',
            'telefono.required'=>'El campo telefono es obligatorio',
            'direccion.required'=>'El campo direccion es obligatorio',
            'mail.required'=>'El campo mail es obligatorio'

        ];
    }
}
