@extends('template.admin.mail')

@section('titulo','Agregar Sucursal')
@section('class1','active')
@section('contenido')
	{!! Form::open(['route'=>'admin.sucursales.store','method'=>'POST','files'=>true]) !!}
	  <div class="form-group">
	     {!! Form::label('suc_dir','dirección') !!}
			     {!! Form::text('suc_dir',null,['class'=>'form-control','placeholder'=>'calle falsa 123','required']) !!} 
	  </div>
	  <div class="form-group">
	    {!! Form::label('col_tex','color del texto') !!}
	    <select  id="col_tex" name="col_tex" class="form-control" required="required">
	    	<option value="">...</option>
	    	<option value="text-color1" class="color text-color1"><div>Color1</div></option>
	    	<option value="text-color2" class="color text-color2"><div>Color2</div></option>
	    	<option value="text-color3" class="color text-color3"><div>Color3</div></option>
	    </select>
	  </div>
	  <div class="form-group">
			     {!! Form::hidden('estado','1') !!}
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