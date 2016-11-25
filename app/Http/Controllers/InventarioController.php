<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Sucursal;

use Illuminate\Support\Collection as Collection;
use App\Http\Requests\StoreInventariosRequest;
use App\Inventario;
 use Laracasts\Flash\Flash;


class InventarioController extends Controller
{
    public function index(){
        $inventario=Inventario::orderBy('id','DESC')->get();
        $sucursal=Sucursal::orderBy('id','ASC')->get();
        return view('template.admin.inventarios.index')
            ->with('inventario',$inventario)
            ->with('sucursal',$sucursal);

    }
    public function create(){
        $objsucursal= new Sucursal();


     $sucursal1= $objsucursal->retonarSucursales();
        $sucursal = Collection::make($sucursal1)->lists('suc_dir','id');






       // $sucursal=Sucursal::orderBy('suc_dir','ASC')->get()->lists('suc_dir','id');
       // foreach($sucursal2 as $suc){
        //  $sucursal= array($suc->suc_dir);
        //  }

      return view('template.admin.inventarios.create')
          ->with('sucursal',$sucursal);



    }

    public function store( StoreInventariosRequest $request){

        $inventario= new Inventario($request->all());
        $inventario->sucursal_id= $request->sucursal;
        $inventario->save();
        flash('Se a registrado a el inventario' .$inventario ->id . ' en forma exitosa', 'success');
        return redirect()->route('admin.inventarios.index');


    }

    public function show($id){
        /* mostrar un inventario en especifico */

        $sucursal=Sucursal::orderBy('id','ASC')->get();
        $inventario=Inventario::findOrFail($id);

        return view('template.admin.inventarios.show')
            ->with('inventario',$inventario)
            ->with('sucursal',$sucursal);

    }
    public function edit($id){

        $inventario=Inventario::find($id);
        $sucursal=Sucursal::orderBy('suc_dir','ASC')->get()->lists('suc_dir','id');
        // dd($user->all());

        return view('template.admin.inventarios.edit')
            ->with('sucursal',$sucursal)
            ->with('inventario',$inventario);


    }

    public function update(StoreInventariosRequest $request,$id){
        $inventario = Inventario::find($id);

        $inventario->fill($request->all());
        $inventario->sucursal_id= $request->sucursal;
        $inventario->save();
        flash('Se ha actualizado el inventario no. ' .$inventario ->id . ' en forma exitosa', 'success');
        return redirect()->route('admin.inventarios.index');

        /* cargar los datos y asi poder editarlos  */

    }

    public function destroy($id){

        if($id ==1){

            return redirect()->route('admin.inventarios.index');
        }else{
            $inventario = Inventario::find($id);
            $inventario->estado='0';

            flash::error('Se a borrado el inventario '.$inventario->id.' en forma exitosa','danger');
            return redirect()->route('admin.inventarios.index');

        }



    }


}
