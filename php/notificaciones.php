
                  
      <div class="well">
        <h3>Notificaciones <span class="glyphicon glyphicon-bell" aria-hidden="true"></span></h3> 
        <div>
                 
               </div>

      </div>      

      <div class="row">
        <div class="col-sm-7">
          <div class="well">
        <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">
              <h4 id="titlelista">Lista de Notificaciones</h4>
              <div><br><br></div>              
        </div>        
            <?php 
                filtrarProductos();
                
               ?>    
               
        </div>
      </div>
        </div>
        
      </div>
       

<div class="col-sm-5">
   <div class="well">
        <div class="panel panel-default">
        <!-- Default panel contents -->

               
            <?php 
                if (isset($_GET['verProd'])) {
                    VerProd($_GET['verProd']);
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
               
        </div>
      </div>
  
</div>