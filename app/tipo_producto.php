<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_producto extends Model
{
   protected  $table ='tipo_productos';
   protected  $fillable= [
 	'ti_pro','pro_iva',
  	'producto_id'

   ];

   public function producto(){
      return $this->belongsTo('App\producto');

   }
}
