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
                'curriculum_up'=>'nullable|max:1000'
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
                'curriculum_up'=>'nullable|max:1000'
            ]; 
        }
    }
}
