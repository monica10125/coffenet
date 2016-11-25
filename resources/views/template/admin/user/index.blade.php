@extends('template.admin.mail')

@section('titulo','Lista de Usuarios')
@section('class2','active')
@section('tamaño-panel','col-md-12 col-xs-12 col-sm-12 col-lg-12')
@section('contenido')
    <div id="botones">
    <a class="btn btn-primary" href="{{ route('admin.usuarios.create') }}"><span class="glyphicon glyphicon-plus"></span> Crear Usuario</a>
    
    </div>
     
    <div class="">
   <table class="table table-striped" data-toggle="table" data-height="500" data-sort-name="Id" data-sort-order="desc" data-show-columns="true"  data-show-toggle="true"  data-search="true" data-toolbar="#botones" data-pagination="true" data-page-list="[1, 3, 5, 10, 20, 50, 100, 200]" data-page-size="5">
          <thead>
            <tr>
                  <th data-field="Id"  data-halign="center" data-sortable="true" data-align="center">Id</th>
                  <th data-field="Correo"  data-halign="center" data-sortable="true" data-align="center">Correo</th>
                  <th data-field="Nombre"  data-halign="center" data-sortable="true" data-align="center">Nombre</th>
                  <th data-field="Fecha nacimiento"  data-halign="center" data-sortable="true" data-align="center">Fecha nacimiento</th>
                  <th data-field="Foto"  data-halign="center" data-sortable="true" data-align="center">Foto</th>
                  <th data-field="Estado"  data-halign="center" data-sortable="true" data-align="center">Estado</th>
                  <th data-field="Sucursal"  data-halign="center" data-sortable="true" data-align="center">Sucursal</th>      
                  <th data-field="Rol"  data-halign="center" data-sortable="true" data-align="center">Rol</th>      
                  <th data-field="Acción"  data-halign="center" data-sortable="true" data-align="center">Acción</th>      
            </tr>
            </thead>
            <tbody>
               @foreach($users as $user)
               <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->correo}}</td>
                        <td>{{ $user->usu_nom}} {{ $user->usu_ape}}</td>
                        <td>{{ $user->fec_nac}}</td>
                        <td class="col-xs-1 col-sm-1 col-md-1 col-lg-1 " ><img class="col-xs-12 col-sm-12 col-md-12 col-lg-12    img-thumbnail" src="{{ asset('img/user/'.$user->correo.'/perfil/'.$user->usu_fot) }}"></td>
                        <td class="text-center">
                          @if($user->estado==1)
                             <span class="label label-success">Activo</span> 
                          @else
                             <span class="label label-danger">Inactivo</span> 
                          @endif
                       </td>
                        <td class="text-center">
                          @foreach($sucursal as $sucursals)
                              @if($sucursals->id==$user->id_suc)
                                {{ $sucursals->suc_dir }}
                              @endif
                          @endforeach
                          
                        </td>    
                                
                        @if($user->roll=="admin")              
                           <td><span class="label label-primary">{{$user->roll}}</span></td>
                        @elseif($user->roll=="empleado")             
                           <td><span class="label label-success">{{$user->roll}}</span></td>
                        @elseif($user->roll=="gerencia")
                           <td><span class="label label-warning">{{$user->roll}}</span></td>
                           @else 
                           <td><span class="label label-info">{{$user->roll}}</span></td>
                           
                        @endif               
                        <td class="text-center">
                           <div class="btn-group" role="group" aria-label="...">
                       <a href="{{route('admin.usuarios.show',$user->id)}}" type="button" class="btn btn-success"><span class="glyphicon glyphicon-eye-open"></span></a>
                        
                       <a href="{{route('admin.usuarios.edit',$user->id)}}" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                       <a href="{{route('admin.usuarios.destroy',$user->id)}}" type="button" class="btn btn-danger" onclick="return confirm('¿Seguro que desea eliminiar a el usuario {{ $user->usu_nom}}  {{ $user->usu_ape}}?')"><span class="glyphicon glyphicon-trash"></span></a>
                     </div>
               </td>             
                  </tr>
               @endforeach
            </tbody>
   </table>
    </div>
       
@endsection