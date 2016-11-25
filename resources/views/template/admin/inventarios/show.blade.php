@extends('template.admin.mail')
@section('titulo','Vista de Inventario con id no. '.$inventario->id )
@section('class2','active')
@section('contenido')


    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
        <div class="list-group">
            <div class="list-group-item ">
                <b class="list-group-item-heading">Medida: </b> {{ $inventario->medida}}
            </div>
            <div class="list-group-item ">
                <b class="list-group-item-heading">Cantidad de productos: </b> {{ $inventario->cantidad}}
            </div>
            <div class="list-group-item ">
                <b class="list-group-item-heading"> $Valor: </b>  {!! $inventario->valor !!}
            </div>



            <div class="list-group-item ">
                <b class="list-group-item-heading">Estado : </b>
                @if($inventario->estado==1)
                    <span class="li li-success">Activo</span>
                @else
                    <span class="li li-danger">Inactivo</span>
                @endif

            </div>

            <div class="list-group-item ">
                <b class="list-group-item-heading">Sucursal: </b>
                @foreach($sucursal as $sucursals)
                    @if($sucursals->id==$inventario->sucursal_id)
                        {{ $sucursals->suc_dir }}
                    @endif
                @endforeach
            </div>

        </div>


    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
        <hr>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">

        <nav class="navbar navbar-inverse">

            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('admin.inventarios.index')}}"><span class="glyphicon glyphicon-list-alt"></span> Ver lista</a>
                </li>
                <li>
                    {!! Form::open(['route'=>['admin.inventarios.update',$inventario->id],'method'=>'PUT','class'=>'navbar-form navbar-left']) !!}
                    {!! Form::hidden('medida',$inventario->medida)!!}
                    {!! Form::hidden('cantidad',$inventario->cantidad) !!}
                    {!! Form::hidden('valor',$inventario->valor) !!}
                    {!! Form::hidden('sucursal',$inventario->sucursal_id) !!}
                    {!! Form::hidden('estado',1) !!}
                    <button class='btn btn-link'><span class="glyphicon glyphicon-eye-open"></span> Habilitar Inventario</button>

                    {!! Form::close() !!}
                </li>
                <li>
                    {!! Form::open(['route'=>['admin.inventarios.update',$inventario->id],'method'=>'PUT','class'=>'navbar-form navbar-left']) !!}
                    {!! Form::hidden('medida',$inventario->medida) !!}
                    {!! Form::hidden('cantidad',$inventario->cantidad) !!}
                    {!! Form::hidden('valor',$inventario->valor) !!}
                    {!! Form::hidden('sucursal',$inventario->sucursal_id) !!}
                    {!! Form::hidden('estado',0) !!}
                    <button class='btn btn-link'><span class="glyphicon glyphicon-eye-close"></span> Inhabilitar Inventario</button>

                    {!! Form::close() !!}
                </li>
            </ul>
        </nav>
    </div>
@endsection