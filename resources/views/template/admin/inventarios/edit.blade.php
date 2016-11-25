@extends('template.admin.mail')

@section('titulo','cambiar sucursal de inventario id '.$inventario->id)
@section('class4','active')
@section('contenido')

    {!! Form::open(['route'=>['admin.inventarios.update',$inventario->id],'method'=>'PUT']) !!}


    <div class="form-group">


        {!! Form::label('sucursal','Sucursal:') !!}


        {!! Form::select('sucursal',$sucursal,$inventario->sucursal_id,['class'=>'form-control','placeholder'=>'Seleccione una sucursal','required']) !!}


    </div>

    <div class="form-group">

        {!! Form::hidden('medida',$inventario->medida) !!}
        {!! Form::hidden('estado',1) !!}
        {!! Form::hidden('cantidad',$inventario->cantidad) !!}
        {!! Form::hidden('valor',$inventario->valor) !!}


    </div>


    <div class="form-group">
        {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
    </div>



    {!! Form::close() !!}

@endsection