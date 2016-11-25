<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateUserRequest extends Request
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
    {
        return [

            'usu_nom' => 'required|min:3|max:120',
            'usu_ape' => 'required|min:3|max:120',
            'password' => 'min:6|max:64',
            'fec_nac' => 'required',
            'roll' => 'required',
            'id_suc'=> 'required',
            'foto'=>'image'
        ];
    }
}
