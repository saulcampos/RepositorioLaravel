<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    protected $table='almacen';
    protected $primaryKey='idalmacen';
    public $incrementing=false;
    public $timestamps=false;

    protected $with=['proveedor'];//Muy importante

    protected $fillable=[
    'idalmacen',
    'fecha_logica',
    'fecha',
    'descripcion',
    'idproveedor',
    'total'
    ];

    public function proveedor()
      {
         return $this->belongsTo(Proveedor::class,'idproveedor');
      }


}
