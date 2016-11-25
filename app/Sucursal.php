<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Sucursal extends Model
{
    protected $table ='sucursales';
    protected $fillable =[
	 'suc_dir',
	 'col_tex',
	 'estado',
	 'foto'
     ];

    
    public function usuarios(){
    		 return $this->hasMany('App\User');
     }
    public function telefonos_sucursales(){
    		 return $this->hasMany('App\telefono_sucursal');
     }
    public function menus(){
    		 return $this->hasMany('App\menu');
     }

    public function facturas(){
        return $this->hasMany('App\factura');

    }

    public function inventarios(){

        return $this->hasMany('App\inventario');
    }

    public function retonarSucursales(){
       //$query= DB::select('SELECT * FROM sucursales WHERE sucursales.id <> 1');
        $query= DB::table('sucursales')->where('id', '<>', 1)->get();
        return $query;

    }



    public function retonarSucursalesActivas(){
        //$query= DB::select('SELECT * FROM sucursales WHERE sucursales.id <> 1');
        $query= DB::table('sucursales')->where('estado', '=', 1)->get();
        return $query;

    }


}
