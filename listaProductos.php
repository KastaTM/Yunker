<?php
	require("includes/comun/session.php");
	require_once __DIR__.'/config.php';
	require_once RAIZ_APP.'/includes/SA/SAProducto.php';
	require_once RAIZ_APP.'/includes/TO/TOProducto.php';
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
				echo "<table class='lista'>";
				$listaProductos = SAProducto::listarProductosSA();
				$numero = sizeof($listaProductos);
				if($listaProductos == null || $numero == 0){
					echo "No hay productos en la base de datos";
				}
				else{
					echo"<tr>";
					for ($i = 0; $i < $numero; $i++) {
						if($i !=0 && $i%5==0)echo"</tr><tr>";
						$producto = $listaProductos[$i];
						echo"<td>";
						echo"<div class= 'portada'>";
						echo "<p><a href = 'vistaProducto.php?variable=" . $producto->getNombreProducto() ."'><img src = " . $producto->getImagenProducto() . " class = 'portadaLista'></a></br></p>"; 
						echo"<p>" . $producto->getNombreProducto(). "</p>";
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