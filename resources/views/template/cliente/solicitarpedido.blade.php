@extends('template.admin.mail')
@section('class3','active')
@section('titulo','Solicitar Pedido ')
@section('contenido')



        <div class="row">
            @foreach($menus as $menu)
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="{{ asset('img/menu/'.$menu->foto )}}" alt="no se cargo foto">
                    <div class="caption">


                        <h3>{!!$menu->nom_men!!}</h3>
                        <p>$ {!!$menu->precio!!} </p>
                        <p><a href="{{route('cliente.pedidos.create',$menu->id)}}" class="btn btn-primary" role="button">Comprar</a></p>
                        <p><a href="{{route('cliente.pedidos.show',$menu->id)}}" class="btn btn-default" role="button">Ver Detalle</a></p>
                    </div>
                </div>
            </div>

            @endforeach
        </div>







@endsection