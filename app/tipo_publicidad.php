<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_publicidad extends Model
{
   protected $table = 'tipo_publicidades';
   protected $fillable= [
	' tip_pub ', 
	' descripsion', 
	'publicidad_id'
	];
}
