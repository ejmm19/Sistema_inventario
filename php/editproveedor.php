<?php 
        
            $stmt = conexion()->prepare("SELECT * FROM proveedor WHERE idproveedor =".$_GET['editproveedor']." ");
            $stmt->execute();
            $datos = $stmt->fetch();
 ?>    
    <div class="col-sm-8">
      <form class="form-horizontal" method="POST" action="">
  <fieldset>
    <legend>Actualizar Categoria de Productos</legend>
    <div class="form-group">
      <div class="col-lg-4">
        <label for="exampleInputEmail1">
            Nombre de Categoria
          </label>
      </div>
      <div class="col-lg-8">
        <input type="text" class="form-control" name="nombre" placeholder="" value='<?php echo $datos[1]; ?>'>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-4">
        <label for="exampleInputEmail1">
            Dirección
          </label>
      </div>
      <div class="col-lg-8">
        <input type="text" class="form-control" name="direccion" placeholder="" value='<?php echo $datos[2]; ?>'>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-4">
        <label for="exampleInputEmail1">
            Telefono
          </label>
      </div>
      <div class="col-lg-8">
        <input type="number" class="form-control" name="telefono" placeholder="" value='<?php echo $datos[3]; ?>'>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-4">
        <label for="exampleInputEmail1">
            Correo
          </label>
      </div>
      <div class="col-lg-8">
        <input type="text" class="form-control" name="correo" placeholder="" value='<?php echo $datos[4]; ?>'>
      </div>
    </div>
    
    
    <div class="form-group">
      <div class="col-lg-4 col-lg-offset-8">
        <a href="inicio.php?op=7" class="btn btn-default">Cancelar</a>
        <input type="submit" class="btn btn-primary" name="enviar" value="Actualizar">
      </div>
    </div>
  </fieldset>

    </div>
    
</form>
    <?php 
     if (isset($_POST['enviar'])) {
        EditarProveedor($datos[0],$_POST['nombre'],$_POST['direccion'],$_POST['telefono'],$_POST['correo']);     
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
