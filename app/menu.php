<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
protected $table = 'menus';	
protected $fillable = [
'nom_men', 'sucursal_id','precio','foto','estado'
];  
public function sucursales(){
        return $this->belongsTo('App\sucursal');
    }

    public function productos(){
        return $this->belongsToMany('App\producto')->withTimestamps();
    }

    //se hace el cambio ya que ahora es una relacion de muchos a muchos
//public function productos(){
  //      return $this->belongsTo('App\producto');
    //}
    //esta relacion ya no aplica de esa forma ya que es una tabla pivote
public function pedidos(){
    return $this->belongsToMany('App\pedido')->withTimestamps();
}


}
