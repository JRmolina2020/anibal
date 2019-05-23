
<?php
require 'header.php';
?>
<div class="container">
  <!-- section articulos-->
  
    <div class="panel panel-primary">
      <div class="panel-heading">Panel with panel-primary class</div>
      <div class="panel-body">
       <section class="content">
    <div class="row">
      <div class="col-md-12">
          <div class="panel-body">
            <!-- menu tab custom -->
            <div class="nav-tabs-custom">
            <div class="tab-content no-padding">
            <div class="box-body">
                <!-- form -->
                  <form name="formulario" id="formulario" method="POST">
                    <input type="hidden" id="idusuario" name="idusuario">
                    <!-- start fila1 -->
                    <div class="row">
                     <!--input codigo  -->
                    <div class="col-lg-3 col-md-3 col-xs-12 col-sm-12">
                    <div class="form-group">
                   <label class="control-label">CEDULA</label>
                    <input type="text" class="form-control" name="identi" id="identi" placeholder="Identificacion" autofocus>
                    </div>
                  </div>
                    <!-- input nombre -->
                    <div class="col-lg-3 col-md-3 col-xs-12 col-sm-12">
                     <div class="form-group">
                    <label class="control-label">NOMBRE</label>
                    <input type="text" class="form-control" name="nombre" id="nombre"  placeholder="Nombre">
                     </div>
                   </div>
                     <!-- input categoria -->
                     <div class="col-lg-3 col-md-3 col-xs-12 col-sm-12">
                       <div class="form-group">
                      <label class="control-label">APELLIDO</label>
                     <input type="text" class="form-control" name="apellido" id="apellido"  placeholder="Apellido" >
                     </div>
                   </div>
                   <!-- input cantidad -->
                    <div class="col-lg-3 col-md-3 col-xs-12 col-sm-12">
                     <div class="form-group">
                     <label class="control-label">DIRECCION</label>
                     <input type="text" class="form-control"  name="direccion" id="direccion" placeholder="Direccion" >
                     </div>
                   </div>
                 </div>
                 <!-- end fila 1 -->
                 <!-- start fila2 -->
                 <div class="row">
                  <div class="col-lg-3 col-md-3 col-xs-12 col-sm-7">
                     <div class="form-group">
                     <label class="control-label">TELEFONO</label>
                      <input name="telefono" id="telefono" class="form-control"  required="required" placeholder="Tel:"></input>
                     </div>
                   </div>
                   <div class="col-lg-3 col-md-3 col-xs-12 col-sm-5">
                    <div class="form-group">
                     <label class="control-label">NIVEL</label>
                      <select name="cargo" id="cargo" class="form-control">
                        <option value="ADMIN">ADMIN</option>
                        <option value="Vendedor">TRABAJADOR</option>
                      </select>
                     </div> 
                   </div>
                   <div class="col-lg-3 col-md-3 col-xs-12 col-sm-7">
                     <div class="form-group">
                     <label class="control-label">GMAIL</label>
                      <input type="email" name="correo" id="correo" class="form-control"  required="required" placeholder="@gmail"></input>
                     </div>
                   </div>
                    <div class="col-lg-3 col-md-3 col-xs-12 col-sm-5">
                     <div class="form-group">
                     <label class="control-label">PASSWORD</label>
                      <input type="text" name="clave" id="clave" class="form-control"  required="required" placeholder="*******"></input>
                     </div>
                   </div>
                 </div>
                   <!-- fila3 -->
                   <div class="row">
                    <div class="col-lg-9 col-md-9 col-xs-12 col-sm-7">
                      <div class="form-group">
                     <label class="control-label">FOTO</label>
                    <input type="file" class="form-control" name="imagen" id="imagen">
                     </div>
                    </div>
                   </div>
                   <div id="cuadritoimagen" class="box-body">
                  <input type="hidden" name="imagenactual" id="imagenactual">
                  <center>
                  <img src="" width="98px" height="102px" id="imagenmuestra">
                 </center>
             </div>
                 <br><br>
              <!-- end box-body -->
              <div class="form-group">
                <button type="submit" class="btn btn-danger pull-lef">Guardar</button>
              </div>
                <!-- end form -->
               </div>
              <!-- listado -->
              <div class="chart tab-pane active" id="listax" style="position: relative;height: 100%;">
             <div class="panel-body table-responsive" id="divlistado">
            <table id="listado" class="table">
              <thead>
                <th>Opciones</th>
                <th>CEDULA</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>DIRECCION</th>
                <th>TEL</th>
                <th>NIVEL</th>
                <th>GMAIL</th>
                <th>FOTO</th>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
            </div>
             </div>
             </div>
             </div>
           </div>
            </form>
           <!-- end body form -->
          </div>
           <!-- end panel body -->
          <!-- end registro -->
        </div>
             </div>
              </div>

          </section>
      </div>
    </div>
        </div>

        <?php
        require 'footer.php';
        ?>
   <script type="text/javascript" src="scripts/usuario.js"></script>




