<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class telefono extends Model
{
   protected $table = 'telefonos';
   protected $fillable = [
	'numero'  , 
 	'estado'  , 
 	'id_usu'  

  
   ];
  public function usuarios(){
    		 return $this->belongsTo('App\usuario');
     } 
}
