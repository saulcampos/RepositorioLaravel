<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table='empleados';
    protected $primaryKey='idempleado';
    public $incrementing=true;
    public $timestamps=false;

    protected $with=['puesto'];//Muy importante

    protected $fillable=[
    'nombres',
    'idpuesto',
    'status'
    ];

     public function puesto()
      {
         return $this->belongsTo(Puesto::class,'idpuesto');
      }
}
