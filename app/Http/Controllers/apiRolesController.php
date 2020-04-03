<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*use App\Http\Requests\RolesRequest;*/
use App\Rol;



class apiRolesController extends Controller
{

    public function index()
    {
        return Rol::where('status','=',1)->get();
    }

    public function RolesInactivos()
    {
        return Rol::where('status','=',0)->get();
    }

    public function store(Request $request)
    {
      $rol = new Rol;
      $rol->rol=$request->get('rol');
      $rol->status=$request->get('status');
      $rol->save();
      return $rol;
    }


    public function show($id)
    {
        return Rol::find($id);
    }


    public function update(Request $request, $id)
    {  
     $rol = new Rol;
     $rol->variable=$request->get('variable');
      if($rol->variable =="ok"){

        $rol = Rol::find($id);
        $rol->status=$request->get('status');
        $rol->update();
        return $rol;
      }else{
        Rol::findOrFail($id)->update($request->all());
      }
    }




    public function destroy($id)
    {
        return Rol::destroy($id);
    }
}
