<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Costo extends Model
{
    protected $table='costos';
    protected $primaryKey='idcosto';
    public $incrementing=false;
    public $timestamps=false;

    

    protected $fillable=[
    'idcosto',
    'descripcion',
    'fecha',
    'fecha_logica',
    'total'
    ];


    

}
