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
                'rol_id'=>'required|integer',
                'foto_up'=>'nullable|image|max:3000'
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
                'rol_id'=>'required|integer',
                'foto_up'=>'nullable|image|max:3000'
            ];  
        }
    }
    public function messages()
    {
        return [
            'usuario.required' => 'Olvidaste el Usuario',
            'usuario.max' => 'El Usuario debe ser mas corto (50 caracteres)',
            'usuario.unique' => 'El Usuario ya ha sido tomado',
            'nombre.required' => 'Olvidaste el Nombre del Usuario',
            'nombre.max' => 'El nombre del Usuario excede el número de caracteres (50 caracteres)',
            'apellido.required' => 'Olvidaste el Apellido del Usuario',
            'apellido.max' => 'Los Apellidos del Usuario excede el número de caracteres (50 caracteres)',
            'email.required' => 'Olvidaste el Correo Electrónico del Usuario',
            'email.max' => 'El Correo Electrónico del Usuario debe ser mas corto (100 caracteres)',
            'email.unique' => 'El Correo Electrónico del Usuario ya ha sido tomado',
            'rol_id.required' => 'Olvidaste asignar un Rol al Usuario',
            'password.required' => 'Olvidaste La contraseña del Usuario',
            'password.max' => 'La contraseña excede el número de caracteres (50 caracteres)',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres',
            're_password.same' => 'Las Contraseñas no son iguales',
            'foto_up.image' => 'La Foto debe de estar en un formato .jpg .png .jpeg',
            'foto_up.max' => 'El tamaño máximo de la Foto es de 3 MB',
        ];
    }
}
