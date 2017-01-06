@extends('admin.templates.main')

@section('title', 'Lista de Tags')

@section('content')
	<a href="{{ route('tags.create') }}" class="btn btn-primary">Agregar Tag</a>
	<!-- Buscador!-->
		{!! Form::open(['route' => 'tags.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}

			<div class="input-group">
				{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar Tag..', 'aria-describedby' => 'search']) !!}
				<span class = "input-group-addon" id="search">
					<span class="glyphicon glyphicon-search" aria-hidden = "true"></span>
				</span>
			</div>

		{!! Form::close() !!}
	<!--FinBuscador-->
	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Accion</th>	
		</thead>
		<tbody>
			@foreach($tags as $tag)
				<tr>
					<td>{{ $tag->id }}</td>
					<td>{{ $tag->name }}</td>
					<td><a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
					<a href="{{ route('tags.destroy', $tag->id)}}" onclick="return confirm('Esta seguro que desea Eliminarlo?')"class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
				</td>
			

				</tr>

			@endforeach
		</tbody>

	</table>
	{{$tags->links()}}
@endsection