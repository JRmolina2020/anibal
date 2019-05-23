    <?php 

    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {

    require_once "../model/Ingreso.php";
    $ingreso=new Ingreso();
    $idingreso=isset($_POST["idingreso"])? limpiarCadena($_POST["idingreso"]):"";
    $idproveedor=isset($_POST["idproveedor"])? limpiarCadena($_POST["idproveedor"]):"";
    $fecha_hora=isset($_POST["fecha_hora"])? limpiarCadena($_POST["fecha_hora"]):"";
    $idusuario=$_SESSION["idusuario"];
    $total_compra=isset($_POST["total_compra"])? limpiarCadena($_POST["total_compra"]):"";

    // -------------------------------------------------
    switch ($_GET["op"]){
        case 'guardaryeditar':
        if (empty($idingreso)){
            $rspta=$ingreso->insertar($idproveedor,$idusuario,$fecha_hora,$total_compra,
            $_POST["idarticulo"],$_POST["cantidad"],$_POST["precio_compra"],$_POST["precio_venta"]);
            if ($rspta) 
            {
            echo "Compra realizada con exito";
            }else{
            echo "Compra rechazada";
            }  
        }
        else{
            header('../app.php');
        }
        break;
        case 'anular':
        $rspta=$ingreso->anular($idingreso);
        echo $rspta ? "Ingreso anulado" : "Ingreso no se puede anular";
        break;

        case 'mostrar':
        $rspta=$ingreso->mostrar($idingreso);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;

        case 'listarDetalle':
        //Recibimos el idingreso
        $id=$_GET['id'];

        $rspta = $ingreso->listarDetalle($id);
        $total=0;
        echo '<thead>
        <th>Opciones</th>
        <th>Artículo</th>
        <th>Imagen</th>
        <th>Cantidad</th>
        <th>Precio Compra</th>
        <th>Precio Venta</th>
        <th>Subtotal</th>
        </thead>';

        while ($reg = $rspta->fetch_object())
        {
            $precio_compra =  number_format($reg->precio_compra, 0, '', '.');  
            $precio_venta =  number_format($reg->precio_venta, 0, '', '.'); 
            $imagen = $reg->imagen; 
            $subtotal = $reg->precio_compra*$reg->cantidad;
            $subtotal =  number_format($subtotal, 0, '', '.'); 

            echo '<tr class="filas table-striped">
            <td></td>
            <td >'.$reg->nombre.'</td>
            <td><img src="../files/articulo/'.$imagen.'" width=30 heigth=30></td>
            <td>'.$reg->cantidad.'</td>
            <td>'.$precio_compra.'</td>
            <td>'.$precio_venta.'</td>
            <td>'.$subtotal.'</td>
            </tr>';
            $total=$total+($reg->precio_compra*$reg->cantidad);
          
          
         
        }
        echo 
        '<tfoot>
        <th>TOTAL</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th>
        <h5 style="color:#ee1616"  id="total">$'.$total.'</h4><input type="hidden" name="total_compra" id="total_compra">
        </th> 
        </tfoot>';
        break;

        case 'listar':
        $rspta=$ingreso->listar();
        //Vamos a declarar un array
        $data= Array();

        while ($reg=$rspta->fetch_object()){
            $total_compra =number_format($reg->total_compra, 0, '', '.');  

            $data[]=array(
                "0"=>($reg->estado=='Aceptado')?'<button class="btn btn-success btn-xs" onclick="mostrar('.$reg->idingreso.')"><i class="fa fa-eye"></i></button>'.
                ' <button class="btn btn-danger btn-xs " onclick="anular('.$reg->idingreso.')"><i class="fa fa-trash"></i></button>':
                '<button class="btn btn-success btn-xs " onclick="mostrar('.$reg->idingreso.')"><i class="fa fa-eye"></i></button>',
                "1"=>$reg->fecha,
                "2"=>$reg->proveedor.'  '.$reg->apellido,
                "3"=>$reg->usuario .' '. $reg->apellido_u,
                "4"=>$total_compra,
                "5"=>($reg->estado=='Aceptado')?'EMITIDA':
                'ANULADA'
            );
        }
        $results = array(
            "sEcho"=>1, //Información para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        echo json_encode($results);

        break;

        case 'selectProveedor':
        require_once "../model/Persona.php";
        $persona = new Persona();

        $rspta = $persona->listarP();

        while ($reg = $rspta->fetch_object())
        {
            echo '<option value=' . $reg->idpersona . '>' . $reg->nombre.'  ' . $reg->apellido.  '</option>';
        }
        break;

        case 'listarArticulos':
        require_once "../model/Articulo.php";
        $articulo=new Articulo();
        $rspta=$articulo->listarActivos();
        $data= Array();
        while ($reg=$rspta->fetch_object()){
            $data[]=array(
                "0"
                =>'<button class="btn btn-success btn-xs" onclick="agregarDetalle('.$reg->idarticulo.',\''.$reg->nombre.'\',\''.$reg->imagen.'\')"><span class="fa fa-shopping-cart"></span></button>',
                "1"=>$reg->nombre,
                "2"=>$reg->categoria,
                "3"=>$reg->codigo,
                "4"=>$reg->stock,
                "5"=>"<img src='../files/articulo/".$reg->imagen."' height='50px' width='50px' >"
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