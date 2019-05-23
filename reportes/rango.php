<?php
use Dompdf\Dompdf;
require_once('../public/dompdf/autoload.inc.php');
require_once "../model/Consultas.php";


if(isset($_SESSION["correo"]))
{
$fecha1=$_REQUEST["fecha_inicio"];
$fecha2=$_GET["fecha_fin"];
  $consultas = new Consultas();
  $rspta = $consultas->ventasfechacliente($fecha1,$fecha2);
  $rspta2 = $consultas->sumaventafecha($fecha1,$fecha2);

  $dompdf = new DOMPDF();
  $data= Array();
 $html='
 <link rel="stylesheet" href="../public/dompdf/plantilla.css">
<center>
 <img src="../public/images/logo.png" heigth="100" width="100">
  <h5>SNAPPY BY</h5>';
 $html.=' 
 </center>
 <table>
   <thead>
     <tr>
       <th>Fecha</th>
       <th>Vendedor</th>
       <th>Cliente</th>
       <th>Total</th>
     </tr>
   </thead>
   <tbody>';
    while ($reg=$rspta->fetch_object()){
    $fecha = $reg->fecha;
     $vendedor = $reg->vendedor;
     $cliente =$reg->cliente;
     $apellidoV =$reg->apellidoV;
     $apellidoC =$reg->apellidoC;
     $total= $reg->total;
   $html.='  
     <tr>
       <td>'.$fecha.'</td>
       <td>'.$vendedor.' '.$apellidoV.'</td>
       <td>'.$cliente .' '.$apellidoC .'</td>
       <td>'.number_format($total, 0, '', '.').'</td>
     </tr>
     ';
     }
 $html.=
 '</tbody></table>
 <table> 
<thead>
 <tr>
 <th bgcolor="#444449">TOTAL</th>
 </tr>
 </thead>
  <tbody>
  ';
    while ($reg2=$rspta2->fetch_object()){
    $suma = $reg2->total;	
   $html.='
   <tr>
   <td><h3>'.number_format($suma, 0, '', '.').'</h3></td>
   </tr>';
   
}
  $html.='</tbody></table>';
  $dompdf->load_html($html);
  //Renderizar o html
  $dompdf->render();

  //Exibibir a página
  $dompdf->stream(
    "ventas_de_rango.pdf", 
    array(
      "Attachment" => false
    )
  );
 }else{
 header('location:../');
 } 
?>