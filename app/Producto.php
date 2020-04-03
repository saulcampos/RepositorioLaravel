<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
  	    protected $table='productos';
  	    protected $primaryKey='idproducto';
   		public $incrementing =false;
    	public $timestamps=false;


   		protected $with=['categoria'];//Muy importante

    	 protected $fillable=[
    	 	 'idproducto',
			   'nombre',
			   'stockmin',
			   'stockmax',
         'precio_venta',
			   'precio_compra',
			   'descripcion',
			   'foto',
			   'status',
			   'idcategoria'
			  ];


	  public function categoria()
      {
         return $this->belongsTo(Categoria::class,'idcategoria');
      }
}

