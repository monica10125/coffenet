@extends('template.admin.mail')
@section('titulo','Vista de Sucursal '.$sucursal->suc_dir )
@section('class2','active')
@section('contenido')

	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
		<img class="col-xs-6 col-sm-6 col-md-6 col-lg-6 
		col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-3  img-thumbnail" src="{{ asset('img/sucursal/'.$sucursal->foto) }}">
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
		<div class="list-group">
			<div class="list-group-item ">
				<b class="list-group-item-heading">Direccion : </b> {{ $sucursal->suc_dir }}
			</div>
			
			<div class="list-group-item ">
				<b class="list-group-item-heading">Estado : </b> 
					@if($sucursal->estado==1)
	                    <span class="li li-success">Activo</span> 
	                @else
	                    <span class="li li-danger">Inactivo</span> 
	                @endif
				
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
		<a href="{{ route('admin.sucursales.index') }}"><span class="glyphicon glyphicon-list-alt"></span> Ver lista</a>
		</li>
		<li>
	{!! Form::open(['route'=>['admin.sucursales.update',$sucursal],'method'=>'PUT','class'=>'navbar-form navbar-left']) !!}
			     {!! Form::hidden('suc_dir',$sucursal->suc_dir) !!}
			     {!! Form::hidden('col_tex',$sucursal->col_tex) !!}
			     {!! Form::hidden('estado',1) !!}
			     <button class='btn btn-link'><span class="glyphicon glyphicon-eye-open"></span> Habilitar Sucursal</button>
		
	{!! Form::close() !!}
		</li>
		<li>	
	{!! Form::open(['route'=>['admin.sucursales.update',$sucursal],'method'=>'PUT','class'=>'navbar-form navbar-left']) !!}
			     {!! Form::hidden('suc_dir',$sucursal->suc_dir) !!}
			     {!! Form::hidden('col_tex',$sucursal->col_tex) !!}
			     {!! Form::hidden('estado',0) !!}
			     <button class='btn btn-link'><span class="glyphicon glyphicon-eye-close"></span> Inhabilitar Sucursal</button>
		
	{!! Form::close() !!}
		</li>
	</ul>
	</nav>
	</div>
@endsection