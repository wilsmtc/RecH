<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionInvitado extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ci'=>'required|min:7|max:15',
         ]; 
    }
    public function messages()
    {
        return [
            'ci.required' => 'Olvidaste ingresar el Número de Carnet',
            'ci.min' => 'El Número de Carnet debe tener al menos 7 caracteres)',
            'ci.max' => 'El Número de Carnet no debe sobre pasar los 15 caracteres)',
        ];
    }
}
