<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Costo;
use App\DetalleCosto;
use DB;


class ApiCostosController extends Controller
{
        
     
    

	 public function index()
    {
        return Costo::all();
    }

    public function show($id)
    { 
        return Costo::find($id);
    }

    public function DetalleCosotos($id)
    {
        return DetalleCosto::where('idcosto','=',$id)
        ->get();
    }

 
    public function store(Request $request)
    {

DB::beginTransaction();
    	
try {
        $costo = new Costo;
           $costo->idcosto=$request->get('idcosto');
           $costo->fecha=$request->get('fecha');
           $costo->fecha_logica=$request->get('fecha_logica');
           $costo->descripcion=$request->get('descripcion');
           $costo->total=$request->get('total');
        
        $costo->save();


       $detalle = $request->get('detalle');
       $precios = $request->get('precios');
      
       $records=[];
        

        for ($i=0; $i < count($detalle) ; $i++) { 
            $records[]=[
                'idcosto'=>$request->get('idcosto'),
                'idservicio'=>$detalle[$i]['idservicio'],
                'precio'=>$precios[$i]
            ];
        }

       DetalleCosto::insert($records);
    }
catch (\Exception $e)
    {
        DB::rollback();
        // no se... Informemos con un echo por ejemplo
        echo 'ERROR (' . $e->getCode() . '): ' . $e->getMessage();
    }

    // Hacemos los cambios permanentes ya que no han habido errores
    DB::commit();
    /*Al margen del Try / Catch que engorra un poco esto y no se si estas familiarizado con el... No te parece mucho más sencillo?*/

       
       }

    
   
    public function update(Request $request, $id)
    {
        Costos::findOrFail($id)->update($request->all());
    }

   
    public function destroy($id)
    {
        return Costo::destroy($id);
    }

    public function Eliminar($id){
        $costo=DB::select("DELETE  FROM detalle_costos WHERE idcosto = '$id'");
         return $costo;
    }



  


}
