<?php

namespace App\Http\Controllers;

use App\menu;
use App\producto;
use App\Sucursal;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Collection as Collection;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use Laracasts\Flash\Flash;

class MenuController extends Controller
{

    public function index(){

        //$producto = producto::orderBy('id','DESC')->paginate(5);
     $menus= menu::where('estado',1)->get()->sortBy('id');
        $sucursal= Sucursal::orderBy('id','DESC')->get();
        return view('template.admin.menu.index')
            ->with('menus',$menus)
            ->with('sucursal',$sucursal);
    }
    public function create(){
        //$inventario =Inventario::orderBy('id','DESC')->get()->lists('id','id');
        // $cantidades= [1,2,3,4,5,6,7,8,9,10];

        //$objproducto= new producto();
        $objsucursal= new Sucursal();

        //$productos= $objproducto->productosActivos();
        $producto =producto::where('estado',1)->get()->lists('nombre','id');



        $sucursales=$objsucursal->retonarSucursalesActivas();

        $sucursal= Collection::make($sucursales)->lists('suc_dir','id');





       return view('template.admin.menu.menu')
           ->with('producto',$producto)
           ->with('sucursal',$sucursal);

    }

    public function store(StoreMenuRequest $requests){
        $valorT=0;
        $menu= new menu($requests->all());
        $menu->sucursal_id= $requests->sucursal;

        if ($requests->file('foto')) {
            // paso de imagenes
            $file = $requests->file('foto');
            $name = 'menu_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/img/menu/';
            $file->move($path, $name);
            // se va a mover la imagen a l fichero que definimos
            // fin paso de imagenes
            $menu->foto = $name;
        }



        $ids=$requests->producto;




      for($i=0; $i< count($ids); $i++ ){

        $listadeproductos[$i]= producto::find($ids[$i]);


        $valor=$listadeproductos[$i]->valor+$valorT;

        $valorT= $valor;

      }
        $menu->precio= $valorT;

       $menu->save();

        $menu->productos()->sync($requests->producto);






            flash('Se a registrado el menu ' . $menu->nom_men . ' en forma exitosa', 'success');
            return redirect()->route('admin.menu.index');

    }
    public function show($id){
      /*  $producto=producto::findOrFail($id);

        return view('template.admin.productos.show')
            ->with('producto',$producto);
*/
    }
    public function edit($id){

        $menu= menu::find($id);
        $miproductos= $menu->productos->lists('id')->Toarray();

        $objsucursal= new Sucursal();

        $producto =producto::where('estado',1)->get()->lists('nombre','id');

        $sucursales=$objsucursal->retonarSucursalesActivas();
        $sucursal= Collection::make($sucursales)->lists('suc_dir','id');

        return view('template.admin.menu.edit')
            ->with('menu',$menu)
            ->with('sucursal',$sucursal)
            ->with('producto',$producto)
            ->with('miproductos',$miproductos);
        //->with('cantidades',$cantidades);

    }
    public function update(UpdateMenuRequest $request, $id){

        $valorT=0;
        $menu=menu::find($id);

        $menu->fill($request->all());
        $menu->sucursal_id= $request->sucursal;



        if($request->file('foto')){
            // paso de imagenes
            $file=$request->file('foto');
            $name='menu_'.time().'.'.$file->getClientOriginalExtension();
            $path=public_path().'/img/menu/';
            $file->move($path,$name);
            // fin paso de imagenes
            $menu->foto=$name;
        }

        $ids=$request->producto;
        for($i=0; $i< count($ids); $i++ ){
            $listadeproductos[$i]= producto::find($ids[$i]);

            $valor=$listadeproductos[$i]->valor+$valorT;

            $valorT= $valor;

        }

        $menu->precio= $valorT;
          $menu->save();
        $menu->productos()->sync($request->producto);

           flash('Se a modificado el menú ' . $menu->nom_men. ' en forma exitosa', 'warning');
            return redirect()->route('admin.menu.index');

    }
    public function destroy($id){
        $menu=menu::find($id);
        $menu->estado= '0';

        $menu->save();

        flash::error('Se a borrado el menú '.$menu->nom_men.' en forma exitosa','danger');
        return redirect()->route('admin.menu.index');

    }

}
