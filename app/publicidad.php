<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class publicidad extends Model
{
    protected $table ='publicidades';
    protected $fillable =[ 
    'titulo   ',   
 	'imagen   ',   
 	'contenido', 
 	'fec_ini  ', 
 	'fec_fin  ', 
 	'estado   ',   
	'sucursal_id'
    ];
}
