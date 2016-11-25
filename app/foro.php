<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class foro extends Model
{
     protected $table ='foros';
     protected $fillable = [
 	'tema', 'fec_cre', 'fec_fin', 'estado'

     ];
}
