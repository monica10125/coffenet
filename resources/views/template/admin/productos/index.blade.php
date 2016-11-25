@extends('template.admin.mail')

@section('titulo','Lista de Productos')
@section('class3','active')
@section('contenido')
    <div id="custem-toolbar">
        <a class="btn btn-primary" href="{{ route('admin.productos.create') }}"><span class="glyphicon glyphicon-plus"></span> Crear Producto</a>
        <br>
        <br>
    </div>

    <div id="custem-toolbar">
        <a class="btn btn-danger" href="{{ route('admin.pdf') }}"><span class="glyphicon glyphicon-plus"></span> Generar PDF</a>
        <br>
        <br>
    </div>
     
    <div class="">
   <table class="table table-striped" data-toggle="table" data-height="500" data-sort-name="Id" data-sort-order="desc" data-show-columns="true"  data-show-toggle="true"  data-search="true" data-toolbar="#custem-toolbar" data-pagination="true" data-page-list="[1, 3, 5, 10, 20, 50, 100, 200]" data-page-size="5">
          <thead>
            <tr>
              <th data-field="Id"  data-halign="center" data-sortable="true" data-align="center">Id</th>
              <th data-field="Nombre"  data-halign="center" data-sortable="true" data-align="center">Nombre</th>
              <th data-field="Descripsion"  data-halign="center" data-sortable="true" data-align="center">Descripsion</th>
              <th data-field="Foto"  data-halign="center" data-sortable="true" data-align="center">Foto</th>
              <th data-field="Estado"  data-halign="center" data-sortable="true" data-align="center">Estado</th>
              <th data-field="Valor"  data-halign="center" data-sortable="true" data-align="center">Valor</th>
                <th data-field="Stock"  data-halign="center" data-sortable="true" data-align="center">Stock
              <th data-field="Acción"  data-halign="center" data-sortable="true" data-align="center">Acción</th>
            </tr>
            </thead>
            <tbody>
               @foreach($producto as $productos)
               <tr>
                  <td class="text-center">{{ $productos->id }}</td>            
                  <td>{{ $productos->nombre }}</td>            
                  <td class="text-center">{!! $productos->descripsion !!}</td>            
                  <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2  ">
                    <img class="col-xs-12 col-sm-12 col-md-12 col-lg-12    img-thumbnail" src="{{ asset('img/productos/'.$productos->foto) }}">
                  </td>            
                  <td class="text-center">
                          @if($productos->estado==1)
                             <span class="label label-success">Activo</span> 
                          @else
                             <span class="label label-danger">Inactivo</span> 
                          @endif
                  </td>            
                  <td>$ {{ $productos->valor }}</td>
                   <td>{{ $productos->cantidades }}</td>
                   <td class="text-center">
                  <div class="btn-group" role="group" aria-label="...">
                       <a href="{{route('admin.productos.show',$productos->id)}}" type="button" class="btn btn-success"><span class="glyphicon glyphicon-eye-open"></span></a>
                       <a href="{{route('admin.productos.edit',$productos->id)}}" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                       <a href="{{route('admin.productos.destroy',$productos->id)}}" type="button" class="btn btn-danger" onclick="return confirm('¿Seguro que desea eliminiar a el producto {{ $productos->nombre}}?')"><span class="glyphicon glyphicon-trash"></span></a>
                     </div>
               </td>             
                  </tr>
               @endforeach
            </tbody>
   </table>
    </div>
       <div class="text-right col-md-offset-10 col-xs-offset-10 col-sm-offset-10 col-lg-offset-10    col-md-2 col-xs-2 col-sm-2 col-lg-2">
         {!!$producto->render()!!}
       </div>
@endsection