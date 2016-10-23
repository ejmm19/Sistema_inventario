<?php 
            $stmt = conexion()->prepare("SELECT * FROM productos WHERE idProducto =".$_GET['edit']." ");
            $stmt->execute();
            $datos = $stmt->fetch();
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
    <div class="col-sm-8">
      <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
  <fieldset>
    <legend>Actualizar Datos del Articulo</legend>
    <div class="form-group">
      <div class="col-lg-4">
        <label for="exampleInputEmail1">
            Nombre 
          </label>
      </div>
      <div class="col-lg-8">
        <input type="text" class="form-control" id="inputEmail" name="nombre" placeholder="Nombre" value='<?php echo $datos[1]; ?>'>
      </div>
    </div>
    
     <div class="form-group">
       <div class="col-lg-4">
        <label for="exampleInputEmail1">
            Precio
          </label>
      </div>
      <div class="col-lg-8">
        <input type="text" class="form-control" id="inputEmail" onkeypress="return NumCheck(event, this)" name="preciosalida" placeholder="Precio de Salida" value='<?php echo $datos[4]; ?>'>
      </div>
    </div>
   
   
    <div class="form-group">      
     <div class="col-lg-4">
        <label for="exampleInputEmail1">
            
          </label>
      </div>
      <div class="col-lg-8">
        <input type="hidden" class="form-control" id="inputPassword" name="existencias" placeholder="Existencias" value='<?php echo $datos[7]; ?>'>
      </div>
    </div>
    
   

    
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <a href="inicio.php?op=1" class="btn btn-default">Cancelar</a>
        <input type="submit" class="btn btn-primary" name="enviar" value="Actualizar">
      </div>
    </div>
  </fieldset>

    </div>
    <div class="col-sm-4">
       <legend>.</legend>
      <div class="thumbnail">
      <img src="img/<?php echo $datos[9]; ?>" alt="...">
      <div class="caption">
        <div class="form-group">           
          <label for="exampleInputFile">
            Cambiar Imagen del Articulo
          </label>
          <input type="file" name="archivo" id="exampleInputFile" />
        </div>
      </div>
    </div>
    </div>
</form>
    <?php 
     if (isset($_POST['enviar'])) {
        Editar($datos[0],$_FILES['archivo']['name']);
        SubirImg($_FILES['archivo']);        
        }

     ?>
