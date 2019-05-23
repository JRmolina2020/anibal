<?php
require_once'../config/conexion.php';
if (isset($_SESSION["nombre"]))
{
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="ticket.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
</head>
<body onload="window.print();">
<?php
require_once "../model/Venta.php";
$venta = new Venta();
$rspta = $venta->ventacabecera($_GET["id"]);
$reg = $rspta->fetch_object();
$empresa = "SNAPPY BY";
$documento = "928173382 D.I.A.N";
$direccion = "JUMBO LOCAL N.3 SEGUNDO PISO";
$telefono = "5-8439-3";
$email = "SNAPPYJ@GMAIL.COM.CO";
?>
<table border="0" align="center" width="300px">
    <tr>
        <td align="center">
        <!-- Mostramos los datos de la empresa en el documento HTML -->
     ******<strong><?php echo $empresa; ?></strong>******<br>
     <img src="../public/images/logo2.png"><br>
        <?php echo $documento; ?><br>
        <p><?php echo $direccion?></p>
        <p>TEL <?php echo $telefono?></p>
        </td>
    </tr>
    <tr>
        <td align="center"><?php echo $reg->fecha; ?></td>
    </tr>  
</table>
<table border="0" align="center" width="350px">
<tr>
<td>Nombre :<?php echo $reg->nombre."  ".$reg->apellido;?></td>   
<td><?php echo $reg->tipo_documento.": ".$reg->num_documento; ?></td>
</tr>
</table>
<br>
<!-- DETALLES DE LA VENTA -->
<table border="0" align="center" width="350px">
    <tr>
        <td>CANT.</td>
        <td>DESCRIP</td>
        <td>PRECIO</td>
         <td>DES</td>

    </tr>
    <tr>
      <td colspan="6">==================================================</td>
    </tr>
    <?php
    $rsptad = $venta->ventadetalle($_GET["id"]);
    $cantidad=0;
    while ($regd = $rsptad->fetch_object()) {
        $sub = number_format($regd->subtotal, 0, '', '.');
        $descuento = number_format($regd->descuento, 0, '', '.');

        echo "<tr>";
        echo "<td>".$regd->cantidad."</td>";
        echo "<td>".$regd->articulo."</td>";
        echo "<td align='center'>".$sub."</td>";
        echo "<td  align='center'>".$descuento."</td>";
        echo "</tr>";
        $cantidad+=$regd->cantidad;
    }
    ?>
    <!-- Mostramos los totales de la venta en el documento HTML -->
    <tr>
    <td>TOTAL:$<h3>
    <?php 
    $totalv=$reg->total_venta;
    echo number_format($totalv, 0, '', '.');?></h3>
    </td>
    </tr>
    <tr>
      <td colspan="6"># ART: <?php echo $cantidad; ?></td>
    </tr>
    <tr>
      <td colspan="6">&nbsp;</td>
    </tr>      
    <tr>
      <td colspan="6" align="center">Gracias por su compra</td>
    </tr>
    <tr>
      <td colspan="6" align="center">SNAPPY BY</td>
    </tr>
    <tr>
    <td colspan="6" align="center">SNAPPY BY no se hace responsable
    por perdidas o daño de los equipos despues de probarlos
en nuestras instalaciones,cualquier queja o reclamo
presentelas a la siguiente linea 5-43423</td>
    </tr>
    <tr>
      <td colspan="6" align="center">VALLEDUPAR-CESAR</td>
    </tr>
     <tr><br>
      <td colspan="6" align="center">ING.JR.MOLINA.S</td>
    </tr>
     
</table>
<!-- END -->
<br>
</div>
<p>&nbsp;</p>
 
</body>
</html>
<?php
}else{
header('location:../index.php');
}
?>