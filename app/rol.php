<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    protected $table= 'rolles';
    protected $fillable= [
    'tip_rol',    
    'id_usu'

    ];
  public function usuarios(){
    		 return $this->belongsTo('App\usuario');
     } 
}
