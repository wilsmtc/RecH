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
           // 'tipo' => 'required|max:50|unique:roles,tipo,'. $this->route('id'),// es para actualizar
           // 'tipo' => 'required|max:50|unique:roles,tipo' . $this->route('id'), // es para crear
            ];
        }
    }
}