<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('titulo','Home')</title>
    <link rel="stylesheet" type="text/css" href="{{asset('framework/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('framework/trumbowyg/Trumbowyg/dist/ui/trumbowyg.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('MyStyle/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('framework/bootstrap-table/src/bootstrap-table.css')}}">
    <link rel="shortcut icon" href="{{asset('img/logo2.png')}}" type="image/png" />
    <style>
        body {
           /* 
           font-family: 'Lato';
           */     
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    @if(Auth::user())
        @if(Auth::user()->roll=='admin')
            @include('navs.navAministrador')
        @elseif (Auth::user()->roll=='cliente') 
            @include('navs.navCliente')
        @endif
    @else
    @include('navs.navPrincipal')

    @endif



    @yield('content')



   @include('footer.footer')
    <script src="{{asset('framework/Jquery/jquery-1.11.3.min.js')}}"></script>
    <script src="{{asset('framework/bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{asset('framework/bootstrap-table/src/bootstrap-table.js')}}"></script>
    <script src="{{asset('framework/bootstrap-table/src/locale/bootstrap-table-es-ES.js')}}"></script>

</body>
</html>
