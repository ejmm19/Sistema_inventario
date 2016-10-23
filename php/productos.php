

      <div class="well">
        <h3>Articulos Registrados  <span class="glyphicon glyphicon-gift" aria-hidden="true"></span></h3>

      </div>      
      <div class="well">
        <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">
              <h4 id="titlelista">Lista de Articulos</h4>
              <form class="navbar-form" role="search">
                <input type="text" class="form-control" id="busca"/>
                <button type="reset" onclick="window.location='inicio.php?op=1'" class="btn btn-default">Borrar</button>
              </form>
              <div><a href="inicio.php?op=6" class="btn btn-primary">Ingreso de Articulo</a></div>
        </div>

    
        
        
          <?php 
          if (!isset($_GET['edit'])) {
            echo "<table class='table'>
         <!-- Modal -->
                <div id='msj'></div>
                
         <thead>
            <tr>
             <th>Codigo</th>
             <th>Nombre</th>
             
             <th>Precio</th>
            
            
             <th>Existencias</th>
             
             <th>Opciones</th>
          </tr>
        </thead><tbody id='products'>
          
        </tbody>
        </table>";
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
          //MostrarProd();
           
               if (isset($_GET['delete'])) {
                
                 Eliminarprod($_GET['delete']);
               }
            
               if (!isset($_GET['edit'])) {
                if (isset( $_POST['busca'])) {
                 
                }
              }else{
                include("edit.php");
              }
                //echo "<div id='result'></div>";
                ?>
                  
            
          
        
      </div>
       
      </div> 
              
 
    

    
    <!-- Modal -->

