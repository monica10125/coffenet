<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreUserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {    $hoy = date('Y/m/d');
        $fechamax= '2006/01/01';
        return [
            'correo' => 'required|email|unique:usuarios',
            'nombre' => 'required|min:3|max:120',
            'apellidos' => 'required|min:3|max:120',
            'clave' => 'required|min:6|max:64',
            'fecha_de_nacimiento' =>'before:hoy|before:fechamax|required',
            'roll' => 'required',
            'sucursal'=> 'required'

        ];
    }
}
