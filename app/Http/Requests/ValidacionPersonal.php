<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionPersonal extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
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
                    'fecha_nac'=>'required|date',
                    'unidad_id'=>'required|integer',
                    'genero'=>'required|max:6',
                    'foto_up'=>'nullable|image|max:3000'
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
                    'fecha_nac'=>'required|date',
                    'unidad_id'=>'required|integer',
                    'genero'=>'required|max:6',
                    'foto_up'=>'nullable|image|max:3000'
                ];  
            }
    }
}
