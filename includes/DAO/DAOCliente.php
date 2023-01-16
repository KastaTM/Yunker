<?php

require_once __DIR__.'/../../config.php';
include_once('DAO.php');
require_once RAIZ_APP.'/includes/TO/TOCliente.php';


class DAOCliente extends DAO {
		
	public function __construct() {
       parent::__construct();
    }
	
	public function buscaClienteDAO($idCliente) {
		$cliente = new TOCliente($idCliente);
		$query = "SELECT * FROM clientes  WHERE IdCliente = '$idCliente'";
		$rs = $this->ejecutarConsulta($query);
		if ($rs) {
			if (count($rs) == 1) {
				$cliente->setIdCliente($rs[0]["IdCliente"]);
				$cliente->setNombreCliente($rs[0]["Nombre"]);
				$cliente->setContrasenaCliente($rs[0]["Contrasenia"]);
				$cliente->setFechaCliente($rs[0]["FechaNacimiento"]);
				$cliente->setCorreoCliente($rs[0]["Correo"]);
				$cliente->setTipoCliente($rs[0]["Tipo"]);
				$cliente->setFotoCliente($rs[0]["Foto"]);
				if($cliente->getTipoCliente()== "admin"){
					$_SESSION["admin"] = true; 
				}
				else{
					$_SESSION["admin"] = false;
				}
				return $cliente;
			}
		}
		return null;
	}
	
	public function anadirClienteDAO($id, $nombre, $contrasena, $fecha, $correo, $tipo, $foto){
        $sql = "INSERT INTO clientes (IdCliente, Nombre, Contrasenia, FechaNacimiento, Correo, Tipo, Foto) VALUES ('$id', '$nombre', '$contrasena', '$fecha', '$correo', '$tipo', '$foto')";
        $this->ejecutarModificacion($sql);
 	}
	
	public function borrarClienteDAO($id){
        $sql = "DELETE From clientes WHERE IdCliente= '$id'";
        $this->ejecutarModificacion($sql);
 	}
	
	public function listarClientesDAO(){
		$query = "SELECT * FROM clientes";
		$array = array();
		$rs = $this->ejecutarConsulta($query);
		if (count($rs) != 0) {
			for($i = 0; $i < count($rs); $i++ ){
                array_push( $array, $rs[$i]['IdCliente']);
            }
			return $array;
		}
		else{
			return null;
		}
	}
	
}
?>