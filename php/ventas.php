

      <div class="well">
        <h3>Movimientos <span class="glyphicon glyphicon-retweet" aria-hidden="true"></span></h3>

      </div>      
      <div class="well">
        <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">
              
              <h4 id="titlelista">Limite de Registros Mostrados&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4>
              <form class="navbar-form" action="" method="POST" id="limitar">
               <b>  Desde  </b>
               <input type="date" class="form-control" name="fechaini"><b>  Hasta  </b>
               <input type="date" class="form-control" name="fechafin">
               <button type="submit" class="btn btn-primary"  name="limitar">Limitar</button>
              </form>
              <a href="inicio.php?op=3&mostrarall" class="btn btn-primary">Mostrar Todas</a>
              
              <div><br></div>

              
        </div>

    
        <table class="table">
         <!-- Modal -->
                <div id="msj"></div>
         <thead>
            <tr>
             <th>Codigo</th>
             <th>Fecha</th>             
             <th>Total</th>
             <th><center>Numero de Articulos</center></th>
             <th>Registro</th>
             <th><center>Ingreso/Egreso</center></th>
             <th>Documento</th>
             <th>Entregado por</th>
          </tr>
        </thead>
        <tbody>
          <?php if (isset($_POST['limitar'])) {

              LimitarMostrarVentas($_POST['fechaini'],$_POST['fechafin']);
          }
          if (isset($_GET['mostrarall'])) {          
            
            ListarVentas(lmt());
          }
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
                mobiliariosfamarsa.com*/
                
                ?>         
        </tbody>
        </table>
      </div>
       
      </div>
     