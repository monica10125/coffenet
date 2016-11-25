<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class historico_galeria extends Model
{
    protected $table= 'historico_galerias';
    protected $fillable= [

'tip_arc', 'archivo','nombre ','carpeta','fec_cre','estado ', 'id_usu'

];

}
