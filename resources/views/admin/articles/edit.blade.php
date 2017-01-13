@extends('admin.templates.main')


@section('title', 'Editar Articulo')

@section('content')
	
    @if(count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)
            {{$error}}<br>
            @endforeach
        </div>
    @endif

	{!! Form::open(['route' => ['articles.update', $article->id], 'method' => 'PUT']) !!}
		<div class="form-group">
			{!! Form::label('title', 'Titulo del Articulo') !!}
			{!! Form::text('title', $article->title, ['class' => 'form-control', 'placeholder' => 'Titulo del Articulo', 'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('category_id','Categoria') !!}
			{!! Form::select('category_id', $categories, $article->category->id, ['class' => 'form-control', 'placeholder' => 'Seleccione una categoria', 'required']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('content', 'Contenido del Articulo') !!}
			{!! Form::textarea('content', $article->content, ['class' => 'form-control ']) !!}

		</div>
		<div class="form-group">
			{!! Form::label('tags', 'Tags') !!}
			{!! Form::select('tags[]', $tags, $my_tags, ['class' => 'chosen-select form-control', 'multiple', 'required']) !!}
		</div>
		<!-- 
		<div  class="form-group">
			{!! Form::label('image', 'Imagen') !!}
			{!! Form::file('image') !!}
		</div> -->
		<div class="form-group">

			{!! Form::submit('Salvar Datos', ['class' => 'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}

@endsection

@section('js')
<script type="text/javascript">$(".chosen-select").chosen({
	disable_search_threshold: 10,
	placeholder_text_multiple: 'Seleccione maximo 3 tags',
	max_selected_options: 3,
	no_results_text: "Oops, No se ha encontrado!"


});</script> 
<script type="text/javascript">
//	CKEDITOR.replece("content");

window.onload = function(){
	 editor = CKEDITOR.replace( 'content' );
	  CKFinder.setupCKEditor(editor, 'http://localhost:8000/plugins/CKEditor/ckeditor');
}
	
</script>
@endsection