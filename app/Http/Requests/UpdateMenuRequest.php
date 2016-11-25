<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateMenuRequest extends Request
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
            'nom_men'=>'min:3|max:70|required',
            'sucursal'=>'required',
            'foto'=>'image',
            'producto'=>'required'
        ];
    }
}
