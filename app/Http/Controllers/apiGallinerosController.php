<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallinero;

class apiGallinerosController extends Controller
{
     public function index()
    {
        return Gallinero::where('status','=',1)
        ->get();
    }


    public function store(Request $request)
    {
      $gallinero = new Gallinero;
      $gallinero->nombre=$request->get('nombre');
      $gallinero->observaciones=$request->get('observaciones');
      $gallinero->cantidad=$request->get('cantidad');
      $gallinero->status=$request->get('status');


      $gallinero->save();
      return $gallinero;
    }


    public function show($id)
    {
        return Gallinero::find($id);
    }


    public function update(Request $request, $id)
    {
        $gallinero = new Gallinero;
        $gallinero->variable=$request->get('variable');

      if($gallinero->variable =="ok"){

        $gallinero = Gallinero::find($id);

        $gallinero->status=$request->get('status');
        $gallinero->update();
        return $gallinero;
        
      }else{
        Gallinero::findOrFail($id)->update($request->all());
      }
      

    }

   public function destroy($id)
    {
        return Gallinero::destroy($id);
    }
}
