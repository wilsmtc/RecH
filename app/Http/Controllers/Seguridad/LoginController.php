<?php

namespace App\Http\Controllers\Seguridad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function index()
    {
        session_start();
        ob_start();
        $_SESSION['id_invitado']=0;
        return view('seguridad.index');
    }
    protected function authenticated(Request $request, $user) 
    {
        //$roles = $user->roles()->where('estado', 1)->get();
        $roles = $user->roles()->get();
        if ($user->estado==1) {
            $user->setSession($roles->toArray());//llama a la funcion setsession
        } else {
            $this->guard()->logout();
            $request->session()->invalidate();
            return redirect('seguridad/login')->withErrors(['error' => 'Este usuario no esta activo']);
        }
    }
    public function username() //reescribimos la funcion para q se loguee con usuario y no con email
    {
        return 'usuario';
    }
    public function logout(Request $request) //rescribo la funcion para cambiar el direccionamiento una vz finalizado session
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect('seguridad/login');
    }
}
