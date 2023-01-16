<?php

require_once __DIR__.'/../config.php';
require_once RAIZ_APP.'/includes/formulario.php';


class FormularioBorrarProducto extends Form{

 	public static function generaCamposFormulario($datosIniciales){
		$resultado = '	<fieldset>
					<legend> Producto que quieres borrar </legend>
					Nombre del producto:			<br><select name="nombre">';
		$resultado .= SAProducto::desplegableProductos();
		$resultado .= '</select>
					<br><input type="submit" name="enviar" value="Borrar"></br>
					</fieldset>';
       return $resultado;
 	} 

 	public function procesaFormulario($datos){ 
        $errores = array();
		$nombre = $_POST['nombre'];
		if(empty($nombre)){
			$errores[] = "El nombre del producto no puede estar vacío";
		}
		if(count($errores) == 0){
			SAProducto::borrarProductoSA($nombre);
			return 'listaProductos.php';
		}
		else{
			return $errores;
		}
    }
	
}
?>