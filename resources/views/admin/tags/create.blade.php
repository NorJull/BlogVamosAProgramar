@extends('admin.templates.main')

@section('title', 'Agregar Tag')

@section('content')
	
	<div id="messages"></div>
	



	{!! Form::open(['class' => 'ajaxForm']) !!}
		<input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
		<div class="form-group">

			{!! Form::label('name', 'Nombre del Tag') !!}
			{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Tag', 'required']) !!}

		</div>

		<div class="form-group">	  
			  {!!link_to('#', $title = 'Agregar', $attributes = ['id' => 'save', 'class' => 'btn btn-primary'], $secure = null)!!}
		</div>

	{!! Form::close() !!}

@endsection


 
 @section('js')
  <script src="{{ asset('js/ajax.js') }}"></script>
 @endsection