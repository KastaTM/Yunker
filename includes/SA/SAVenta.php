<?php

require_once __DIR__.'/../../config.php';
require_once RAIZ_APP.'/includes/DAO/DAOVenta.php';


class SAVenta {
	
	private static $daoVenta;

		
	public static function anadirVentaSA($idVenta, $idCliente, $fecha){
		$daoVenta = new DAOVenta();
		$existeVenta = $daoVenta->buscaVentaDAO($idVenta);
		if ($existeVenta) {
			return NULL; 
		}
		$daoVenta->anadirVentaDAO($idVenta, $idCliente, $fecha);
		return $existeVenta;
	}
		
	public static function listarVentasSA($cliente){
		$daoVenta = new DAOVenta();
		$result = $daoVenta->listarVentasDAO($cliente);
		$ventas = array();
		if($result != NULL){
			for($i = 0; $i < count($result); $i++ ){
				array_push($ventas, $daoVenta->buscaVentaDAO($result[$i]));
			}
		}
		return $ventas;
	}

	
	//VentaProducto

}
?>