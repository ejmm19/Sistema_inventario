<?php   
/*ESTE CODIGO ES ELABOARO 100% DE LA AUTORÍA DE ERIC JOSE MARTINEZ MUENTES PAGINAS OFFICIALES FB 
                facebook.com/ejmm19
                mobiliariosfamarsa.com*/

                /*ESTE CODIGO ES ELABOARO 100% DE LA AUTORÍA DE ERIC JOSE MARTINEZ MUENTES PAGINAS OFFICIALES FB 
                facebook.com/ejmm19
                mobiliariosfamarsa.com*/
include("conexion.php");


      if (isset($_POST['b'])) {
        $buscar = $_POST['b'];
        if(!empty($buscar)) {
            buscar($buscar);
        }
      }
      if (isset($_POST['busca'])) {
        $buscar = $_POST['busca'];
        if(!empty($buscar)) {
            buscarProd($buscar);
         }else{
          echo'<script>window.location="inicio.php?op=1";</script>';
         }
      }
      if (isset($_POST['usuario'])) {
          $user = $_POST['usuario'];
          $pass = $_POST['password']; 
          loguear($user,$pass);
      }
      if (isset($_POST['verpr'])) {
        MostrarProd();
      }
      if (isset($_POST['id'])) {
           //echo "<script>alert('hola agregando ".$_POST['id']."');</script>";
           carrito($_POST['id']);
          }
      if (isset($_GET['vaciar'])) {
           unset($_SESSION['carrito']);
           unset($_SESSION['cuenta']);
            echo "<script>window.location='./inicio.php';</script>";
      }
      if (isset($_POST['limite'])) {
                    limitar($_POST['limite']);
                    
                }
      /*function arreglo($id,$nombre,$precio){
        $carrito = array(
          'id'=>$id,
          'nombre' => $nombre,
          'precio' => $precio);
        return $carrito;

      }*/
      /*function llenararreglo(){
        $articulos = arreglo($id,Converterselect($_POST['id'],'productos','idProducto','nombre'),Converterselect($_POST['id'],'productos','idProducto','preciosalida'));
        $productos = new articulo ($articulos);
        $_SESSION['productos']=$productos;

      }*/
            
      /*function prueba(){
            $sql = conexion()->prepare("SELECT * FROM productos WHERE idProducto = 5 ");
            $sql->execute();
            $dat = $sql->fetch();
            return $dat[1];
    }*/
      function carrito($idd){
        $id = $idd;
        $nombre = Converterselect($id,'productos','idProducto','nombre');
        $precio = Converterselect($id,'productos','idProducto','preciosalida');
        $cantidad = $_POST['cant'];
        $canastica[]  = array('id' => $id ,'nombre' => $nombre, 'precio' => $precio, 'cantidad' => $cantidad);

        
        

      if (isset($_SESSION['carrito'])) {
        $canastica = $_SESSION['carrito'];
        if (isset($id)) {
          $id = $id;
          $nombre = Converterselect($id,'productos','idProducto','nombre');
          $precio = Converterselect($id,'productos','idProducto','preciosalida');  
          $pos = -1;
          
          if ($pos<>-1) {
            $cuanto=$canastica[$pos]['cantidad']+$cantidad;
            $canastica[$pos]=array('id' => $id ,'nombre' => $nombre, 'precio' => $precio, 'cantidad' => $cantidad);
          }else{
            $canastica[] = array('id' => $id ,'nombre' => $nombre, 'precio' => $precio, 'cantidad' => $cantidad); 
          }
        }
      }


        if (isset($canastica)) {

          $_SESSION['carrito'] = $canastica;
        }
      } 

      function carritoIngreso($dt){

        $sql=conexion()->prepare("SELECT * FROM productos WHERE idProducto = ".$dt."");
        $sql->execute();
        $date=$sql->fetch();
          //echo "<script>alert('".$dt."')</script>";
        
        if ($date[0]===$dt) {
              $id = $date[0];
              $nombre = $date[1];
              $descripcion = $date[2];
              $precio = $date[4];
              $cantidad = $_POST['cant'];
              $imagen=$date[9];
              $canastica[] = array('id' => $id ,'nombre' => $nombre, 'descripcion' => $descripcion, 'precio' => $precio, 'cantidad' => $cantidad, 'imagen' =>$imagen); 

              if (isset($_SESSION['carritoingreso'])) {
                $canastica = $_SESSION['carritoingreso'];
                if (isset($id)) {     
                  $pos = -1;          
                  if ($pos<>-1) {
                    $cuanto=$canastica[$pos]['cant']+$cantidad;
                    $canastica[$pos]=array('id' => $id ,'nombre' => $nombre, 'descripcion' => $descripcion, 'precio' => $precio, 'cantidad' => $cantidad, 'imagen' =>$imagen);
                  }else{
                    $canastica[] = array('id' => $id ,'nombre' => $nombre, 'descripcion' => $descripcion, 'precio' => $precio, 'cantidad' => $cantidad, 'imagen' =>$imagen); 
                  }
                }
              }

              if (isset($canastica)) {

                $_SESSION['carritoingreso'] = $canastica;
              }

        }else{  

          if ($_POST['code']!== UltimoReg()) {      
          
          $id = $_POST['code'];
          $nombre = $_POST['nombre'];
          $descripcion = $_POST['descripcion'];
          $precio = $_POST['precio'];
          $cantidad = $_POST['cant'];
          $imagen=$_FILES['imgprod']['name'];
          $canastica[]  = array('id' => $id ,'nombre' => $nombre, 'descripcion' => $descripcion, 'precio' => $precio, 'cantidad' => $cantidad, 'imagen' =>$imagen);

          if (isset($_SESSION['carritoingreso'])) {
          $canastica = $_SESSION['carritoingreso'];
          if (isset($id)) {     
            $pos = -1;          
            if ($pos<>-1) {
              $cuanto=$canastica[$pos]['cant']+$cantidad;
              $canastica[$pos]=array('id' => $id ,'nombre' => $nombre, 'descripcion' => $descripcion, 'precio' => $precio, 'cantidad' => $cantidad, 'imagen' =>$imagen);
            }else{
              $canastica[] = array('id' => $id ,'nombre' => $nombre, 'descripcion' => $descripcion, 'precio' => $precio, 'cantidad' => $cantidad, 'imagen' =>$imagen); 
            }
          }
        }

        if (isset($canastica)) {

          $_SESSION['carritoingreso'] = $canastica;
        }
        
        
        

      
      }else{
        echo "<script>alert('El Codigo del Articulo que vas asignar ya está en uso')</script>";
      }
    }
}

    function carritoIngreso2($dt){
        

          $sql=conexion()->prepare("SELECT * FROM productos WHERE idProducto = ".$dt."");
          $sql->execute();
          $date=$sql->fetch();
          //echo "<script>alert('".$dt."')</script>";
            $id = $date[0];
            $nombre = $date[1];
            $descripcion = $date[2];
            $precio = $date[4];
            $cantidad = $_POST['cant'];
            $imagen=$date[9];
            $canasta[] = array('id' => $id ,'nombre' => $nombre, 'descripcion' => $descripcion, 'precio' => $precio, 'cantidad' => $cantidad, 'imagen' =>$imagen); 
          
          if (isset($_SESSION['carritoingreso'])) {
              $pos= count($_SESSION['carritoingreso']);
              $_SESSION['carritoingreso'][$pos]=$canasta;
              //echo "<script>alert('existe')</script>";
          }else{
            $_SESSION['carritoingreso'] = $canasta;    
          }

            
                   





          
          echo "<script>window.location='./inicio.php?op=6';</script>";
    //echo "<script>alert('".var_dump($_SESSION['carritoingreso'])."')</script>";
  }
  function carritoDespacho(){
        $id = $_POST['code'];
        $nombre = $_POST['name'];
        $unidad = $_POST['unud'];
        $precio = $_POST['precs'];
        $cantidad = $_POST['cantd'];
        $canastadespacho[]  = array('id' => $id ,'nombre' => $nombre, 'precio' => $precio, 'unidad' => $unidad, 'cantidad' => $cantidad);

        
        

      if (isset($_SESSION['carritodespacho'])) {
        $canastadespacho = $_SESSION['carritodespacho'];
        if (isset($id)) {
          $pos = -1;
          if ($pos<>-1) {
            $cuanto=$canastadespacho[$pos]['cantidad']+$cantidad;
            $canastadespacho[$pos]=array('id' => $id ,'nombre' => $nombre, 'precio' => $precio, 'unidad' => $unidad, 'cantidad' => $cantidad);
          }else{
            $canastadespacho[] = array('id' => $id ,'nombre' => $nombre, 'precio' => $precio, 'unidad' => $unidad, 'cantidad' => $cantidad);
          }
        }
      }


        if (isset($canastadespacho)) {

          $_SESSION['carritodespacho'] = $canastadespacho;
        }
      } 
      function ListarSelect($tabla){
            $sql = conexion()->prepare("SELECT * FROM ".$tabla."");
            $sql->execute();
            while( $datos = $sql->fetch() )
                  echo "<option value='".$datos[0]."'>".$datos[1]."</option>";
          }
      function buscarProd($b) {
            $stmt = conexion()->prepare("SELECT * FROM productos WHERE nombre LIKE '%".$b."%' LIMIT 10");
            $stmt->execute();
            while( $datos = $stmt->fetch() ) 
                  echo "<tr>
                      <th scope='row'>".$datos[0]."</th>
                        <td>".$datos[1]."</td>
                        <td><b>".$datos[3]."</b>  USD</td>
                        <td><b>".$datos[4]."</b>  USD</td>
                        
                        
                        <td>".$datos[7]."</td>
                        
                        <td><center><a href='inicio.php?op=1&edit=".$datos[0]."' style='color:#337ab7'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>&nbsp;&nbsp;&nbsp;&nbsp;<a onclick='return confirmar();' href='inicio.php?op=1&delete=".$datos[0]."' style='color:#FF5722'><span class='glyphicon glyphicon-remove'  aria-hidden='true'></span></a></center></td>
                    </tr>";
      }

        
      function buscar($b) {
            $stmt = conexion()->prepare("SELECT * FROM productos WHERE nombre LIKE '%".$b."%' LIMIT 10");
            $stmt->execute();
            while( $datos = $stmt->fetch() )
              echo 
                  "<form method='POST' action='' class='enviar'>
                  <div class='col-sm-6 col-md-6'>
                    <div class='thumbnail'>
                      <img src='img/".$datos[9]."' alt='Producto' width='150px' height='300px' >
                      <div class='caption'>
                        <h4>".$datos[1]."</h4>
                        <p>".$datos[2]."</p>
                        <input type='hidden'  name='id' value='".$datos[0]."'>
                        <input type='number'  name='cant' value='1' min='1' max='".$datos[7]."' class='form-control cant'>
                        <p><h5><b>".$datos[7]." Disponibles</b></h5>
                        <input type='submit' class='btn btn-primary' value='Agregar'>
                        </p>
                      </div>
                    </div>
                  </div>
                  </form>";
      }
      function loguear($user,$pass){
            session_start();
            $stmt = conexion()->prepare("SELECT * FROM usuarios WHERE user = '".$user."' AND password = '".$pass."'");
            $stmt->execute();
            $datos = $stmt->fetch();
            if (($datos[4] !== $user && $datos[5] === $pass) or ($datos[4] == $pass && $datos[5] !== $pass) or ($datos[4] !== $user && $datos[5] !== $pass)) {
              echo "No Concuerdan";  
            }else{
              echo "<script>window.location='./inicio.php';</script>";
              $_SESSION['username'] = $datos[1]." ".$datos[2];
            }
      }
      function AgregarUsuario($nombre,$apellidos,$correo,$usuario,$pass){
            $sql=conexion()->prepare("INSERT INTO usuarios (nombre , apellidos , correo , user , password) VALUES ('".$nombre."','".$apellidos."','".$correo."','".$usuario."','".$pass."')");
            $sql->execute();
            echo "<script>window.location='./inicio.php?op=5';</script>";
      }
      function ConverterId($id,$tabla,$idtab){
            $sql = conexion()->prepare("SELECT * FROM ".$tabla." WHERE ".$idtab." =".$id." ");
            $sql->execute();
            $dat = $sql->fetch();
            return $dat[1];
    }
    function Converterselect($id,$tabla,$idtab,$celda){
            $sql = conexion()->prepare("SELECT ".$celda." FROM ".$tabla." WHERE ".$idtab." =".$id." ");
            $sql->execute();
            $dat = $sql->fetch();
            return $dat[$celda];
    }
      function MostrarProd(){
                  $sql = conexion()->prepare("SELECT * FROM productos ");
                  $sql->execute();
                  while( $datos = $sql->fetch() )
                    echo 
                        "<tr>
                      <th scope='row'>".$datos[0]."</th>
                        <td>".$datos[1]."</td>
                        
                        <td><b>".$datos[4]."</b>  USD</td>
                    
                        
                        <td>".$datos[7]."</td>
                        
                        <td><center><a href='inicio.php?op=1&edit=".$datos[0]."' style='color:#337ab7'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>&nbsp;&nbsp;&nbsp;&nbsp;<a onclick='return confirmar();' href='inicio.php?op=1&delete=".$datos[0]."' style='color:#FF5722'><span class='glyphicon glyphicon-remove'  aria-hidden='true'></span></a></center></td>
                    </tr>";
      }
      function MostrarInventario(){
                  $sql = conexion()->prepare("SELECT * FROM productos ");
                  $sql->execute();

                  while( $datos = $sql->fetch() )
                    echo 
                        "<tr>
                      <th scope='row'>".$datos[0]."</th>
                        <td>".$datos[1]."</td>                        
                        <td><b>".$datos[4]."</b>  USD</td>
                        <td><b>".$datos[7]."</b></td>
                        <td><b>".$datos[4]*$datos[7]." USD</b></td>
                        ";
      }
      function MostrarTotalInventario(){
                  $sql = conexion()->prepare("SELECT * FROM productos ");
                  $sql->execute();
                  $sum=0;
                  $sm=0;
                  while ($datos = $sql->fetch()) {
                  $total=$datos[4]*$datos[7];
                  $smar=$sum+=$total;
                  $sm+=$total;
                  }
                  return $sm;

                    
      }
      function MostrarProveedor(){
                  $sql = conexion()->prepare("SELECT * FROM proveedor ");
                  $sql->execute();
                  while( $datos = $sql->fetch() )
                    echo 
                        "<tr>
                      <th scope='row'>".$datos[0]."</th>
                        <td>".$datos[1]."</td>
                        <td>".$datos[2]."</td>
                        <td>".$datos[3]."</td>
                        <td>".$datos[4]."</td>
                        <td><center><a href='inicio.php?op=6&editproveedor=".$datos[0]."' style='color:#337ab7'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>&nbsp;&nbsp;&nbsp;&nbsp;<a onclick='return confirmar();' href='inicio.php?op=6&deleteproveedor=".$datos[0]."' style='color:#FF5722'><span class='glyphicon glyphicon-remove'  aria-hidden='true'></span></a></center></td>
                    </tr>";
      }
       function AgregarProveedor($nombre,$direccion,$telefono,$correo){
            $sql = conexion()->prepare("INSERT INTO proveedor (nombreproveedor,direccion,telefono,correo) VALUES ('$nombre','$direccion','$telefono','$correo') ");
            $sql->execute();
            echo'<script>window.location="inicio.php?op=6";</script>';
      }
      function EliminarProveedor($id){
            $sql = conexion()->prepare("DELETE FROM proveedor WHERE idproveedor = ".$id."");
            $sql->execute();
            echo'<script>window.location="inicio.php?op=6";</script>';
      }
       function EditarProveedor($id,$nombre,$direccion,$telefono,$correo){
            $sql = conexion()->prepare("UPDATE proveedor SET nombreproveedor = :nombre, direccion = :direccion, telefono = :telefono, correo = :correo WHERE idproveedor = :id ");
            $sql->execute(array(
              ':id' => $id,
              ':nombre' => $nombre,
              ':direccion' => $direccion,
              ':telefono' => $telefono,
              ':correo' => $correo
              ));
            echo'<script>window.location="inicio.php?op=6";</script>';
      }
      function MostrarCat(){
              $sql = conexion()->prepare("SELECT * FROM categorias ");
              $sql->execute();                  
                  while( $datos = $sql->fetch() )
                    echo 
                        "<tr>
                      <th scope='row'>".$datos[0]."</th>
                        <td>".$datos[1]."</td>
                        <td><center><a href='inicio.php?op=7&editcat=".$datos[0]."' style='color:#337ab7'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>&nbsp;&nbsp;&nbsp;&nbsp;<a class='elim' href='inicio.php?op=7&deletecat=".$datos[0]."' style='color:#FF5722'><span class='glyphicon glyphicon-remove'  aria-hidden='true'></span></a></center></td>
                    </tr>
                    ";
                    if (isset($_GET['deletecat'])) {              
                    echo "<div class='col-md-4' id='confm'>
                      <h2>Atención !!!</h2>
                      <p>Estas a Punto de Eliliminar la Categoría: <b>".ConverterId($_GET['deletecat'],'categorias','idcategoria')."</b> Si confirmas se Eliminará y no Podrás Recuperarla</p>
                      <p>
                        <a class='btn btn-success' href='inicio.php?op=7&deletecat=".$_GET['deletecat']."&confirm=".$_GET['deletecat']."'>Confirmar</a>
                        <a class='btn btn-primary' href='inicio.php?op=7'>Cancelar</a>
                      </p>
                    </div>";}else{

                    }
      }
      function AgregarCat($nombre){
            $sql = conexion()->prepare("INSERT INTO categorias (categoria) VALUES ('$nombre') ");
            $sql->execute();
            echo'<script>window.location="inicio.php?op=7";</script>';            
      }
      function EditarCat($id,$nombre){
            $sql = conexion()->prepare("UPDATE categorias SET categoria = '$nombre' WHERE idcategoria = ".$id."");
            $sql->execute();
            echo'<script>window.location="inicio.php?op=7";</script>';
      }
      function EliminarCat($id){
            $sql = conexion()->prepare("DELETE FROM categorias WHERE idcategoria = ".$id."");
            $sql->execute();
            echo'<script>window.location="inicio.php?op=7";</script>';
      }
      function Eliminarprod($id){
            $sql = conexion()->prepare("DELETE FROM productos WHERE idProducto = ".$id."");
            $sql->execute(); 
            echo'<script>window.location="inicio.php?op=1";</script>';
      }
      function saludo(){
        echo "Hola mundo";
      }
      if (isset($_GET['confirm'])) {
        saludo();
      }
      function AgregarProducto($id,$img,$nombre,$descripcion,$precioentrada,$preciosalida,$presentacion,$categoria,$existencias,$proveedores){
            if ($img!=="") {
              $stmt = conexion()->prepare("INSERT INTO productos (idProducto, nombre, descripcion, precioentrada, preciosalida, idpresentacion, 
                                      idcategoria, existencias, idproveedor, img )
               VALUES ( '".$id."','".$nombre."', '".$descripcion."', '".$precioentrada."', '".$preciosalida."', '".$presentacion."', '".$categoria."',
                         '".$existencias."', '".$proveedores."', '".$img."' )");
              $stmt->execute();
              echo'<script>window.location="inicio.php?op=1";</script>';
            }else{
              echo "<script>alert('Seleccione Una Imagen Para El Producto');</script>";
            }
      }
      function Editar($id,$img){
            if ($img!=="") {
            $stmt = conexion()->prepare('UPDATE productos SET nombre = :nombre ,preciosalida = :preciosalida,  existencias = :existencias , img = :img WHERE idProducto = :id');
            $stmt->execute(array(
          ':nombre' => $_POST['nombre'],
          
          ':preciosalida' => $_POST['preciosalida'],
          
          
          ':existencias' => $_POST['existencias'],
          
          ':img' => $img,
          ':id' => $id));
         echo'<script>window.location="inicio.php?op=1";</script>';
            }else{
            $stmt = conexion()->prepare('UPDATE productos SET nombre = :nombre ,preciosalida = :preciosalida,  idcategoria = :categoria, existencias = :existencias WHERE idProducto = :id');
            $stmt->execute(array(
          ':nombre' => $_POST['nombre'],
          
          ':preciosalida' => $_POST['preciosalida'],
          
          
          ':existencias' => $_POST['existencias'],
          
          ':id' => $id));
         echo'<script>window.location="inicio.php?op=1";</script>';
            }
      }
      function SubirImg($fil){          
          //$arch['nombre'],$arch['tamano'],$arch['tipo'];
          if ($fil['name']!=="") {
          $tmp_name = $fil["tmp_name"];
          $tamano = $fil['size'];
          $tipo = $fil['type'];
          $nombre = $fil["name"];
          $archivo_temporal = $fil['tmp_name'];
          
          if (is_uploaded_file($tmp_name)){
           $nombreDirectorio = "./img/";
           $nombreFichero = $nombre;

          $nombreCompleto = $nombreDirectorio . $nombreFichero;
           if (is_file($nombreCompleto))
           {
           $idUnico = time();
           $nombreFichero = $idUnico . "-" . $nombreFichero;
           }

          move_uploaded_file($tmp_name, $nombreDirectorio.$nombreFichero);

          }else{
             print ("No se ha podido subir el fichero");
          }

      }else{
        echo "no hay archivos";
      }
    }
    /*function ConverterProveedor($id){
            $usuario ="root";
            $contrasena = ""; 
            try {
            $con = new PDO('mysql:host=localhost;dbname=tienda_abarrotes', $usuario, $contrasena);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  $sql = $con->prepare("SELECT * FROM proveedor WHERE idproveedor = ".$id." ");
                  $sql->execute();
                  $datos = $sql->fetch();
                  return $datos[1];
            
    }*/
    function filtrarProductos(){
                  $sql = conexion()->prepare("SELECT * FROM productos WHERE existencias < 10 ");
                  $sql->execute();
                  echo "<br><div class='mediogrid'>";
                  while( $datos = $sql->fetch() ){
                    echo "<div class='alert alert-dismissible alert-danger'>
                          <button type='button' class='close' data-dismiss='alert'>&times;</button>
                          <strong>Atención!!</strong><br>El Producto:  <b><a href='inicio.php?op=2&verProd=".$datos[0]."'>".$datos[1]."</a> </b> Se está Agotando y la cantidad disponible son solo  <b>".$datos[7]."</b> Favor Reabastecer</div>";
                  }           
    }
    function marquee(){
                  $sql = conexion()->prepare("SELECT * FROM productos WHERE existencias < 10 ");
                  $sql->execute();
                  while( $datos = $sql->fetch() ){
                    echo "Atención!!   El Producto:  <b><a href='inicio.php?op=2&verProd=".$datos[0]."'>".$datos[1]."</a> </b> Se está Agotando y la cantidad disponible son solo  <b>".$datos[7]."</b> Favor Reabastecer&nbsp;&nbsp;&nbsp;";
                  }           
    }
    function VerProd($id){ 
            $stmt = conexion()->prepare("SELECT * FROM productos WHERE idProducto = ".$id."");
            $stmt->execute();
            $datos = $stmt->fetch();
              echo 
                  "
                    <div class='thumbnail'>
                      <img src='img/".$datos[9]."' alt='Producto' width='150px' height='300px' >
                      <div class='caption'>
                        <h3>".$datos[1]."</h3>
                        <p>".$datos[2]."</p>
                        
                        <a href='#' class='btn btn-danger' role='button'><b style='font-size:20px;'>Existencias ".$datos[7]."</b></a></p>
                      </div>
                    </div>
                  ";            
    }
    function VerProduc($id){ 
            $stmt = conexion()->prepare("SELECT * FROM productos WHERE idProducto = ".$id."");
            $stmt->execute();
            $datos = $stmt->fetch();
              echo 
                  "<div>
                 <div class='col-sm-12'>
                    <div class='thumbnail'>
                      <img src='img/".$datos[9]."' alt='Producto' width='150px' height='300px' >
                      <div class='caption'>
                        <h3>".$datos[1]."</h3>
                        <p>".$datos[2]."</p>
                        <a href='#' class='btn btn-primary' role='button'>".$datos[4]."USD</a>
                      </div>
                    </div>
                  </div>
               </div>";
    }
    function verProv($id){
            $stmt = conexion()->prepare("SELECT * FROM proveedor WHERE idproveedor = ".$id."");
            $stmt->execute();
            $datos = $stmt->fetch();
              echo 
                  "
                   <div class='thumbnail'>
                    <table class='table'>
                     <!-- Modal -->
                            <div id='msj'></div>
                     <thead>
                        <tr>
                         <th>Proveedor</th>
                      </tr>
                    </thead>
                    <tbody>
                    <th scope='row'>Nombre</th>
                        <td>".$datos[1]."</td>
                    
                    </tbody>
                    <tbody>
                    <th scope='row'>Dirección</th>
                        <td>".$datos[2]."</td>
                    
                    </tbody>
                    <tbody>
                    <th scope='row'>Telefono</th>
                        <td>".$datos[3]."</td>
                    
                    </tbody>
                    <tbody>
                    <th scope='row'>Correo</th>
                        <td>".$datos[4]."</td>
                    
                    </tbody>
                    </table>
                    </div>
                  ";            
    }
    function MostrarNotificaciones(){
            $stmt = conexion()->prepare("SELECT * FROM productos WHERE existencias < 10");
            $stmt->execute();
            $n= count($stmt->fetchAll());
            if ($n>0) {
               echo "<span class='badge'>".$n."</span></a>";
            }else{

            }
    }
    function inventarioSum($obj){
      $sql= conexion()->prepare("SELECT SUM(".$obj.") FROM productos");
      $sql->execute();
      $dato=$sql->fetch();
      echo $dato[0];
    }
    function GuardaIva($iva){
      $sql=conexion()->prepare("UPDATE iva SET iva = ".$iva."");
      $sql->execute();
      echo'<script>window.location="inicio.php?op=4";</script>';
    }
    function MostrarIva(){
      $sql=conexion()->prepare("SELECT iva FROM iva ");
      $sql->execute();
      $dato=$sql->fetch();
      
      return $dato[0];
    }
    function MostrarUser(){
      $sql=conexion()->prepare("SELECT * FROM usuarios");
      $sql->execute();
      while ($dat=$sql->fetch()) {
        echo "<tr>
                        <td>".$dat[1]."</td>
                        <td>".$dat[2]."</td>
                        <td>".$dat[3]."</td>
                        <td>".$dat[4]."</td>
                  </tr>      ";
      }
    }
    function Agregarventa($fecha,$total,$subtotal,$iva,$numarticulos,$usuario,$neimarchivo){
            $sql=conexion()->prepare("INSERT INTO venta (fecha, total, subtotal, iva, numarticulos, usuario, documento) VALUES
                 ('".$fecha."','".$total."','".$subtotal."','".$iva."','".$numarticulos."','".$usuario."','".$neimarchivo."')");
            $sql->execute();
    }function limitar($limitar){
        $sql=conexion()->prepare("UPDATE iva SET lim = ".$limitar."");
        $sql->execute();
        echo'<script>window.location="inicio.php?op=3";</script>';
    }
    function lmt(){
      $sql=conexion()->prepare("SELECT lim FROM iva");
      $sql->execute();
      $d=$sql->fetch();
      return $d[0];
    }

    function ListarVentas(){
      $sql=conexion()->prepare("SELECT * FROM venta ");
      $sql->execute();
      while ($dat=$sql->fetch()) {
        echo "<tr>
            <td>0000".$dat[0]."</td>
            <td>".$dat[1]."</td>
            <td><b>".$dat[2]." USD</b></td>
            <td><center>".$dat[5]."</center></td>
            <td><center>".$dat[3]."</center></td>
            <td><center><span class='glyphicon glyphicon-".$dat[4]."' aria-hidden='true'></center></span></td>
            <td><a href='./registros/".$dat[6].".pdf' target='_blank' >".$dat[6].".pdf</a></td>
            <td>".$dat[7]."</td>
             </tr>      ";
      }
    }
    function ImprimirFac(){

    }
    function RestarproVendido($sessionarray){
        foreach ($sessionarray as $j) {
            $sql=conexion()->prepare("SELECT * FROM productos WHERE idProducto = ".$j['id']."");
            $sql->execute();
            $d=$sql->fetch();
            //echo $d[7]." menos".$j['cantidad']." = ";
            if ($d[7]>$j['cantidad']) {
                  $queda=$d[7]-$j['cantidad'];
                  $queda;
                  //echo "<br>";
                  $sqli=conexion()->prepare("UPDATE  productos SET existencias = ".$queda." WHERE idProducto = ".$j['id']."");
                  $sqli->execute();
                  //echo 1+1;
            }else{
              echo "<script>alert('No Puedes Realizar la Entrega de: ".$d[1]." ya que el total de existencias es menor al que vas a Entregar')</script>";
            }
            
        }
    }
    function UltimoReg(){
      $sql=conexion()->prepare("SELECT MAX(idProducto) AS id FROM productos");
      $sql->execute();
      $dato=$sql->fetch();
      return $dato[0];
    }
    function UltimoRegVenta(){
      $sql=conexion()->prepare("SELECT MAX(idventa) AS id FROM venta");
      $sql->execute();
      $dato=$sql->fetch();
      return $dato[0];
    }
    function Agregararticulos(){

       foreach ($_SESSION['carritoingreso'] as $key) {
                      $consult=conexion()->prepare("SELECT * FROM productos WHERE idProducto =".$key['id']."");
                      $consult->execute();
                      $dato=$consult->fetch();
                      if ($dato[0]!==$key['id']) {
                          $sql=conexion()->prepare("INSERT INTO productos(idProducto, nombre, descripcion, preciosalida, existencias,  img) VALUES ('".$key['id']."','".$key['nombre']."','".$key['descripcion']."','".$key['precio']."','".$key['cantidad']."','".$key['imagen']."')");
                      $sql->execute();
                      unset($_SESSION['carritoingreso']);
                      echo "<script>window.location='./inicio.php?op=6';</script>";
                      }else{
                        $ql=conexion()->prepare("SELECT * FROM productos WHERE idProducto = ".$key['id']."");
                        $ql->execute();
                        $result=$ql->fetch();
                        $dop=$key['cantidad']+$result[7];
                        $sql=conexion()->prepare("UPDATE  productos SET  nombre = '".$key['nombre']."' ,
                                                 descripcion = '".$key['descripcion']."', preciosalida = '".$key['precio']."',
                                                 existencias = '".$dop."',  img = '".$key['imagen']."' WHERE idProducto = ".$key['id']."");
                      $sql->execute();
                      echo "<script>window.location='./inicio.php?op=6';</script>";
                      }
                }
    }
    function AgregarSolicitante(){
      $sql=conexion()->prepare("INSERT INTO solicitante (nombre, apellidos, telefono, correo)
                               VALUES ('".$_POST['nombre']."','".$_POST['apellidos']."','".$_POST['telefono']."',
                              '".$_POST['correo']."') ");
      $sql->execute();
      echo "<script>window.location='./inicio.php?op=7';</script>";
    }
    function Listartabla($tabla){
      $sql=conexion()->prepare("SELECT * FROM ".$tabla." ");
      $sql->execute();
      while ($dat=$sql->fetch()) {
        echo "<tr>
            <td>".$dat[1]."</td>
            <td>".$dat[2]."</td>            
            <td>".$dat[3]."</td>
            <td>".$dat[4]."</td>
            
             </tr>      ";
      }
    }
    function ListarSelect2($tabla){
            $sql = conexion()->prepare("SELECT * FROM ".$tabla."");
            $sql->execute();
            while( $datos = $sql->fetch() )
                  echo "<option value='".$datos[1]." ".$datos[2]."'>".$datos[1]."  ".$datos[2]."</option>";
          }
    /*
                      ;*/
    function generarEgreso($session){
      //echo "<script>window.open='php/generaregreso.php';</script>";
    }
    function ses(){
      $e=$_SESSION['carrito'];
        return $e;
      }
    function LimitarMostrarVentas($fecha1,$fecha2){
      $sql=conexion()->prepare("SELECT * FROM venta WHERE fecha BETWEEN '".$fecha1."' AND '".$fecha2."'");
      $sql->execute();
      while ($dat=$sql->fetch()) {
        echo "<tr>
            <td>0000".$dat[0]."</td>
            <td>".$dat[1]."</td>
            <td><b>".$dat[2]." USD</b></td>
            <td><center>".$dat[5]."</center></td>
            <td><center>".$dat[3]."</center></td>
            <td><center><span class='glyphicon glyphicon-".$dat[4]."' aria-hidden='true'></center></span></td>
            <td>".$dat[6]."</td>
             </tr>      ";
      }
    }
    /***********ESTE CODIGO ES ELABOARO 100% DE LA AUTORÍA DE ERIC JOSE MARTINEZ MUENTES PAGINAS OFFICIALES FB 
                facebook.com/ejmm19
                mobiliariosfamarsa.com*/
                /*ESTE CODIGO ES ELABOARO 100% DE LA AUTORÍA DE ERIC JOSE MARTINEZ MUENTES PAGINAS OFFICIALES FB 
                facebook.com/ejmm19
                mobiliariosfamarsa.com**************************************************************************
                ************************************************************************************************/

?>