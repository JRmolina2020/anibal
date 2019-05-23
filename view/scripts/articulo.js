var tabla;

function init() {
	guardaryeditar();
	listar();
	$("#imagenmuestra").hide();
	$("#div-muestra").hide();
	//Cargamos los items al select categoria
	$.post("../controller/articulo.php?op=selectCategoria", function (r) {
		$("#idcategoria").html(r);
		$('#idcategoria').selectpicker('refresh');

	});
}
//Función limpiar
function limpiar() {
	$("#idcategoria").val("");
	$("#idarticulo").val("");
	$("#nombre").val("");
	$("#codigo").val("");
	$("#descripcion").val("");
	// ___________________________________________
	$("#imagenmuestra").attr("src", "");
	$("#imagenactual").val("");
	$("#cuadritoimagen").hide();
	$("#print").hide();
}

//Función listar
function listar()

{
	tabla = $('#listado').dataTable({
		"aProcessing": true, //Activamos el procesamiento del datatables
		"aServerSide": true, //Paginación y filtrado realizados por el servidor
		dom: 'Bfrtip', //Definimos los elementos del control de tabla
		buttons: [


		],
		"ajax": {

			url: '../controller/articulo.php?op=listar',
			type: "GET",
			dataType: "json",
			error: function (e) {
				console.log(e.responseText);
			}
		},
		"bDestroy": true,
		"iDisplayLength": 4, //Paginación
		"order": [
			[0, "desc"]
		] //Ordenar (columna,orden)
	}).DataTable();
}

function guardaryeditar(e) {
	// VALIDATION formulario
	$('#formulario').bootstrapValidator({
			message: 'This value is not valid',
			fields: {


				codigo: {
					row: '.col-xs-4',
					message: 'Codigo del articulo invalido',
					validators: {
						notEmpty: {
							message: 'El codigo es obligatorio,no puede estar vacio'
						},
						integer: {
							message: 'Digite un numero valido,no se aceptan caracteres',
							thousandsSeparator: '',
							decimalSeparator: '.'
						},
						stringLength: {
							min: 3,
							max: 4,
							message: 'Minimo 3 digito y Maximo 4 digitos'
						},
						between: {
							min: 1,
							max: 9999,
							message: 'El primer digito debe ser  mayor a 0 y debe ser menor a 9999'
						},

						regexp: {
							regexp: /^[a-zA-Z0-9_\.]+$/,
							message: 'No se permiten espacios',
						}

					}
				},

				nombre: {
					message: 'Nombre del aritculo invalido',
					validators: {
						notEmpty: {
							message: 'El Nombre es obligatorio ,no puede estar vacio.'
						},
						stringLength: {
							min: 3,
							max: 20,
							message: 'Minimo 3 caracteres y Maximo 20 caracteres '
						},
						regexp: {
							regexp: /^[a-zA-Z\s]+$/,
							message: 'Ingrese un nombre correcto,no se aceptan valores numericos'
						},

					}
				},
				descripcion: {
					message: 'Descripcion invalida',
					validators: {
						notEmpty: {
							message: 'La Descripcion es obligatoria,no puede estar vacia'
						},
						stringLength: {
							min: 7,
							max: 90,
							message: 'Minimo 7 caracteres y Maximo 90 caracteres'
						},
					}
				},
				imagen: {
					validators: {
						file: {
							extension: 'jpeg,jpg,png,PNG',
							type: 'image/jpeg,image/png',
							maxSize: 2097152, // 2048 * 1024
							message: 'Archivo denegado,Inserte una imagen valida'
						},
					}
				},
			}
		})

		// end validaciones
		.on('success.form.bv', function (e) {
			// ---------------------------------------
			e.preventDefault(); //No se activará la acción predeterminada del evento
			$("#btnGuardar").prop("disabled", false);
			var formData = new FormData($("#formulario")[0]);
			$.ajax({
				url: "../controller/articulo.php?op=guardaryeditar",
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
					limpiar();

					$('#formulario').bootstrapValidator("resetForm", true);
					tabla.ajax.reload();
					$('.nav-tabs a:last').tab('show')

				}

			});
		});
}
// end save
function mostrar(idarticulo) {
	$.post("../controller/articulo.php?op=mostrar", {
		idarticulo: idarticulo
	}, function (data, status) {
		data = JSON.parse(data);
		// --------------------------------
		$("#idarticulo").val(data.idarticulo);
		$("#idcategoria").val(data.idcategoria).change();
		$("#codigo").val(data.codigo);
		$("#nombre").val(data.nombre);
		$("#descripcion").val(data.descripcion);
		// ----------------------------------------
		$('.nav-tabs a:first').tab('show')
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src", "../files/articulo/" + data.imagen);
		$("#imagenactual").val(data.imagen);
		$("#cuadritoimagen").show();
		$("#print").show();
		generarbarcode();
	})
}

//Función para eliminar registros
function eliminar(idarticulo) {
	swal({
		title: "Desea eliminar este articulo?, Recuerde una vez eliminado, no se podrà recuperar la informacion!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'SI, ELIMINAR!'
	}).then((result) => {
		if (result.value) {
			$.post("../controller/articulo.php?op=eliminar", {
				idarticulo: idarticulo
			}, function (e) {
				swal(e);
				tabla.ajax.reload();
			});

		}
	})
}

function cerrarformulario() {
	$("#cuadritoimagen").hide();
	$('#formulario').bootstrapValidator("resetForm", true);
	limpiar();
	$('.nav-tabs a:last').tab('show');
	$('#formulario').find('[name="codigo"]').focus();
}

//función para generar el código de barras
function generarbarcode() {
	codigo = $("#codigo").val();
	JsBarcode("#barcode", codigo, {
		background: "#ccffff"

	});
}

function codebarra(codigo, nombre) {
	$("#codigobarra").val(codigo);
	$("#nombrebarra").val(nombre);
	$('#modalbarra').modal('show');
	$('#printb').show();
}

function obtener() {
	var codigo = parseInt(document.fbarra.codigobarra.value);
	var nombre = document.fbarra.nombrebarra.value;
	var num = parseInt(document.fbarra.num.value);
	multiplicar(codigo, nombre, num);
}

function cerrar() {
	$('#printb').hide();
	$("#ancho").val("");
	$("#alto").val("");
	$("#codigobarra").val("");
	$("#nombrebarra").val("");
	$("#num").val("");
	$("#print").show();
}

function multiplicar(codigo, nombre, numero) {
	var codigo = codigo;
	var nombre = nombre;
	var num = numero;
	var div = '';
	for (var i = 0; i < num; i++) {
		var cont = i + 1;
		div += "<center><br>" + nombre + "<br><svg id='barcodex'></svg></center><br>"
	}

	document.getElementById("printb").innerHTML = div;
	JsBarcode("#barcodex", codigo, {

		format: "pharmacode",
		lineColor: "#000",
		textAlign: "center",
		width: 4,
		height: 90,
		displayValue: true,
		textPosition: "top",
	});
	imprimir();
}

function imprimir() {
	$('#printb').printArea();
}





init();