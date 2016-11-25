<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Sucursal;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
//use Laracasts\Flash\Flash;

class Users extends Controller
{
    //
    public function index(Request $request){
              
      $sucursal=Sucursal::orderBy('id','ASC')->get();         
      $user = User::orderBy('id','DESC')->get();
        return view('template.admin.user.index')
                ->with('sucursal',$sucursal) 
                ->with('users',$user);
    }
    public function create(){
      $sucursal=Sucursal::orderBy('suc_dir','ASC')->get()->lists('suc_dir','id');         
     return view('template.admin.user.usuario')
                  ->with('sucursal',$sucursal) ; 
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
        flash('Se a registrado a '.$usuario->usu_nom.''.$usuario->usu_ape.' en forma exitosa','success');
        return redirect()->route('admin.usuarios.index');
       /*
       */
    }
    public function show($id){
                    
        $user=User::findOrFail($id);
        $sucursal=Sucursal::orderBy('id','ASC')->get();         
        
        return view('template.admin.user.show')
             ->with('sucursal',$sucursal) 
             ->with('user',$user);    
    }
    public function edit($id){
        $user=User::find($id); 
        $sucursal=Sucursal::orderBy('suc_dir','ASC')->get()->lists('suc_dir','id');
       // dd($user->all());

        return view('template.admin.user.edit')
              ->with('sucursal',$sucursal) 
              ->with('user',$user);            
    }
                    
    
    public function update(UpdateUserRequest $request, $id){
          $usuario=User::find($id);
          
          $usuario->fill($request->all());
          if($request->password){
          $request->password=bcrypt($request->password); 
          $usuario->password=$request->password; 
          }
            if($request->file('usu_fot')){
           // paso de imagenes 
            $file=$request->file('usu_fot');
            $name=$file->getClientOriginalName().'_'.$usuario->correo.'.'.$file->getClientOriginalExtension();
            $path=public_path().'/img/user/'.$usuario->correo.'/perfil/';
            $file->move($path,$name);
           // fin paso de imagenes
          $usuario->usu_fot=$name;    
          }
            //dd($request->all());
            //dd($usuario->all());
          $usuario->save();

          flash('Se a modificado a '.$usuario->usu_nom.' '.$usuario->usu_ape.' en forma exitosa','warning');
          return redirect()->route('admin.usuarios.index');
            
          //dd($id); 
    }
    public function destroy($id){
        $usuario=User::find($id);
        $usuario->delete(); 
        flash('Se a borrado a el usuario '.$usuario->usu_nom.' '.$usuario->usu_ape.' en forma exitosa','danger');
        return redirect()->route('admin.usuarios.index');
    }

   

}
