<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Servicio;

class apiServiciosController extends Controller
{
    public function index()
    {
        return Servicio::where('status','=',1)
        ->get();
    }

    public function ServiciosInactivos()
    {
        return Servicio::where('status','=',0)->get();
    }


    public function store(Request $request)
    {
      $servicio = new Servicio;
      $servicio->nombre=$request->get('nombre');
      $servicio->descripcion=$request->get('descripcion');
      $servicio->status=$request->get('status');
      


      $servicio->save();
      return $servicio;
    }


    public function show($id)
    {
        return Servicio::find($id);
    }


    public function update(Request $request, $id)
    {
        $servicio = new Servicio;
        $servicio->status=$request->get('status');
      if($servicio->variable =="ok"){

        $servicio = Servicio::find($id);

        $servicio->status=$request->get('status');
        $servicio->update();
        return $servicio;
        
      }else{
        Servicio::findOrFail($id)->update($request->all());
      }
      

    }

   public function destroy($id)
    {
        return Servicio::destroy($id);
    }
}
