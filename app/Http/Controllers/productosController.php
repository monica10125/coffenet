<?php

namespace App\Http\Controllers;


use Dompdf\Dompdf;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\producto;
use App\Inventario;
use App\Http\Requests\StoreProductoRequests;
use App\Http\Requests\UpdateProductoRequests;
use Illuminate\Support\Facades\App;
use Laracasts\Flash\Flash;
use PDF;



class productosController extends Controller
{
     public function index(){
    		   		
        $producto = producto::orderBy('id','DESC')->paginate(5);

         return view('template.admin.productos.index')->with('producto',$producto);
    }
    public function create(){
        //$inventario =Inventario::orderBy('id','DESC')->get()->lists('id','id');
       // $cantidades= [1,2,3,4,5,6,7,8,9,10];
     return view('template.admin.productos.producto');
         //->with('cantidades',$cantidades);
    }
    public function store(StoreProductoRequests $requests){
        $producto= new producto($requests->all());
        $producto->inventario_id= $requests->inventario;
        $var= $requests->cantidades;
        if($var <1) {
            flash::error('no se puede registrar un cantidad que sea menor a 1', 'danger');

            return redirect()->route('admin.productos.create');
        }   //es un objecto que tiene lo que se envia por medio de la vista


            if ($requests->file('foto')) {
                // paso de imagenes
                $file = $requests->file('foto');
                $name = 'producto_' . time() . '.' . $file->getClientOriginalExtension();
                $path = public_path() . '/img/productos/';
                $file->move($path, $name);
                // fin paso de imagenes
                $producto->foto = $name;
            }

        if ($var >= 1) {
            $idInventario= 1;
            $inventario=Inventario::find($idInventario);
            $pesocantidadProductos= $inventario->cantidad;
            $inventario->cantidad=$pesocantidadProductos+$producto->cantidades;
            $valorActual=$inventario->valor;
            $inventario->valor=$valorActual+($producto->valor *$producto->cantidades) ;


            $inventario->save();

            $producto->save();
            flash('Se a registrado a ' . $producto->nombre . ' en forma exitosa', 'success');
            return redirect()->route('admin.productos.index');
        }
        }
    public function show($id){
        $producto=producto::findOrFail($id);
        
        return view('template.admin.productos.show')
             ->with('producto',$producto);
    		
    }
    public function edit($id){

        $producto=producto::find($id);
        //$cantidades= [1,2,3,4,5,6,7,8,9,10];

        return view('template.admin.productos.edit')
            ->with('producto',$producto);
            //->with('cantidades',$cantidades);

    }
    public function update(UpdateProductoRequests $request, $id){

          $producto=producto::find($id);
          $producto->fill($request->all());



        $var= $request->cantidades;
        if($var <1) {
            flash::error('no se puede registrar un cantidad que sea menor a 1', 'danger');

            return redirect()->route('admin.productos.edit',$producto->id);
        }


        //$producto->cantidades= $request->cantidades+1;


          if($request->file('foto')){
          // paso de imagenes 
            $file=$request->file('foto');
            $name='producto_'.time().'.'.$file->getClientOriginalExtension();
            $path=public_path().'/img/productos/';
            $file->move($path,$name);
           // fin paso de imagenes
          $producto->foto=$name;
          }
        if($var >=1) {
            $idInventario= 1;
            $inventario=Inventario::find($idInventario);
            $pesocantidadProductos= $inventario->cantidad;
            $inventario->cantidad=$pesocantidadProductos+$request->cantidades;
            $valorActual=$inventario->valor;
            $inventario->valor=$valorActual+($request->valor *$request->cantidades) ;


            $inventario->save();
            $producto->save();
            flash('Se a modificado a ' . $producto->nombre . ' en forma exitosa', 'warning');
            return redirect()->route('admin.productos.index');
        }
    }
    public function destroy($id){
    	  $producto=producto::find($id);
          $producto->delete();
          flash::error('Se a borrado el producto '.$producto->nombre.' en forma exitosa','danger');
          return redirect()->route('admin.productos.index');
    		
    }

   public function generarPdf(){


       $productos= producto::all();
       $pdf = PDF::loadView('template.admin.productos.pdf',['productos'=>$productos]);
       return $pdf->download('productos.pdf');




    }

}
