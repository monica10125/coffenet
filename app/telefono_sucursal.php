<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class telefono_sucursal extends Model
{
   protected $table ='telefonos_sucursales';
    protected $fillable =[
	  	 'numero',
		 'ext',
		 'sucursal_id'
     ];
     
    public function sucursales(){
        return $this->belongsTo('App\sucursal');
    }  
}
