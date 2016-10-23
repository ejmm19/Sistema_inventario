<?php session_start();
if(!isset($_SESSION['username'])){ 
    echo "<script>alert('No has Iniciado Sesión')</script>"; 
    echo "<script>window.location='./index.php';</script>"; 
};
//$_SESSION['carrito']=$carrito;
 ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Control de Suministros y Materiales</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <!-- include alertify.css -->
    <link rel="stylesheet" href="css/alertify.css">
    <link rel="icon" type="image/png" href="img/ministerio-de-agricultura-ecuador-directorio-ambiental-ecuador-ecologico.png" />

    <!-- include boostrap theme  -->
    <link rel="stylesheet" href="css/themes/bootstrap.css">

    <!-- include alertify script -->
    <script src="js/alertify.js"></script>

    <script type="text/javascript">
    //override defaults
    alertify.defaults.transition = "slide";
    alertify.defaults.theme.ok = "btn btn-primary";
    alertify.defaults.theme.cancel = "btn btn-danger";
    alertify.defaults.theme.input = "form-control";
    </script>

    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {height: 678px}
        
        /* Set gray background color and 100% height */
        .sidenav {
          background-color: #222222;
          height: 100%;
        }
            
        /* On small screens, set height to 'auto' for the grid */
        @media screen and (max-width: 767px) {
          .row.content {height: auto;}
        }
      </style>
  </head>
  <body>
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
           
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
             <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
          </button> <img src="img/ministerio-de-agricultura-ecuador-directorio-ambiental-ecuador-ecologico.png"  style="width: 212px; float: left;" alt="Min Agricultura">
           <div id="tyi">
            <h1 >Control de Suministros y Materiales</h1>
            <h4>Dirección Provincial Agropecuaria de Orellana</h4>
            </div>
        </div>

        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b><?php echo $_SESSION['username'] ?></b><strong class="caret"></strong></a>
              <ul class="dropdown-menu">
                <li>
                  <a href="inicio.php">Inicio</a>
                </li>
                <li>
                  <a href="php/logout.php">Cerrar Sesión</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        
      </nav>



<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs" id="menux">
      <h3 id="men">Menu</h3>
      <ul class="nav nav-pills nav-stacked">
        <li  onclick="carrito();"><a href="inicio.php" ><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio</a></li>
        <li><a href="inicio.php?op=2"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span> Notificaciones          <?php include('php/functions.php');
                MostrarNotificaciones();?></a></li>
        <li><a href="inicio.php?op=1" id="productos"><span class="glyphicon glyphicon-gift" aria-hidden="true"></span> Articulos</a></li>
        <li><a href="inicio.php?op=3"><span class="glyphicon glyphicon-retweet" aria-hidden="true"></span> Movimientos</a></li>
        <li><a href="inicio.php?op=4"><span class="glyphicon glyphicon-export" aria-hidden="true"></span> Despacho de Bodega</a></li>
        <li><a href="inicio.php?op=5"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuarios</a></li>
        <li><a href="inicio.php?op=7"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Solicitantes</a></li>
        
        <li><a href="inicio.php?op=8"><span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span> Inventario</a></li>
        <!--<li><a href="inicio.php?op=7"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Categorias</a></li><li><a href="inicio.php?op=9"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Reabastecer</a></li>-->
      </ul><br>

    <div class="derechosautor">
      <a href="https://mobiliariosfamarsa.com/devdesign" target="_blank"><p>©CopyRight-Eric Js Martinez</p></a>
    </div>
    </div> 
    <br>
   

    <div class="col-sm-9" id="contenido">
          <?php 
          
              if (!isset($_GET['op'])) {
                include("./php/start.php");
              }elseif ($_GET['op']==1) {
                include("./php/productos.php");
              }elseif ($_GET['op']==2) {
                include("./php/notificaciones.php");
              }elseif ($_GET['op']==3) {
                include("./php/ventas.php");
              }elseif ($_GET['op']==4) {
                include("./php/settings.php");
              }elseif ($_GET['op']==5) {
                include("./php/users.php");
              }elseif ($_GET['op']==6) {
                include("./php/ingresoart.php");
              }elseif ($_GET['op']==7) {
                include("./php/solicitantes.php");
              }elseif ($_GET['op']==8) {
                include("./php/inventario.php");
              }elseif ($_GET['op']==9) {
                include("./php/reabastecer.php");
              }elseif ($_GET['op']==10) {
                include("./php/users.php");
              }
              /*ESTE CODIGO ES ELABOARO 100% DE LA AUTORÍA DE ERIC JOSE MARTINEZ MUENTES PAGINAS OFFICIALES FB 
                facebook.com/ejmm19
                mobiliariosfamarsa.com*/
                /*ESTE CODIGO ES ELABOARO 100% DE LA AUTORÍA DE ERIC JOSE MARTINEZ MUENTES PAGINAS OFFICIALES FB 
                facebook.com/ejmm19
                mobiliariosfamarsa.com*//*ESTE CODIGO ES ELABOARO 100% DE LA AUTORÍA DE ERIC JOSE MARTINEZ MUENTES PAGINAS OFFICIALES FB 
                facebook.com/ejmm19
                mobiliariosfamarsa.com*//*ESTE CODIGO ES ELABOARO 100% DE LA AUTORÍA DE ERIC JOSE MARTINEZ MUENTES PAGINAS OFFICIALES FB 
                facebook.com/ejmm19
                mobiliariosfamarsa.com*//*ESTE CODIGO ES ELABOARO 100% DE LA AUTORÍA DE ERIC JOSE MARTINEZ MUENTES PAGINAS OFFICIALES FB 
                facebook.com/ejmm19
                mobiliariosfamarsa.com*//*ESTE CODIGO ES ELABOARO 100% DE LA AUTORÍA DE ERIC JOSE MARTINEZ MUENTES PAGINAS OFFICIALES FB 
                facebook.com/ejmm19
                mobiliariosfamarsa.com*//*ESTE CODIGO ES ELABOARO 100% DE LA AUTORÍA DE ERIC JOSE MARTINEZ MUENTES PAGINAS OFFICIALES FB 
                facebook.com/ejmm19
                mobiliariosfamarsa.com*//*ESTE CODIGO ES ELABOARO 100% DE LA AUTORÍA DE ERIC JOSE MARTINEZ MUENTES PAGINAS OFFICIALES FB 
                facebook.com/ejmm19
                mobiliariosfamarsa.com*//*ESTE CODIGO ES ELABOARO 100% DE LA AUTORÍA DE ERIC JOSE MARTINEZ MUENTES PAGINAS OFFICIALES FB 
                facebook.com/ejmm19
                mobiliariosfamarsa.com*/
          ?>
</div>
        
  </div>
  
  
</div>
    
    <script src="js/jquery.min.js"></script>   
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js" ></script>
    <script src="js/anm.js" ></script>
    <!--<script src="js/alertify.min.js"></script><script src="js/jqueryv1.min.js"></script>-->
     
   <script language="Javascript">





  function imprSelec(nombre)

  {

  var ficha = document.getElementById(nombre);

  var ventimp = window.open(' ', 'popimpr');

  ventimp.document.write( ficha.innerHTML );

  ventimp.document.close();

  ventimp.print( );

  ventimp.close();

  } 

  function mostconf(){
    document.getElementById("confiringreso").style.display = "block";
  }
  function cerrar(){
   document.getElementById("confiringreso").style.display = "none"; 
    window.location = 'inicio.php?op=6';
  }

</script> 

  </body>
</html>