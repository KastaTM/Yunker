<?php 

class TOVenta {
	
		private $idVenta;
		private $idCliente;
		private $fecha;
	
		public function __construct($idV){
			$this->idVenta = $idV;
		}
		
		public function setIdVenta($idV){
			$this->idVenta = $idV;
		}
	
		public function setIdCliente($idC){
			$this->idCliente = $idC;
		}
		
		public function setFechaVenta($fechaV){
			$this->fecha = $fechaV;
		}
		
		public function getIdVenta(){
			return $this->idVenta;
		}
		
		public function getIdCliente(){
			return $this->idCliente;
		}
		
		public function getFechaVenta(){
			return $this->fecha;
		}

}	
?>