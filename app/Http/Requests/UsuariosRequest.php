<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'nickname'=>'required|max:30',
            'nombres'=>'required|max:50',

            'apellidop'=>'max:50',
            'apellidom'=>'max:50',

            'password'=>'required|max:10',
            'id_rol'=>'required',

            'foto'=>'max:30'
        ];
    }
}
