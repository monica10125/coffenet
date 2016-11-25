<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventarios';
    protected $fillable =[
   'medida', 'cantidad','peso','valor','estado','sucursal_id'
    ];
    public function sucursal(){
        return $this->belongsTo('App\Sucursal');
    }

    public function productos(){
        return $this->hasMany('App\producto');
    }


}          