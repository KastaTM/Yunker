<?php
	require("includes/comun/session.php");
	require_once __DIR__.'/config.php';
	require_once RAIZ_APP.'/includes/SA/SAProducto.php';
	require_once RAIZ_APP.'/includes/TO/TOProducto.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo-basico.css" />
	<link rel="shortcut icon" href="img/favicon.ico">
	<meta charset="utf-8">
	<title>Yunker</title>
</head>

<body>
	<div id="contenedor">
		<div class = "header">
			<?php
				require("includes/comun/cabecera.php");
			?>
		</div>
		<div id="contenido">
			<table>
			<tr>
			<td>
			<img src='img/index.jpg'>
			</td>
			<td>
			<p>Somos Yunker, especialistas en hamburguesas desde hace años.
			Simplemente las mejores hamburguesas del barrio servidas en tu casa desde un local donde la amabilidad y el entretenimiento son los reyes. Disfruta del momento y déjate contagiar por la sonrisa y amabilidad de nuestro equipo.
			Somos únicos e inimitables. Cada una de nuestras recetas originales está hecha exclusivamente con productos excelentes e ingredientes de altísima calidad.
			</p>
			</td>
			</tr>
			</table>
		</div>
		<footer>
			<?php
				include("includes/comun/pie.php");
			?>
		</footer>
	</div>
</body>
</html>