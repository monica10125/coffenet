<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class producto extends Model
{
    protected $table ='productos';
    protected $fillable=[
 	'nombre',  'foto', 'descripsion', 'valor','estado','inventario_id','cantidades'

    ];
  /*  public function menus(){
    		 return $this->hasMany('App\menu');
     } ya que se cambio la relacion el metodo va ser modificado*/
    public function menus(){

        return $this->belongsToMany('App\menu')->withTimestamps();
    }
    //con este metodo se especifica la relacion pivote
    public function tipo_productos(){
        return $this->hasMany('App\tipo_producto');
     }
    public function inventario(){
        return $this->belongsTo('App\Inventario');
    }

    public function productosActivos(){
    $productos= DB::select('SELECT * FROM productos where productos.estado <> 0');
    return $productos;

    }
}
