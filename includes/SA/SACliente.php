<?php

require_once __DIR__.'/../../config.php';
require_once RAIZ_APP.'/includes/DAO/DAOCliente.php';


class SACliente{
	
    private static $daoCliente;

    public static function login($idCliente, $password) {
        $daoCliente = new DAOCliente();
        $user = $daoCliente->buscaClienteDAO($idCliente);
        if ($user && $user->compruebaPassword($password)) {
            return $user;
        }
        return NULL;
    }

    public static function buscaClienteSA($idCliente) {
        $daoCliente = new DAOCliente();
        return $daoCliente->buscaClienteDAO($idCliente);
    }
    
    
    public static function crea($idCliente, $nombre, $contrasena, $fecha, $correo, $tipo, $foto){
        $daoCliente = new DAOCliente();
        $user = $daoCliente->buscaClienteDAO($idCliente);
        if ($user) {
            return NULL;
        }
		$daoCliente->anadirClienteDAO($idCliente, $nombre, $contrasena, $fecha, $correo, $tipo, $foto);
        return $user;
    }

	public static function borrarClienteSA($id){
		$daoCliente = new DAOCliente();
		$existeCliente = $daoCliente->buscaClienteDAO($id);
		if (!$existeCliente) {
			return NULL; 
		}
		$daoCliente->borrarClienteDAO($id);
		return $existeCliente;
	}
	
	public static function desplegableClientes(){
		$daoCliente = new DAOCliente();
		$result = $daoCliente->listarClientesDAO();
		$lista = "";
		if($result != NULL){
			for($i = 0; $i < count($result); $i++ ){
				$lista .= "<option> $result[$i] </option>";
			}
		}
		return $lista;
	}


}
?>