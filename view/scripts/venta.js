var tabla;

function init() {

  //funciones por defectos activas 
  guardaryeditar();
  fecha_actual();
  listar();
  //cargamos el select de clientes registrados
  $.post("../controller/venta.php?op=selectCliente", function (r) {
    $("#idcliente").html(r);
    $('#idcliente').selectpicker('refresh');
  });

}

function activar() {
  $("#btnGuardar").hide();
  $("#btnAgregarArt").show();
  $('#formulario').bootstrapValidator("resetForm", true);
  listarArticulos();
  fecha_actual();
}

// limpiar text , varciar filas
function limpiar() {

  $(".filas").remove();
  $("#total").html("0.000");
  fecha_actual();
}

// obtener la fecha actual de nuestro sistema
function fecha_actual() {
  //Obtenemos la fecha actual
  var now = new Date();
  var day = ("0" + now.getDate()).slice(-2);
  var month = ("0" + (now.getMonth() + 1)).slice(-2);
  var today = now.getFullYear() + "-" + (month) + "-" + (day);
  $('#fecha_hora').val(today);
}
//Función listar
function listar() {
  tabla = $('#listado').dataTable({
    "aProcessing": true, //Activamos el procesamiento del datatables
    "aServerSide": true, //Paginación y filtrado realizados por el servidor
    dom: 'Bfrtip', //Definimos los elementos del control de tabla
    buttons: [


    ],
    "ajax": {

      url: '../controller/venta.php?op=listar',
      type: "GET",
      dataType: "json",
      error: function (e) {
        console.log(e.responseText);
      }
    },
    "bDestroy": true,
    "iDisplayLength": 5, //Paginación
    "order": [
      [0, "desc"]
    ] //Ordenar (columna,orden)
  }).DataTable();
}

function listarArticulos() {
  tabla = $('#tblarticulos').dataTable({
    "aProcessing": true, //Activamos el procesamiento del datatables
    "aServerSide": true, //Paginación y filtrado realizados por el servidor
    dom: 'Bfrtip', //Definimos los elementos del control de tabla
    buttons: [

    ],
    "ajax": {
      url: '../controller/venta.php?op=listarArticulosVenta',
      type: "get",
      dataType: "json",
      error: function (e) {
        console.log(e.responseText);
      }
    },
    "bDestroy": true,
    "iDisplayLength": 5, //Paginación
    "order": [
      [0, "desc"]
    ] //Ordenar (columna,orden)
  }).DataTable();
}

function guardaryeditar(e) {
  $('#formulario').bootstrapValidator({
      message: 'This value is not valid',
      fields: {}
    })
    .on('success.form.bv', function (e) {
      e.preventDefault();
      var formData = new FormData($("#formulario")[0]);
      $.ajax({
        url: "../controller/venta.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
          swal({
            position: 'top-end',
            type: 'success',
            title: datos,
            showConfirmButton: false,
            timer: 1500
          });

          $('.nav-tabs a:last').tab('show');
          // funciones independientes
          $('#formulario').bootstrapValidator("resetForm", true);
          listar();
          limpiar();
        }

      });
    });
}
// Mostrar la informacion de la venta realizada,mostramos primero que todo
// los datos del cliente a quien se le hizo la venta y los productos que llevo
function mostrar(idventa) {
  $.post("../controller/venta.php?op=mostrar", {
    idventa: idventa
  }, function (data, status) {
    data = JSON.parse(data);
    $("#btnGuardar").hide();
    $('#cubitoagregar').hide();
    $('.nav-tabs a:first').tab('show')
    //------------------------------------- 
    $("#idcliente").val(data.idcliente);
    $("#idcliente").selectpicker('refresh');
    $("#fecha_hora").val(data.fecha);
    $("#idventa").val(data.idventa);
  });
  // en esta parte es donde mostramos los detalles de los productos llevados por el cliente
  $.post("../controller/venta.php?op=listarDetalle&id=" + idventa, function (r) {
    $("#detalles").html(r);
  });
}

//Función para anular una venta,por x o y razon, cada venta anulada obtendra en su
//fuente de dato un atributo anulado el cual no se sumara a la venta total del dia o
//inventario
function anular(idventa) {
  swal({
    title: "Desea anular esta venta?!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'SI, Anular!'
  }).then((result) => {
    if (result.value) {
      $.post("../controller/venta.php?op=anular", {
        idventa: idventa
      }, function (e) {
        swal(e);
        listar();
      });
    }
  })
}
//Declaración de variables necesarias para trabajar con las compras y
//sus detalles
var cont = 0;
var detalles = 0;
$("#btnGuardar").hide();

function agregarDetalle(idarticulo, articulo, precio_venta, stock, imagen) {
  var cantidad = 1;
  var stockR = stock;
  var descuento = 0;

  // validamos el stock de producto si es 0 Este no se agregaras
  if (cantidad > stockR) {
    swal({
      type: 'error',
      title: 'Oops...',
      text: 'Sin existencia!'
    })
  } else {
    if (idarticulo != "") {

      var subtotal = precio_venta * cantidad;
      var fila = '<tr class="filas" id="fila' + cont + '">' +
        '<td><button type="button" class="btn btn-danger btn-xs" onclick="eliminarDetalle(' + cont + ')"><i class="fa fa-trash  btn-flat margi"></i></button></td>' +
        '<td><img src="../files/articulo/' + imagen + '" width="20" height="20"></td>' +
        '<td><input type="hidden"  name="idarticulo[]" value="' + idarticulo + '">' + articulo + '</td>' +
        '<td><input type="number"  class="form-control"  onchange="modificarSubototales()" name="cantidad[]" id="cantidad[]" min="1" max="' + stock + '" value="' + cantidad + '" onkeydown="return false"></td>' +
        '<td  width="20%"><input type="number"  class="form-control" readonly="readonly"  onchange="modificarSubototales()" name="precio_venta[]" id="precio_venta[]" value="' + precio_venta + '"></td>' +
        '<td width="10%"><input type="number" class="form-control"  onchange="modificarSubototales()" name="descuento[]" min="0" max="' + precio_venta + '"  step="2000"   value="' + descuento + '" onkeydown="return false"></td>' +
        '<td  width="10%"><input type="number" readonly="readonly" class="form-control"  name="stock[]" value="' + stock + '"></td>' +
        '<td><span name="subtotal"  STYLE="color: green; font-size: 12pt" id="subtotal' + cont + '">' + subtotal + '</span></td>' +
        '</tr>';
      cont++;
      detalles = detalles + 1;
      $('#detalles').append(fila);
      modificarSubototales();
    } else {
      alert("Error al ingresar el detalle, revisar los datos del artículo");
    }
  }
}

function modificarSubototales() {
  var cant = document.getElementsByName("cantidad[]");
  var prec = document.getElementsByName("precio_venta[]");
  var desc = document.getElementsByName("descuento[]");
  var stoc = document.getElementsByName("stock[]");
  var sub = document.getElementsByName("subtotal");
  // recorremos los inputs
  for (var i = 0; i < cant.length; i++) {
    var inpC = cant[i];
    var inpP = prec[i];
    var inpD = desc[i];
    var instoc = stoc[i];
    var inpS = sub[i];
    inpS.value = (inpC.value * inpP.value) - inpD.value;

    document.getElementsByName("subtotal")[i].innerHTML = inpS.value;
  }
  calcularTotales();
}



function calcularTotales() {
  var sub = document.getElementsByName("subtotal");
  var total = 0.0;

  for (var i = 0; i < sub.length; i++) {
    total += document.getElementsByName("subtotal")[i].value;
  }
  // calculando el total primero
  var tot = accounting.formatNumber(total);
  $("#total").html("$" + tot);
  $("#total_venta").val(total);
  evaluar();
}

function evaluar() {
  if (detalles > 0) {
    $("#btnGuardar").show();
  } else {
    $("#btnGuardar").hide();
    cont = 0;
  }
}

function eliminarDetalle(indice) {
  $("#fila" + indice).remove();
  calcularTotales();
  detalles = detalles - 1;
  evaluar();
}

function cerrarformulario() {
  limpiar();
  $('#formulario').bootstrapValidator("resetForm", true);
  $('.nav-tabs a:last').tab('show');
  $('#cubitoagregar').show();
  fecha_actual();
}
init();