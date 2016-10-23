

      <div class="well">
        <h3>Solicitantes Registrados  <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></h3>

      </div>      
      <div class="well">
        <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">
              <h4 id="titlelista">Lista de Solicitantes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4>
              <a data-toggle="modal" data-target="#myModal" id="agg" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></a>
             
              

              
        </div>

    
        <table class="table">
         <!-- Modal -->
                <div id="msj"></div>
         <thead>
            <tr>
             <th>Nombres</th>
             <th>Apellidos</th>             
             <th>Telefono</th>
             <th>Correo</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          /*ESTE CODIGO ES ELABOARO 100% DE LA AUTORÍA DE ERIC JOSE MARTINEZ MUENTES PAGINAS OFFICIALES FB 
                facebook.com/ejmm19
                mobiliariosfamarsa.com*/
                /*ESTE CODIGO ES ELABOARO 100% DE LA AUTORÍA DE ERIC JOSE MARTINEZ MUENTES PAGINAS OFFICIALES FB 
                facebook.com/ejmm19
                mobiliariosfamarsa.com*/
                /*ESTE CODIGO ES ELABOARO 100% DE LA AUTORÍA DE ERIC JOSE MARTINEZ MUENTES PAGINAS OFFICIALES FB 
                facebook.com/ejmm19
                mobiliariosfamarsa.com*/
               Listartabla('solicitante');
                ?>         
        </tbody>
        </table>
      </div>
       
      </div> <?php //include("edit.php");
               //}?>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Nuevo Solicitante</h4>
      </div>
      <div class="modal-body" >

        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
          <fieldset>
           
            <div class="form-group">
              <label  class="col-lg-2 control-label">Nombre</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" placeholder="Nombre" name="nombre" required="" autofocus="">
              </div>
              <br>
              <br>
            </div>
            <div class="form-group">
              <label  class="col-lg-2 control-label">Apellidos</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" placeholder="Apellidos" name="apellidos" required="">
              </div>
              <br>
              <br>
            </div>
          
            <div class="form-group">
              <label  class="col-lg-2 control-label">Telefono</label>
              <div class="col-lg-10">
                <input type="text" class="form-control numero" onkeypress="return NumCheck(event, this)" placeholder="Telefono" name="telefono" required="">
              </div>
              <br>
              <br>
            </div>
              <br><br>
            <div class="form-group">
              <label  class="col-lg-2 control-label">Correo</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" placeholder="Correo" name="correo">
              </div>
              <br>
              <br>
            </div>
              
              
            <br><br>
            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default">Borrar</button>
                <button name="agregarsolic" class="btn btn-success">Agregar</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <?php if (isset($_POST['agregarsolic'])) {
          AgregarSolicitante();
    } ?>