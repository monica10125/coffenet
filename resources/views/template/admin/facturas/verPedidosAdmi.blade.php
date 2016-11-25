@extends('template.admin.mail')

@section('titulo','Gestion de pedidos')
@section('class7','active')
@section('contenido')




    <div class="col-xs-12">
        <table class="table table-striped" data-toggle="table" data-height="500" data-sort-name="Id" data-sort-order="desc" data-show-columns="true"  data-show-toggle="true"  data-search="true" data-toolbar="#custem-toolbar" data-pagination="true" data-page-list="[1, 3, 5, 10, 20, 50, 100, 200]" data-page-size="5">
            <thead>
            <tr>
                <th data-field="No_orden"  data-halign="center" data-sortable="true" data-align="center">No.Orden</th>
                <th data-field="Tipo"  data-halign="center" data-sortable="true" data-align="center">Tipo</th>
                <th data-field="FechaSolicitud"  data-halign="center" data-sortable="true" data-align="center">Fecha de Solicitud</th>
                <th data-field="Precio"  data-halign="center" data-sortable="true" data-align="center">Precio</th>
                <th data-field="Solicitante"  data-halign="center" data-sortable="true" data-align="center">Solicitante</th>
                <th data-field="Estado"  data-halign="center" data-sortable="true" data-align="center">Estado</th>
                <th data-field="Acción"  data-halign="center" data-sortable="true" data-align="center">Acción</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pedidos as $pedido)
                <tr>
                    <td class="text-center">{{ $pedido->id }}</td>
                    <td>{{ $pedido->tip_ped }}</td>
                    <td class="text-center">{!! $pedido->fecha!!}</td>
                    <td>{{ $pedido->precio_pedido }}</td>


                    <td class="text-center">
                        @foreach($usuarios as $usuario)
                            @if($usuario->id==$pedido->user_id)
                                {{ $usuario->usu_nom.' '.$usuario->usu_ape }}
                            @endif
                        @endforeach

                    </td>

                    <td class="text-center">
                        @if($pedido->estado==1)
                            <span class="label label-primary">Activo</span>
                        @endif
                        @if($pedido->estado==3)
                            <span class="label label-info">En Proceso</span>
                        @endif
                    </td>

                    <td class="text-center">

                        @if($pedido->estado!=3)
                        <div class="btn-group"  role="group">

                            <a href="{{route('admin.facturas.crearFactura',$pedido->id)}}" onclick="return confirm('¿está seguro de generar la factura?')" type="button" class="btn btn-default">Crear Factura</a>

                            <a href="{{route('admin.facturas.eliminarOrden',$pedido->id)}}" type="button" class="btn btn-danger" onclick="return confirm('¿está seguro de eliminar la solicitud actual?')"><span class="glyphicon glyphicon-trash"></span></a>


                        </div>

                           @else
                            <span class="label label-danger">Su orden no pude ser modificada</span>

                         @endif

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-right col-md-offset-10 col-xs-offset-10 col-sm-offset-10 col-lg-offset-10    col-md-2 col-xs-2 col-sm-2 col-lg-2">

    </div>
@endsection