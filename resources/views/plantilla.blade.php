<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="lib/sweetalert/sweetalert2.min.css">
    <link rel="stylesheet" href="lib/animate.css">
    <link rel="stylesheet" href="lib/footable/footable.bootstrap.min.css">
    <style>
    .footable .pagination li a {
    position: relative;
    display: block;
    padding: .5rem .75rem;
    margin-left: -1px;
    line-height: 1.25;
    color: #0275d8;
    background-color: #ffffff;
    border: 1px solid #ddd; }

  .footable .pagination li.active a {
    z-index: 2;
    color: #fff;
    background-color: #0275d8;
    border-color: #0275d8; }

  .footable .pagination li.disabled a {
    color: #636c72;
    pointer-events: none;
    cursor: not-allowed;
    background-color: #ffffff;
    border-color: #ddd; }

  .footable .pagination li:first-child a {
    margin-left: 0;
    border-bottom-left-radius: .25rem;
    border-top-left-radius: .25rem; }
  </style>
    <title>Inicio</title>
  </head>
  <body>
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
      <img src="img/perro.jpg" width="30" height="30" alt=""><a class="navbar-brand" href="#">Proyecto</a>
    <button id="btnNavegacion" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="cargarPagina('personas');">Personas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="cargarPagina('comentarios');">Comentarios</a>
        </li>
      </ul>
    </div>
      </nav>
      <br><br><br>
        <div class="container-fluid" id="principal">
            @yield("contenido")
        </div>
  </body>
  <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
       <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
       <script src="lib/sweetalert/sweetalert2.min.js"></script>
       <script src="lib/footable/moment.js"></script>
       <script src="lib/footable/footable.min.js"></script>
       
</html>