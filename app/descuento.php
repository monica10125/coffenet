<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class descuento extends Model
{
protected $table ='descuentos';
protected  $fillable =[

'estado', 'can_des','publicidad_id','factura_id'
];
}
