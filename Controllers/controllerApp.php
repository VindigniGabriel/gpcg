<?php namespace Controllers;

require_once "../Autoload.php";

use Models\modelsApp as modelsApp;

class controllerApp
{
	function __construct()
	{
		$this->datos = "";
		$this->mostrar = "";
	}

	public function set($atributo, $contenido){
		$this->$atributo = $contenido;		
	}

	public function get($atributo){
		return $this->$atributo;
	}

	function listarocm()
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->listarocm();

		return $datos;
	}

	function listarocmselect()
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->listarocmselect();

		return $datos;
	}

	function listarocmEIAC()
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->listarocmEIAC();

		return $datos;
	}

	function listarocmEDQ()
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->listarocmEDQ();

		return $datos;
	}

	function listarocmEDS()
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->listarocmEDS();

		return $datos;
	}

	function listarocmEDH()
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->listarocmEDH();

		return $datos;
	}

	function listaresquemaEIAC()
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->listaresquemaEIAC();

		return $datos;
	}

	function listaresquemaEDQ()
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->listaresquemaEDQ();

		return $datos;
	}

	function listaresquemaEDS()
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->listaresquemaEDS();

		return $datos;
	}

	function listaresquemaEDH()
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->listaresquemaEDH();

		return $datos;
	}

	function listaresquemaCOL()
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->listaresquemaCOL();

		$colectivo = $datos->fetch();

		return $colectivo;
	}

	function listaresquemaCOLPESO()
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->listaresquemaCOLPESO();

		return $datos;
	}

	function esquemaColectivo()
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->esquemaColectivo();
		
		return $datos;
		
	}

	function esquemaEmpresarial()
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->esquemaEmpresarial();
		
		return $datos;
		
	}

	function esquemaIndividual()
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->esquemaIndividual();
		
		return $datos;
		
	}

	function listarEiacLogros()
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->listarEiacLogros();
		
		return $datos;
	}

	function logroEmpresarial()
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->logroEmpresarial();
		
		return $datos;
		
	}

	function mostrarPersonal()
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->mostrarPersonal();
		
		return $datos;
	}

	function listarDirecciones()
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->listarDirecciones();
		
		return $datos;

	}

	function listarGerencias($id)
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->listarGerencias($id);
		
		return $datos;

	}

	function listarOficinas($id)
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->listarOficinas($id);
		
		return $datos;

	}

	function indicadoresRol()
	{
		$this->datos = new modelsApp;

		$datos = $this->datos->indicadoresRol();

		return $datos;
	}

}


?>