<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsuariosRequest;
use App\Usuario;
use App\Rol;


class apiUsuariosController extends Controller
{
    public function index()
    {
        return Usuario::where('status','=',1)
        ->get();

      /*  return Usuario::all();*/
    }

    public function UsuariosInactivos()
    {
        return Usuario::where('status','=',0)->get();
    }


    public function store(Request $request)
    {
        $usuario= new Usuario;

       /* $archivo=$request->file('foto');
        if ($archivo!=null)
        { $archivo->move(public_path().'/user/', $usuario->nickname=$request->get('nickname').'.jpg');

        $usuario->foto=$foto.'.jpg';
        }*/

        $usuario->nickname=$request->get('nickname');
        $usuario->idempleado=$request->get('idempleado');
        $usuario->password=$request->get('password');
        $usuario->idrol=$request->get('idrol');
        $usuario->foto=$request->get('foto');
        $usuario->status=$request->get('status');

        $usuario->save();
        return $usuario;
    }


    public function show($id)
    {
        return Usuario::find($id);
    }


    public function update(Request $request, $id)
    {


       $usuario = new Usuario;
       $usuario->variable=$request->get('variable');


       if($usuario->variable =="ok")
       {
        //return 'Si entro el en el if';
        $usuario = Usuario::find($id);

        $usuario->status=$request->get('status');
        $usuario->update();
        return $usuario;
       }
       else{
        /*return 'No entro en el if';*/
         $usuario = usuario::find($id);

       $archivo=$request->file('foto');
        if ($archivo!=null)
        { $archivo->move(public_path().'/user/',$usuario->nickname=$request->get('nickname').'.jpg');

        //$usuario->foto=$foto.'.jpg';
        }

        if($request->get('foto')!=null)
            $usuario->foto=$request->get('foto');

        $usuario->nickname=$request->get('nickname');
        $usuario->nombres=$request->get('nombres');
        $usuario->apellidop=$request->get('apellidop');
        $usuario->apellidom=$request->get('apellidom');
        $usuario->password=$request->get('password');
        $usuario->status=$request->get('status');
        $usuario->idrol=$idrol=$request->get('idrol');
        $usuario->update();
        return $usuario;
       }

      
       

       
       
    }


    public function destroy($id)
    {
      return Usuario::destroy($id);
    }
}
