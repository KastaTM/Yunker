<?php

require_once __DIR__.'/../../config.php';
include_once('DAO.php');
require_once RAIZ_APP.'/includes/TO/TOProducto.php';


class DAOProducto extends DAO {
		
	public function __construct() {
       parent::__construct();
    }
	
	public function buscaProductoDAO($nombreProducto) {
		$producto = new TOProducto($nombreProducto);
		$query = "SELECT * FROM productos WHERE Nombre = '$nombreProducto'";
		$rs = $this->ejecutarConsulta($query);
		if ($rs) {
			if (count($rs) == 1) {
				$producto->setNombreProducto($rs[0]["Nombre"]);
				$producto->setPrecioProducto($rs[0]["Precio"]);
				$producto->setDescripcionProducto($rs[0]["Descripcion"]);
				$producto->setImagenProducto($rs[0]["Imagen"]);
				return $producto;
			}
		}
		return null;
	}
	
	public function anadirProductoDAO($nombre, $precio, $descripcion, $imagen){
        $sql = "INSERT INTO productos (Nombre, Precio, Descripcion, Imagen) VALUES ('$nombre', '$precio', '$descripcion', '$imagen')";
        $this->ejecutarModificacion($sql);
 	}
	
	public function borrarProductoDAO($nombre){
        $sql = "DELETE From productos WHERE Nombre= '$nombre'";
        $this->ejecutarModificacion($sql);
 	}
	
	public function listarProductosDAO(){
		$query = "SELECT * FROM productos";
		$array = array();
		$rs = $this->ejecutarConsulta($query);
		if (count($rs) != 0) {
			for($i = 0; $i < count($rs); $i++ ){
                array_push( $array, $rs[$i]['Nombre']);
            }
			return $array;
		}
		else{
			return null;
		}
	}
	
	public function listarProductosEncontradosDAO($dato){
		$query = "SELECT * FROM productos WHERE Nombre LIKE '%$dato%'";
		$array = array();
		$rs = $this->ejecutarConsulta($query);
		if (count($rs) != 0) {
			for($i = 0; $i < count($rs); $i++ ){
                array_push( $array, $rs[$i]['Nombre']);
            }
			return $array;
		}
		else{
			return null;
		}
	}
	
	//CARRITO
	
	public function anadirProductoCarroDAO($nombre, $cliente){
        $sql = "INSERT INTO carrito (IdCliente, Nombre) VALUES ('$cliente', '$nombre')";
        $this->ejecutarModificacion($sql);
 	}
	
	public function listarProductosCarroDAO($cliente){
		$query = "SELECT * FROM carrito WHERE IdCliente = '$cliente'";
		$array = array();
		$rs = $this->ejecutarConsulta($query);
		if (count($rs) != 0) {
			for($i = 0; $i < count($rs); $i++ ){
                array_push( $array, $rs[$i]['Nombre']);
            }
			return $array;
		}
		else{
			return null;
		}
	}
	
	public function vaciarProductosCarroDAO($idC){
		$sql = "DELETE FROM carrito WHERE IdCliente = '$idC'";
		$this->ejecutarModificacion($sql);
	}
	
	
}
?>