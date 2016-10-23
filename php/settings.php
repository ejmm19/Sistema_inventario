      <div class="well">
        <h3>Despacho de Bodega <span class="glyphicon glyphicon-export" aria-hidden="true"></span></h3>
      </div>      
      <div class="well">
      <div class="panel-heading">

              <h4 id="titlelista">Agregar Articulos para Despacho de Bodega</h4>
              <?php if (isset($_SESSION['carritodespacho'])) {
                      if (!empty($_SESSION['carritodespacho'])) {
                  echo "<a id='gdbog'  class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Generar Despacho de Bodega</a>";
              }
              } ?>
              
        </div><br>
      
        <br>
        <br>
        <div class="row">          
          <div class="col-sm-4">
          <form action="" method="POST" id="settings">
        <fieldset>
          <legend></legend>
          <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Codigo</label>
            <div class="col-lg-10">
            <input type="text" class="form-control" name="code">
          </div>
          </div>
          <br><br>
          <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Nombre</label>
            <div class="col-lg-10">
            <input type="text" class="form-control" name="name">
          </div>
          </div>
            <br><br>
            <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Unidad</label>
            <div class="col-lg-10">
            <select name="unud" id="" class="col-lg-10 form-control">
              <option value="cm">Centímetros</option>
              <option value="mts">Metros</option>
              <option value="1/4">Cuarto</option>
              <option value="gl">Galones</option>
              <option value="lt">Litros</option>
              <option value="oz">Onzas</option>
              <option value="lib">Libras</option>
              <option value="kl">Kilos</option>
            </select>
          </div>
          </div>
          <br><br>
          <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Cantidad</label>
            <div class="col-lg-10">
            <input type="number" class="form-control" min="1" name="cantd">
          </div>
          </div>
          <br><br>
          <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Precio</label>
            <div class="col-lg-10">
            <input type="text" class="form-control" name="precs">
          </div>
          </div>
          <br><br>
          <div class="form-group">
          <div class="col-lg-8"></div>
            <div class="col-lg-4">
              <button type="submit" name="aadespacho" class="btn btn-primary">Agregar</button>
            </div>
          </div>
          </fieldset>
      </form>
          </div>
        
    

    <div class="col-sm-8">
      

             <table class="table">
         <!-- Modal -->
                <div id="msj"></div>
                
         <thead>
            <tr>
             <th>Codigo</th> 
             <th>Nombre</th>
             <th>unidad</th>
             <th>Cant.</th>
             <th>P. Unitario</th>
             <th>Subtotal</th> 
             <th>Opción</th>             
          </tr>
        </thead>
        <tbody>
             <?php if (isset($_SESSION['carritodespacho'])) {
                //var_dump($_SESSION['carritodespacho']);
           $con = 1;
           $id = 0;
           $sum = 0;
           $sm=0;
           
          foreach ($_SESSION['carritodespacho'] as $key) {
            $subto=$key['precio']*$key['cantidad'];
            $sumar=$sum+=$subto;
            $sm+=$key['cantidad'];
            echo "<tr><td>".$key['id']."</td><td>".$key['nombre']."</td><td>".$key['unidad']."</td><td>".$key['cantidad']."</td><td><b>".$key['precio']." USD</b></td><td><b>".$subto." USD</b></td><td><a class='btn' href='inicio.php?op=4&edi=".$id."'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a><a class='btn' style='color:red;' href='inicio.php?op=4&eli=".$id."'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td><tr>";
                          $con++;
          }
             }


           ?>
    </div>
        </tbody>
        </table>

    </div>
     </div>
     </div>



    <div id="edi">
              <div class="modal-content" >
      <div class="modal-header">
        <a type="button" href="inicio.php?op=4" class="close" data-dismiss="modal">&times;</a>
        <h4 class="modal-title">Editar Articulo para Despacho</h4>
      </div>
      <div class="modal-body" >

        <form class="form-horizontal" method="post" action="">
          <fieldset>
           <div class="form-group">
              <label  class="col-lg-2 control-label">Codigo</label>
              <div class="col-lg-10"> 
                <input type="text" class="form-control" onkeypress="return NumCheck(event, this)" placeholder="Codigo" value="<?php print_r($_SESSION['carritodespacho'][$_GET['edi']]['id']); ?>" name="co" required="">
              </div>
              <br>
              <br>
            </div>
            <div class="form-group">
              <label  class="col-lg-2 control-label">Nombre</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" placeholder="Nombre" value="<?php print_r($_SESSION['carritodespacho'][$_GET['edi']]['nombre']); ?>" name="no" required="">
              </div>
              <br>
              <br>
            </div>
            <div class="form-group">
              <label  class="col-lg-2 control-label">Unidad</label>
              <div class="col-lg-10">
            <select name="un" id="" class="col-lg-10 form-control">
              <option value="<?php print_r($_SESSION['carritodespacho'][$_GET['edi']]['unidad']); ?>"><?php print_r($_SESSION['carritodespacho'][$_GET['edi']]['unidad']); ?></option>
              <option value="cm">Centímetros</option>
              <option value="mts">Metros</option>
              <option value="1/4">Cuarto</option>
              <option value="gl">Galones</option>
              <option value="lt">Litros</option>
              <option value="oz">Onzas</option>
              <option value="lib">Libras</option>
              <option value="kl">Kilos</option>
            </select>
              </div>
              <br>
              <br>
            </div>
          
            <div class="form-group">
              <label  class="col-lg-2 control-label">Precio</label>
              <div class="col-lg-10">
                <input type="text" class="form-control numero" onkeypress="return NumCheck(event, this)" placeholder="Precio" value="<?php print_r($_SESSION['carritodespacho'][$_GET['edi']]['precio']); ?>" name="pre" required="">
              </div>
             
            </div>
              
            <div class="form-group">
              <label  class="col-lg-2 control-label">Cantidad</label>
              <div class="col-lg-10">
                <input type="number" class="form-control" min="1" value="<?php print_r($_SESSION['carritodespacho'][$_GET['edi']]['cantidad']); ?>" placeholder="Cantidad" name="ca">
              </div>
              
            </div>
              
              
            <br><br>
            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                
                <button name="edita" class="btn btn-primary">Corregir</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
      <div class="modal-footer">
        <a type="button" href="inicio.php?op=4" class="btn btn-default" data-dismiss="modal">Cerrar</a>
      </div>
    </div>
    
            </div>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <form action="php/generardespacho.php" method="POST" target="_blank">
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
        <select name="sol" class="form-control">
      <?php ListarSelect2('solicitante'); ?>
      </select>
      </div>
    </div>
      <br><br>

      <div class="form-group">
      <label for="textArea" class="col-lg-3 control-label">Unidada Solicitante</label>
      <div class="col-lg-9">
      <select class="selectpicker form-control" name="unidadsol">
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
        <textarea class="form-control" rows="3" id="textArea" name="obser"></textarea>
        <span class="help-block">En este campo puede registrar las observaciones que se tendrán en cuenta en la entrega</span>
      </div>
    </div>
      
      <br>
      <br>
      <div class="form-group">
        <div class="col-lg-7 col-lg-offset-5">
         
          <input class="btn btn-success"  type="submit" name="enviar" value="Aceptar">
        </div>
      </div>
    </fieldset>
  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>



     <?php if (isset($_POST['aadespacho'])) {
              carritoDespacho();
              echo "<script>window.location='./inicio.php?op=4';</script>";
     }
     if (isset($_GET['eli'])) {
                    //var_dump($_SESSION['carrito']);  
                    unset($_SESSION['carritodespacho'][$_GET['eli']]);
                    $_SESSION['carritodespacho'] = array_values($_SESSION['carritodespacho']);
                    echo "<script>window.location='./inicio.php?op=4';</script>";
                  }
      if (isset($_GET['edi'])) {
          echo "<style>#edi{display:block;}</style>";
                   //print_r($_SESSION['carritodespacho'][$_GET['edi']]['nombre']);
      }
      if (isset($_POST['edita'])) {
                      $_SESSION['carritodespacho'][$_GET['edi']]=array('id' => $_POST['co'] ,'nombre' => $_POST['no'], 'precio' => $_POST['pre'], 'unidad' => $_POST['un'], 'cantidad' => $_POST['ca']);
                      echo "<script>window.location='./inicio.php?op=4';</script>";
                      //echo "<script>alert('hola mundo');</script>";
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
                /*ESTE CODIGO ES ELABOARO 100% DE LA AUTORÍA DE ERIC JOSE MARTINEZ MUENTES PAGINAS OFFICIALES FB 
                facebook.com/ejmm19
                mobiliariosfamarsa.com*/?>

        
  