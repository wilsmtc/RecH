<?php
namespace App\Http\Requests;

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Http\FormRequest;
class ValidacionRol extends FormRequest
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
            //para editar
            'tipo' => 'required|max:50|unique:roles,tipo,'. $this->route('id')
            ];
        }   
        else{
            
        return [
            //para crear
            'tipo' => 'required|max:50|unique:roles,tipo'//. \Request::get('id'), //si funciona
            ];
        }
    }
    public function messages()
    {
        return [
            'tipo.required' => 'Olvidaste el Tipo de Rol',
            'tipo.max' => 'El Tipo de Rol debe ser mas corto (50 caracteres)',
            'tipo.unique' => 'El Tipo de Rol ya ha sido tomado',
        ];
    }
}