@extends('layouts.app')

@section('content')
<section class="col-md-offset-1 col-xs-offset-1 col-sm-offset-1 col-lg-offset-1   col-md-10 col-xs-10 col-sm-10 col-lg-10 margin-1">

<div class="col-md-4 col-xs-4 col-sm-4 col-lg-4
col-md-offset-4 col-xs-offset-4 col-sm-offset-4 col-lg-offset-4">
<div class="text-center">
<img class="logo2" src="{{asset('img/imgpsh_fullsize.png')}}">
</div>
</div>
<div class="col-md-4 col-xs-4 col-sm-4 col-lg-4
col-md-offset-4 col-xs-offset-4 col-sm-offset-4 col-lg-offset-4">
@include('flash::message')
@include('template.partials.errors')
   {!! Form::open(['route'=>'registor.store','method'=>'POST','files'=>true]) !!}
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
                 {!! Form::hidden('roll','cliente') !!}   
                 {!! Form::hidden('logeo',0) !!}   
                 {!! Form::hidden('estado',1) !!}   
                 {!! Form::hidden('sucursal',1) !!}   
            </div>
            <div class="form-group">
                 {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
             </div>
    {!! Form::close() !!}
        </div>

</section>
@endsection
