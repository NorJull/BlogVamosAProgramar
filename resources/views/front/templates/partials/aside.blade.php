
				
				 <div class="clearfix"></div>
				 
				 <div class="categories">
					 <h3>CATEGORIAS</h3>
					 <ul>
					 	@foreach($categories as $category)
					 <li><a href="#">{{$category->name}}</a> </li>
						@endforeach
					 </ul>
				 </div>

				 <div class="clearfix"></div>
	<br><br>
				 <div class="panel panel-default">
  						<div class="panel-heading">
    						<h3 class="panel-title">Panel title</h3>
  				</div>
 				 <div class="panel-body">
   					@foreach($tags as $tag)
   					<span class="label label-warning"><a href="#">{{$tag->name}}</a></span>
   					@endforeach
   					
 				 </div>
					</div>
					<div class="clearfix"></div>