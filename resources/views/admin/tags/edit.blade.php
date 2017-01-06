@extends('admin.templates.main')

@section('title', 'Editar Tag')

@section('content')

	{!! Form::open(['route' => ['tags.update', $tag], 'method' => 'PUT']) !!}
		<div class="form-group">
			{!! Form::label('name', 'Nombre del Tag') !!}
			{!! Form::text('name', $tag->name, ['class' => 'form-control', 'placeholder' => 'Nombre del Tag', 'required']) !!}

		</div>

		<div class="form-group">
			  {!!Form::submit('Guardar', ['class' => 'btn btn-primary'])!!} 
		</div>

	{!! Form::close() !!}

@endsection