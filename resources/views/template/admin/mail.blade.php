<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
		<title>@yield('titulo','Home') | Administrador</title>
	<link rel="stylesheet" type="text/css" href="{{asset('framework/bootstrap/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('framework/trumbowyg/Trumbowyg/dist/ui/trumbowyg.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('MyStyle/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('framework/bootstrap-table/src/bootstrap-table.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('framework/chosen/chosen.css')}}">
	<link rel="shortcut icon" href="{{asset('img/logo2.png')}}" type="image/png" />


</head>
<body>
	 @if(Auth::user())
        @if(Auth::user()->roll=='admin')
            @include('navs.navAministrador')
        @elseif (Auth::user()->roll=='cliente') 
            @include('navs.navCliente')
        @endif
    @else
    @include('navs.navPrincipal')

    @endif
	<div class="fondo"><img src="{{asset('img/fondo1.png')}}"></div>

	<section class="@yield('tamaño-panel','col-md-offset-1 col-xs-offset-1 col-sm-offset-1 col-lg-offset-1   col-md-10 col-xs-10 col-sm-10 col-lg-10') margin-1">
		<div class="panel panel-default">
		  <div class="panel-heading text-center"><h2>@yield('titulo','Home')</h2></div>
		  <div class="panel-body panel-body1">
		  	@include('flash::message')
		  	@include('template.partials.errors')
			@yield('contenido')
		  </div>
		</div>
	</section>




	 @include('footer.footer')
	<script src="{{asset('framework/Jquery/jquery-1.11.3.min.js')}}"></script>
	<script src="{{asset('framework/bootstrap/js/bootstrap.js')}}"></script>
	<script src="{{asset('framework/bootstrap-table/src/bootstrap-table.js')}}"></script>
	<script src="{{asset('framework/bootstrap-table/src/locale/bootstrap-table-es-ES.js')}}"></script>
	<script src="{{asset('framework/trumbowyg/Trumbowyg/dist/trumbowyg.js')}}"></script>
	<script src="{{asset('framework/trumbowyg/Trumbowyg/dist/langs/es.min.js')}}"></script>
	<script src="{{asset('framework/chosen/chosen.jquery.js')}}"></script>

	 @yield('js')

	<script>
		$('.textarea').trumbowyg();
		$('.textarea').trumbowyg({
		    btns: ['strong', 'em', '|', 'insertImage'],
		    autogrow: true
		});
		$('.textarea').trumbowyg({
		    lang: 'es'
		});

	     function cambioDiv(){
		if( $('#cambio').prop('checked')){
			//alert('ok');
		$('#div-password').html('<label for="password">Clave</label><input class="form-control" placeholder="******" name="password" type="password" value="" id="password">');
	}else{
		$('#div-password').html('');
	}
	}
</script>
</body>
</html>