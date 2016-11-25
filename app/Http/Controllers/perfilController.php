<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Sucursal;
use App\telefono;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdatePerfilRequests;

class perfilController extends Controller
{
     public function show($id){
                    
        $user=User::findOrFail($id);
        $sucursal=Sucursal::orderBy('id','ASC')->get();         
        $telefono=telefono::orderBy('id','ASC')->get();         
        
        return view('template.admin.user.perfil')
             ->with('sucursal',$sucursal) 
             ->with('telefono',$telefono) 
             ->with('user',$user);    
    }
    public function edit($id){
        $user=User::find($id); 
      $sucursal=Sucursal::orderBy('suc_dir','ASC')->get()->lists('suc_dir','id');         
       // dd($user->all());
        return view('template.admin.user.editPerfil')
              ->with('sucursal',$sucursal) 
              ->with('user',$user);            
    }
    
    public function update(UpdatePerfilRequests $request, $id){
          $usuario=User::find($id);
         $usuario->fill($request->all());
          if($request->password){
          $request->password=bcrypt($request->password); 
          $usuario->password=$request->password; 
          } 
          if($request->file('foto')){
           // paso de imagenes 
            $file=$request->file('foto');
             $name=$file->getClientOriginalName().'_'.$usuario->correo.'.'.$file->getClientOriginalExtension();
             $path=public_path().'/img/user/'.$usuario->correo.'/perfil/';
            $file->move($path,$name);
           // fin paso de imagenes
          $usuario->usu_fot=$name;    
          }
          $usuario->save();

          flash('Se a Actualisado a '.$usuario->usu_nom.' '.$usuario->usu_ape.' en forma exitosa','warning');
          return redirect()->route('admin.perfil.show',$usuario->id);
            
          //dd($id); 
    }
}
