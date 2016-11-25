<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header ">

      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
      </button>


      <a class="navbar-brand" href="#"><img class="logo" src="{{asset('img/logo2.png')}}"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="@yield('class','')"><a href="/"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>

        @if(Auth::user())
        <li class="@yield('class1','')"><a href="{{ route('admin.sucursales.index') }}">Sucursales</a></li>
        
        
            <li class="@yield('class2','')"><a href="{{ route('admin.usuarios.index') }}">Usuarios</a></li>
          <li class="@yield('class4','')"><a href="{{ route('admin.inventarios.index') }}">Inventarios</a></li>
        <li class="@yield('class3','')"><a href="{{ route('admin.productos.index') }}">Productos</a></li>
        <li class="@yield('class5','')"><a href="{{ route('admin.baner.index') }}">Baner</a></li>
          <li class="@yield('class6','')"><a href="{{ route('admin.menu.index') }}">Menu</a></li>
          <li class="@yield('class7','')"><a href="{{ route('admin.pedidos.verPedidosAdmi') }}">Gestión Facturas</a></li>

      </ul>
        
      <ul class="nav navbar-nav navbar-right">
        <li>
            <img class="logo3 img-rounded" src="{{ asset('img/user/'.Auth::user()->correo.'/perfil/'.Auth::user()->usu_fot) }}">
        </li>
        <li class="@yield('class4','') dropdown">
          <a href="#" class=" dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->usu_nom}} {{Auth::user()->usu_ape}} <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="{{route('admin.perfil.show',Auth::user()->id)}}">{{ Auth::user()->usu_nom}} {{Auth::user()->usu_ape}}</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
          </ul>
        </li>
      </ul>
      @endif
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->

</nav>