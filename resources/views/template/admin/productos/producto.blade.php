@extends('template.admin.mail')

@section('titulo','Agregar Productos')
@section('class3','active')
@section('contenido')

	{!! Form::open(['route'=>'admin.productos.store','method'=>'POST','files'=>true]) !!}
			
			<div class="form-group">
			     {!! Form::label('nombre','Nombre') !!}
			     {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre...','required']) !!}   
			</div>
			<div class="form-group">
			     {!! Form::label('descripsion','Descripsion') !!}
			     {!! Form::textarea('descripsion',null,['class'=>'form-control textarea','placeholder'=>'...','required']) !!}   
			</div>
			<div class="form-group">
			     {!! Form::label('valor','Valor') !!}
			     <div class="input-group ">
			     <span class="input-group-addon" id="sizing-addon1">$</span>
			     {!! Form::number('valor',null,['class'=>'form-control','placeholder'=>'0.00','required']) !!}   
				 </div>
			</div>

			<div class="form-group">


			     {!! Form::hidden('estado',1) !!}
				{!! Form::hidden('inventario',1) !!}

			</div>


	<div class="form-group">
		{!! Form::label('cantidades','Seleccione las unidades del producto') !!}
		{!! Form::number('cantidades',null,['class'=>'form-control','placeholder'=>'1','required']) !!}
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