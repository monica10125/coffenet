@extends('template.admin.plantillaErrores')
@section('titulo','ERROR 401 Acceso denegado' )
@section('img')
<img src="{{asset('img/cafe401.jpg')}}">
@endsection
@section('contenido')
<<div class="margin-3 padding-1 color text-color2 text-center panel-body1 col-md-12 col-xs-12 col-sm-12 col-lg-12">
	<h1 class="text-size-1">ERROR 401 </h1>
	<p>Acceso denegados el usuario no tiene permiso para ingresar aqui</p>
</div>
@endsection
