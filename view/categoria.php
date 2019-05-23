
<?php
require 'header.php';
?>

<div class="container">
<div class="panel panel-info">
      <div class="panel-heading">Panel with panel-primary class</div>
      <div class="panel-body">
      <section class="content">
  <!-- FORM -->
  <form name="formulariocategoria" id="formulariocategoria" method="POST">
                    <div class="row"> 
                     <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                     <div class="form-group">
                      <label>Nombre:</label>
                       <input type="hidden" name="idcategoria" id="idcategoria">
                       <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de la categoria" >
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                  <label>Descripcion:</label>
                  <input type="text" class="form-control" name="descripcion" id="descripcion" 
                  placeholder="Descripcion de la categoria" >
                </div>
                  </div>
                  
                </div>
                    <button type="submit" id="btnGuardar" name="btnGuardar" class="btn btn-danger ">
         GUARDAR
            </button>
      </form>
      <br><br>
  <!-- LIST -->
  <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="panel-body table-responsive" id="divlistadocategoria">
            <table id="listadocategoria" class=" table-bordered">
              <thead>
                <th>Opciones</th>
                <th>Nombre</th>
                <th>Descripcion</th>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
            </div>
            </div>
          </section>
        </div>
  </section>
      </div>
    </div>
<?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/categoria.js"></script>



