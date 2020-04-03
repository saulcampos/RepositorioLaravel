<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;

class apiEmpleadosController extends Controller
{
    

  public function index()
    {
        return Empleado::where('status','=',1)
        ->get();
    }

    public function EmpleadosInactivos()
    {
        return Empleado::where('status','=',0)
        ->get();
    }

    
    public function store(Request $request)
    {
        $empleado = new Empleado;
        $empleado->nombres=$request->get('nombres');
        $empleado->status=$request->get('status');
        $empleado->idpuesto=$request->get('idpuesto');
        $empleado->save();
        return $empleado;
    }

    
    public function show($id)
    {
        return Empleado::find($id);
    }


    public function update(Request $request, $id)
    {
        
     $empleado = new Empleado;
     $empleado->variable=$request->get('variable');

      if($empleado->variavle=="ok"){

        $empleado = Empleado::find($id);

        $empleado->status=$request->get('status');
        $empleado->update();
        return $empleado;
        
      }else{
        Empleado::findOrFail($id)->update($request->all());
      }
      

    }



   
    public function destroy($id)
    {
        return Empleado::destroy($id);
    }


}
