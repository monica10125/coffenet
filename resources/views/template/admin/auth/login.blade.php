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
    {!! Form::open(['route'=>'admin.auth.login','method'=>'POST'])!!}
        <div class="form-group">
            {!! Form::label('correo','Correo Electronico') !!}
            {!! Form::email('correo',null,['class'=>'form-control','placeholder'=>'ejemplo@mail.com']) !!}
        </div>
         <div class="form-group">
            {!! Form::label('password','Clave') !!}
            {!! Form::password('password',['class'=>'form-control','placeholder'=>'******']) !!}
        </div>
         <div class="form-group">
            {!! Form::submit('ingresar',['class'=>'btn btn-success'])!!}
        </div>
    {!! Form::close()!!}
        </div>

</section>
@endsection
