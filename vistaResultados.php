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
	<title>Yunker - Resultados</title>
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
				echo "<table class='lista'>";
				$dato = $_GET['search'];
				$productosBuscados = SAProducto::busquedaProductos($dato);
				$numero = sizeof($productosBuscados);
				if ($numero == 0){
					echo "No hay productos con ese nombre en la base de datos";
				}
				else{
					echo"<tr>";
					$contador = 0;
					for ($i = 0; $i < sizeof($productosBuscados); $i++) {
						if($contador !=0 && $contador%5==0)echo"</tr><tr>";
						$producto = $productosBuscados[$i];
						echo"<td>";
						echo"<div class= 'portada'>";
						echo "<p><a href = 'vistaProducto.php?variable=" . $producto->getNombreProducto() ."'><img src = " . $producto->getImagenProducto() . " class = 'portadaLista'></a></br></p>";
						echo"<p>" . $producto->getNombreProducto(). "</p>";
						$contador++;
						echo"</div>";
						echo"</td>";
				}
					echo "</tr>";
				}
				echo "</table>";
			?>
		</div>
		<footer>
			<?php
				include("includes/comun/pie.php");
			?>
		</footer>
	</div>
</body>
</html>