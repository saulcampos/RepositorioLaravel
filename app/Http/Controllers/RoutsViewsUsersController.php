<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoutsViewsUsersController extends Controller
{/*USUARIOS*/
    	

	public function HomeB()
	{return view('empresa/usuario/index');}

    public function Costos()
    {return view('empresa/usuario/costos/index');}

    	public function Almacen()
    	{return view('empresa/usuario/almacen/index');}

            public function Galpones()
            {return view('empresa/usuario/galpones/index');}

    	

    		

    			


  

}
