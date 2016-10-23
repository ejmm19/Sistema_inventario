<?php 
         include("conexion.php");
            $stmt = $con->prepare("SELECT * FROM categorias WHERE idcategoria =".$_GET['editcat']." ");
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
        <input type="text" class="form-control" id="inputEmail" name="nombre" placeholder="" value='<?php echo $datos[1]; ?>'>
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
        EditarCat($datos[0],$_POST['nombre']);     
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
