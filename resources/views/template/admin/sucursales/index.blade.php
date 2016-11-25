@extends('template.admin.mail')

@section('titulo','Lista de Sucursales')
@section('class1','active')
@section('contenido')
    <div id="custem-toolbar">
    <a class="btn btn-primary" href="{{ route('admin.sucursales.create') }}"><span class="glyphicon glyphicon-plus"></span> Crear Sucursal</a>
   
    </div>
     
    <div class="">
   <table class="table table-striped" data-toggle="table" data-height="500" data-sort-name="Id" data-sort-order="desc" data-show-columns="true"  data-show-toggle="true"  data-search="true" data-toolbar="#custem-toolbar" data-pagination="true" data-page-list="[1, 3, 5, 10, 20, 50, 100, 200]" data-page-size="5">
          <thead>
            <tr>
              <th data-field="Id"  data-halign="center" data-sortable="true" data-align="center">Id</th>
              <th data-field="Direccin"  data-halign="center" data-sortable="true" data-align="center">Direccin</th>
              <th data-field="Color del texto"  data-halign="center" data-sortable="true" data-align="center">Color del texto</th>
              <th data-field="Estado"  data-halign="center" data-sortable="true" data-align="center">Estado</th>
              <th data-field="Foto"  data-halign="center" data-sortable="true" data-align="center">Foto</th>
              <th data-field="Acción"  data-halign="center" data-sortable="true" data-align="center">Acción</th>        
            </tr>
            </thead>
            <tbody>
               @foreach($sucursal as $sucursals)
               <tr>
                  <td class="text-center">{{ $sucursals->id }}</td>            
                  <td>{{ $sucursals->suc_dir }}</td>            
                  <td class="color text-center"><label class="{{$sucursals->col_tex}}">{{ $sucursals->col_tex }}</label></td>            
                  <td class="text-center">
                          @if($sucursals->estado==1)
                             <span class="label label-success">Activo</span> 
                          @else
                             <span class="label label-danger">Inactivo</span> 
                          @endif
                  </td>            
                  <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2  ">
                    <img class="col-xs-12 col-sm-12 col-md-12 col-lg-12    img-thumbnail" src="{{ asset('img/sucursal/'.$sucursals->foto) }}">
                  </td>            
                  <td class="text-center">     
                  <div class="btn-group" role="group" aria-label="...">
                       <a href="{{route('admin.sucursales.show',$sucursals->id)}}" type="button" class="btn btn-success"><span class="glyphicon glyphicon-eye-open"></span></a>
                       <a href="{{route('admin.sucursales.edit',$sucursals->id)}}" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                       <a href="{{route('admin.sucursales.destroy',$sucursals->id)}}" type="button" class="btn btn-danger" onclick="return confirm('¿Seguro que desea eliminiar a la sucursal {{ $sucursals->suc_dir}}?')"><span class="glyphicon glyphicon-trash"></span></a>
                     </div>
               </td>             
                  </tr>
               @endforeach
            </tbody>
   </table>
    </div>
       
@endsection