<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class apiClientesController extends Controller
{
   public function index()
    {
        return Cliente::where('status','=',1)
        ->get();
    }

    public function ClientesInactivos()
    {
        return Cliente::where('status','=',0)
        ->get();
    }

   

    public function store(Request $request)
    {
      $cliente = new Cliente;

      $cliente->nombres=$request->get('nombres');
      $cliente->direccion=$request->get('direccion');
      $cliente->telefono=$request->get('telefono');
      $cliente->status=$request->get('status');     


      $cliente->save();
      return $cliente;
    }


    public function show($id)
    {
        return Cliente::find($id);
    }


    public function update(Request $request, $id)
    {
        $cliente = new Cliente;
        $cliente->sta=$request->get('sta');
      if($cliente->sta =="ok"){

        $cliente = Cliente::find($id);

        $cliente->status=$request->get('status');
        $cliente->update();
        return $cliente;
        
      }else{
        Cliente::findOrFail($id)->update($request->all());
      }
      

    }


   public function destroy($id)
    {
        return Cliente::destroy($id);
    }
}
