<?php

require_once __DIR__.'/../config.php';
require_once RAIZ_APP.'/includes/formulario.php';
require_once RAIZ_APP.'/includes/SA/SAProducto.php';
require_once RAIZ_APP.'/includes/TO/TOProducto.php';
require_once RAIZ_APP.'/includes/SA/SAVenta.php';


class FormularioAnadirVenta extends Form{
	
 	public static function generaCamposFormulario($datosIniciales){
       return '	<fieldset>
					<input type="submit" name="enviar" value="Realizar pedido">
				</fieldset>';
 	} 

 	public function procesaFormulario($datos){
		$idVenta = rand();
		SAVenta::anadirVentaSA($idVenta, $_SESSION["id"], date("Y-m-d"));
		SAProducto::vaciarProductosCarroSA($_SESSION["id"]);
		
		return 'index.php';
    }
	
}
?>