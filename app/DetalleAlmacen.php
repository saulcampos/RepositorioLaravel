<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleAlmacen extends Model
{
     	protected $table='detalle_almacen';
  	  	protected $primaryKey='iddetalle_almacen';
   		public $incrementing =true;
     	public $timestamps=false;

      protected $with=['Almacen', 'Producto'];

    	 protected $fillable=[
    	'idalmacen',

    	'idproducto',
    	'cantidad',
    	'precio_compra',
      'total',
    	'en_uso'

    	 ];

       public function Almacen()
      {
         return $this->belongsTo(Almacen::class,'idalmacen');
      }

       public function Producto()
      {
         return $this->belongsTo(Producto::class,'idproducto');
      }
}
