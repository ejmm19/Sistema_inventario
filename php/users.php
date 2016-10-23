      <div class="well">
        <h3>Usuarios  <span class="glyphicon glyphicon-user" aria-hidden="true"></span></h3>
      </div>      
      <div class="well">
        <div class="row">
        
          <div class="col-sm-5">
          
        <fieldset>
          <legend>Usuarios Registrados</legend>          
        </fieldset>
      <table class="table">
         <!-- Modal -->
                <div id="msj"></div>
         <thead>
            <tr>
             <th>Nombre</th>
             <th>Apellidos</th>
             <th>Correo</th>
             <th>Usuario</th>
          </tr>
        </thead>
        <tbody>
          <?php MostrarUser();?>         
        </tbody>
        </table>
    </div>

    <div class="col-sm-7">
          
        <fieldset>
          <legend>Usuarios Registrados</legend>          
        </fieldset>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Agregar Usuario</button>
      
    </div>

    </div>
     </div>


     <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Nuevo Solicitante</h4>
      </div>
      <div class="modal-body" >

        <form class="form-horizontal" method="post" action="">
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
              <label  class="col-lg-2 control-label">Correo</label>
              <div class="col-lg-10">
                <input type="text" class="form-control numero"  placeholder="Correo" name="correo" required="">
              </div>
              <br>
              <br>
            </div>
              <br><br>
            <div class="form-group">
              <label  class="col-lg-2 control-label">Usuario</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" placeholder="Usuario" name="us">
              </div>
              <br>
              <br>
            </div>

             <div class="form-group">
              <label  class="col-lg-2 control-label">Contraseña</label>
              <div class="col-lg-10">
                <input type="password" class="form-control" placeholder="Contraseña" name="passw">
              </div>
              <br>
              <br>
            </div>
              
              
            <br><br>
            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default">Borrar</button>
                <button name="agregaruser" class="btn btn-success">Agregar</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <?php 
        if (isset($_POST['agregaruser'])) {
          AgregarUsuario($_POST['nombre'],$_POST['apellidos'],$_POST['correo'],$_POST['us'],$_POST['passw']);
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
     

        
  