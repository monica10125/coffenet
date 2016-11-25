<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>@yield('titulo','Home') | Error</title>
	<link rel="stylesheet" type="text/css" href="{{asset('framework/bootstrap/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('framework/trumbowyg/Trumbowyg/dist/ui/trumbowyg.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('MyStyle/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('framework/bootstrap-table/src/bootstrap-table.css')}}">
    <link rel="shortcut icon" href="{{asset('img/logo2.png')}}" type="image/png" />

</head>
<body>
	@include('navs.navAministrador')
	<div class="fondo">@yield('img')</div>

			@yield('contenido')
	
	@include('footer.footer')
	<script src="{{asset('framework/Jquery/jquery-1.11.3.min.js')}}"></script>
	<script src="{{asset('framework/bootstrap/js/bootstrap.js')}}"></script>
	<script src="{{asset('framework/bootstrap-table/src/bootstrap-table.js')}}"></script>
	<script src="{{asset('framework/bootstrap-table/src/locale/bootstrap-table-es-ES.js')}}"></script>
	<script src="{{asset('framework/trumbowyg/Trumbowyg/dist/trumbowyg.js')}}"></script>
	<script src="{{asset('framework/trumbowyg/Trumbowyg/dist/langs/es.min.js')}}"></script>
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