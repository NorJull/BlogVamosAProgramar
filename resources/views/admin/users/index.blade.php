@extends('admin.templates.main')
@section('title', 'Lista de Usuarios')
@section('content')
	<a href="{{ route('users.create') }}" class="btn btn-primary">Registrar Usuario</a>
	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Tipo</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				@if($user->type == 'admin')
				
				<td><span class="label label-danger">{{ $user->type }}</span></td>
				@else
				<td><span class="label label-warning">{{ $user->type }}</span></td>
				@endif
	
				<td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
					<a href="{{ route('users.destroy', $user->id) }}" onclick="return confirm('Esta seguro que desea Eliminarlo?')"class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $users->links() }}

@endsection