<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pqr extends Model
{
    protected $table = 'pqrs';
    protected $fillable =[
	'correo', 'pqr_cor', 'tip_pqr','descripsion','fec_ini','fec_fin','estado ', 'activo', 'sucursal_id'
    ];
}
