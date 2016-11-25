<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table= 'usuarios';
    protected $fillable = [ 
                     'correo',
                     'usu_nom',
                     'usu_ape',
                     'password',
                     'fec_nac',
                     'usu_fot',
                     'logeo',
                     'estado',
                     'roll',
                     'id_suc'

     ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sucursales(){
        return $this->belongsTo('App\Sucursal');
    }
    public function telefonos(){
             return $this->hasMany('App\telefono');
     }
     public function scopeSearch($query,$name)
     {
        return $query->where('usu_nom','LIKE',"%$name%");
     }
    public function pedidos(){

        return $this->hasMany('App\pedido');

    }

}
