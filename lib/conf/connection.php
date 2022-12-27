<?php
	class Connection {
		
		//Caracteristicas
		
		private $host;
		private $user;
		private $pass;
		private $database;
		private $link; //Conexion
		
		//Comportamientos
		
		public function __construct() {
			$this->setConnect();
			$this->connect();
		}
		private function setConnect () {
			require_once 'configuracion.php';
			$this->host=$host;
			$this->user=$user;
			$this->pass=$pass;
			$this->database=$database;
		}
		private function Connect () {
			$this->link=mysqli_connect($this->host,$this->user,$this->pass,$this->database);
			if (!$this->link) {
				echo mysqli_error($this->link);
			}
		}
		public function getConnect() {
			return $this->link;
		}
	}
?>