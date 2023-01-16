<?php 

class TOProducto {
	
		private $nombre;
		private $precio;
		private $descripcion;
		private $imagen;
	
		public function __construct($nombreProducto){
			$this->nombre = $nombreProducto;
		}
		
		public function setNombreProducto($nombreProducto){
			$this->nombre = $nombreProducto;
		}
	
		public function setPrecioProducto($precioProducto){
			$this->precio = $precioProducto;
		}
		
		public function setDescripcionProducto($descripcionProducto){
			$this->descripcion = $descripcionProducto;
		}
		
		public function setImagenProducto($imagenProducto){
			$this->imagen = $imagenProducto;
		}
		
		public function getNombreProducto(){
			return $this->nombre;
		}
		
		public function getPrecioProducto(){
			return $this->precio;
		}
		
		public function getDescripcionProducto(){
			return $this->descripcion;
		}
	
		public function getImagenProducto(){
			return $this->imagen;
		}
		
}	
?>