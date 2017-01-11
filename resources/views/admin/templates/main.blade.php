<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
 
<title>@yield('title', 'Default') | Panel de Administraccion</title>
 
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/chosen/chosen.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/trumbowyg/dist/ui/trumbowyg.css') }}">
<style type="text/css">
  body {
    
    background-image: url('{{ asset('img/weather.png') }}'); 

  }
  </style>

</head>


<body>

<div class="container">

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{route('front.index')}}">Vamos a Programar</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
     
       @if (!Auth::guest())


      <ul class="nav navbar-nav"> 


        <li class="active"><a href="/">Inicio<span class="sr-only">(current)</span></a></li>
      
        @if( Auth::user()->type === 'admin')
        <li><a href="{{route('users.index')}}">Usuarios</a></li>
             @endif
             <li><a href="{{route('categories.index')}}">Categorias</a></li>
                  <li><a href="{{ route('articles.index') }}">Articulos</a></li>
                       <li><a href="{{ route('images.index') }}">Imagenes</a></li>
                            <li><a href="{{route('tags.index')}}">Tags</a></li>
      
      </ul>
    @endif


      <ul class="nav navbar-nav navbar-right">
        @if (Auth::guest())
         <li><a href="{{ route('auth.login') }}">Entrar</a></li>
                         <li><a href="{{ route('users.create') }}">Registrarse</a></li>

       @else

           <li><a href="{{route('home')}}">Panel de Administracion</a></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Salir
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
          </ul>
        </li>
      </ul>


      @endif

    </div><!-- /.navbar-collapse -->


  </div><!-- /.container-fluid -->
</nav>


<!-- Contenido-->

<div class="panel panel-default">  <div class="panel-heading">
    <h3 class="panel-title">@yield('title', 'Default')</h3>
  </div>
  <div class="panel-body">
    @include('flash::message')
  @yield('content', 'Default')
   </div>
 </div>

 <footer class="footer">
      <div class="container">
        <p class="text-muted">Vamos a Programar</p>
      </div>
    </footer>
</div>

<script src="{{ asset('plugins/jquery/js/jquery-3.1.1.js')}}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
<script src="{{ asset('plugins/trumbowyg/dist/trumbowyg.js') }}"></script>
 
 @yield('js')

</body>
</html>