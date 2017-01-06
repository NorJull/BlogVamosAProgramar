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
      <a class="navbar-brand" href="#">Vamos a Programar</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      

      <ul class="nav navbar-nav"> 


        <li class="active"><a href="/">Inicio<span class="sr-only">(current)</span></a></li>
        <li><a href="#">Acerca de</a></li>
             <li><a href="#">Contacto</a></li>
               
      
      </ul>   
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