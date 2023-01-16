<?php

require_once __DIR__.'/../../config.php';
require_once RAIZ_APP.'/includes/DAO/DAOProducto.php';

class SAProducto {
		
	private static $daoProducto;
	
	public static function buscaProductoSA($nombreProducto) {
		$daoProducto = new DAOProducto();
		return $daoProducto->buscaProductoDAO($nombreProducto);
	}
		
	public static function anadirProductoSA($nombre, $precio, $descripcion, $imagen){
		$daoProducto = new DAOProducto();
		$existeProducto = $daoProducto->buscaProductoDAO($nombre);
		if ($existeProducto) {
			return NULL; 
		}
		$daoProducto->anadirProductoDAO($nombre, $precio, $descripcion, $imagen);
		return $existeProducto;
	}
		
	public static function borrarProductoSA($nombre){
		$daoProducto = new DAOProducto();
		$existeProducto = $daoProducto->buscaProductoDAO($nombre);
		if (!$existeProducto) {
			return NULL; 
		}
		$daoProducto->borrarProductoDAO($nombre);
		return $existeProducto;
	}
		
	public static function listarProductosSA(){
		$daoProducto = new DAOProducto();
		$result = $daoProducto->listarProductosDAO();
		$productos = array();
		if($result != NULL){
			for($i = 0; $i < count($result); $i++ ){
				array_push($productos, $daoProducto->buscaProductoDAO($result[$i]));
			}
		}
		return $productos;
	}
	
	public static function busquedaProductos($dato){
		$daoProducto = new DAOProducto();
		$result = $daoProducto->listarProductosEncontradosDAO($dato);
		$productos = array();
		if ($result != NULL){
			for ($i = 0; $i < count($result); $i++){
				array_push($productos, $daoProducto->buscaProductoDAO($result[$i]));
			}
		}
		return $productos;
	}
	
	public static function desplegableProductos(){
		$daoProducto = new DAOProducto();
		$result = $daoProducto->listarProductosDAO();
		$lista = "";
		if($result != NULL){
			for($i = 0; $i < count($result); $i++ ){
				$lista .= "<option> $result[$i] </option>";
			}
		}
		return $lista;
	}
	
	//CARRITO
	public static function anadirProductoCarroSA($nombre, $cliente){
		$daoProducto = new DAOProducto();
		$daoProducto->anadirProductoCarroDAO($nombre, $cliente);
	}
	
	public static function listarProductosCarroSA($cliente){
		$daoProducto = new DAOProducto();
		$result = $daoProducto->listarProductosCarroDAO($cliente);
		$productos = array();
		if($result != NULL){
			for($i = 0; $i < count($result); $i++ ){
				array_push($productos, $daoProducto->buscaProductoDAO($result[$i]));
			}
		}
		return $productos;
	}

	public static function vaciarProductosCarroSA($idCliente){
		$daoProducto = new DAOProducto();
		$daoProducto->vaciarProductosCarroDAO($idCliente);
	}

}
?>