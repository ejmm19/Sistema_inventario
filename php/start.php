<marquee width="40%" height="20" align="bottom">
  <?php  marquee() ?>
</marquee>
</marquee>
      <div class="well">
        
        <form class="navbar-form" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="busqueda">
            </div> 
            <button type="reset" class="btn btn-default">
              Borrar
            </button>
          </form>

      </div>  
          
      <div class="row">
       <div class="col-sm-6">
        <div class="well">
          <div class="row">

            
               <div id="resultado"></div>
            
            

                <div class="col-md-4" id="confir">
                  
                 
              </div>
                   

          </div>
          </div>
          </div>
          <div class="col-sm-6" id="carrito">
        <div class="well" style="border: solid;
    border-color: #337ab7";><center><h4>Lista de Elementos</h4></center>
        <?php if (!empty($_SESSION['carrito'])) {
            echo " <a class='btn btn-danger' style='position: absolute; margin-top: -42px;' href='inicio.php?vaciar'><span class='glyphicon glyphicon-trash' aria-hidden='true'> </span>    Eliminar Todo</a> 
            <a  class='btn btn-success' style='position: absolute;margin-top: -42px; margin-left: 73%;' data-toggle='modal' data-target='#myModal' ><span class='glyphicon glyphicon-thumbs-up' aria-hidden='true'></span>  Entregar</a>";
        } ?>

          <div class="row">
            <div class="col-sm-12">
              
              
              
            
             <table class="table">
         <!-- Modal -->
                <div id="msj"></div>
                
         <thead>
            <tr>
             <th>Codigo</th> 
             <th>Nombre</th>
             <th>P. Unitario</th>
             <th>Cant.</th>
             <th>Subtotal</th> 
             <th>Opción</th>             
          </tr>
        </thead>
        <tbody>
            
        <?php 
        /*ESTE CODIGO ES ELABOARO 100% DE LA AUTORÍA DE ERIC JOSE MARTINEZ MUENTES PAGINAS OFFICIALES FB 
                facebook.com/ejmm19
                mobiliariosfamarsa.com*/
                /*ESTE CODIGO ES ELABOARO 100% DE LA AUTORÍA DE ERIC JOSE MARTINEZ MUENTES PAGINAS OFFICIALES FB 
                facebook.com/ejmm19
                mobiliariosfamarsa.com*/
                /*ESTE CODIGO ES ELABOARO 100% DE LA AUTORÍA DE ERIC JOSE MARTINEZ MUENTES PAGINAS OFFICIALES FB 
                facebook.com/ejmm19
                mobiliariosfamarsa.com*/
              if (isset($_SESSION['carrito'])) {  
                  setlocale(LC_ALL,"es_ES.UTF-8");                   
                  $dt = getdate();
                  $dianum=$dt["mday"];
                  $dianom=$dt["weekday"];
                  $mes=$dt["month"];
                  $ano=$dt["year"];
                  $hora=$dt["hours"]-9;
                  $min=$dt["minutes"];
                  $sec=$dt["seconds"];
                  $hoy=$ano;
                  
                  $_SESSION['cuenta']=array();        
                  $con = 1;
                  $id = 0;
                  $sum = 0;
                  $sm=0;
                  //var_dump($_SESSION['carrito']);     
                  foreach ($_SESSION['carrito'] as $key) {
                    
                      $subto=$key['precio']*$key['cantidad'];
                      $sumar=$sum+=$subto;
                      $sm+=$key['cantidad'];
                    echo "<tr><td>".$con."</td><td>".$key['nombre']."</td><td><b>".$key['precio']." USD</b></td><td>"
                          .$key['cantidad']."</td><td><b>".$subto." USD</b></td><td><a class='btn' style='color:red;' href='inicio.php?eliminarart=".$id."'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td><tr>";
                    $con++;
                    $id++;
                    $aux=0;
                    }
                    if (!empty($_SESSION['carrito'])) {
                    $iva = (int) MostrarIva();
                    $ivasacado=$sumar*$iva/100;
                    $total=$ivasacado+$sumar;
                    
                      echo "<div id='total' class='total'><p id='subt' class='subt'> Total:</p><b>".$total."  USD</b></div>";
                    }else{
                      echo "<div id='total' class='total'>0 <b>USD</b></div>";
                    }
                    
                  }
                 
                  
                  if (isset($_GET['vender'])) {
                          if (!empty($_SESSION['carrito'])) {
                            
                              //RestarproVendido($_SESSION['carrito']);
                              
                          }


                  }if (isset($_GET['add'])) {
                          date_default_timezone_set('America/Bogota');
                            $dia=date('d/m/20y');
                              
                              
                              Agregarventa($dia,$total,$sumar,'Egreso',$sm,$_SESSION['username']);

                  }
                      
                if (isset($_GET['eliminarart'])) {
                    //var_dump($_SESSION['carrito']);  
                    unset($_SESSION['carrito'][$_GET['eliminarart']]);
                    $_SESSION['carrito'] = array_values($_SESSION['carrito']);
                    echo "<script>window.location='./inicio.php';</script>";
                  }  
                  /*ESTE CODIGO ES ELABOARO 100% DE LA AUTORÍA DE ERIC JOSE MARTINEZ MUENTES PAGINAS OFFICIALES FB 
                facebook.com/ejmm19
                mobiliariosfamarsa.com*/
                /*ESTE CODIGO ES ELABOARO 100% DE LA AUTORÍA DE ERIC JOSE MARTINEZ MUENTES PAGINAS OFFICIALES FB 
                facebook.com/ejmm19
                mobiliariosfamarsa.com*/
                /*ESTE CODIGO ES ELABOARO 100% DE LA AUTORÍA DE ERIC JOSE MARTINEZ MUENTES PAGINAS OFFICIALES FB 
                facebook.com/ejmm19
                mobiliariosfamarsa.com*/
             ?>
                  
          
        </tbody>
        </table>
            </div>
                   

          </div>
          </div>
          </div>
      </div>




<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <form action="php/generaregreso.php" method="POST" target="_blank">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <fieldset>
    <legend><br></legend>
    
       <br>
      <br>
      <center><h3>Se le Hará Entregar a:</h3></center>
      <br>
      <br>
      <div class="form-group">
      <label for="textArea" class="col-lg-3 control-label">Solicitante</label>
      <div class="col-lg-9">
        <select name="solicitante" class="form-control">
      <?php ListarSelect2('solicitante'); ?>
      </select>
      </div>
    </div>
      <br><br>

      <div class="form-group">
      <label for="textArea" class="col-lg-3 control-label">Unidada Solicitante</label>
      <div class="col-lg-9">
      <select class="selectpicker form-control" name="unidsol">
        <optgroup label="Inversión">
          <option value="Café Cacao">Café Cacao</option>
          <option value="Reforma Institucional (UZIS)">Reforma Institucional (UZIS)</option>
          <option value="Agroseguros">Agroseguros</option>
          <option value="ATPA">ATPA</option>
        </optgroup>
        <optgroup label="Gasto Corriente">
          <option value="U. Administrativa Financiera">U. Administrativa Financiera</option>
          <option value="Unidad Juridica">Unidad Juridica</option>
          <option value="Dirección P.A Orellana">Dirección P.A Orellana</option>
        </optgroup>
      </select>
      </div>

    </div>
      <br>
      <br>
      <div class="form-group">
      <label for="textArea" class="col-lg-3 control-label">Observaciones</label>
      <div class="col-lg-9">
        <textarea class="form-control" rows="3" id="textArea" name="obs"></textarea>
        <span class="help-block">En este campo puede registrar las observaciones que se tendrán en cuenta en la entrega</span>
      </div>
    </div>
      
      <br>
      <br>
      <div class="form-group">
        <div class="col-lg-7 col-lg-offset-5">
         
          <input class="btn btn-success" href="inicio.php?add" type="submit" name="enviar" value="Aceptar">
        </div>
      </div>
    </fieldset>
  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

 






