<?php
	require("includes/comun/session.php");
	require_once __DIR__.'/config.php';
	require_once RAIZ_APP.'/includes/SA/SAProducto.php';
	require_once RAIZ_APP.'/includes/TO/TOProducto.php';
	require_once RAIZ_APP.'/includes/FormularioAnadirCarrito.php';
	$opciones = array();
	$formulario = new FormularioAnadirCarrito("formAnadirCarrito", $opciones);
	$htmlFormulario = $formulario->gestiona();
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo-basico.css" />
	<link rel="shortcut icon" href="img/favicon.ico">
	<meta charset="utf-8">
	<title>Yunker - Productos</title>
</head>
<body>
	<div id="contenedor">
		<div class = "header">
			<?php
				require("includes/comun/cabecera.php");
			?>
		</div>
		<div id="contenido">
			<?php
				if(isset($_GET['variable'])){
					$producto = SAProducto::buscaProductoSA($_GET['variable']);
				}
				
				echo "<div class='vista'>";
				echo "<img src = " . $producto->getImagenProducto() . " class = 'portadaVista'></br>";
				echo "Producto:			" . $producto->getNombreProducto() . "</br>";
				echo "Precio:			" . $producto->getPrecioProducto() .  "" . "€" . "</br>";
				echo "Descripción:		" . $producto->getDescripcionProducto() . " </br></p>";		
			?>
		</div>
				<?= $htmlFormulario ?>
		<footer>
			<?php
				include("includes/comun/pie.php");
			?>
		</footer>
	</div>
</body>
</html>