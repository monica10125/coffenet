{!! Form::open(['route'=>['admin.telefono.update',$telefonos],'method'=>'PUT']) !!}
			<div class="form-group">
			     {!! Form::label('numero','numero') !!}
			     {!! Form::number('numero',$telefonos->numero,['class'=>'form-control','placeholder'=>'3195258627','required']) !!}   
			</div>
			<div class="form-group">
			     {!! Form::hidden('id_usu',$user->id) !!}   
			     {!! Form::hidden('estado',1) !!}   
			</div>
			<div class="form-group">
			     {!! Form::submit('Guardar Cambios',['class'=>'btn btn-success']) !!}
			 </div>
	{!! Form::close() !!}