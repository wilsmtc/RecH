<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionPersonal extends FormRequest
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
                    'apellido'=>'required|max:50',
                    'ci'=>'required|min:7|max:15|unique:personal,ci,'. $this->route('id'),
                    'cargo_id'=>'required|integer',
                    'celular'=>'nullable|min:5|max:15|unique:personal,celular,'. $this->route('id'),
                    'fecha_ing'=>'required|date|date_format:Y-m-d',
                    'unidad_id'=>'required|integer',
                    'genero'=>'required|max:6',
                    'foto_up'=>'nullable|image|max:3000',
                    'documento_up'=>'nullable|max:10000',
                    'contrato_id'=>'required|integer',
                    'fecha_ret'=>'nullable|date|date_format:Y-m-d',
                    'razon_ret'=>'nullable|max:30',
                    'memorandum_ret'=>'nullable|max:1000'
                ];
            }
            else{
                return [
                    //crear
                    'nombre'=>'required|max:50',
                    'apellido'=>'required|max:50',
                    'ci'=>'required|min:7|max:15|unique:personal,ci',
                    'cargo_id'=>'required|integer',
                    'celular'=>'nullable|min:5|max:15|unique:personal,celular',
                    'fecha_ing'=>'required|date|date_format:Y-m-d',
                    'unidad_id'=>'required|integer',
                    'genero'=>'required|max:6',
                    'foto_up'=>'nullable|image|max:3000',
                    'documento_up'=>'nullable|max:10000',
                    'contrato_id'=>'required|integer',
                    'fecha_ret'=>'nullable|date|date_format:Y-m-d',
                    'razon_ret'=>'nullable|max:30',
                    'memorandum_ret'=>'nullable|max:1000'
                ];  
            }
    }
    public function messages()
    {
        return [
            'nombre.required' => 'Olvidaste el nombre del Personal',
            'nombre.max' => 'El nombre del Personal debe ser mas corto (50 caracteres)',
            'apellido.required' => 'Olvidaste el apellido del Personal',
            'apellido.max' => 'El apellido del Personal debe ser mas corto (50 caracteres)',
            'ci.required' => 'Olvidaste el número de Carnet del Personal',
            'ci.max' => 'El número de Carnet del Personal no puede tener mas de 15 digitos',
            'ci.min' => 'El número de Carnet del Personal debe tener al menos 7 digitos',
            'ci.unique' => 'El número de Carnet ya ha sido tomado',
            'cargo_id.required' => 'Olvidaste asignar un Cargo',
            'celular.max' => 'El número de Celular no puede tener mas de 15 digitos',
            'celular.min' => 'El número de Celular debe tener al menos 5 digitos',
            'celular.unique' => 'El número de Celular ya ha sido tomado',
            'fecha_ing.required' => 'Olvidaste la fecha de ingreso',
            'unidad_id.required' => 'Olvidaste asignar la Unidad a la que Pertenece',
            'genero.required' => 'Olvidaste el Genero',
            'foto_up.image' => 'La Foto debe de estar en un formato .jpg .png .jpeg',
            'foto_up.max' => 'El tamaño máximo de la Foto es de 3 MB',
            'documento_up.max' => 'El tamaño máximo del Curriculum es de 10 MB',
            'contrato_id.required' => 'Olvidaste asignar un tipo de Contrato',
            'razon_ret.max' => 'La razón del retiro debe ser mas corta (30 caracteres)',
            'memorandum_ret.max' => 'El tamaño máximo del Memorandum de Retiro es de 1 MB',
        ];
    }
}
