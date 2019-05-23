
<?php
require 'header.php';
?>
<div class="container">
<div class="row">
<div class="col-lg-4">
<img src="../files/usuario/<?php echo $_SESSION['imagen']?>" class="img-rounded" width="200" height="200">
</div>
<div class="col-lg-6">
<div class="alert alert-success">
  <strong>HOLA</strong> <?php echo $_SESSION['nombre'] ?> <strong>BIENVENIDO AL SISTEMA</strong>
</div>
<br><br>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="http://bizcomputers.com.co/home/wp-content/uploads/2017/05/Hp_dc5850_Torre_Monitor_17-600x600.jpg" alt="Los Angeles" style="width:100%;">
        <div class="carousel-caption">
        </div>
      </div>

      <div class="item">
        <img src="https://images.samsung.com/is/image/samsung/my-uhdtv-nu8000-ua55nu8000kxxm-rperspectiveblack-97001886?$PD_GALLERY_L_JPG$" alt="Chicago" style="width:100%;">
        <div class="carousel-caption">
        </div>
      </div>
    
      <div class="item">
        <img src="http://1.bp.blogspot.com/-AKaXmglnMVA/U2pZdXuYUVI/AAAAAAAAAE8/EBTA6s4dvF4/s1600/vta_equipos+operacion.gif" alt="New York" style="width:100%;">
        <div class="carousel-caption">
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
     </div>
        <?php
        require 'footer.php';
        ?>
   <script type="text/javascript" src="scripts/persona.js"></script>






