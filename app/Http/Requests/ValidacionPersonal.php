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
                    'cargo'=>'required|max:50',
                    'celular'=>'nullable|min:5|max:15|unique:personal,celular,'. $this->route('id'),
                    'fecha_ing'=>'required|date|date_format:Y-m-d',
                    'unidad_id'=>'required|integer',
                    'genero'=>'required|max:6',
                    'foto_up'=>'nullable|image|max:3000',
                    'documento_up'=>'nullable|max:30000',
                    'item'=>'nullable|min:2|max:5|unique:personal,item,'. $this->route('id'),
                    'fecha_ret'=>'nullable|date|date_format:Y-m-d',
                    'razon_ret'=>'nullable|max:30'
                ];
            }
            else{
                return [
                    //crear
                    'nombre'=>'required|max:50',
                    'apellido'=>'required|max:50',
                    'ci'=>'required|min:7|max:15|unique:personal,ci',
                    'cargo'=>'required|max:50',
                    'celular'=>'nullable|min:5|max:15|unique:personal,celular',
                    'fecha_ing'=>'required|date|date_format:Y-m-d',
                    'unidad_id'=>'required|integer',
                    'genero'=>'required|max:6',
                    'foto_up'=>'nullable|image|max:3000',
                    'documento_up'=>'nullable|max:30000',
                    'item'=>'nullable|min:2|max:5|unique:personal,item',
                    'fecha_ret'=>'nullable|date|date_format:Y-m-d',
                    'razon_ret'=>'nullable|max:30'
                ];  
            }
    }
}
