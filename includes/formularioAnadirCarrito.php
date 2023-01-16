<?php

require_once __DIR__.'/../config.php';
require_once RAIZ_APP.'/includes/formulario.php';


class FormularioAnadirCarrito extends Form{

 	public static function generaCamposFormulario($datosIniciales){
       return '	<fieldset>
					<br><input type="submit" name="enviar" value="Añadir al carrito"></br>
				</fieldset>';
 	} 

 	public function procesaFormulario($datos){ 
        $errores = array();
		
		$nombre = $_GET['variable'];
		if(empty($nombre)){
			$errores[] = "El nombre de este producto no puede estar vacío";
		}
		if(count($errores) == 0){
			if($_SESSION["login"] == true){
				SAProducto::anadirProductoCarroSA($nombre, $_SESSION["id"]);
			}
			return 'vistaCarrito.php';
		}
		else{
			return $errores;
		}
    }
	
}
?>