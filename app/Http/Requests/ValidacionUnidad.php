<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionUnidad extends FormRequest
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
                'nombre' => 'required|max:50|unique:unidades,nombre,'. $this->route('id'),
                'sigla' => 'required|max:10|unique:unidades,sigla,'. $this->route('id'),
                'descripcion' => 'nullable|max:250'
            ];
        }
        else{
           return [
               //crear
                'nombre' => 'required|max:50|unique:unidades,nombre',
                'sigla' => 'required|max:10|unique:unidades,sigla',
                'descripcion' => 'nullable|max:250'
            ]; 
        }       
    }
}
