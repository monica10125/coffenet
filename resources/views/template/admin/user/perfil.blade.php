@extends('template.admin.mail')
@section('titulo','Vista de Usuario '.$user->usu_nom )
@section('class4','active')
@section('contenido')

	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
		<img class="col-xs-8 col-sm-8 col-md-8 col-lg-8 
		col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2  img-thumbnail" src="{{ asset('img/user/'.Auth::user()->correo.'/perfil/'.Auth::user()->usu_fot) }}">

		<button type="button" class="btn btn-default col-xs-8 col-sm-8 col-md-8 col-lg-8 
		col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2" data-toggle="modal" data-target="#newFoto"><span class="glyphicon glyphicon-pencil"></span> Actualizar foto de perfil</button>

		<!-- Modal -->
									<div class="modal fade" id="newFoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title" id="myModalLabel">Actualizar foto de perfil</h4>
									      </div>
									      <div class="modal-body">
									        {!! Form::open(['route'=>['admin.perfil.update',$user],'method'=>'PUT','files'=>true]) !!}
												<div class="form-group">
												     {!! Form::hidden('correo',$user->correo) !!} 
												     {!! Form::label('foto','Foto') !!} 
												     {!! Form::file('foto',['class'=>'form-control']) !!}
												</div>

												<div class="form-group">
												     {!! Form::submit('Guardar Cambios',['class'=>'btn btn-success']) !!}
												 </div>
											{!! Form::close() !!}
									      </div>
									      
									    </div>
									  </div>
									</div>

	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
		<div class="list-group">
			<div class="list-group-item ">
				<b class="list-group-item-heading">Correo : </b> {{ $user->correo }}
			</div>
			<div class="list-group-item ">
				<b class="list-group-item-heading">Nombre : </b> {{ $user->usu_nom }} {{ $user->usu_ape }}
			</div>
			<div class="list-group-item ">
				<b class="list-group-item-heading">Fecha de nacimiento : </b> {{ $user->fec_nac }}
			</div>
			<div class="list-group-item ">
				<b class="list-group-item-heading">Estado : </b> 
					@if($user->estado==1)
	                    <span class="li li-success">Activo</span> 
	                @else
	                    <span class="li li-danger">Inactivo</span> 
	                @endif
				
			</div>
			<div class="list-group-item ">
				<b class="list-group-item-heading">Rol : </b> {{ $user->roll }}
			</div>
			<div class="list-group-item ">
				<b class="list-group-item-heading">Sucursal : </b>
						 @foreach($sucursal as $sucursals)
                              @if($sucursals->id==$user->id_suc)
                                {{ $sucursals->suc_dir }}
                              @endif
                          @endforeach
			</div>
			<div class="list-group-item ">
				<b class="list-group-item-heading">Telefonos : </b>
				 		<ul>
						 @foreach($telefono as $telefonos)
                              @if($telefonos->id_usu==$user->id)
                               <li> {{ $telefonos->numero }} 
                               	<div class="btn-group" role="group" aria-label="...">
	                               	<button type="button" class="btn btn-default " data-toggle="modal" data-target="#myModal{{$telefonos->id}}"><span class="glyphicon glyphicon-pencil"></span></button>
	                               	<a href="{{route('admin.telefono.destroy',$telefonos->id)}}" type="button" class="btn btn-default" onclick="return confirm('¿Seguro que desea eliminiar a el producto {{ $telefonos->numero}}?')"><span class="glyphicon glyphicon-trash"></span></a>
	                            </div>   	
                               </li>

								<!-- Modal -->
									<div class="modal fade" id="myModal{{$telefonos->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title" id="myModalLabel">modificar telefono</h4>
									      </div>
									      <div class="modal-body">
									        @include('template.admin.user.telefonos.edit')
									      </div>
									      
									    </div>
									  </div>
									</div>


                              @endif
                          @endforeach
				 		</ul>
			</div>
		</div>
		
		
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
	<hr>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
		
	<nav class="navbar navbar-inverse">
		
	<ul class="nav navbar-nav">
		<li class="active">
		<a href="{{ route('admin.perfil.edit',$user->id) }}"><span class="glyphicon glyphicon-list-alt"></span> Editar Perfil</a>
		</li>
		<li><div class="navbar-form navbar-left">
				<button type="button" class="btn btn-link " data-toggle="modal" data-target="#myModal">
			  	Agregar Telefono
				</button>
			</div>
		</li>
	</ul>
	</nav>
	</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">agregar telefono</h4>
      </div>
      <div class="modal-body">
        @include('template.admin.user.telefonos.create')
      </div>
      
    </div>
  </div>
</div>

@endsection