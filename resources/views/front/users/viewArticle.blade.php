@extends('front.templates.main')
@section('title', 'Inicio')

@section('content')

			
	  <div class="col-md-8 single-main">				 
			  <div class="single-grid">
					@foreach($article->images as $image)
						 <img src="{{asset('img/articles/'.$image->name)}}" alt=""/>
						 @endforeach
						 
						 <hr>

						 <h1>{{$article->title}}</h1>		

					<p>{!! $article->content !!}</p>
			  </div>
			 <ul class="comment-list">
		  		   <h5 class="post-author_head">Escrito por <a href="#" title="Posts by admin" rel="author">{{$article->user->name}}</a></h5>
		  		   <li><img src="images/avatar.png" class="img-responsive" alt="">
		  		   <div class="desc">
		  		   <p>Ver todos los Posts de: <a href="#" title="Posts by admin" rel="author">{{$article->user->name}}</a></p>
		  		   </div>
		  		   <div class="clearfix"></div>
		  		   </li>
		  	  </ul>

				<h3>Comentarios</h3>
		  	<!-- 	Comentarios utilizando discus -->
		  	<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = '//vamos-a-programar.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                
		  </div>
			  <div class="col-md-4 content-right">
				 @include('front.templates.partials.aside')
			  </div>
			  <div class="clearfix"></div>
		

@endsection