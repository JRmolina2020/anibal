
<?php
require 'header.php';
?>
<script  src="http://openexchangerates.github.io/accounting.js/accounting.min.js"></script>

  <!-- section articulos-->
  <div class="container">
  <div class="panel panel-primary">
    <div class="panel-body">
    <section class="content">
    <div class="row">
      <div class="col-md-12">
          <div class="panel-body">
            <!-- menu tab custom -->
            <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li><a href="#nuevox" onclick="activar()"  data-toggle="tab">REGISTRAR</a></li>
                <li class="active"><a href="#listax" data-toggle="tab">LISTA</a></li>
            </ul>
            <div class="tab-content no-padding">
              <!-- listado -->
              <div class="chart tab-pane active" id="listax" style="position: relative;height: 100%;">
             <div class="panel-body table-responsive" id="divlistado">
            <table id="listado" class="table  table-bordered">
              <thead>
                <th>Opciones</th>
                  <th>Fecha</th>
                  <th>Proveedor</th>
                  <th>Vendedor</th>
                  <th>Total compra</th>
                  <th>Estado</th>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
            </div>
            <!-- end listado -->
            <!-- registro -->
              <div class="chart tab-pane" id="nuevox" style="position: relative; height: 100%;">
              <div class="panel-body">
             <!-- body form1-->
             <div class="col-lg-12">
            <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <h5 class="box-title">Nueva compra de productos</h5>
              <div class="box-body">
                <!-- NUEVA COMPRAR FORMULARIO CUERPO -->
               <form name="formulario" id="formulario"  method="POST">
                  <div class="row">
                    <!-- proveedor select -->
                     <input type="hidden" name="idingreso" id="idingreso">
                    <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label>Proveedor</label>
                    <select id="idproveedor" name="idproveedor" class="form-control selectpicker" data-live-search="true">
                    </select>
                  </div>
                  <!-- end proveedor select -->
                  <!-- fecha -->
                    <div class="form-group col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <label>Fecha</label>
                    <input type="text" readonly="readonly"  class="form-control" name="fecha_hora" id="fecha_hora">
                    </div>
                  <!-- end fecha -->
                  <!-- button guardar ingreso -->
                  <div id="cubitoagregar">
                   <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"> 
                    <div id="cubitoagregar">
                    <label>AGREGAR</label>
                    <a data-toggle="modal" href="#myModal">           
                      <button id="btnAgregarArt" type="button" class="btn btn-danger  btn-flat margi">
                        BUSCAR
                      </button>
                    </a>
                  </div>
                </div>
                </div>
                  <!-- end button guardar ingreso -->
                  </div>
                  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <table id="detalles" class="table table table-sm ">
                      <thead>
                        <div id="opciones">
                        <th>Opciones</th>
                      </div>
                        <th>PRODUCTO</th>
                        <th>FOTO</th>
                        <th>Cantidad</th>
                        <th>Precio DE Compra</th>
                        <th>Precio DE  Venta</th>
                        <th>SUBTOTAL</th>
                      </thead>
                        <tfoot>
                        <th> TOTAL$$</th>
                        <th></th>
                        <th></th>
                        <th></th>
                         <th></th>
                        <th></th>
                        <th>
                          <h5 id="total">$0.000</h5><input type="hidden" name="total_compra" id="total_compra">
                        </th>
                      </tfoot>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                   <div id="guardar" class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                  <button id="btnCancelar" class="btn btn-danger  btn-flat margi" onclick="cerrarformulario()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                </div>
                </form>
                <!-- END  -->
               </div>
             </div>
             </div>
              </div>
            </div>
          </div>
          </section>
        </div>
        <!-- MODAL DETALLES DE LA COMPRAR -->
        <!-- en este modal se listaran todos los productos
        los cuales vamos a comprar  -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <table id="tblarticulos" class="table table-striped table-bordered table-condensed table-hover">
            <thead>
              <th>Opciones</th>
              <th>Nombre</th>
              <th>Categoría</th>
              <th>Código</th>
              <th>CANTIDAD</th>
              <th>FOTO</th>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>
        <?php
        require 'footer.php';
        ?>
   <script type="text/javascript" src="scripts/ingreso.js"></script>






