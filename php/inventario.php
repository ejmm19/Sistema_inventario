

      <div class="well">
        <h3>Registro de Articulos  <span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span></h3>

      </div>      
      <div class="well">
        <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">
              <h4 id="titlelista">Lista de Productos     </h4>
              <div class="inventdatos">
                <ul>
                  <li>
                    <h4>Total Numero de Articulos:    <b><?php inventarioSum('existencias') ?>&nbsp;&nbsp;</b></h4>
                  </li>
                  
                  <li><h4>Total :  <b> <?php echo MostrarTotalInventario() ?>  USD&nbsp;&nbsp;</b></h4></li>
                </ul>
              </div>
              <div><br>
              <br>
              </div>

              
        </div>

    
        <table class="table">
         <!-- Modal -->
                <div id="msj"></div>
         <thead>
            <tr>
             <th>Codigo</th>
             <th>Nombre</th>
             <th>Precio</th>
             
             <th>Existencias</th>
             <th>Valor Total</th>
            
          </tr>
        </thead>
        <tbody>
          <?php 
                  MostrarInventario();
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
        <?php MostrarTotalInventario() ?>
      </div>
       
      </div> 
