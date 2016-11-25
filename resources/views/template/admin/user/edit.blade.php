@extends('template.admin.mail')
@section('titulo','Edicion de Usuario '.$user->usu_nom )
@section('class2','active')
@section('contenido')
 
{!! Form::open(['route'=>['admin.usuarios.update',$user],'method'=>'PUT','files'=>true]) !!}
 
			<div class="form-group">
			     {!! Form::label('correo','Correo Electronico') !!}
			     {!! Form::email('correo',$user->correo,['class'=>'form-control','placeholder'=>'Correo...','required']) !!}   
			</div>
			<div class="form-group">
			     {!! Form::label('usu_nom','Nombre') !!}
			     {!! Form::text('usu_nom',$user->usu_nom,['class'=>'form-control','placeholder'=>'Nombre...','required']) !!}   
			</div>
			<div class="form-group">
			     {!! Form::label('usu_ape','Apellidos') !!}
			     {!! Form::text('usu_ape',$user->usu_ape,['class'=>'form-control','placeholder'=>'apellidos...','required']) !!}   
			</div>
			<div class="form-group">
				 <input type="checkbox" id="cambio" onchange="cambioDiv()" > quiere cambiar la clave el usuario?
			</div>
			<div class="form-group" id="div-password">
			   
			</div>

			<div class="form-group">
			     {!! Form::label('fec_nac','Fecha de nacimiento') !!}
			     <input type="date" class="form-control" id="fec_nac" name="fec_nac" value="{{$user->fec_nac}}">  
			</div>
			<div class="form-group">
			     {!! Form::label('roll','rol') !!} 
			     {!! Form::select('roll',[''=>'Seleccione un roll','cliente'=>'cliente','empleado'=>'empleado','gerencia'=>'gerentes','admin'=>'administrador'],$user->roll,['class'=>'form-control']) !!} 
			</div>
			<div class="form-group">
			     {!! Form::label('id_suc','Sucursal') !!} 
			     {!! Form::select('id_suc',$sucursal,$user->id_suc,['class'=>'form-control','placeholder'=>'Seleccione una sucursal']) !!}   
			</div>
			<div class="form-group">
			     {!! Form::label('usu_fot','Foto') !!} 
			     {!! Form::file('usu_fot',['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
			     {!! Form::submit('Guardar Cambios',['class'=>'btn btn-success']) !!}
			 </div>
	{!! Form::close() !!}


@endsection
