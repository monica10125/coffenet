@extends('template.admin.mail')
@section('class3','active')
@section('titulo','Solicitar Pedido')
@section('contenido')


    <div class="col col-xs-12 col-md-12 col-lg-12">

        {!! Form::open(['route'=>'cliente.pedidos.store','method'=>'POST']) !!}



        <div class="panel panel-warning">
            <div class="panel-heading"><h2 class="text-center"> {!! Form::label('nombre','Orden ' .$menu->nom_men) !!} </h2></div>
            <div class="panel-body">
                <h2 class="text-center"> {!! Form::label('preciomenu','$ ' .$menu->precio) !!} </h2>

            </div>
        </div>







        <div class="form-group">
            {!! Form::hidden('estado',1) !!}

            {!! Form::hidden('idmenu',$menu->id) !!}

            {!! Form::hidden('precio',$menu->precio) !!}
        </div>




<div class="form-group">


    {!! Form::submit('Comprar Orden',['class'=>'btn btn-primary','onclick'=> "return confirm('¿Está seguro que desea comprar el menú?')"]) !!}
</div>








    {!! Form::close() !!}

</div>





@endsection