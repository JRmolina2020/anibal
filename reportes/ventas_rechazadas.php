<?php 
  use Dompdf\Dompdf;
  require_once('../public/dompdf/autoload.inc.php');
  require_once "../model/Consultas.php";
 

  $consultas = new Consultas();
  $rspta = $consultas->ventas_rechazadas();
  //Criando a Instancia
  $dompdf = new DOMPDF();
  $data= Array();

 $html='
 <link rel="stylesheet" href="../public/dompdf/plantilla.css">
<center>
 <img src="../public/images/logo.png" heigth="100" width="100">
 <h5>SNAPPY BY</h5>
<h6>VENTAS RECHAZADAS</h6>
 </center>
 <table>
   <thead>
     <tr>
     <th>Venta</th>
     <th>Vendedor</th>
       <th>Fecha</th>
       <th>Monto</th>
       <th>Nombre</th>
        <th>Apellido</th>
     </tr>
   </thead>
   <tbody>';
    while ($reg=$rspta->fetch_object()){
      $id= $reg->idventa;
      $nombreV = $reg->vendedorN;
      $apellidoV = $reg->vendedorA;
    $fecha = $reg->fecha_hora;
     $total =$reg->total_venta;
     $nombre =$reg->nombre;
       $apellido =$reg->apellido;
   $html.='  
     <tr>
     <td>'.$id.'</td>
     <td>'.$nombreV  . ' ' . $apellidoV.'</td>
       <td>'.$fecha.'</td>
             <td>'.number_format($total, 0, '', '.').'</td>
                <td>'.$nombre.'</td>
                   <td>'.$apellido.'</td>
     </tr>';
     }
 $html.='</tbody></table>';
  $dompdf->load_html($html);
  //Renderizar o html
  $dompdf->render();

  //Exibibir a página
  $dompdf->stream(
    "productos_agotados.pdf", 
    array(
      "Attachment" => false //Para realizar o download somente alterar para true
    )
  );
?>

