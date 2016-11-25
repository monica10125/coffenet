<?php

namespace App\Http\Controllers;

use App\menu;
use App\pedido;
use App\Sucursal;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;
use Illuminate\Database\Eloquent\Collection;

use DateTime;

class PedidosController extends Controller
{

 public $arreglo= array();



    public function index(){



        $menus= menu::where('estado',1)->get();


        return view('template.cliente.solicitarpedido')->with('menus',$menus);

    }
    public function create($id){


        $menu= menu::find($id);
        return view('template.cliente.index')
            ->with('menu',$menu);


    }


    public function store(Request $request){


        $descripsion= "domicilio Presencial";
        $tipo="domicilio";
        $estado= $request->estado;
        $idMenu=(int)$request->idmenu;
        $precio= $request->precio;
        $fecha = date('Y/m/d h:i:s');
        $userid= Auth::user()->id;

        $pedido= new pedido();
        $pedido->tip_ped=$tipo;
        $pedido->descripcion= $descripsion;
        $pedido->fecha= $fecha;
        $pedido->estado=$estado;
        $pedido->user_id=$userid;
        $pedido->precio_pedido=$precio;

        $array= array($idMenu);



       $pedido->save();

        $pedido->menus()->sync($array);
        flash('Se ha registrado de manera correcta su orden puede visualizar el estado de la solicitud en la opción de mis pedidos', 'info');
        return redirect()->route('cliente.pedidos.index');





    }

    public function show($id){

        $indice=0;



        $menu=menu::findOrFail($id);
        $productos= $menu->productos()->lists('nombre');
        $productosdescripcion= $menu->productos()->lists('descripsion');
        $sucursal= Sucursal::find($menu->sucursal_id)->suc_dir;
        $menusel= Session::get('users');

        if(!empty($menusel)){


            for($i=0; $i<count($menusel); $i++){

              $this->arreglo[$i]= $menusel[$i]['precioTotal'];



            }

            if(!empty($this->arreglo)) {
            $precioTotal=array_sum($this->arreglo);

            }


                return view('template.cliente.show')
                ->with('menu',$menu)
                ->with('productos',$productos)
                ->with('productosdescripcion',$productosdescripcion)
                ->with('sucursal',$sucursal)
                ->with('menusel',$menusel)->with('precioTotal',$precioTotal);
        }







            // $contador=count($this->arreglo)


        return view('template.cliente.show')
            ->with('menu',$menu)
            ->with('productos',$productos)
            ->with('productosdescripcion',$productosdescripcion)
            ->with('sucursal',$sucursal);
            //->with('contador',$contador);



    }

    public function retonarPrecio( Request $request)
    {





        if(!empty(Session::get('users'))){

            $contadoor=count(Session::get('users'));

            $idmenu = (int)$request->menu;
            $cantidad = $request->cantidad;
            $menu = menu::find($idmenu);
            $nombreMenu = $menu->nom_men;
            $precio = $menu->precio;


            $total = $cantidad * $precio;


            $shopCart=['menu' => $idmenu, 'nom_men' => $nombreMenu, 'cantidad' => $cantidad, 'precioTotal' => $total];
            $menu=Session::get('users');
            $menu= array_add($menu,$contadoor,$shopCart);
            Session::set('users', $menu);

            return redirect()->route('cliente.pedidos.show', $idmenu);


        }
        else {


            $idmenu = (int)$request->menu;
            $cantidad = $request->cantidad;
            $menu = menu::find($idmenu);
            $nombreMenu = $menu->nom_men;
            $precio = $menu->precio;


            $total = $cantidad * $precio;

            $shopCart = ['menu' => $idmenu, 'nom_men' => $nombreMenu, 'cantidad' => $cantidad, 'precioTotal' => $total];

            $request->session()->push('users', $shopCart);
            $menusel = Session::get('users');





            return redirect()->route('cliente.pedidos.show', $idmenu);
        }


    }




    public function solicitarDomicilio( Request $request)
    {

        $idMenus = array();
        $arreglo2= array();
        $hacerProceso= false;

        $menusel = Session::get('users');

       if (!empty($menusel)) {


           for ($i = 0; $i < count($menusel); $i++) {

                $arreglo2[$i] = $menusel[$i]['precioTotal'];
                $idMenus[$i] = $menusel[$i]['menu'];


            }

            if (!empty($arreglo2)) {
                $precioTotal = array_sum($arreglo2);
                $hacerProceso= true;
            }

                if (!empty($idMenus)) {


                    $hacerProceso= true;

                }


           if($hacerProceso){

               $descripsion= "domicilio Presencial";
               $tipo="domicilio";
               $estado= "1";
               $precio= $precioTotal;
               $fecha = date('Y/m/d h:i:s');
               $userid= Auth::user()->id;

               $pedido= new pedido();
               $pedido->tip_ped=$tipo;
               $pedido->descripcion= $descripsion;
               $pedido->fecha= $fecha;
               $pedido->estado=$estado;
               $pedido->user_id=$userid;
               $pedido->precio_pedido=$precio;


             $pedido->save();
               $pedido->menus()->sync($idMenus);
               $request->session()->forget('users');


               flash('Se ha registrado de manera correcta su orden puede visualizar el estado de la solicitud en la opción de mis pedidos', 'info');
               return redirect()->route('cliente.pedidos.index');






           }



            }

        }


        public function destroyMenu( Request $request){



            $request->session()->forget('users');


            flash::error('su orden ha sido eliminada', 'danger');

           return redirect()->route('cliente.pedidos.index');






        }


    public function verPedidos(){

        $userid= Auth::user()->id;
        $pedido= new pedido();
        $pedidos=$pedido->pedidosUser($userid);



        $collection = Collection::make($pedidos);
        $pedidos= $collection->sortBy('id');

        $pedidos=$pedidos->values()->all();


       return view('template.cliente.verpedidos')
           ->with('pedidos',$pedidos);



    }

    public function verPedidosAdmi(){


        $pedidos= pedido::where('estado','<>',0)->get();

        $users= User::orderBy('id','ASC')->get();

        return view('template.admin.facturas.verPedidosAdmi')
            ->with('pedidos',$pedidos)
            ->with('usuarios',$users);



    }

    public function eliminarPedido($id){



        $estado="0";
        $pedido= pedido::find($id);
        $pedido->estado= $estado;

        $pedido->save();

        flash::error('se ha eliminado la orden no. '.$pedido->id,'danger');
        return redirect()->route('cliente.pedidos.verPedidos');

        //$fechapedido =$pedido->fecha;




    }







}

// hay que validar que la desde la fecha actual y la fecha del pedido no haiga un lapzo menor a 10 horas
  /*$fechaactual = new DateTime(date('Y/m/d h:i:s'));
  $fechapedido= new DateTime($fechapedido);


  $interval = $fechaactual->diff($fechapedido);
dd( $interval->format('"%H" horas')); */