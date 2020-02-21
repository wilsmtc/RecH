<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionUsuario extends FormRequest
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
                'usuario'=>'required|max:50|unique:usuarios,usuario,'. $this->route('id'),
                'nombre'=>'required|max:50',
                'apellido'=>'required|max:50',
                'email'=>'required|max:100|unique:usuarios,email,'. $this->route('id'),
                'password'=>'nullable|min:6|max:50',
                're_password'=>'nullable|required_with:password|min:6|same:password',
                'rol_id'=>'required|integer'
                //required_with::password   el campo re_pass se vuelve required solo si hay pass
            ];
        }
        else{
            return [
                //crear
                'usuario'=>'required|max:50|unique:usuarios,usuario',
                'nombre'=>'required|max:50',
                'apellido'=>'required|max:50',
                'email'=>'required|max:100|unique:usuarios,email',
                'password'=>'required|min:6|max:50',
                're_password'=>'required|min:6|same:password',
                'rol_id'=>'required|integer'
            ];  
        }
    }
}
