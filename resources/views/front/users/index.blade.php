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
						 <h4><a href="single.html">{{ $article->title }}</a>  July 30, 2014 / 27 Comments</h4>
						 <p> Categoria :<a href="">{{$article->category->name}}</a>  </p>
						 <a href="single.html"><span></span>LEER MAS</a>
						 </div>
					 </div>
						@endforeach
					
				 </div>
			  </div>

			  <div class="col-md-4 content-right">
				 <div class="recent">
					 <h3>ARTICULOS RECIENTES</h3>
					 <ul>
					 <li><a href="#">Aliquam tincidunt mauris</a></li>
					 <li><a href="#">Vestibu auctor dapibus  lipsum</a></li>
					 <li><a href="#">Nunc dignissim risus consecu</a></li>
					 <li><a href="#">Cras ornare tristiqu</a></li>
					 </ul>
				 </div>
				
				 <div class="clearfix"></div>
				 
				 <div class="categories">
					 <h3>CATEGORIAS</h3>
					 <ul>
					 <li><a href="#">Vivamus vestibulum nulla</a></li>
					 <li><a href="#">Integer vitae libero ac risus e</a></li>
					 <li><a href="#">Vestibulum commo</a></li>
					 <li><a href="#">Cras iaculis ultricies</a></li>
					 </ul>
				 </div>
				 <div class="clearfix"></div>
			  </div>
			  <div class="clearfix"></div>
		
<!----> {{ $articles->links() }}
@endsection