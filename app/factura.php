<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class factura extends Model
{
   protected  $table ='facturas';
   protected $fillable = [
 'fec_fac', 'facturador','estado' ,'sucursal_id','pedido_id','valor'
   ];

   public function sucursal(){
      return $this->belongsTo('App\Sucursal');

   }

   public function pedido(){

      return $this->belongsTo('App\pedido');
   }
}
