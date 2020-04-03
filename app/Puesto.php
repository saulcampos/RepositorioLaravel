<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{

    protected $table='puestos';
    protected $primaryKey='idpuesto';
    public $incrementing=true;
    public $timestamps=false;

    

    protected $fillable=[
    'nombre',
    'status'
    ];


}