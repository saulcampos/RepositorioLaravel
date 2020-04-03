<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    
   
      protected $table='roles';
  	  protected $primaryKey='idrol';
   		public $incrementing =true;
    	public $timestamps=false;
 
    	 protected $fillable=[
    	'rol',
        'status'
    	 ];
}
