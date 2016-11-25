@extends('template.admin.mail')

@section('titulo','Creación de menu')
@section('class6','active')
@section('contenido')

    {!! Form::open(['route'=>'admin.menu.store','method'=>'POST','files'=>'true']) !!}


    <div class="form-group">
        {!! Form::label('nom_menu','Nombre del menu') !!}
        {!! Form::text('nom_men',null,['class'=>'form-control','placeholder'=>'menu infatil','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('sucursal','Sucursal:') !!}
        {!! Form::select('sucursal',$sucursal,null,['class'=>'form-control','placeholder'=>'Seleccione una sucursal','required']) !!}
    </div>

<div class="form-group">

    {!! Form::hidden('estado',1) !!}

</div>



    <div class="form-group">
        {!! Form::label('producto','Productos:') !!}
        {!! Form::select('producto[]',$producto,null,['class'=>'form-control select-producto','multiple' ,'required']) !!}
    </div>

    <div class="form-group">

        {!! Form::label('foto','Foto') !!}
        {!! Form::file('foto',['class'=>'form-control']) !!}

        <br>
        <div class="form-group">
            {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
        </div>
    </div>



{!! Form::close() !!}
@endsection
@section('js')

    <script>
        $('.select-producto').chosen({
            placeholder_text_multiple: 'seleccione como minimo un producto',
            max_selected_options:4,
            no_results_text:' no hay resultados de productos'
        });
    </script>

@endsection