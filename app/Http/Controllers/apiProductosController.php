<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class apiProductosController extends Controller
{
    
 
    public function index()
    {
        return Producto::where('status','=',1)
        ->get();
    }
    public function ProductosInactivos()
    {
        return Producto::where('status','=',0)
        ->get();
    }

    
    public function store(Request $request)
    {
        $producto = new Producto;
        $producto->idproducto=$request->get('idproducto');
        $producto->nombre=$request->get('nombre');
        $producto->stockmin=$request->get('stockmin');
        $producto->stockmax=$request->get('stockmax');
        $producto->precio_compra=$request->get('precio_compra');
        $producto->precio_venta=$request->get('precio_venta');
        $producto->descripcion=$request->get('descripcion');
        $producto->foto=$request->get('foto');
        $producto->status=$request->get('status');
        $producto->idcategoria=$request->get('idcategoria');
        $producto->save();
        return $producto;
    }

    
    public function show($id)
    {
        return Producto::find($id);
    }


    public function update(Request $request, $id)
    {
        
     $producto = new Producto;
     $producto->status=$request->get('status');

      if($producto->status=="ok"){

        $producto = Producto::find($id);

        $producto->status=$request->get('status');
        $producto->update();
        return $producto;
        
      }else{
        Producto::findOrFail($id)->update($request->all());
      }
      

    }



   
    public function destroy($id)
    {
        return Producto::destroy($id);
    }
}

