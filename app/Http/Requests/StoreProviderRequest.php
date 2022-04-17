<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProviderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required|max:50|unique:providers',
            'cuilcuit'=>'nullable|unique:providers',
            'address'=>'nullable|unique:providers',
            'phone'=>'nullable|unique:providers',
            'email'=>'nullable|unique:providers',
            'web'=>'nullable|unique:providers',
        ];
    }

    public function messages(){
        return[
           'name.required'=>'El campo nombre no puede estar vacio.',
            'name.unique'=>'El nombre ya esta registrado.',
            'name.max'=>'Máximo 50 caracteres.',
            'cuilcuit'=>'El CUIL/CUIT ya esta registrado.',
            'address'=>'La dirección ya esta registrada.',
            'phone'=>'El teléfono ya esta registrado.',
            'email'=>'El email ya esta registrado.',
            'web'=>'El sitio web ya esta registrado.', 
        ];
    }
}
