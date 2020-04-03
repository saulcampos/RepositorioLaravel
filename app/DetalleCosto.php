<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCosto extends Model
{
      protected $table='detalle_costos';
  	  protected $primaryKey='iddetalle';
   		public $incrementing =true;
     	public $timestamps=false;

      protected $with=['servicios', 'costos'];

    	 protected $fillable=[
    	'idcosto',
      'idservicio',
    	'precio'

    	 ];

       public function servicios()
      {
         return $this->belongsTo(Servicio::class,'idservicio');
      }

       public function costos()
      {
         return $this->belongsTo(Costo::class,'idcosto');
      }
}


