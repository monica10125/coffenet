<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    protected $table= 'chats';
    protected $fillable= [
       
    'usu_cor', 'fecha', 'estado', 'mensaje', 'usuario_id'
    ];
   
}
