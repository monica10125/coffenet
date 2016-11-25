<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class novedad extends Model
{
   protected $table = 'novedades';
   protected $fillable= [
	'titulo', 'imagen', 'contenido', 'fec_cre',   'fec_eve',   'fec_fin', 'estado'     
  ];
}
