<?php
	require("includes/comun/session.php");
	require_once __DIR__.'/config.php';
	require_once RAIZ_APP.'/includes/FormularioBorrarProducto.php';
	require_once RAIZ_APP.'/includes/SA/SAProducto.php';
	require_once RAIZ_APP.'/includes/TO/TOProducto.php';
	$opciones = array();
	$formulario = new FormularioBorrarProducto("formBorrarProducto", $opciones);
	$htmlFormulario = $formulario->gestiona();
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<link rel="stylesheet" type="text/css" href="css/formComentario.css"/>
		<link rel="shortcut icon" href="img/favicon.ico">
		<meta charset="utf-8">
		<title> Borrar producto </title>
	</head>
	<body>
		<div id="contenedor">
			<div class = "header">
				<?php
					require("includes/comun/cabecera.php");
				?>
			</div>
			<div id="contenido">
				<?= $htmlFormulario ?>
			</div>
			<footer>
				<?php
					include("includes/comun/pie.php");
				?>
			</footer>
		</div>
	</body>
</html>