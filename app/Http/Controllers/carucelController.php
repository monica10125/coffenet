<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\baner;

use App\Sucursal;

class carucelController extends Controller
{
   public function index(Request $request){
     	$baner=Baner::orderBy('id','DESC')->Limit(5)->get();
     	 return view('welcome')
                ->with('baner',$baner); 
    }
    public function create(){
      
    }
    public function store(CrudBanerRequest $request){
       
    }
    public function show($id){
                    
       
    }
    public function edit($id){
               
    }
                    
    
    public function update(CrudBanerRequest $request, $id){
        
    }
    public function destroy($id){
    }	
}
