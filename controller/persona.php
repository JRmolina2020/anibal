<?php 
require_once "../model/Persona.php";
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {

$persona=new Persona();
$idpersona=isset($_POST["idpersona"])? limpiarCadena($_POST["idpersona"]):"";
$tipo_persona=isset($_POST["tipo_persona"])? limpiarCadena($_POST["tipo_persona"]):"";
$tipo_documento=isset($_POST["tipo_documento"])? limpiarCadena($_POST["tipo_documento"]):"";
$num_documento=isset($_POST["num_documento"])? limpiarCadena($_POST["num_documento"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$apellido=isset($_POST["apellido"])? limpiarCadena($_POST["apellido"]):"";
$barrio=isset($_POST["barrio"])? limpiarCadena($_POST["barrio"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$ciudad=isset($_POST["ciudad"])? limpiarCadena($_POST["ciudad"]):"";
$telefono=isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
$email=isset($_POST["email"])? limpiarCadena($_POST["email"]):"";
switch ($_GET["op"]){
    case 'guardaryeditar':
        if (empty($idpersona)){
            $rspta=$persona->insertar($tipo_persona,$tipo_documento,$num_documento,$nombre,$apellido,$barrio,$direccion,$ciudad,
                $telefono,$email);
            echo $rspta ? "Persona registrada" : "Persona no se pudo registrar";
        }
        else {
            $rspta=$persona->editar($idpersona,$tipo_persona,$tipo_documento,$num_documento,$nombre,$apellido,$barrio,$direccion,$ciudad,$telefono,$email);
            echo $rspta ? "Persona actualizada" : "Persona no se pudo actualizar";
        }
    break;
 
    case 'eliminar':
        $rspta=$persona->eliminar($idpersona);
        echo $rspta ? "Persona eliminada" : "Persona no se puede eliminar";
    break;
 
    case 'mostrar':
        $rspta=$persona->mostrar($idpersona);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
    break;
 
 
    case 'listarc':
        $rspta=$persona->listarc();
        //Vamos a declarar un array
        $data= Array();
 
         while ($reg=$rspta->fetch_object()){
            $data[]=array(
                "0"=>
            '<div class="btn-group">
    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
    GESTION <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu">
      <li><a onclick="mostrar('.$reg->idpersona.')">EDITAR</a></li>
      <li><a onclick="eliminar('.$reg->idpersona.')" href="#">ELIMINAR</a></li>
    </ul>
  </div>
  ',
                "1"=>$reg->tipo_documento,
                "2"=>$reg->num_documento,
                "3"=>$reg->nombre,
                "4"=>$reg->apellido,
                "5"=>$reg->barrio,
                "6"=>$reg->direccion,
                "7"=>$reg->ciudad,
                "8"=>$reg->telefono,
                "9"=>$reg->email
                );
        }
        $results = array(
            "sEcho"=>1, //Información para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        echo json_encode($results);
 
    break;
    case 'listarp':
        $rspta=$persona->listarp();
        //Vamos a declarar un array
        $data= Array();
 
        while ($reg=$rspta->fetch_object()){
            $data[]=array(
                "0"=>
                '<div class="btn-group">
    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
    GESTION <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu">
      <li><a onclick="mostrar('.$reg->idpersona.')">EDITAR</a></li>
      <li><a onclick="eliminar('.$reg->idpersona.')" href="#">ELIMINAR</a></li>
    </ul>
  </div>
  ',
                "1"=>$reg->tipo_documento,
                "2"=>$reg->num_documento,
                "3"=>$reg->nombre,
                "4"=>$reg->apellido,
                "5"=>$reg->barrio,
                "6"=>$reg->direccion,
                "7"=>$reg->ciudad,
                "8"=>$reg->telefono,
                "9"=>$reg->email
                );
        }
        $results = array(
            "sEcho"=>1, //Información para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        echo json_encode($results);
 
    break;

}
}else {
header("HTTP/1.0 403 Forbidden");
exit;
}
?>