<?php

require_once __DIR__.'/../config.php';
require_once RAIZ_APP.'/includes/formulario.php';


class FormularioSubirProducto extends Form{

 	public static function generaCamposFormulario($datosIniciales){
       return '	<fieldset>
					<legend> Datos del producto </legend>
					Nombre:			<br><input type="text" name="nombre"></br>
					Precio:	<br><input step="any" type="number" name="precio"></br>
					Descripción: 	<br><textarea name="descripción" maxlength="5000"></textarea></br>
					Imagen:		<br><input type="file" name="imagen"/></br>
					<br><input type="submit" name="enviar" value="Enviar"></br>
				</fieldset>';
 	} 

 	public function procesaFormulario($datos){ 
        $errores = array();
		$imagen = $_FILES['imagen']['name'];
		$ruta ="img/imagenesProductos/";
		$imagenFileType = $ruta. strtolower(basename($imagen));
		$tempname = $_FILES['imagen']['tmp_name'];
		
		$nombre = $_POST['nombre'];
		if(empty($nombre)){
			$errores[] = "El nombre de este producto no puede estar vacío";
		}
		$precio = $_POST['precio'];
		if(empty($precio)){
			$errores[] = "El precio de este producto no puede estar vacío";
		}
		$descripcion = $_POST['descripción'];
		if(empty($descripcion)){
			$errores[] = "La descripción de este producto no puede estar vacío";
		}				
		if($imagen == NULL){
			$erroresFormulario[] = "El producto debe tener una imagen";
		}
		if(count($errores) == 0){
			SAProducto::anadirProductoSA($nombre,$precio, $descripcion, $imagenFileType);
			move_uploaded_file($tempname, $imagenFileType);
			return 'listaProductos.php';
		}
		else{
			return $errores;
		}
    }
	
}
?>