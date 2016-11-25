<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreTelefonoRequest;

use App\telefono;

class telefonoController extends Controller
{
    /*
    */
     public function index(){
    		   		
        $sucursal = telefono::orderBy('id','DESC')->paginate(5);
        return view('template.admin.sucursales.index')->with('sucursal',$sucursal);		
    }
    public function create(){
    
    }
    public function store(StoreTelefonoRequest $requests){
         $telefono= new telefono($requests->all());
         $telefono->save();
         flash('Se a registrado el telefono '.$telefono->numero,'success');
        return redirect()->route('admin.perfil.show',$telefono->id_usu);
    }
    /*
    public function show($id){
             $sucursal=Sucursal::findOrFail($id);         
        
        return view('template.admin.sucursales.show')
             ->with('sucursal',$sucursal); 
    		
    }
    public function edit($id){
          $sucursal=Sucursal::find($id);
          return view('template.admin.sucursales.edit')->with('sucursal',$sucursal);            
            
    }
    */
    public function update(StoreTelefonoRequest $request, $id){
          $telefono=telefono::find($id);
          $telefono->fill($request->all());
          $telefono->save();         
         flash('Se a modificado el telefono '.$telefono->numero,'warning');
          return redirect()->route('admin.perfil.show',$telefono->id_usu);  
    }
    public function destroy($id){
    	  $telefono=telefono::find($id);
          $telefono->delete();
          flash('Se a borrado el telefono '.$telefono->numero,'danger');
          return redirect()->route('admin.perfil.show',$telefono->id_usu);
    		
    }
}
