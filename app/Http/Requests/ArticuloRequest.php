<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticuloRequest extends FormRequest
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
            'stock'=>['required'],
            'precio'=>['required'],
            'imagen'=>[ 'image'],
            'cat_id'=>['nullable']
        ];
    }

    public function messages(){

        return [
            'nombre.required'=>'El campo nombre es obligatorio',
            'precio.required'=>'El campo precio es obligatorio',
            'stock.required'=>'El campo stock es obligatorio',
            'imagen.image'=>'El fichero debe ser de tipo imagen'

        ];
    }

    public function prepareForValidation(){
        if($this->nombre!=null){
            $this->merge([
                'nombre'=>ucwords($this->nombre)
            ]);
        }
    }
}
