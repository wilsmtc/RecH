<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionMenuEditar extends FormRequest
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
        return [
            'nombre' => 'required|max:50|unique:menu,nombre,'. $this->route('id'),
            'url' => 'required|max:100|unique:menu,url,'. $this->route('id'),    //editar
            'icono' => 'nullable|max:50'
        ];
    }
}
