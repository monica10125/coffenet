<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CrudBanerRequest;
use App\baner;

class banerController extends Controller
{
   public function index(Request $request){
      $baner=Baner::orderBy('updated_at','DESC')->get();        
      	return view('template.admin.baner.index')
      	->with('baner',$baner);
    }
    public function create(){
       return view('template.admin.baner.baner');
    }
    public function store(CrudBanerRequest $request){
       $baner= new Baner($request->all()); 
        
        if($request->file('foto')){
        // paso de imagenes 
            $file=$request->file('foto');
            $name=$file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
            $path=public_path().'/img/baner/';
            $file->move($path,$name);
        // fin paso de imagenes
        $baner->foto=$name;    
        } 
        //dd($request->all());
        $baner->save();
        flash('Se a registrado la foto '.$baner->foto.' en forma exitosa','success');
        return redirect()->route('admin.baner.index');
    }
    public function show($id){
                    
       
    }
    public function edit($id){
        $user=Baner::find($id); 
     
        return view('template.admin.baner.edit')
              ->with('baner',$user);          
    }
                    
    
    public function update(CrudBanerRequest $request, $id){
         $baner=Baner::find($id); 
         $baner->fill($request->all());
        if($request->file('foto')){
        // paso de imagenes 
            $file=$request->file('foto');
            $name=$file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
            $path=public_path().'/img/baner/';
            $file->move($path,$name);
        // fin paso de imagenes
        $baner->foto=$name;    
        } 
        //dd($request->all());
        $baner->save();
        flash('Se a modificado la foto '.$baner->foto.' en forma exitosa','warning');
        return redirect()->route('admin.baner.index'); 
    }
    public function destroy($id){
    	$baner=Baner::find($id);
        $baner->delete(); 
        flash('Se a borrado la foto '.$baner->foto.' en forma exitosa','danger');
        return redirect()->route('admin.baner.index');
    }
}
