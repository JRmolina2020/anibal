
<?php
require 'header.php';
?>
<div class="container">

    <div class="panel panel-primary">
      <div class="panel-heading">GESTION DE PRODUCTOS</div>
      <div class="panel-body">
      <section class="content">
  <!-- FORMULARIO -->
  <div class="row">
  <form name="formulario" id="formulario" method="POST">
                    <input type="hidden" id="idarticulo" name="idarticulo">
                    <!-- start fila1 -->
                    <div class="row">
                     <!--input codigo  -->
                    <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
                    <div class="form-group">
                   <label class="control-label">Codigo</label>
                    <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Código Barras">
                    </div>
                  </div>
                    <!-- input nombre -->
                    <div class="col-lg-3 col-md-3 col-xs-12 col-sm-12">
                     <div class="form-group">
                    <label class="control-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre"  placeholder="Nombre del articulo" >
                     </div>
                   </div>
                     <!-- input categoria -->
                     <div class="col-lg-3 col-md-3 col-xs-12 col-sm-12">
                       <div class="form-group">
                      <label class="control-label">Categoria</label>
                     <select id="idcategoria" name="idcategoria" class="form-control selectpicker"
                     data-live-search="true" required>
                   </select>
                     </div>
                   </div>
                 </div>
                 <!-- end fila 1 -->
                 <!-- start fila2 -->
                 <div class="row">
                  <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
                     <div class="form-group">
                     <label class="control-label">Presentaciòn</label>
                    <input type="file"  class="form-control" name="imagen" id="imagen">
                     </div>
                   </div>
                   <div class="col-lg-6 col-md-6 col-xs-8 col-sm-8">
                     <div class="form-group">
                     <label class="control-label">Descripciòn</label>
                      <textarea name="descripcion" id="descripcion" class="form-control" rows="1" required="required"></textarea>
                     </div>
                   </div>
                   <div class="col-lg-2 col-md-2 col-xs-4 col-sm-4">
                    <div class="form-group">
                     <label class="control-label">Disponible</label>
                      <select name="condicion" id="condicion" class="form-control">
                        <option value="1">Si-D</option>
                        <option value="0">No-D</option>
                      </select>
                     </div> 
                   </div>
                 </div>
                 </div>
                  <div class="row">
                   <div id="cuadritoimagen" class="box-body">
                  <input type="hidden" name="imagenactual" id="imagenactual">
                  <center>
                  <img src="" width="98px" height="102px" id="imagenmuestra">
                 </center>
             </div>
              <!-- end box-body -->
              <div class="form-group">
                <button type="submit" class="btn btn-danger pull-lef btn-flat margi">Guardar</button>
              </div>
                <!-- end form -->
               </div>
                <div class="panel-body table-responsive" id="divlistado">
            <table id="listado" class="table  table-bordered">
              <thead>
                <th>Opciones</th>
                <th>CAT</th>
                <th>#COD</th>
                <th>NOMBRE</th>
                <th>CANTIDAD</th>
                 <th>DESCRIPCION</th>
                 <th>FOTO</th>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
             </div>
             </div>
           </div>
            </form>
          </div>
            </section>
      </div>
    </div>
  </div>
        <?php
        require 'footer.php';
        ?>
  <script type="text/javascript" src="../public/js/JsBarcode.all.min.js"></script>
  <script type="text/javascript" src="../public/js/jquery.PrintArea.js"></script>
   <script type="text/javascript" src="scripts/articulo.js"></script>





