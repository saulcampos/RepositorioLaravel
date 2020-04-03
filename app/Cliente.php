<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    	protected $table='clientes';
  	    protected $primaryKey='idcliente';
   		public $incrementing =true;
    	public $timestamps=false;

    	protected $fillable=[
			 'nombres',
			 'direccion',
			 'telefono',
			 'status'
			  ];
}
