@extends('admin.templates.main')


@section('title', 'Lista de Articulos')

@section('content')
	<a href="{{ route('articles.create') }}" class="btn btn-primary">Agregar nuevo articulo</a>
	<!-- Buscador!-->
		{!! Form::open(['route' => 'articles.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}

			<div class="input-group">
				{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Buscar Articulo..', 'aria-describedby' => 'search']) !!}
				<span class = "input-group-addon" id="search">
					<span class="glyphicon glyphicon-search" aria-hidden = "true"></span>
				</span>
			</div>

		{!! Form::close() !!}
	<!--FinBuscador-->

	<table class = "table table-striped">
		<thead>
			<th>ID</th>
			<th>Titulo</th>
			<th>Categoria</th>
			<th>Autor</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($articles as $article)
				<tr>
					<td> {{ $article->id }} </td>
					<td> {{ $article->title }} </td>
					<td> {{ $article->category->name }} </td>
					<td> {{ $article->user->name }} </td>
					<td>

					<a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
					<a href="{{ route('articles.destroy', $article->id) }}" onclick="return confirm('Esta seguro que desea Eliminarlo?')"class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
			
				</tr>
			@endforeach
		</tbody>
	</table>
	
		{{ $articles->links() }}
@endsection