
<?php
require 'header.php';
?>
<script  src="http://openexchangerates.github.io/accounting.js/accounting.min.js"></script>
<div class="container">
<div class="panel panel-primary">
      <div class="panel-heading">GESTION DE VENTAS</div>
      <div class="panel-body">
      <section class="content">
    <div class="row">
      <div class="col-md-12">
          <div class="panel-body">
            <!-- menu tab custom -->
            <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li><a href="#nuevox" onclick="activar()"  data-toggle="tab">VENDER</a></li>
                <li class="active"><a href="#listax" data-toggle="tab">VER</a></li>
            </ul>
            <div class="tab-content no-padding">
              <!-- listado -->
              <div class="chart tab-pane active" id="listax" style="position: relative;height: 100%;">
             <div class="panel-body table-responsive" id="divlistado">
            <table id="listado" class="table  table-bordered">
              <thead>
                 <th>Opciones</th>
                <th>#_Factura</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Vendedor</th>
                <th>Total venta</th>
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
              <div class="box-body">
                <!-- NUEVA COMPRAR FORMULARIO CUERPO -->
               <form name="formulario" id="formulario" method="POST">
                  <div class="row">
                    <div class="form-group col-lg-3 col-md-4 col-sm-12 col-xs-12">
                    <!-- cargamos el select de clientes registrados y activados -->
                    <label>Cliente</label>
                    <input type="hidden" name="idventa" id="idventa">
                    <select id="idcliente" name="idcliente" class="form-control selectpicker" data-live-search="true">
                    </select>
                  </div>
                   <div  class="form-group col-lg-3 col-md-2 col-sm-12 col-xs-12">
                    <label>Fecha</label>
                    <input  type="date" readonly="readonly" class="form-control" name="fecha_hora" id="fecha_hora">
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"> 
                    <div id="cubitoagregar">
                    <label>PRODUCTO</label>
                    <a data-toggle="modal" href="#myModal">           
                      <button id="btnAgregarArt" type="button" class="btn btn-primary  btn-flat margi">
                        Buscar
                      </button>
                    </a>
                  </div>
                </div>
                  </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <table id="detalles" class="table table table-sm ">
                      <thead>
                        <th>Opciones</th>
                           <th>img</th>
                        <th>Artículo</th>
                        <th>Cantidad</th>
                        <th>Precio unitario</th>
                        <th>Descuento</th>
                        <th>Existencia</th>
                        <th>Subtotal</th>
                      </thead>
                        <tfoot>
                        <th>TOTAL :</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>
                          <h5 id="total" style="color:green">$/0.000</h5><input type="hidden" name="total_venta" id="total_venta">
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
                <!-- END FORM -->
               </div>
             </div>
             </div>
              </div>
            </div>
          </div>
          </section>
        </div>
        <!-- MODAL DETALLES DE LA VENTA -->
        <!-- en este modal se listaran todos los productos
        los cuales vamos a vender  -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <table id="tblarticulos" class="table table-striped table-bordered table-condensed table-hover">
            <thead>
              <th>Opciones</th>
              <th>Nombre</th>
              <th>Código</th>
              <th>Stock</th>
              <th>Precio venta</th>
              <th>Imagen</th>
            </thead>
            <tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
      </div>
    </div>
  <!-- section articulos-->
  
  </div>
  </div>
        <!-- END -->
        <?php
        require 'footer.php';
        ?>
   <script type="text/javascript" src="scripts/venta.js"></script>






