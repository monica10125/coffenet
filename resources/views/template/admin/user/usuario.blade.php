@extends('template.admin.mail')

@section('titulo','Agregar Usuarios')
@section('class2','active')
@section('contenido')
	

	{!! Form::open(['route'=>'admin.usuarios.store','method'=>'POST','files'=>true]) !!}
			<div class="form-group">
			     {!! Form::label('correo','Correo Electronico') !!}
			     {!! Form::email('correo',null,['class'=>'form-control','placeholder'=>'Correo...','required']) !!}   
			</div>
			<div class="form-group">
			     {!! Form::label('nombre','Nombre') !!}
			     {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre...','required']) !!}   
			</div>
			<div class="form-group">
			     {!! Form::label('apellidos','Apellidos') !!}
			     {!! Form::text('apellidos',null,['class'=>'form-control','placeholder'=>'apellidos...','required']) !!}   
			</div>
			<div class="form-group">
			     {!! Form::label('clave','Clave') !!}
			     {!! Form::password('clave',['class'=>'form-control','placeholder'=>'******','required']) !!}   
			</div>

			<div class="form-group">
			     {!! Form::label('fecha_de_nacimiento','Fecha de nacimiento') !!}
			     <input type="date" class="form-control" id="fecha_de_nacimiento" name="fecha_de_nacimiento">  
			</div>
			<div class="form-group">
			     {!! Form::label('roll','rol') !!} 
			     {!! Form::select('roll',[''=>'Seleccione un roll','cliente'=>'cliente','empleado'=>'empleado','gerencia'=>'gerentes','admin'=>'administrador'],null,['class'=>'form-control']) !!} 
			</div>
			<div class="form-group">
			     {!! Form::hidden('logeo',0) !!}   
			     {!! Form::hidden('estado',1) !!}   
			</div>
			<div class="form-group">
			     {!! Form::label('sucursal','Sucursal') !!}
	{!! Form::select('sucursal',$sucursal,null,['class'=>'form-control','placeholder'=>'Seleccione una sucursal']) !!}
	</div>
			<div class="form-group">
			     {!! Form::label('usu_fot','Foto') !!} 
			     {!! Form::file('usu_fot',['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
			     {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
			 </div>
	{!! Form::close() !!}

@endsection