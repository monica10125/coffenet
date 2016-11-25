<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Menu extends Controller
{
    //
     public function ver(){
    		   		
    		return view('template.admin.menu.menu');
    }
}