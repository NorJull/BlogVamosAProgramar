@extends('admin.templates.main')

@section('title', 'Galeria de Imagenes')

@section('content')

	<div class="row">
		@foreach($images as $image)
			<div class="col-md-4">
					<div class="panel panel-default">
  						<div class="panel-body">
    						<img src="/img/articles/{{ $image->name }}" class="img-responsive">
  						</div>
  			<div class="panel-footer">{{$image->article->title}}</div>
			</div>

			</div>
		@endforeach		

	</div>

@endsection