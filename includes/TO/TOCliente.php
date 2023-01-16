<?php

class TOCliente{
	
	private $id;
	private $nombre;
	private $contrasena;
	private $fecha;
	private $correo;
	private $tipo;
	private $foto;
	
	public function __construct($idCliente){
		$this->id = $idCliente;
	}
	
	public function setIdCliente($idCliente){
		$this->id = $idCliente;
	}
	
	public function setNombreCliente($nombreCliente){
		$this->nombre = $nombreCliente;
	}
	
	public function setContrasenaCliente($contrasenaCliente){
		$this->contrasena = $contrasenaCliente;
	}
		
	public function setFechaCliente($fechaCliente){
		$this->fecha = $fechaCliente;
	}
		
	public function setCorreoCliente($correoCliente){
		$this->correo = $correoCliente;
	}
	
	public function setTipoCliente($tipoCliente){
		$this->tipo = $tipoCliente;
	}
	
	public function setFotoCliente($fotoPerfil){
		$this->foto = $fotoPerfil;
	}
		
	public function getIdCliente(){
		return $this->id;
	}
	
	public function getNombreCliente(){
		return $this->nombre;
	}
	
	public function getContrasenaCliente(){
		return $this->contrasena;
	}
	
	public function getFechaCliente(){
		return $this->fecha;
	}
	
	public function getCorreoCliente(){
		return $this->correo;
	}
	
	public function getTipoCliente(){
		return $this->tipo;
	}
	
	public function getFotoCliente(){
		return $this->foto;
	}
	
	public function compruebaPassword($password){
        return password_verify($password, $this->contrasena);
    }

}
?>