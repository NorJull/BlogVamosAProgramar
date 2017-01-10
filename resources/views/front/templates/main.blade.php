<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
 
<title>@yield('title', 'Default') | Vamos a Programar</title>
 
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/front/css/style.css')}}">

<style type="text/css">

  body {
    
   /*Espacio para algo de  CSS*/


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
      

      <ul class="nav navbar-nav"> 


        <li class="active"><a href="/">Inicio<span class="sr-only">(current)</span></a></li>
        <li><a href="#">Acerca de</a></li>
             <li><a href="#">Contacto</a></li>
               
      
      </ul>   

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

<div class="content">
   <div class="container">
     <div class="content-grids">
  @yield('content', 'Default')
    </div>
    </div>
</div>


 <footer class="footer">
      <div class="container">
        <p class="text-muted">Vamos a Programar</p>
      <div class="pull-right">Nor Jull</div>
      </div>
    </footer>
</div>

<script src="{{ asset('plugins/jquery/js/jquery-3.1.1.js')}}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.js')}}"></script>

 


</body>
</html>