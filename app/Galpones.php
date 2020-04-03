<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galpones extends Model
{
    protected $table='usuarios';
    protected $primaryKey='nickname';
    public $incrementing=false;
    public $timestamps=false;

    protected $with=['rol'];//Muy importante

    protected $fillable=[
    'nickname',
    'nombres',
    'apellidop',
    'apellidom',
    'password',
    'id_rol',
    'foto'
    ];







     
}
