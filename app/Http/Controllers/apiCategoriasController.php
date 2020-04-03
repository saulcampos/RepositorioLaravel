<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class apiCategoriasController extends Controller
{
    public function index()
    {
        return Categoria::where('status','=',1)
        ->get();
    }

    public function CategoriasInactivos()
    {
        return Categoria::where('status','=',0)
        ->get();
    }


    public function store(Request $request)
    {
      $categoria = new Categoria;
      $categoria->nombre=$request->get('nombre');
      $categoria->descripcion=$request->get('descripcion');
      $categoria->status=$request->get('status');
      


      $categoria->save();
      return $categoria;
    }


    public function show($id)
    {
        return Categoria::find($id);
    }


    public function update(Request $request, $id)
    { 

     $categoria = new Categoria;
     $categoria->variable=$request->get('variable');

      if($categoria->variable=="ok"){

        $categoria = Categoria::find($id);

        $categoria->status=$request->get('status');
        $categoria->update();
        return $categoria;
        
      }else{      
        Categoria::findOrFail($id)->update($request->all());
        }

    }

   public function destroy($id)
    {
        return Categoria::destroy($id);
    }
}
