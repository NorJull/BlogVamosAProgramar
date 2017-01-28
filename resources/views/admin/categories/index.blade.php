@extends('admin.templates.main')

@section('title', 'Lista de Categorias')

@section('content')
<div class="content">
<a href="{{ route('categories.create') }}" class="btn btn-primary">Agregar Categoria</a>
<br>


<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($categories as $category)
			<tr>
				<td>{{ $category->id }}</td>
				<td>{{ $category->name }}</td>
				
				<td><a href="{{ route('categories.edit', $category->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
					<a href="{{ route('categories.destroy', $category->id)}}" onclick="return confirm('Esta seguro que desea Eliminarlo?')"class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
		{{ $categories->links() }}	

</div>

@endsection


 @section('js')
  <script >

$(document).on('click', '.pagination a', function(e){
e.preventDefault();
var page = $(this).attr('href').split('page=')[1];


 getTags(page);

 function getTags(page){

 	$.ajax({

		url : '/admin/ajax/categories?page='+page
 	}).done(function(data){

 		
 $('.content').html(data);	
 	location.hash = page;
 	});

}

});

  </script>
 @endsection

