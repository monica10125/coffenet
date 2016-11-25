<?php

namespace App\Http\Controllers;

use App\factura;
use App\pedido;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use PDF;

class FacturasController extends Controller
{
    public function crearFactura($id){

       $user= Auth::user();
        $idPedido= $id;
        $pedido= pedido::find($idPedido);

        //variables
       $facturador= $user->usu_nom.' '.$user->usu_ape;
        $estado="1";
        $idsucursal= $user->id_suc;
        $fecha = date('Y/m/d h:i:s');
        $valor= $pedido->precio_pedido;
        $cambiodeestado="3";

        // argumentos que necesita la factura para ser creada

        $factura= new factura();
        $factura->valor= $valor;
        $factura->fec_fac= $fecha;
        $factura->estado= $estado;
        $factura->facturador=$facturador;
        $factura->sucursal_id= $idsucursal;
        $factura->pedido_id= $idPedido;

        // guarda la factura
       $factura->save();

// cambia el estado del pedido

        $pedido->estado=$cambiodeestado;
        $pedido->save();
        flash('se ha creado la factura para la orden '.$idPedido,'success');
        return redirect()->route('admin.pedidos.verPedidosAdmi');


    }

    public function eliminarOrden($id){

        $estado="0";
        $pedido= pedido::find($id);
        $pedido->estado= $estado;

        $pedido->save();

        flash::error('se ha eliminado la orden no. '.$pedido->id,'danger');
        return redirect()->route('admin.pedidos.verPedidosAdmi');


    }

    public function descargarFactura($id){


        $pedido = pedido::find($id);

         $userId= $pedido->user_id;

         $user= User::find($userId);
        $facturadirijida= $user->usu_nom. ' '. $user->usu_ape;
        $fechaSolicitud= $pedido->fecha;
        $factura=$pedido->factura;
        $facturador= $factura->facturador;
        $iva= 19;

        $valorPagar=$factura->valor;
        $subtotal= $factura->valor-($factura->valor*$iva/100);
        $menus= $pedido->menus;
        $menus=$menus->toArray();




        $datosFactura=['usuario'=>$facturadirijida,'fecha'=>$fechaSolicitud, 'facturador'=>$facturador, 'iva'=>$iva,'subtotal'=>$subtotal,
        'total'=>$valorPagar, 'consecutivo'=>$id];

        $pdf = PDF::loadView('template.cliente.pdfFactura',['factura'=>$datosFactura]);
        return $pdf->download('factura.pdf');


    // return view('template.cliente.pdfFactura')->with('factura',$datosFactura);



    }
}
