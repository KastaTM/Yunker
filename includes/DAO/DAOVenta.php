<?php

require_once __DIR__.'/../../config.php';
include_once('DAO.php');
require_once RAIZ_APP.'/includes/TO/TOVenta.php';


class DAOVenta extends DAO {
		
	public function __construct() {
       parent::__construct();
    }
	
	public function buscaVentaDAO($idVenta) {
		$venta = new TOVenta($idVenta);
		$query = "SELECT * FROM ventas WHERE IdVenta = '$idVenta'";
		$rs = $this->ejecutarConsulta($query);
		if ($rs) {
			if (count($rs) == 1) {
				$venta->setIdVenta($rs[0]["IdVenta"]);
				$venta->setIdCliente($rs[0]["IdCliente"]);
				$venta->setFechaVenta($rs[0]["FechaVenta"]);
				return $venta;
			}
		}
		return null;
	}
	
	public function anadirVentaDAO($idV, $idC, $fecha){
        $sql = "INSERT INTO ventas (IdVenta, IdCliente, FechaVenta) VALUES ('$idV', '$idC', '$fecha')";
        $this->ejecutarModificacion($sql);
 	}
	
	public function listarVentasDAO($cliente){
		$query = "SELECT * FROM ventas WHERE IdCliente = '$cliente'";
		$array = array();
		$rs = $this->ejecutarConsulta($query);
		if (count($rs) != 0) {
			for($i = 0; $i < count($rs); $i++){
                array_push( $array, $rs[$i]['IdVenta']);
            }
			return $array;
		}
		else{
			return null;
		}
	}
	
}
?>