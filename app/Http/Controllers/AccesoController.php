<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Session;
use Cache;

use Illuminate\Support\Facades\Redirect;

class AccesoController extends Controller
{
    public function validar(Request $request)
    {
        $usuario=$request->get('usuario');
        $password=$request->get('password');

        

        $usuario=Usuario::where('nickname','=',$usuario)
        ->where('password','=',$password)
        ->first();

        

        if(!empty($usuario))
        {
            $nombre = $usuario->nombre;
            $rol = $usuario->rol->rol;
            $foto = $usuario->foto;
            
            //return 'El usuario si existe :' . $nombre . '-' . $rol;
            Session::put('usuario',$nombre);
            Session::put('rol',$rol);
            Session::put('foto',$foto);

            if ($rol=='Administrador')
                return view('empresa.administrador.index');
                    elseif($rol=='Usuario')
                    return view('empresa.usuario.index');
                            elseif($rol=='Empleado')
                            return view('empresa.empleado.index');
                                else return view('login.login');

        }
        else
           
            return view('login.login')
         ->with('store', 'Se guardo correctamente'); 

    }
    // Método para cerrar sesión
    public function logout()
    {
       Session::flush();
       Session::reflash();
       Cache::flush();
       unset($_SESSION);

       return Redirect::to('/');

    }
}
