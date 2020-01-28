<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionMenu extends FormRequest
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
                'nombre' => 'required|max:50|unique:menu,nombre,'. $this->route('id'),
                'url' => 'required|max:100|unique:menu,url,'. $this->route('id'),    
                'icono' => 'nullable|max:50'
            ];
        }
        else{ 
            return [
                //crear
                'nombre' => 'required|max:50|unique:menu,nombre',
                'url' => 'required|max:100|unique:menu,url',   
                'icono' => 'nullable|max:50'
            ];   
        }
        
    }
}
