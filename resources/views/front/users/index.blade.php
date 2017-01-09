@extends('front.templates.main')
@section('title', 'Inicio')

@section('content')

			 <div class="col-md-8 content-main">
				 <div class="content-grid">					 
					
					 @foreach($articles as $article)
					 <div class="content-grid-info">
					 	@foreach($article->images as $image)
						 <img src="{{asset('img/articles/'.$image->name)}}" alt=""/>
					
						 @endforeach
						 <div class="post-info">
						 <h4><a href="single.html">{{ $article->title }}</a>| {{$article->created_at->diffForHumans()}}</h4>
						 <p> Categoria :<a href="">{{$article->category->name}}</a>  </p>
						 <a href="single.html"><span></span>LEER MAS</a>
						 </div>
					 </div>
						@endforeach
					
				 </div>
			  </div>

			  <div class="col-md-4 content-right">
				 @include('front.templates.partials.aside')
			  </div>
			  <div class="clearfix"></div>
		
<!----> {{ $articles->links() }}
@endsection