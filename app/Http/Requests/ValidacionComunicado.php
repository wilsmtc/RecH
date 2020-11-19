<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionComunicado extends FormRequest
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
                'tipo' => 'required|max:13',
                'documento_up'=>'nullable|max:1000'
            ];
        }
        else{
           return [
               //crear
                'nombre'=>'required|max:50',
                'tipo' => 'required|max:13',
                'documento_up'=>'required|max:1000'
            ]; 
        }
    }
    public function messages()
    {
        return [
            'nombre.required' => 'Olvidaste el nombre del Comunicado',
            'nombre.max' => 'El nombre del comunicado debe ser mas corto (50 caracteres)',
            'tipo.required' => 'Olvidaste el tipo de Comunicado',
            'tipo.max' => 'El tipo del comunicado debe ser mas corto (13 caracteres)',
            'documento_up.required' => 'Olvidaste Subir el Documento del comunicado',
            'documento_up.max' => 'El tamaño máximo del Documento es de 1 MB',
        ];
    }
}
