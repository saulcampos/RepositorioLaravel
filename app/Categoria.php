<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
	protected $table='categorias';
    protected $primaryKey='idcategoria';
    public $incrementing=true;
    public $timestamps=false;

    protected $fillable=[
    'nombre',
    'descripcion',
    'status'
    ];


}
