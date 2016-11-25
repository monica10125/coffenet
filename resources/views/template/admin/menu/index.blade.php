@extends('template.admin.mail')

@section('titulo','Lista de Menus')
@section('class6','active')
@section('contenido')
    <div id="custem-toolbar">
        <a class="btn btn-primary" href="{{ route('admin.menu.create') }}"><span class="glyphicon glyphicon-plus"></span> Crear Menu</a>
        <br>
        <br>
    </div>

    <div class="">
        <table class="table table-striped" data-toggle="table" data-height="500" data-sort-name="Id" data-sort-order="desc" data-show-columns="true"  data-show-toggle="true"  data-search="true" data-toolbar="#custem-toolbar" data-pagination="true" data-page-list="[1, 3, 5, 10, 20, 50, 100, 200]" data-page-size="5">
            <thead>
            <tr>
                <th data-field="Id"  data-halign="center" data-sortable="true" data-align="center">Id</th>
                <th data-field="Nombre"  data-halign="center" data-sortable="true" data-align="center">Nombre</th>
                <th data-field="Sucursal"  data-halign="center" data-sortable="true" data-align="center">sucursal</th>
                <th data-field="Precio"  data-halign="center" data-sortable="true" data-align="center">Precio</th>
                <th data-field="Foto"  data-halign="center" data-sortable="true" data-align="center">Foto</th>
                <th data-field="estado"  data-halign="center" data-sortable="true" data-align="center">Estado</th>

                <th data-field="Acción"  data-halign="center" data-sortable="true" data-align="center">Acción</th>
            </tr>
            </thead>
            <tbody>
            @foreach($menus as $menu )
                <tr>
                    <td class="text-center">{{ $menu->id }}</td>
                    <td>{{ $menu->nom_men}}</td>


                    <td class="text-center">
                        @foreach($sucursal as $suc)
                            @if($suc->id==$menu->sucursal_id)
                                {{ $suc->suc_dir }}
                            @endif
                        @endforeach

                    </td>
                    <td class="text-center">{!!$menu->precio!!}</td>

                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2  ">
                        <img class="col-xs-12 col-sm-12 col-md-12 col-lg-12    img-thumbnail" src="{{ asset('img/menu/'. $menu->foto) }}">
                    </td>
                    <td class="text-center">
                        @if($menu->estado==1)
                            <span class="label label-success">Activo</span>
                        @else
                            <span class="label label-danger">Inactivo</span>
                        @endif
                    </td>

                    <td class="text-center">
                        <div class="btn-group" role="group" aria-label="...">

                            <a href="{{route('admin.menu.edit',$menu->id)}}" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a href="{{route('admin.menus.destroy',$menu->id)}}" type="button" class="btn btn-danger" onclick="return confirm('¿Seguro que desea eliminiar a el producto {{$menu->nom_men}}?')"><span class="glyphicon glyphicon-trash"></span></a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection