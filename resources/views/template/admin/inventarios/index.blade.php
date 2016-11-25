@extends('template.admin.mail')

@section('titulo','Lista de inventarios')
@section('class4','active')
@section('contenido')

    <div id="custem-toolbar">
        <a class="btn btn-primary" href="{{ route('admin.inventarios.create') }}"><span class="glyphicon glyphicon-plus"></span> Crear Inventario</a>
        <br>
        <br>
    </div>


    <div class="">
        <table class="table table-striped" data-toggle="table" data-height="500" data-sort-name="Id" data-sort-order="desc" data-show-columns="true"  data-show-toggle="true"  data-search="true" data-toolbar="#custem-toolbar" data-pagination="true" data-page-list="[1, 3, 5, 10, 20, 50, 100, 200]" data-page-size="5">
            <thead>
            <tr>
                <th data-field="Id"  data-halign="center" data-sortable="true" data-align="center">Id</th>
                <th data-field="Medida"  data-halign="center" data-sortable="true" data-align="center">Medida</th>
                <th data-field="Cantidad de productos"  data-halign="center" data-sortable="true" data-align="center">Cantidad de productos</th>
                <th data-field="Valor"  data-halign="center" data-sortable="true" data-align="center">Valor</th>
                <th data-field="Estado"  data-halign="center" data-sortable="true" data-align="center">Estado</th>
                <th data-field="Sucursal"  data-halign="center" data-sortable="true" data-align="center">Sucursal</th>

                <th data-field="Acción"  data-halign="center" data-sortable="true" data-align="center">Acción</th>
            </tr>
            </thead>
            <tbody>
            @foreach($inventario as $inventario)
                <tr>
                    <td class="text-center">{{ $inventario->id }}</td>
                    <td>{{ $inventario->medida }}</td>
                    <td class="text-center">{!! $inventario->cantidad !!}</td>
                    <td class="text-center">{!! $inventario->valor !!}</td>

                    <td class="text-center">
                        @if($inventario->estado==1)
                            <span class="label label-success">Activo</span>
                        @else
                            <span class="label label-danger">Inactivo</span>
                        @endif
                    </td>
                    <td class="text-center">
                        @foreach($sucursal as $sucursals)
                            @if($sucursals->id==$inventario->sucursal_id)
                                {{ $sucursals->suc_dir }}
                            @endif
                        @endforeach

                    </td>

                    <td class="text-center">
                        <div class="btn-group" role="group" aria-label="...">
                            <a href="{{route('admin.inventarios.show',$inventario->id)}}" type="button" class="btn btn-success"><span class="glyphicon glyphicon-eye-open"></span></a>
                            <a href="{{route('admin.inventarios.edit',$inventario->id)}}" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>

                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



@endsection