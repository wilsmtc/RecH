<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionVacacion extends FormRequest
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
                'tipo' => 'required|max:10',
                'razon' => 'nullable|max:200',
                'observacion' => 'nullable|max:200',
                'fecha_ini'=>'required|date|date_format:Y-m-d',
                'dias_t' => 'required|integer|min:1|max:90',
                'memorandum_up'=>'nullable|max:1000'
            ];
        }
        else{
           return [
               //crear
                'tipo' => 'required|max:10',
                'razon' => 'nullable|max:200',
                'observacion' => 'nullable|max:200',
                'fecha_ini'=>'required|date|date_format:Y-m-d',
                'dias_t' => 'required|integer|min:1|max:90',
                'memorandum_up'=>'nullable|max:1000'
            ]; 
        }
    }
    public function messages()
    {
        return [
            'tipo.required' => 'Olvidaste el Tipo de Vacación',
            'tipo.max' => 'El Tipo de Vacación debe ser mas corto (10 caracteres)',
            'razon.max' => 'La Razón de su vacación debe de ser mar breve (200 caracteres)',
            'observacion.max' => 'La Observación de su vacación debe de ser mar breve (200 caracteres)',
            'fecha_ini.required' => 'Olvidaste la Fecha de Inicio',
            'dias_t.required' => 'Olvidaste agregar los días tomados',
            'dias_t.integer' => 'Los Días tomados deben de ser números enteros',
            'dias_t.min' => 'El número de Días Tomados debe ser minimamente 1',
            'dias_t.max' => 'Solo puede tomar un máximo de 90 días de vacación',
            'memorandum_up.max' => 'El tamaño máximo del Memorandum es de 1 MB',
        ];
    }
}
