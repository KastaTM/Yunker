
<link rel="stylesheet" type="text/css" href="css/estilo-basico.css" />

	<div class="container logo-nav-container">
            <a href="index.php" class="logo"><img src = "img/logo.png" width ='90' height= '70'></a>
        
            <nav class="navigation">
                <ul class="show">
					<li><a href="index.php">Inicio</a></li>
                    <li><a href="listaProductos.php">Productos</a></li>
					<li><a href="vistaCarrito.php">Carrito</a></li>
					<?php
						if (isset($_SESSION["login"]) && ($_SESSION["login"]==true)) {
							if(isset($_SESSION["id"]) && ($_SESSION["admin"]==true)){
								echo "<li><a href='administrar.php'>Administrar</a></li>";
							}	
							$id = $_SESSION["id"];
							echo "<li><a href='vistaCliente.php?variable=$id'> $id </a></li>";
							echo "<li><a href='logout.php'>Salir</a></li>";
						}
						else {
							echo "<li><a href='login.php'>Login</a></li>";
						}
					?>
					<li><form action="vistaResultados.php" method="get">
						<input type="text" class="searchterm" placeholder="Busca producto" name = "search" required />
						<input type="submit" class = "buscador" name="aceptar" value="Buscar">
					</form></li>
                </ul>
            </nav>
        </div>