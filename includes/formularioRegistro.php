<?php

require_once __DIR__.'/../config.php';
require_once RAIZ_APP.'/includes/formulario.php';
require_once RAIZ_APP.'/includes/SA/SACliente.php';
require_once RAIZ_APP.'/includes/TO/TOCliente.php';


class FormularioRegistro extends Form{

    public static function generaCamposFormulario($datosIniciales){
    	return '<fieldset>
					<legend> Datos del cliente </legend>
					<form method="post" action="procesarRegistro.php">
					Id Cliente:				<br><input type="text" name="id"></br>
					Nombre:					<br><input type="text" name="nombre"></br>
					Fecha de nacimiento:	<br><input type="date" name="nacimiento"></br>
					Correo electrónico:		<br><input type="text" name="email"></br>
					Contraseña:				<br><input type="password" name="contrasena"></br>
					Foto: 					<br><input type="file" name="imagen"/></br>
					<br><input type="submit" name="enviar" value="Enviar"></br>
				</fieldset>';
	}

    public function procesaFormulario($datos){
		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$fn = $_POST['nacimiento'];
		$email = $_POST['email'];
		$contrasenia = $_POST['contrasena'];
		$contrasenia =  password_hash($contrasenia, PASSWORD_BCRYPT, array('cost' => 12));
		$foto = $_FILES['imagen']['name'];
		$ruta ="img/fotosClientes/";
		$tempname = $_FILES['imagen']['tmp_name'];
		if($foto == NULL){
			$foto = "sinfoto.jpg";
		}
		$fotoFileType = $ruta. strtolower(basename($foto));
		SACliente::crea($id, $nombre, $contrasenia, $fn, $email, "normal", $fotoFileType);
		move_uploaded_file($tempname, $fotoFileType);
		return 'index.php';
    }
	
}
?>