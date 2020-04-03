<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoutsViewsAdminController extends Controller
{/*DMINISTRADOR*/
	public function HomeA()
	{return view('empresa/administrador/index');}

    public function Productos()
    {return view('empresa/administrador/productos/index');}

    	public function Categorias()
    	{return view('empresa/administrador/categorias/index');}

    		public function Usuarios()
            {return view('empresa/administrador/usuarios/index');}

            public function Roles()

            {return view('empresa/administrador/roles/index');}

                

    			public function Gallineros()
                {return view('empresa/administrador/gallineros/index');}

                public function Servicios()
                {return view('empresa/administrador/servicios/index');}

public function Proveedores()
{return view('empresa/administrador/proveedores/index');}

    public function Clientes()
    {return view('empresa/administrador/clientes/index');}

        public function Empleados()
        {return view('empresa/administrador/empleados/index');}

            public function Puestos()
            {return view('empresa/administrador/puestos/index');}

    			

    
}
