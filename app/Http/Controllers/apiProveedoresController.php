<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;

class apiProveedoresController extends Controller
{
   public function index()
    {
        return Proveedor::where('status','=',1)
        ->get();
    }

    public function ProveedoresInactivos()
    {
        return Proveedor::where('status','=',0)
        ->get();
    }


    public function store(Request $request)
    {
      $proveedor = new Proveedor;

      $proveedor->nombres=$request->get('nombres');
      $proveedor->direccion=$request->get('direccion');
      $proveedor->telefono=$request->get('telefono');
      $proveedor->email=$request->get('email');
      $proveedor->status=$request->get('status');     


      $proveedor->save();
      return $proveedor;
    }


    public function show($id)
    {
        return Proveedor::find($id);
    }


    public function update(Request $request, $id)
    {
        $proveedor = new Proveedor;
        $proveedor->sta=$request->get('sta');
      if($proveedor->sta =="ok"){

        $proveedor = proveedor::find($id);

        $proveedor->status=$request->get('status');
        $proveedor->update();
        return $proveedor;
        
      }else{
        Proveedor::findOrFail($id)->update($request->all());
      }
      

    }


   public function destroy($id)
    {
        return Proveedor::destroy($id);
    }
}
