@extends('template.admin.mail')

@section('titulo','Editar Producto '.$producto->nombre)
@section('class3','active')
@section('contenido')

	 {!! Form::open(['route'=>['admin.productos.update',$producto],'method'=>'PUT','files'=>true]) !!}
			
			<div class="form-group">
			     {!! Form::label('nombre','Nombre') !!}
			     {!! Form::text('nombre',$producto->nombre,['class'=>'form-control','placeholder'=>'Nombre...','required']) !!}   
			</div>
			<div class="form-group">
			     {!! Form::label('descripsion','Descripsion') !!}
			     {!! Form::textarea('descripsion',$producto->descripsion,['class'=>'form-control textarea','placeholder'=>'...','required']) !!}   
			</div>
			<div class="form-group">
			     {!! Form::label('valor','Valor') !!}
			     <div class="input-group ">
			     <span class="input-group-addon" id="sizing-addon1">$</span>
			     {!! Form::number('valor',$producto->valor,['class'=>'form-control','placeholder'=>'0.00','required']) !!}   
				 </div>
			</div>


	 <div class="form-group">


		 {!! Form::hidden('estado',1) !!}
		 {!! Form::hidden('id_inventario',1) !!}

	 </div>


	 	<div class="form-group">
			{!! Form::label('cantidades','Seleccione las unidades del producto') !!}
			{!! Form::number('cantidades',$producto->cantidades,['class'=>'form-control','placeholder'=>'Seleccione un numero']) !!}
		</div>
	 <div class="form-group">
		 {!! Form::label('foto','Foto') !!}
		 {!! Form::file('foto',['class'=>'form-control']) !!}
	 </div>
		

     <div class="form-group">
                {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
			 </div>
	{!! Form::close() !!}


@endsection