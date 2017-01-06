@extends('admin.templates.main')

@section('title','Entrar')

@section('content')

	{!! Form::open(['route' => 'auth.login', 'method' => 'POST']) !!}
   
    <div class="form-group">
    	{!! Form::label('email', 'Correo Electronico') !!}
    	{!!	Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'required']) !!}
    </div>
     <div class="form-group">
    	{!! Form::label('password', 'Contraseña') !!}
    	{!!	Form::password('password',['class' => 'form-control', 'placeholder' => '*************', 'required']) !!}
    </div>

  
	<div class="form-group">
    {!!Form::submit('Entrar', ['class' => 'btn btn-primary'])!!} 

     </div>


{!! Form::close() !!}

@endsection