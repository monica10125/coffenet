@extends('template.admin.mail')

@section('titulo','Carge de fotos baner')
@section('class5','active')
@section('tamaño-panel','col-md-8 col-md-offset-2 col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-2')
@section('contenido')
    {!! Form::open(['route'=>['admin.baner.update',$baner],'method'=>'PUT','files'=>true]) !!}
        <div class="form-group">
           {!! Form::label('foto','Foto') !!} 
           {!! Form::file('foto',['class'=>'form-control']) !!}
      </div>
    <div class="form-group">
       {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
    </div>
  {!! Form::close() !!}
     
@endsection