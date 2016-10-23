

      <div class="well">
        <h3>Ingreso de Articulos a Bodega  <span class="glyphicon glyphicon-gift" aria-hidden="true"></span></h3>

      </div>      
      <div class="well">
        <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">

              <h4 id="titlelista">Lista de Articulos</h4>
              <div>
                  <a data-toggle="modal" data-target="#myModal" id="agg" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></a>
                  <a  href="inicio.php?op=6&dele" id="borr" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></a>
                  <button id="ingres"  class="btn btn-success" style="position: absolute; margin-left: -382px;">Registrar</button></div>
        </div>

    
       
      </div>
      
      <!--//////////////////////////////////////////////////////moda manual--> 
      </div> 
      <div class="" id="confiringreso">
  <div class="modal-header">
        <button type="button" onclick="cerrar();" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Articulo Nuevo</h4>
      </div>
  
    <form class="form-horizontal" method="post" action="php/generaringreso.php" id="ingresoconf" target="_blank">
          <fieldset>
           <div class="form-group">
               <div class="form-group">
              <label  class="col-lg-4 control-label">Concepto</label>
              <div class="col-lg-8">
                 <input type="text" class="form-control" value="" placeholder="Concepto" name="concepto" required="">
              </div>              
            </div>              
            </div>

            <div class="form-group">
               <div class="form-group">
              <label  class="col-lg-4 control-label">Nombre del Prov.</label>
              <div class="col-lg-8">
                 <input type="text" class="form-control" value="" placeholder="Nombre del Proveedor" name="origen" required="">
              </div>              
            </div>              
            </div>

            <!--<div class="form-group">
               <div class="form-group">
              <label  class="col-lg-4 control-label">Origen</label>
              <div class="col-lg-8">
                 <input type="text" class="form-control" value="" placeholder="Numero Comprobante" name="numcomp" >
              </div>              
            </div>              
            </div>-->

            <div class="form-group">
               <div class="form-group">
              <label  class="col-lg-4 control-label">N° Fact. Prov.</label>
              <div class="col-lg-8">
                 <input type="text" class="form-control" value="" placeholder="Numero Factura del Proveedor" name="numfac" >
              </div>              
            </div>              
            </div>

            

            <br><br>
            <div class="form-group">
              <div class="col-lg-offset-3 col-lg-9 ">
                <a href="inicio.php?op=6" class="btn btn-default">Cancelar</a>
                <input type="submit" name="agr" class="btn btn-primary" value="Ingresar">
              </div>
            </div>
          </fieldset>
        </form>
    
  </div>
  
  

      <!--//////////////////////////////////////////////////////moda manual-->





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
      //var_dump($_SESSION['carritoingreso']);
      
         
            
              if (isset($_SESSION['carritoingreso'])) {  
                  /*ESTE CODIGO ES ELABOARO 100% DE LA AUTORÍA DE ERIC JOSE MARTINEZ MUENTES PAGINAS OFFICIALES FB 
                facebook.com/ejmm19
                mobiliariosfamarsa.com*/
                /*ESTE CODIGO ES ELABOARO 100% DE LA AUTORÍA DE ERIC JOSE MARTINEZ MUENTES PAGINAS OFFICIALES FB 
                facebook.com/ejmm19
                mobiliariosfamarsa.com*/
                /*ESTE CODIGO ES ELABOARO 100% DE LA AUTORÍA DE ERIC JOSE MARTINEZ MUENTES PAGINAS OFFICIALES FB 
                facebook.com/ejmm19
                mobiliariosfamarsa.com*/
                  $dt = getdate();
                  $dianum=$dt["mday"];
                  $dianom=$dt["weekday"];
                  $mes=$dt["month"];
                  $ano=$dt["year"];
                  $hora=$dt["hours"]-9;
                  $min=$dt["minutes"];
                  $sec=$dt["seconds"];
                  $hoy=$ano;
                  
                         
                  $con = 1;
                  $id = 0;
                  $sum = 0;
                  $sm=0;
                  //var_dump($_SESSION['carrito']);     
                  foreach ($_SESSION['carritoingreso'] as $key) {
                    
                      $subto=$key['precio']*$key['cantidad'];
                      $sumar=$sum+=$subto;
                      $sm+=$key['cantidad'];
                    echo "<tr><td>".$key['id']."</td><td>".$key['nombre']."</td><td><b>".$key['precio']." USD</b></td><td>"
                          .$key['cantidad']."</td><td><b>".$subto." USD</b></td><td><a class='btn' href='inicio.php?op=6&editcar=".$id."'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a><a class='btn' style='color:red;' href='inicio.php?op=6&elimin=".$id."'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td><tr>";
                    $con++;
                    $id++;
                    $aux=0;
                    }
                  }            
              
                  if (isset($_GET['add'])) {
                          if (isset($_SESSION['carritoingreso'])) {
                              if (!empty($_SESSION['carritoingreso'])) {
                                  //$fecha =$dianum." de  ".$mes." de ".$ano."  A las".$hora.":".$min.":".$sec;
                              Agregararticulos();
                              echo "<script>window.location='./inicio.php?op=6';</script>";
                              //AnadirproVendido();
                              }
                              
                          }else{
                            echo "<script>alert('No tienes Articulos Añadidos')</script>";
                             echo "<script>window.location='./inicio.php?op=6';</script>";
                          }
                        }
                  if (isset($_GET['elimin'])) {
                    //var_dump($_SESSION['carrito']);  
                    unset($_SESSION['carritoingreso'][$_GET['elimin']]);
                    $_SESSION['carritoingreso'] = array_values($_SESSION['carritoingreso']);
                     echo "<script>window.location='./inicio.php?op=6';</script>";
                  } 
                  if (isset($_GET['editcar'])) {
                      echo "<style>#editcar{display:block;}</style>";
                   //print_r($_SESSION['carritoingreso'][$_GET['editcar']]['nombre']);
                      }
                  if (isset($_POST['editado'])) {
                      
                      $_SESSION['carritoingreso'][$_GET['editcar']]=array('id' => $_POST['cod'] ,'nombre' => $_POST['nom'], 'descripcion' => $_POST['descrip'], 'precio' => $_POST['preci'], 'cantidad' => $_POST['cantt'], 'imagen' =>$_SESSION['carritoingreso'][$_GET['editcar']]['imagen']);
                      echo "<script>window.location='./inicio.php?op=6';</script>";
                      //echo "<script>alert('hola mundo');</script>";
                  }
                      
                
             ?>
                </tbody>
        </table>

 
                




            <div id="editcar">
              <div class="modal-content" >
      <div class="modal-header">
        <a type="button" href="inicio.php?op=6" class="close" data-dismiss="modal">&times;</a>
        <h4 class="modal-title">Editar Articulo Nuevo</h4>
      </div>
      <div class="modal-body" >

        <form class="form-horizontal" method="post" action="">
          <fieldset>
           <div class="form-group">
              <label  class="col-lg-2 control-label">Codigo</label>
              <div class="col-lg-10"> 
                <input type="text" class="form-control" onkeypress="return NumCheck(event, this)" placeholder="Codigo" value="<?php print_r($_SESSION['carritoingreso'][$_GET['editcar']]['id']); ?>" name="cod" required="">
              </div>
              <br>
              <br>
            </div>
            <div class="form-group">
              <label  class="col-lg-2 control-label">Nombre</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" placeholder="Nombre" value="<?php print_r($_SESSION['carritoingreso'][$_GET['editcar']]['nombre']); ?>" name="nom" required="">
              </div>
              <br>
              <br>
            </div>
            <div class="form-group">
              <label  class="col-lg-2 control-label">Descripción</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" placeholder="Descripción" value="<?php print_r($_SESSION['carritoingreso'][$_GET['editcar']]['descripcion']); ?>" name="descrip" required="">
              </div>
              <br>
              <br>
            </div>
          
            <div class="form-group">
              <label  class="col-lg-2 control-label">Precio</label>
              <div class="col-lg-10">
                <input type="text" class="form-control numero" onkeypress="return NumCheck(event, this)" placeholder="Precio" value="<?php print_r($_SESSION['carritoingreso'][$_GET['editcar']]['precio']); ?>" name="preci" required="">
              </div>
              <br>
              <br>
            </div>
              <br><br>
            <div class="form-group">
              <label  class="col-lg-2 control-label">Existencias</label>
              <div class="col-lg-10">
                <input type="number" class="form-control" min="1" value="<?php print_r($_SESSION['carritoingreso'][$_GET['editcar']]['cantidad']); ?>" placeholder="Cantidad" name="cantt">
              </div>
              
            </div>
              
              
            <br><br>
            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                
                <button name="editado" class="btn btn-primary">Agregar</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
      <div class="modal-footer">
        <a type="button" href="inicio.php?op=6" class="btn btn-default" data-dismiss="modal">Cerrar</a>
      </div>
    </div>
    
            </div>









                 

    

    
    <!-- Modal -->



<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Articulo Nuevo</h4>
      </div>
      <div class="modal-body" >

        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
          <fieldset>
           <div class="form-group">
              <label  class="col-lg-2 control-label">Codigo</label>
              <div class="col-lg-10"> 
                <input type="text" class="form-control" onkeypress="return NumCheck(event, this)" placeholder="Codigo" value="000000<?php echo UltimoReg()+1; ?>" name="code" required="">
              </div>
              <br>
              <br>
            </div>
            <div class="form-group">
              <label  class="col-lg-2 control-label">Nombre</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" placeholder="Nombre" name="nombre" required="">
              </div>
              <br>
              <br>
            </div>
            <div class="form-group">
              <label  class="col-lg-2 control-label">Descripción</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" placeholder="Descripción" name="descripcion" required="">
              </div>
              <br>
              <br>
            </div>
          
            <div class="form-group">
              <label  class="col-lg-2 control-label">Precio</label>
              <div class="col-lg-10">
                <input type="text" class="form-control numero" onkeypress="return NumCheck(event, this)" placeholder="Precio" name="precio" required="">
              </div>
              <br>
              <br>
            </div>
              <br><br>
            <div class="form-group">
              <label  class="col-lg-2 control-label">Existencias</label>
              <div class="col-lg-10">
                <input type="number" class="form-control" min="1" placeholder="Cantidad" name="cant">
              </div>
              <br>
              <br>
            </div>
              <br>
              <br>
              <br>
              <div class="form-group">           
              <label for="select" class="col-lg-2 control-label">Imagen</label>
              <div class="col-lg-10">
                  <input type="file" name="imgprod" id="exampleInputFile" />
                </div>
            </div>
            <br><br>
            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default">Borrar</button>
                <button name="agreg" class="btn btn-primary">Agregar</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    


</div>

<div id="example class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Articulo Existente</h4>
      </div>
      <div class="modal-body" >

        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
          <fieldset>
           <div class="form-group">
               <div class="form-group">
              <label  class="col-lg-2 control-label">Nombre</label>
              <div class="col-lg-10">
                 <select name="nombre" id="neim" class="form-control" id="select">
                  <?php ListarSelect('productos') ?>
                </select>
              </div>
              <br>
              <br>
            </div>
              <div class="col-lg-10"> 
                <input type="hidden" class="form-control" onkeypress="return NumCheck(event, this)" placeholder="Codigo" id="code" value="" name="code" >
              </div>
              <br>
              <br>
            </div>
           
            <div class="form-group">
              <label  class="col-lg-2 control-label">Existencias</label>
              <div class="col-lg-10">
                <input type="number" class="form-control" min="1"  placeholder="Cantidad" name="cant">
              </div>
              <br>
              <br>
            </div>
            <div class="form-group">
              
              <div class="col-lg-10">
                <input type="hidden" class="form-control" placeholder="Descripción" name="descripcion" required="">
              </div>
             
            </div>
          
            <div class="form-group">
              
              <div class="col-lg-10">
                <input type="hidden" class="form-control numero" value="" 
                placeholder="Precio" name="precio" required="">
              </div>
              
            </div>
              
            
              <div class="form-group">           
              
              <div class="col-lg-10">
                  <input type="hidden" name="imgprod" id="exampleInputFile" />
                </div>
            </div>
            <br><br>
            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default">Borrar</button>
                <button name="agr" class="btn btn-primary">Agregar</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    


</div>
<?php if (isset($_POST['agreg'])) {
             carritoingreso($_POST['code']);
             SubirImg($_FILES['imgprod']);
             echo "<script>window.location='./inicio.php?op=6';</script>";
            // echo "<script>alert('jerusalem')</script>";
      }
      if (isset($_POST['agr'])) {
            carritoingreso($_POST['nombre']);
             
             echo "<script>window.location='./inicio.php?op=6';</script>";
             //echo "<script>alert('jerusalem')</script>";
      }
      if (isset($_GET['dele'])) {
           unset($_SESSION['carritoingreso']);
            echo "<script>window.location='./inicio.php?op=6';</script>";
      }
       ?>








  