<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table='usuarios';
    protected $primaryKey='nickname';
    public $incrementing=false;
    public $timestamps=false;

    protected $with=['rol', 'empleado'];//Muy importante

    protected $fillable=[
    'nickname',
    'idempleado',
    'password',
    'idrol',
    'foto'
    ];

     public function rol()
      {
         return $this->belongsTo(Rol::class,'idrol');
      }

      public function empleado()
      {
         return $this->belongsTo(Empleado::class,'idempleado');
      }


}
