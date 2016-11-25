<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class respuesta extends Model
{
    protected $table ='respuestas';
    protected $fillable= [
  	'responsable',                   
	'fec_rec    ',  
	'fec_res    ',  
	'respuesta  ',  
	'pqr_id     '

    ];
}
