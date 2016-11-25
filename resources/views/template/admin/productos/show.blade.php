@extends('template.admin.mail')
@section('titulo','Vista de Producto '.$producto->nombre )
@section('class4','active')
@section('contenido')

	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
		<img class="col-xs-6 col-sm-6 col-md-6 col-lg-6
		col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-3  img-thumbnail" src="{{ asset('img/productos/'.$producto->foto) }}">
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
		<div class="list-group">
			<div class="list-group-item ">
				<b class="list-group-item-heading">Nombre : </b> {{ $producto->nombre }}
			</div>
			<div class="list-group-item ">
				<b class="list-group-item-heading">Valor : </b> $ {{ $producto->valor }}
			</div>
			<div class="list-group-item ">
				<b class="list-group-item-heading">Descripsión : </b>  {!! $producto->descripsion !!}
			</div>

			<div class="list-group-item ">
				<b class="list-group-item-heading">Unidades disponibles : </b>  {!! $producto->cantidades !!}
			</div>

			<div class="list-group-item ">
				<b class="list-group-item-heading">Estado : </b> 
					@if($producto->estado==1)
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
		<a href="{{ route('admin.productos.index') }}"><span class="glyphicon glyphicon-list-alt"></span> Ver lista</a>
		</li>
		<li>
	{!! Form::open(['route'=>['admin.productos.update',$producto],'method'=>'PUT','class'=>'navbar-form navbar-left']) !!}
			     {!! Form::hidden('nombre',$producto->nombre) !!}
			     {!! Form::hidden('valor',$producto->valor) !!}

				{!! Form::hidden('id_inventario',1) !!}
			     {!! Form::hidden('estado',1) !!}

				{!! Form::hidden('cantidades',$producto->cantidades)!!}
			     <button class='btn btn-link'><span class="glyphicon glyphicon-eye-open"></span> Habilitar Producto</button>
		
	{!! Form::close() !!}
		</li>
		<li>	
	{!! Form::open(['route'=>['admin.productos.update',$producto],'method'=>'PUT','class'=>'navbar-form navbar-left']) !!}
			     {!! Form::hidden('nombre',$producto->nombre) !!}
			     {!! Form::hidden('valor',$producto->valor) !!}
			{!! Form::hidden('id_inventario',1) !!}
			     {!! Form::hidden('estado',0) !!}
			{!! Form::hidden('cantidades',$producto->cantidades)!!}
			     <button class='btn btn-link'><span class="glyphicon glyphicon-eye-close"></span> Inhabilitar Producto</button>
		
	{!! Form::close() !!}
		</li>
	</ul>
	</nav>
	</div>
@endsection