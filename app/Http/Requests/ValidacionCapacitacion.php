<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionCapacitacion extends FormRequest
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
                'nombre'=>'required|max:50',
                'unidad_id'=>'required|integer',
                'descripcion' => 'nullable|max:250',
                'documento_up'=>'nullable|max:10000'
            ];
        }
        else{
           return [
               //crear
                'nombre'=>'required|max:50',
                'unidad_id'=>'required|integer',
                'descripcion' => 'nullable|max:250',
                'documento_up'=>'required|max:10000'
            ]; 
        }
    }
    public function messages()
    {
        return [
            'nombre.required' => 'Olvidaste el nombre de la Capacitación',
            'nombre.max' => 'El nombre del cargo debe ser mas corto (50 caracteres)',
            'descripcion.max' => 'La descripción debe ser mas corta (250 caracteres)',
            'unidad_id.required' => 'Olvidaste asignar la Unidad a la que Pertenece la Capacitación',
            'documento_up.required' => 'Olvidaste Subir el Documento de Capacitación',
            'documento_up.max' => 'El tamaño máximo del Documento es de 10 MB',
        ];
    }
}
