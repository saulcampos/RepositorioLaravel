<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    
	protected $table='servicios';
    protected $primaryKey='idservicio';
    public $incrementing=true;
    public $timestamps=false;

    

    protected $fillable=[
    'nombre',
    'descripcion',
    'status'
    ];


}
