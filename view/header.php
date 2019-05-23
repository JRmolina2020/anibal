<?php 
include'../config/conexion.php';
if (!isset($_SESSION['correo'])) {
//si no existe la session correo no dejara entrar y direcciona al usuario login form
	header('location:../');

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Gamer fly | www.GamersBI.com</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="../public/css/bootstrap.min.css">
	<link rel="stylesheet" href="../public/css/font-awesome.css">
	<link rel="stylesheet" href="../public/css/AdminLTE.min.css">
	<link rel="stylesheet" href="../public/css/_all-skins.min.css">
	<link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
	<link rel="shortcut icon" href="../public/img/favicon.ico">
	<!-- DATATABLES -->
	<link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">
	<link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
	<link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
	<!-- VALIDATOR -->
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
	<!-- alert -->
	<link rel="stylesheet" type="text/css" href="../public/css/sweetalert2.min.css">
	<!-- DIV carga de imagen -->
	<style>
	</style>
</head>
<body>
<br><br>

<div class="container">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">FOCUSLOCUS</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">GESTION DE PROCESOS<span class="caret"></span></a>
        <ul class="dropdown-menu">
				 <li><a href="Home.php">INICIO</a></li>
				 <li><a href="usuario.php">USUARIO</a></li>
          <li><a href="categoria.php">CATEGORIA</a></li>
          <li><a href="Articulo.php">PRODUCTO</a></li>
          <li><a href="cliente.php">CLIENTES</a></li>
		  <li><a href="provedor.php">PROVEEDORES</a></li>
		  <li><a href="venta.php">VENTAS</a></li>
		  <li><a href="ingreso.php">COMPRAS</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
</div>

