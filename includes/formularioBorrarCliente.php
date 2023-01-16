<?php

require_once __DIR__.'/../config.php';
require_once RAIZ_APP.'/includes/formulario.php';


class FormularioBorrarCliente extends Form{

 	public static function generaCamposFormulario($datosIniciales){
		$resultado = '	<fieldset>
					<legend> Cliente que quieres borrar </legend>
					Id del cliente:			<br><select name="id">';
		$resultado .= SACliente::desplegableClientes();
		$resultado .= '</select>
					<br><input type="submit" name="enviar" value="Borrar"></br>
					</fieldset>';
       return $resultado;
 	} 

 	public function procesaFormulario($datos){ 
        $errores = array();
		$id = $_POST['id'];
		if(empty($id)){
			$errores[] = "El id del cliente no puede estar vacío";
		}
		if(count($errores) == 0){
			SACliente::borrarClienteSA($id);
			return 'index.php';
		}
		else{
			return $errores;
		}
    }
	
}
?>