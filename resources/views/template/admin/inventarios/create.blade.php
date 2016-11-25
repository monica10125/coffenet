@extends('template.admin.mail')

@section('titulo','Agregar Inventarios')
@section('class4','active')
@section('contenido')

    {!! Form::open(['route'=> 'admin.inventarios.store','method'=>'POST']) !!}


    <div class="form-group">


        {!! Form::label('sucursal','Sucursal:') !!}


        {!! Form::select('sucursal',$sucursal,null,['class'=>'form-control','placeholder'=>'Seleccione una sucursal','required']) !!}


    </div>

    <div class="form-group">

        {!! Form::hidden('medida','kg') !!}
        {!! Form::hidden('estado',1) !!}
        {!! Form::hidden('cantidad',0) !!}
        {!! Form::hidden('valor',0) !!}


    </div>


    <div class="form-group">
        {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
    </div>




    {!! Form::close()!!}
@endsection