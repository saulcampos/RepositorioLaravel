<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{

	    protected $table='proveedores';
  	    protected $primaryKey='idproveedor';
   		public $incrementing =true;
    	public $timestamps=false;

    	protected $fillable=[
			 'nombres',
			 'direccion',
			 'telefono',
			 'email',
			 'status'
			  ];

}
