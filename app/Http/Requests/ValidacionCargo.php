<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionCargo extends FormRequest
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
                'nombre' => 'required|max:50|unique:cargos,nombre,'. $this->route('id'),
                'descripcion' => 'nullable|max:250'
            ];
        }
        else{
           return [
               //crear
                'nombre' => 'required|max:50|unique:cargos,nombre',
                'descripcion' => 'nullable|max:250'
            ]; 
        }
    }
    public function messages()
    {
        return [
            'nombre.required' => 'Olvidaste el nombre del cargo',
            'nombre.max' => 'El nombre del cargo debe ser mas corto (50 caracteres)',
            'nombre.unique' => 'El nombre del cargo ya ha sido tomado',
            'descripcion.max' => 'La descripción debe ser mas corta (250 caracteres)'
        ];
    }
}
