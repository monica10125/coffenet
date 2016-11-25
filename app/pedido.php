<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class pedido extends Model
{
    protected $table="pedidos";
    protected $fillable=['tip_ped','descripcion','fecha','estado','user_id','precio_pedido'];

    public function user(){
        return $this->belongsTo('App\User');

    }
    public function factura(){
        return $this->hasOne('App\factura');

    }

    //crear la relacion con una factura quien lleva la llave foranea

    public function menus(){

        return $this->belongsToMany('App\menu')->withTimestamps();
    }


    public function pedidosUser($id){

        $query = DB::select('select * from pedidos where user_id = :id AND estado <> "0"', ['id' => $id]);

        return $query;

    }
}

