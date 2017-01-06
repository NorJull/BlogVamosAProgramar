@extends('admin.templates.main')
 @section('title', 'Editar Usuario '. $user->name)
 


 @section('content')
	

{!! Form::open(['route' => ['users.update', $user], 'method' => 'PUT']) !!}
    <div class="form-group">
    	{!! Form::label('name', 'Nombre') !!}
    	{!!	Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Nombre Completo', 'required']) !!}
    </div>

    <div class="form-group">
    	{!! Form::label('email', 'Email') !!}
    	{!!	Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'required']) !!}
    </div>
    
     <div class="form-group">
    	{!! Form::label('type', 'Tipo') !!}
    	{!!	Form::select('type',['member' => 'Miembro', 'admin' => 'Administrador'],null ,['class' => 'form-control', 'required']) !!}
    </div>

<div class="form-group">
    {!!Form::submit('Editar', ['class' => 'btn btn-primary'])!!} 

     </div>


{!! Form::close() !!}

 @endsection