<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionContrato extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if($this->route('id')){
            return [
                //editar
                'nombre' => 'required|min:3|max:50|unique:contrato,nombre,'. $this->route('id'),
                'vacacion' => 'required|max:2'
            ];
        }
        else{
           return [
               //crear
                'nombre' => 'required|min:3|max:50|unique:contrato,nombre',
                'vacacion' => 'required|max:2'
            ]; 
        }
    }
    public function messages()
    {
        return [
            'nombre.required' => 'Olvidaste el nombre del contrato',
            'nombre.min' => 'El nombre del contrato debe tener minimamente 3 caracteres',
            'nombre.max' => 'El nombre del contrato debe ser mas corto (50 caracteres)',
            'nombre.unique' => 'El nombre del contrato ya ha sido tomado',
            'vacacion.required' => 'Olvidaste asignar los privilegios de vacación'
        ];
    }
}
