<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

//use App\Http\Controllers\Controller;
use App\Sucursal;

use App\Http\Requests\StoreSucurcalRequest;

use App\Http\Requests\UpdateSucurcalRequest;
use Illuminate\Support\Facades\DB;

class SucursalesControll extends Controller
{
    public function index(){
    		   		
        $sucursal = Sucursal::orderBy('id','DESC')->get();
        return view('template.admin.sucursales.index')->with('sucursal',$sucursal);		
    }
    public function create(){
    		   		
     return view('template.admin.sucursales.sucursal');	
    }
    public function store(StoreSucurcalRequest $requests){
         $sucursal= new Sucursal($requests->all());
         if ($requests->file('foto')) {
         // paso de imagenes 
            $file=$requests->file('foto');
            $name='sucursal_'.time().'.'.$file->getClientOriginalExtension();
            $path=public_path().'/img/sucursal/';
            $file->move($path,$name);
           // fin paso de imagenes
         $sucursal->foto=$name;    
         }
         $sucursal->save();
         flash('Se a registrado a '.$sucursal->suc_dir.' en forma exitosa','success');
        return redirect()->route('admin.sucursales.index');
    }
    public function show($id){
             $sucursal=Sucursal::findOrFail($id);         
        
        return view('template.admin.sucursales.show')
             ->with('sucursal',$sucursal); 
    		
    }
    public function edit($id){
          $sucursal=Sucursal::find($id);
          return view('template.admin.sucursales.edit')->with('sucursal',$sucursal);            
            
    }
    public function update(UpdateSucurcalRequest $request, $id){
          $sucursal=Sucursal::find($id);
          $sucursal->fill($request->all());
          if($request->file('foto')){
          // paso de imagenes 
            $file=$request->file('foto');
            $name='sucursal_'.time().'.'.$file->getClientOriginalExtension();
            $path=public_path().'/img/sucursal/';
            $file->move($path,$name);
           // fin paso de imagenes
          $sucursal->foto=$name;
          }
          $sucursal->save();         
         flash('Se a modificado a '.$sucursal->suc_dir.' en forma exitosa','warning');
          return redirect()->route('admin.sucursales.index');  
    }
    public function destroy($id){
    	  $sucursal=Sucursal::find($id);
          $sucursal->delete();
          flash('Se a borrado la sucursal '.$sucursal->suc_dir.' en forma exitosa','danger');
          return redirect()->route('admin.sucursales.index');
    		
    }




}
