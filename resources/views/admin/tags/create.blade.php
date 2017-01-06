@extends('admin.templates.main')

@section('title', 'Agregar Tag')

@section('content')

	{!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
		<div class="form-group">
			{!! Form::label('name', 'Nombre del Tag') !!}
			{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Tag', 'required']) !!}

		</div>

		<div class="form-group">
			  {!!Form::submit('Agregar', ['class' => 'btn btn-primary'])!!} 
		</div>

	{!! Form::close() !!}

@endsection