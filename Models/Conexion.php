<?php namespace Models;

class Conexion {

	private $con;

	public function __construct (){
    $this->con = new \PDO('mysql:host=localhost;dbname=gpcg;charset=utf8mb4', 'root', ''); 
    $this->con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		
	}

	public function consultaSimple ($sql){
		try {
			$this->con->query($sql);	
		} catch(\PDOException $e) {
			echo 'Error: ' . $e->getMessage();
			exit();
		}

	}

	public function consultaRetorno ($sql){
		$utils = $this->con->query($sql);
		return $utils;
	}


}


 ?>