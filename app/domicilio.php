<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class domicilio extends Model
{
    protected $table = 'domicilios';
    protected $fillable=[
    'dom_dir', 'pedido_id'

    ];
}
