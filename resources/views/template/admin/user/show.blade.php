@extends('template.admin.mail')
@section('titulo','Vista de Usuario '.$user->usu_nom.' '.$user->usu_ape )
@section('class2','active')
@section('contenido')

	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
		<img class="col-xs-6 col-sm-6 col-md-6 col-lg-6 
		col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-3  img-thumbnail" src="{{ asset('img/user/'.$user->correo.'/perfil/'.$user->usu_fot) }}">
	{!! Form::open(['route'=>['admin.usuarios.update',$user],'method'=>'PUT','class'=>'navbar-form navbar-left']) !!}

	{!! Form::close() !!}
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
		</div>
		
		
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
	<hr>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
		
	<nav class="navbar navbar-inverse">
		
	<ul class="nav navbar-nav">
		<li class="active">
		<a href="{{ route('admin.usuarios.index') }}"><span class="glyphicon glyphicon-list-alt"></span> Ver lista</a>
		</li>
		<li>
	{!! Form::open(['route'=>['admin.usuarios.update',$user],'method'=>'PUT','class'=>'navbar-form navbar-left']) !!}
			     {!! Form::hidden('correo',$user->correo) !!}
			     {!! Form::hidden('usu_nom',$user->usu_nom) !!}
			     {!! Form::hidden('usu_ape',$user->usu_ape) !!}
			     {!! Form::hidden('fec_nac',$user->fec_nac) !!}
			     {!! Form::hidden('roll',$user->roll) !!}
			     {!! Form::hidden('id_suc',$user->id_suc) !!}
			     {!! Form::hidden('estado',1) !!}
			     <button class='btn btn-link'><span class="glyphicon glyphicon-eye-open"></span> Habilitar Usuario</button>
		
	{!! Form::close() !!}
		</li>
		<li>	
	{!! Form::open(['route'=>['admin.usuarios.update',$user],'method'=>'PUT','class'=>'navbar-form navbar-left']) !!}
			     {!! Form::hidden('correo',$user->correo) !!}
			     {!! Form::hidden('usu_nom',$user->usu_nom) !!}
			     {!! Form::hidden('usu_ape',$user->usu_ape) !!}
			     {!! Form::hidden('fec_nac',$user->fec_nac) !!}
			     {!! Form::hidden('roll',$user->roll) !!}
			     {!! Form::hidden('id_suc',$user->id_suc) !!}
			     {!! Form::hidden('estado',0) !!}
			     <button class='btn btn-link'><span class="glyphicon glyphicon-eye-close"></span> Inhabilitar Usuario</button>
		
	{!! Form::close() !!}
		</li>
	</ul>
	</nav>
	</div>
@endsection