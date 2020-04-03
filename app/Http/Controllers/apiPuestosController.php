<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Puesto;

class apiPuestosController extends Controller
{
    public function index()
    {
        return Puesto::where('status','=',1)->get();
    }

    public function PuestosInactivos()
    {
        return Puesto::where('status','=',0)->get();
    }

    public function store(Request $request)
    {
      $puesto = new Puesto;
      $puesto->nombre=$request->get('nombre');
      $puesto->status=$request->get('status');
      $puesto->save();
      return $puesto;
    }


    public function show($id)
    {
        return Puesto::find($id);
    }


    public function update(Request $request, $id)
    {  
     $puesto = new Puesto;
     $puesto->variable=$request->get('variable');
      if($puesto->variable =="ok"){

        $puesto = Puesto::find($id);
        $puesto->status=$request->get('status');
        $puesto->update();
        return $puesto;
      }else{
        Puesto::findOrFail($id)->update($request->all());
      }
    }




    public function destroy($id)
    {
        return Puesto::destroy($id);
    }
}
