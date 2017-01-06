@extends('admin.templates.main')

@section('title', 'Nueva Categoria')

@section('content')
 @if(count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)
            {{$error}}<br>
            @endforeach
        </div>
    @endif


{!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
	 <div class="form-group">
    	{!! Form::label('name', 'Nombre') !!}
    	{!!	Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) !!}
    </div>
    <div class="form-group">
    {!!Form::submit('Guardar', ['class' => 'btn btn-primary'])!!} 

     </div>
{!! Form::close() !!}

@endsection