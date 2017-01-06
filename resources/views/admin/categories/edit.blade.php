@extends('admin.templates.main')

@section('title', 'Editar Categoria')

@section('content')



{!! Form::open(['route' => ['categories.update',$category], 'method' => 'PUT']) !!}
	 <div class="form-group">
    	{!! Form::label('name', 'Nombre') !!}
    	{!!	Form::text('name', $category->name, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) !!}
    </div>
    <div class="form-group">
    {!!Form::submit('Guardar', ['class' => 'btn btn-primary'])!!} 

     </div>
{!! Form::close() !!}

@endsection