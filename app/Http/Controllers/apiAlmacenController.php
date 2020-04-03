<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Almacen;
use App\DetalleAlmacen;
use DB;

class apiAlmacenController extends Controller
{
    
	 public function index()
    {
        return Almacen::all();
    }

    public function DetalleAlmacen($id)
    {
        return DetalleAlmacen::where('idalmacen','=',$id)
        ->get();
    }

    public function show($id)
    { 
        return Almacen::find($id);
    }


    public function store(Request $request)
    {

DB::beginTransaction();
        
try {
        $almacen = new Almacen;
        $almacen->idalmacen=$request->get('idalmacen');
        $almacen->fecha_logica=$request->get('fecha_logica');
        $almacen->fecha=$request->get('fecha');
        $almacen->descripcion=$request->get('descripcion');
        $almacen->idproveedor=$request->get('idproveedor');
        $almacen->total=$request->get('total');
        $almacen->save();


       $detalle = $request->get('detalle');
       $cantidades = $request->get('cantidades');

      
       $records=[];
        
        
        
    

        for ($i=0; $i < count($detalle) ; $i++) { 
            $records[]=[
                'idalmacen'=>$request->get('idalmacen'),

                'idproducto'=>$detalle[$i]['idproducto'],
                'cantidad'=>$cantidades[$i],                
                'precio_compra'=>$detalle[$i]['precio'],
                'total'=>$detalle[$i]['total'],
                'en_uso'=>$detalle[$i]['en_uso'],

            ];
        }

       DetalleAlmacen::insert($records);
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


    public function destroy($id)
    {
        return Almacen::destroy($id);
    }

    public function EliminarDAlmacen($id){
        $almacen=DB::select("DELETE  FROM detalle_almacen WHERE idalmacen = '$id'");
         return $almacen;
    }


}
