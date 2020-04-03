<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallinero extends Model
{
    protected $table='gallineros';
    protected $primaryKey='idgallinero';
    public $incrementing=true;
    public $timestamps=false;

   
    protected $fillable=[
    'nombre',
    'observaciones',
    'cantidad',
    'status'
    ];
}
