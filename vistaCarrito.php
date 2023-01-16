<?php
	require("includes/comun/session.php");
	require_once __DIR__.'/config.php';
	require_once RAIZ_APP.'/includes/SA/SAProducto.php';
	require_once RAIZ_APP.'/includes/TO/TOProducto.php';
	require_once RAIZ_APP.'/includes/SA/SAVenta.php';
	require_once RAIZ_APP.'/includes/TO/TOVenta.php';
	require_once RAIZ_APP.'/includes/formularioAnadirVenta.php';
	$opciones = array();
	$formulario = new FormularioAnadirVenta("formAnadirVenta", $opciones);
	$htmlFormulario = $formulario->gestiona();
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo-basico.css" />
	<link rel="shortcut icon" href="img/favicon.ico">
	<meta charset="utf-8">
	<title>Yunker - Carrito</title>
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
			
			if(isset($_SESSION['id']) && isset($_SESSION['login'])){
				echo "<table class='lista'>";
				$listaCarro = array();
				$listaCarro = SAProducto::listarProductosCarroSA($_SESSION["id"]);
				$total = 0;
				$numero = sizeof($listaCarro);
				if($listaCarro == null || $numero == 0){
					echo "No hay productos en la base de datos";
				}
				else {
					echo"<tr>";
					for ($i = 0; $i < $numero; $i++) {
						if($i !=0 && $i%5==0)echo"</tr><tr>";
						$producto = $listaCarro[$i];
						echo"<td>";
						echo"<div class= 'portada'>";
						echo "<p><img src = " . $producto->getImagenProducto() . " class = 'portadaLista'></br></p>"; 
						echo"<p>" . $producto->getNombreProducto(). "</p>";
						echo"<p>" . $producto->getPrecioProducto()."" . "€" . "</p>";
						$total += $producto->getPrecioProducto();
						echo"</div>";
						echo"</td>";
					}
					echo "</tr>";
				}
				
				if($listaCarro != null || $numero >= 0){
					echo "</table>";
					echo"<p> Precio total: " . $total . "" . "€" . "</p>";
					echo "$htmlFormulario";
				}
			}
			else{
				echo"Debes hacer login para poder ver tu carrito";
			}
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