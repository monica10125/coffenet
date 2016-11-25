<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Http\Requests\StoreUserRequest;
class registroUser extends Controller
{
    //
     public function create(){
            
     return view('template.admin.auth.registro'); 
    }
    public function store(StoreUserRequest $request){
        $usuario= new User($request->all()); 
        $usuario->password=bcrypt($request->clave); 
        $usuario->id_suc=$request->sucursal; 
        $usuario->usu_nom=$request->nombre; 
        $usuario->usu_ape=$request->apellidos; 
        $usuario->fec_nac=$request->fecha_de_nacimiento; 
        if($request->file('usu_fot')){
        // paso de imagenes 
            $file=$request->file('usu_fot');
            $name=$file->getClientOriginalName().'_'.$usuario->correo.'.'.$file->getClientOriginalExtension();
             $path=public_path().'/img/user/'.$usuario->correo.'/perfil/';
            $file->move($path,$name);
        // fin paso de imagenes
        $usuario->usu_fot=$name;    
        } 
        $usuario->save();
        flash('Se a registrado a '.$usuario->usu_nom.' '.$usuario->usu_ape.' en forma exitosa ya puede iniciar sesion','success');
        return redirect()->route('admin.auth.login');
       /*
       */
    }
}
