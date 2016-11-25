@extends('template.admin.mail')

@section('titulo','Lista de fotos baner')
@section('class5','active')
@section('tamaño-panel','col-md-8 col-md-offset-2 col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-2')
@section('contenido')
    <div id="botones">
    <a class="btn btn-primary" href="{{ route('admin.baner.create') }}"><span class="glyphicon glyphicon-plus"></span> Crear Imagen</a>
    
    </div>
     
    <div class="">
   <table class="table table-striped" data-toggle="table" data-height="500" data-sort-name="Fecha actualizacion" data-sort-order="desc" data-show-columns="true"  data-show-toggle="true"  data-search="true" data-toolbar="#botones" data-pagination="true" data-page-list="[1, 3, 5, 10, 20, 50, 100, 200]" data-page-size="5">
          <thead>
            <tr>
                  <th data-field="Id"  data-halign="center" data-sortable="true" data-align="center">Id</th>
                  <th data-field="Foto"  data-halign="center" data-sortable="true" data-align="center">Foto</th>     
                  <th data-field="Fecha actualizacion"  data-halign="center" data-sortable="true" data-align="center">Fecha actualizacion</th>     
                  <th data-field="Acción"  data-halign="center" data-sortable="true" data-align="center">Acción</th>      
            </tr>
            </thead>
            <tbody>
               @foreach($baner as $user)
               <tr>
                  <td>{{ $user->id }}</td>
                        <td class="col-xs-4 col-sm-4 col-md-4 col-lg-4  " ><img class="col-xs-12 col-sm-12 col-md-12 col-lg-12    img-thumbnail" src="{{ asset('/img/baner/'.$user->foto) }}"></td>
                  <td>{{ $user->updated_at }}</td>
                                      
                        <td class="text-center">
                           <div class="btn-group" role="group" aria-label="...">
                        
                       <a href="{{route('admin.baner.edit',$user->id)}}" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                       <a href="{{route('admin.baner.destroy',$user->id)}}" type="button" class="btn btn-danger" onclick="return confirm('¿Seguro que desea eliminiar la foto {{ $user->foto}}?')"><span class="glyphicon glyphicon-trash"></span></a>
                     </div>
               </td>             
                  </tr>
               @endforeach
            </tbody>
   </table>
    </div>
       
@endsection