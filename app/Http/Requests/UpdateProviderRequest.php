<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProviderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required|max:50|unique:providers,name,'. $this->provider->id,
            'cuilcuit'=>'nullable|unique:providers,cuilcuit,'. $this->provider->id,
            'address'=>'nullable|unique:providers,address,'. $this->provider->id,
            'phone'=>'nullable|unique:providers,phone,'. $this->provider->id,
            'email'=>'nullable|unique:providers,email,'. $this->provider->id,
            'web'=>'nullable|unique:providers,web,'. $this->provider->id,
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
