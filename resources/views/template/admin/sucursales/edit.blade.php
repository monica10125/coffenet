@extends('template.admin.mail')

@section('titulo','Editar Sucursal '.$sucursal->suc_dir)
@section('class1','active')
@section('contenido')
  {!! Form::open(['route'=>['admin.sucursales.update',$sucursal],'method'=>'PUT','files'=>true]) !!}
    <div class="form-group">
       {!! Form::label('suc_dir','dirección') !!}
       {!! Form::text('suc_dir',$sucursal->suc_dir,['class'=>'form-control','placeholder'=>'calle falsa 123','required']) !!} 
    </div>
    <div class="form-group">
      {!! Form::label('col_tex','color del texto') !!}
      <select id="col_tex" name="col_tex" class="form-control" required="required">
            <option value="">...</option>
         @if($sucursal->col_tex=='text-color1')
            <option value="text-color1" class="color text-color1" selected="selected"><div>Color1</div></option>
         @else   
            <option value="text-color1" class="color text-color1"><div>Color1</div></option>
         @endif 

         @if($sucursal->col_tex=='text-color2')
            <option value="text-color2" class="color text-color2" selected="selected"><div>Color2</div></option>
         @else 
            <option value="text-color2" class="color text-color2"><div>Color2</div></option>
         @endif   
           
         @if($sucursal->col_tex=='text-color3')
            <option value="text-color3" class="color text-color3" selected="selected"><div>Color3</div></option>
         @else 
            <option value="text-color3" class="color text-color3"><div>Color3</div></option>
         @endif   
      </select>
    </div>
    <div class="form-group">
           {!! Form::label('foto','Foto') !!} 
           {!! Form::file('foto',['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
       {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
    </div>
  {!! Form::close() !!}
  
@endsection