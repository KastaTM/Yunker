<?php
	require("includes/comun/session.php");
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo-basico.css" />
	<link rel="stylesheet" type="text/css" href="css/form.css" />
	<link rel="shortcut icon" href="img/favicon.ico">
	<meta charset="utf-8">
	<title>Administrar</title>
</head>
<body>
	<div id="contenedor">
		<div class = "header">
			<?php
				require("includes/comun/cabecera.php");
			?>
		</div>
		<div id="contenido">
			<div class = 'admin'>
				<h3 class = "titulosIndex">Productos</h3>
					<p><a class='boton_admin' href = 'subirProducto.php'> Añadir Producto </a>
					<a class='boton_admin' href = 'borrarProducto.php'> Borrar Producto </a></p></br>
				<h3 class = "titulosIndex">Clientes</h3>
					<a class='boton_admin' href = 'borrarCliente.php'> Borrar Cliente </a></p></br>
			</div>
		</div>
		<footer>
			<?php
				include("includes/comun/pie.php");
			?>
		</footer>
	</div>
</body>
</html>