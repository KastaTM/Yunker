<?php
	require("includes/comun/session.php");
	require_once __DIR__.'/config.php';
	require_once RAIZ_APP.'/includes/SA/SACliente.php';
	require_once RAIZ_APP.'/includes/TO/TOCliente.php';
	require_once RAIZ_APP.'/includes/SA/SAProducto.php';
	require_once RAIZ_APP.'/includes/TO/TOProducto.php';
	require_once RAIZ_APP.'/includes/SA/SAVenta.php';
	require_once RAIZ_APP.'/includes/TO/TOVenta.php';
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo-basico.css" />
	<link rel="stylesheet" type="text/css" href="css/form.css" />
	<link rel="shortcut icon" href="img/favicon.ico">
	<meta charset="utf-8">
	<title>Perfil</title>
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
				if (isset($_GET['variable'])){
					$perfilCliente = SACliente::buscaClienteSA($_GET['variable']);
				}

				echo"<div class='vista'>";
				echo"<img src = " . $perfilCliente->getFotoCliente() . " class = 'portadaVista'></br>";
				echo "<p>Nick: ". $perfilCliente->getIdCliente() . "</br></br>";
				echo "Nombre: " . $perfilCliente->getNombreCliente() ."</br></br>";
				echo "Fecha de nacimiento: " . $perfilCliente->getFechaCliente() . "</br></br>";
				echo "Correo electrónico: " . $perfilCliente->getCorreoCliente() . "</br></br>";
				echo"</p>";
				echo"</div>";
				echo"<h3 class = 'titulosIndex'>Tus ventas</h3>";
				echo "<table class='lista'>";
				$listaVentas = array();
				$listaVentas = SAVenta::listarVentasSA($_SESSION["id"]);
				$numero = sizeof($listaVentas);
				if($listaVentas == null || $numero == 0){
					echo "No has realizado ningún pedido";
				}
				else{
					$total = 0;
					echo"<tr>";
					for ($i = 0; $i < $numero; $i++) {
						if($i !=0 && $i%5==0)echo"</tr><tr>";
						$venta = $listaVentas[$i];
						echo"<td>";
						echo"<p>Número de pedido: " . $venta->getIdVenta(). "</p>";
						echo"<p>Realizado el día ". $venta->getFechaVenta()."</p>";
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