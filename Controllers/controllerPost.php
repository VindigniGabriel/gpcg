<?php namespace Controllers;

require_once "../Autoload.php";

use Models\modelsApp as modelsApp;

class controllerPost
{
	function __construct()
	{
		$this->datos = '';
		$this->archivo = "../Upload/ocm.csv";
	}

	public function set($atributo, $contenido){
		$this->$atributo = $contenido;		
	}

	public function get($atributo){
		return $this->$atributo;
	}

	function validarArchivo()
	{	
		sleep(5);
		if (file_exists($this->archivo)){
			
			$archivo = fopen("{$this->archivo}", "r");

			$this->datos = new modelsApp;

			$datos = $this->datos->actArchivo();

			return $datos;	

		}else{

			return "0";	

		}
	}

	function subirData()
	{	
		sleep(5);

		$this->datos = new modelsApp;

		$datos = $this->datos->subirData();
		
		return $datos;
	}

	function detalleCsv()
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->detalleCsv();
		
		return $datos;
	}

	function actPersonal()
	{
		sleep(5);

		$this->datos = new modelsApp;

		$datos = $this->datos->actPersonal();
		
		return $datos;
	}

	function personalActivo()
	{
		sleep(5);
		
		$this->datos = new modelsApp;

		$datos = $this->datos->personalActivo();
		
		return $datos;
	}

	function rolNo()
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->rolNo();
		
		return $datos;
	}

	function actTpa()
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->actTpa();
		
		return $datos;
	}

	function ajustesColectivo()
	{
		sleep(1);

		$this->datos = new modelsApp;

		$datos = $this->datos->ajustesColectivo();
		
		return $datos;

	}

	function indicadoresEsquema()
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->indicadoresEsquema();
		
		return $datos;
	}

	function actualizarEiac()
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->actualizarEiac();
		
		return $datos;
	}

	function actualizarEmp()
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->actualizarEmp();
		
		return $datos;
	}

	function actualizarPersonal()
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->actualizarPersonal();
		
		return $datos;
	}


	function oficinas()
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->oficinas();
		
		return $datos;
	}

}

$data = new controllerPost;

$function = $_POST['function'];

$respuesta = $data->$function();

echo $respuesta;

?>