@extends('template.admin.mail')
@section('class3','active')
@section('titulo','Detalle '.$menu->nom_men)
@section('contenido')
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
        <img class="col-xs-6 col-sm-6 col-md-6 col-lg-6
		col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-3  img-thumbnail" src="{{ asset('img/menu/'.$menu->foto) }}">
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
        <div class="list-group">
            <div class="list-group-item ">
                <b class="list-group-item-heading">Nombre del menú  </b> {{ $menu->nom_men}}
            </div>
            <div class="list-group-item ">
                <b class="list-group-item-heading">Precio  </b> $ {{ $menu->precio}}
            </div>

            <div class="list-group-item ">
                <b class="list-group-item-heading">Descripsión  </b>  {!!$productosdescripcion!!}
            </div>

            <div class="list-group-item ">
                <b class="list-group-item-heading">Incluye </b>  {!! $productos!!}
            </div>

            <div class="list-group-item ">
                <b class="list-group-item-heading">Sucursal  </b>  {!!$sucursal!!}
            </div>

            <div class="list-group-item ">
                <b class="list-group-item-heading">Disponibilidad </b>
                @if($menu->estado==1)
                    <span class="li li-success"> Disponible</span>
                @else
                    <span class="li li-danger">Agotado</span>
                @endif

            </div>
        </div>



    </div>

    <div class="col col-xs-12 col-md-12 col-lg-12">

        {!! Form::open(['route'=>'cliente.pedidos.retonarprecio','method'=>'POST']) !!}



        <div class="col-lg-6">


            <div class="input-group">
      <span class="input-group-btn">
        <button class="btn btn-info" disabled="true" type="button">Cantidad</button>
      </span>

                {!! Form::number('cantidad',null,['class'=>'form-control','placeholder'=>'cantidad mayor a 0','required','min'=>'1', 'max'=>'30']) !!}

                {!! Form::hidden('menu',$menu->id) !!}


            </div><!-- /input-group -->





            <br>

        </div><!-- /.col-lg-6 -->
        <div class="col-lg-6">





            {!! Form::submit('Agregar al carrito',['class'=>'btn btn-primary','onclick'=> "return confirmar()"]) !!}

        </div>



        {!! Form::close() !!}





    </div>


    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
        <hr>
    </div>

    @if(!empty($menusel))


        <div>
            <br>
            <table class="table table-striped" data-toggle="table" data-height="500" data-sort-name="Id" data-sort-order="desc" data-show-columns="true"  data-show-toggle="true"  data-search="true" data-toolbar="#custem-toolbar" data-pagination="true" data-page-list="[1, 3, 5, 10, 20, 50, 100, 200]" data-page-size="5">
                <thead>
                <tr>
                    <th data-field="idmenu"  data-halign="center" data-sortable="true" data-align="center">Id</th>
                    <th data-field="Nombre"  data-halign="center" data-sortable="true" data-align="center">Nombre</th>
                    <th data-field="cantidad"  data-halign="center" data-sortable="true" data-align="center">cantidad Solicitada</th>
                    <th data-field="Precio"  data-halign="center" data-sortable="true" data-align="center">Subtotal</th>

                </tr>
                </thead>






                    <tbody>

                    @for($i=0; $i<count($menusel); $i++ )
                    <tr>
                        <td class="text-center">{!!$menusel[$i]['menu']!!}</td>
                        <td>{!!$menusel[$i]['nom_men']!!}</td>
                        <td class="text-center">{!!$menusel[$i]['cantidad']!!}</td>

                        <td> {!!$menusel[$i]['precioTotal']!!}</td>


                    </tr>
                    @endfor

                    </tbody>



            </table>
        </div>




        <div class="col-xs-7 col-md-7 col-lg-7">

           <h4 class="text-center">{!! Form::label('precioTotal','Total $ '.$precioTotal) !!}</h4>
        </div>


<div class="btn-group col-xs-5 col-md-5 col-lg-5"  role="group">

            <a href="{{route('cliente.pedidos.index')}}" type="button" class="btn btn-primary">Comprar más <span class="glyphicon glyphicon-shopping-cart"></span></a>



            <a href="{{route('cliente.pedidos.solicitarDomicilio')}}" type="button" class="btn btn-default" onclick="return confirm('¿está seguro de comprar la orden?')">Comprar Orden<span class="glyphicon glyphicon-usd"></span></a>

    <a href="{{route('cliente.pedidos.destroyMenu')}}" type="button" class="btn btn-danger" onclick="return confirm('¿está seguro de eliminar su solicitud actual?')">Eliminar Orden<span class="glyphicon glyphicon-trash"></span></a>



          <hr>

</div>



    @endif

<hr>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">

        <nav class="navbar navbar-inverse">

            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('cliente.pedidos.index') }}"><span class="glyphicon glyphicon-list-alt"></span> Regresar </a>
                </li>

            </ul>
        </nav>
    </div>











@endsection
@section('js')

    <script>
        function confirmar()
        {
            confirm('esta seguro de añadir al carrito');



        }
    </script>
 @endsection