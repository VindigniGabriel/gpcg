<?php namespace Models;

require_once "../Autoload.php";

class modelsApp
{
	function __construct()
	{
		$this->con = new Conexion();
		$this->datos = "";
		$this->archivo =  $_SERVER['DOCUMENT_ROOT']."/gpcg/Upload/ocm.csv";
	}

	public function set($atributo, $contenido){
		$this->$atributo = $contenido;		
	}

	public function get($atributo){
		return $this->$atributo;
	}

	function listarocm ()
	{
		$sql = 'SELECT o.id AS id, o.nombre AS nombre, g.nombre AS gerencia, d.nombre AS direccion, o.tpa AS tpa, o.eia AS eia, o.eds AS eds, o.edq AS edq, o.edh AS edh
		FROM oficinas AS o, gerencias AS g, direcciones AS d
		WHERE o.gerencia_id = g.id AND g.direcccion_id = d.id';

		$this->datos = $this->con->consultaRetorno($sql);

		return $this->datos;

	}

	function listarocmselect ()
	{
		$sql = "SELECT
		DISTINCT(p.p00) AS codigo, 
		p.nombre AS nombre
		FROM
		ocm_personal AS p
		WHERE
		p.ocm_nombre_id = '$_REQUEST[id]' 
		ORDER BY nombre";

		$this->datos = $this->con->consultaRetorno($sql);

		return $this->datos;

	}

	function listarocmEIAC ()
	{
		$sql = "SELECT
		DISTINCT(p.p00) AS codigo, 
		p.nombre AS nombre
		FROM
		ocm_personal AS p
		WHERE
		p.ocm_nombre_id = '$_REQUEST[id]' AND
		p.ocm_rol_id = '1' 
		ORDER BY nombre";

		$this->datos = $this->con->consultaRetorno($sql);

		return $this->datos;

	}

	function listarocmEDQ ()
	{
		$sql = "SELECT
		DISTINCT(p.p00) AS codigo, 
		p.nombre AS nombre
		FROM
		ocm_personal AS p
		WHERE
		p.ocm_nombre_id = '$_REQUEST[id]' AND
		p.ocm_rol_id = '2'
		ORDER BY nombre";

		$this->datos = $this->con->consultaRetorno($sql);

		return $this->datos;

	}

	function listarocmEDS ()
	{
		$sql = "SELECT
		DISTINCT(p.p00) AS codigo, 
		p.nombre AS nombre
		FROM
		ocm_personal AS p
		WHERE
		p.ocm_nombre_id = '$_REQUEST[id]' AND
		p.ocm_rol_id = '3'
		ORDER BY nombre";

		$this->datos = $this->con->consultaRetorno($sql);

		return $this->datos;

	}

	function listarocmEDH ()
	{
		$sql = "SELECT
		DISTINCT(p.p00) AS codigo, 
		p.nombre AS nombre
		FROM
		ocm_personal AS p
		WHERE
		p.ocm_nombre_id = '$_REQUEST[id]' AND
		p.ocm_rol_id = '4' 
		ORDER BY nombre";

		$this->datos = $this->con->consultaRetorno($sql);

		return $this->datos;

	}

	function listaresquemaEIAC ()
	{
		if($_REQUEST['id']=='1'){
			$id = '2';
		}else{
			$id = '1';
		};
		$sql = "SELECT
		e.nombre AS indicador,
		e.indicador_valor_max AS peso,
		e.rxp_esquema_id AS esquema
		FROM
		rxp_indicadores_esquema AS e
		WHERE
		e.ocm_rol_id = '1' AND
		e.rxp_esquema_tipo_oficina = '$id'
		ORDER BY esquema";

		$this->datos = $this->con->consultaRetorno($sql);

		return $this->datos;

	}

	function listaresquemaEDS ()
	{
		$sql = "SELECT
		e.nombre AS indicador,
		e.indicador_valor_max AS peso,
		e.rxp_esquema_id AS esquema
		FROM
		rxp_indicadores_esquema AS e
		WHERE
		e.ocm_rol_id = '3' AND
		e.rxp_esquema_tipo_oficina = '3'
		ORDER BY esquema";

		$this->datos = $this->con->consultaRetorno($sql);

		return $this->datos;

	}

	function listaresquemaEDQ ()
	{
		$sql = "SELECT
		e.nombre AS indicador,
		e.indicador_valor_max AS peso,
		e.rxp_esquema_id AS esquema
		FROM
		rxp_indicadores_esquema AS e
		WHERE
		e.ocm_rol_id = '2' AND
		e.rxp_esquema_tipo_oficina = '3'
		ORDER BY esquema";

		$this->datos = $this->con->consultaRetorno($sql);

		return $this->datos;

	}

	function listaresquemaEDH ()
	{
		if($_REQUEST['id']=='1'){
			$id = '2';
		}else{
			$id = '1';
		};
		$sql = "SELECT
		e.nombre AS indicador,
		e.indicador_valor_max AS peso,
		e.rxp_esquema_id AS esquema
		FROM
		rxp_indicadores_esquema AS e
		WHERE
		e.ocm_rol_id = '1' AND
		e.rxp_esquema_tipo_oficina = '$id'
		ORDER BY esquema";

		$this->datos = $this->con->consultaRetorno($sql);

		return $this->datos;

	}

	function listaresquemaCOL ()
	{
		$sql = "SELECT * FROM oficinas WHERE id = '$_REQUEST[id]'";

		$this->datos = $this->con->consultaRetorno($sql);

		return $this->datos;

	}

	function listaresquemaCOLPESO ()
	{

		$sql = "SELECT * FROM rxp_esquema_por_indicador";

		$this->datos = $this->con->consultaRetorno($sql);

		return $this->datos;

	}

	function esquemaColectivo()
	{
		$sql = "SELECT * FROM rxp_indicadores_esquema WHERE rxp_esquema_tipo_oficina = '$_REQUEST[tipo]' AND rxp_esquema_id = '2' AND ocm_rol_id = '$_REQUEST[rol]'";

		$this->datos = $this->con->consultaRetorno($sql);

		return $this->datos;
	}

	function esquemaEmpresarial()
	{
		$sql = "SELECT * FROM rxp_indicadores_esquema WHERE rxp_esquema_tipo_oficina = '$_REQUEST[tipo]' AND rxp_esquema_id = '3' AND ocm_rol_id = '$_REQUEST[rol]'";

		$this->datos = $this->con->consultaRetorno($sql);

		return $this->datos;
	}

	function esquemaIndividual()
	{
		$sql = "SELECT * FROM rxp_indicadores_esquema WHERE rxp_esquema_tipo_oficina = '$_REQUEST[tipo]' AND rxp_esquema_id = '1' AND ocm_rol_id = '$_REQUEST[rol]'";

		$this->datos = $this->con->consultaRetorno($sql);

		return $this->datos;
	}

	function listarEiacLogros()
	{
		$sql = "SELECT
		e.eiac_id AS id,
		p.p00 AS p00,
		e.hc AS hc,
		e.phc AS phc,
		e.tpa AS tpa,
		e.ptpa AS ptpa
		FROM
		ocm_personal AS p,
		ocm_personal_eiac AS e
		WHERE
		e.eiac_id = p.id
		AND p.ocm_nombre_id = '$_REQUEST[id]'";

		$this->datos = $this->con->consultaRetorno($sql);

		return $this->datos;

	}

	function actualizarEiac()
	{
		$sql = "UPDATE ocm_personal_eiac SET tpa = '$_REQUEST[tpa]', ptpa = '$_REQUEST[ptpa]' , logro = '$_REQUEST[logro]', rxp = '$_REQUEST[rxp]' WHERE eiac_id = '$_REQUEST[id]' ";

		$this->datos = $this->con->consultaRetorno($sql);

		return '1';
	}

	function subirData ()
	{
		$sql = "TRUNCATE TABLE gh_personal_activo";

		$this->con->consultaSimple($sql);

		$sql = "TRUNCATE TABLE ocm_personal_eiac";

		$this->con->consultaSimple($sql);

		$sql = "LOAD DATA INFILE '{$this->archivo}' INTO TABLE gh_personal_activo
		FIELDS TERMINATED BY ';'
		IGNORE 1 LINES 
		(p00,nombre,posicion,unidad,cedula)";

		$this->con->consultaSimple($sql);

		$sql = "UPDATE ocm_personal
		SET cedula=REPLACE(REPLACE(REPLACE(cedula,CHAR(9),''),CHAR(10),''),CHAR(13),'');
		UPDATE ocm_personal
		SET p00=REPLACE(REPLACE(REPLACE(p00,CHAR(9),''),CHAR(10),''),CHAR(13),'');";

		$this->con->consultaSimple($sql); //Eliminamos char(9) = tab, char(10) = salto de linea, char(13) = Retorno de carro

		return $this->actualizarNombresOcm();

	}

	function actualizarNombresOcm()
	{
		$sql = "UPDATE gh_personal_activo SET oficina_id = '1' where unidad like '%Valor'; 
		UPDATE gh_personal_activo SET oficina_id = '2' where unidad like '%Lido%';
		UPDATE gh_personal_activo SET oficina_id = '3' where unidad like '%CCCT%';
		UPDATE gh_personal_activo SET oficina_id = '4' where unidad like '%SAMBIL CARACAS%';
		UPDATE gh_personal_activo SET oficina_id = '5' where unidad like '%metrocenter%';
		UPDATE gh_personal_activo SET oficina_id = '6' where unidad like '%recreo%';
		UPDATE gh_personal_activo SET oficina_id = '7' where unidad like '%caricuao%';
		UPDATE gh_personal_activo SET oficina_id = '8' where unidad like '%san antonio%';
		UPDATE gh_personal_activo SET oficina_id = '9' where unidad like '%buenaventura%';
		UPDATE gh_personal_activo SET oficina_id = '10' where unidad like '%charallave%';
		UPDATE gh_personal_activo SET oficina_id = '13' where unidad like '%barrio%';
		UPDATE gh_personal_activo SET oficina_id = '14' where unidad like '%bal';
		UPDATE gh_personal_activo SET oficina_id = '15' where unidad like '%tibisay%';
		UPDATE gh_personal_activo SET oficina_id = '16' where unidad like '%rida';
		UPDATE gh_personal_activo SET oficina_id = '17' where unidad like '%barinas%';
		UPDATE gh_personal_activo SET oficina_id = '18' where unidad like '%valencia metr%';
		UPDATE gh_personal_activo SET oficina_id = '19' where unidad like '%valencia';
		UPDATE gh_personal_activo SET oficina_id = '20' where unidad like '%maracay%';
		UPDATE gh_personal_activo SET oficina_id = '21' where unidad like '%morros%';
		UPDATE gh_personal_activo SET oficina_id = '22' where unidad like '%apure%';
		UPDATE gh_personal_activo SET oficina_id = '23' where unidad like '%acarigua%';
		UPDATE gh_personal_activo SET oficina_id = '24' where unidad like '%bqto. metr%';
		UPDATE gh_personal_activo SET oficina_id = '25' where unidad like '%trinitarias%';
		UPDATE gh_personal_activo SET oficina_id = '26' where unidad like '%felipe%';
		UPDATE gh_personal_activo SET oficina_id = '27' where unidad like '%orinokia%';
		UPDATE gh_personal_activo SET oficina_id = '28' where unidad like '%Ciudad Bol%';
		UPDATE gh_personal_activo SET oficina_id = '29' where unidad like '%paraguana%';
		UPDATE gh_personal_activo SET oficina_id = '30' where unidad like '%valera%';
		UPDATE gh_personal_activo SET oficina_id = '31' where unidad like '%sambil maracaibo%';
		UPDATE gh_personal_activo SET oficina_id = '32' where unidad like '%comercial maracaibo%';
		UPDATE gh_personal_activo SET oficina_id = '33' where unidad like '%cabimas%';
		UPDATE gh_personal_activo SET oficina_id = '34' where unidad like '%Puerto%';
		UPDATE gh_personal_activo SET oficina_id = '35' where unidad like '%plaza%';
		UPDATE gh_personal_activo SET oficina_id = '36' where unidad like '%matu%';
		UPDATE gh_personal_activo SET oficina_id = '38' where unidad like '%esparta%';
		UPDATE gh_personal_activo SET oficina_id = '39' where unidad like '%cuman%';";

		$this->con->consultaSimple($sql);

		//$sql = "DELETE FROM gh_personal_activo WHERE oficina_id = '0' OR unidad like '%gcia%'";

		//$this->con->consultaSimple($sql);

		/*
		$sql = "INSERT INTO ocm_personal_eiac (eiac_id)
		SELECT id FROM ocm_personal WHERE ocm_rol_id = '1' ";

		$this->con->consultaSimple($sql); 
		*/

		$sql = "UPDATE gh_personal_activo SET posicion_id = '1' WHERE posicion LIKE '%Cliente VPOC%'; UPDATE gh_personal_activo SET posicion_id = '1' WHERE posicion LIKE '%Especializada VPOC%'; UPDATE gh_personal_activo SET posicion_id = '5' WHERE posicion LIKE '%Especialista de Operac.%'; ";

		$this->con->consultaSimple($sql);

		self::actArchivoCount();

		return '1';
	}

	function detalleCsv()
	{
		$sql = "SELECT * FROM gh_archivo";

		$results = $this->con->consultaRetorno($sql);

		$archivo = $results->fetchAll(\PDO::FETCH_ASSOC);

		$json = json_encode($archivo);

		echo $json;
	}

	function oficinas()
	{
		$sql = "SELECT id, nombre FROM oficinas";

		$results = $this->con->consultaRetorno($sql);

		$oficinas = $results->fetchAll(\PDO::FETCH_ASSOC);

		$json = json_encode($oficinas);

		echo $json;
	}


	function personalActivo()
	{
		$sql = "SELECT count(p00) as activo FROM ocm_personal WHERE estatus_id = '1'";

		$results = $this->con->consultaRetorno($sql);

		$archivo = $results->fetchAll(\PDO::FETCH_ASSOC);

		$json = json_encode($archivo);

		echo $json;

		self::personalRol();
	}

	function personalRol()
	{
		$sql = "SELECT id FROM oficinas";

		$result = $this->con->consultaRetorno($sql);

		foreach ($result as $ocm) {

			$sql = "UPDATE oficinas SET eia = (SELECT count(p00) as personal FROM ocm_personal WHERE  ocm_nombre_id = '$ocm[id]' AND estatus_id = '1' AND  ocm_rol_id = '1') WHERE id = '$ocm[id]'; 
			UPDATE oficinas SET eds = (SELECT count(p00) as personal FROM ocm_personal WHERE  ocm_nombre_id = '	$ocm[id]' AND estatus_id = '1' AND  ocm_rol_id = '2') WHERE id = '$ocm[id]'; 
			UPDATE oficinas SET edq = (SELECT count(p00) as personal FROM ocm_personal WHERE  ocm_nombre_id = '$ocm[id]' AND estatus_id = '1' AND  ocm_rol_id = '3') WHERE id = '$ocm[id]';
			UPDATE oficinas SET edh = (SELECT count(p00) as personal FROM ocm_personal WHERE  ocm_nombre_id = '$ocm[id]' AND estatus_id = '1' AND  ocm_rol_id = '4') WHERE id = '$ocm[id]'; ";

			$this->con->consultaSimple($sql);

		}


		
	}


	function actArchivo()
	{
		$sql = "TRUNCATE TABLE gh_archivo";

		$this->con->consultaSimple($sql);

		$archivo_size = round(filesize($this->archivo)/1000,2);

		$archivo_fecha = date("F d Y H:i:s.", filectime($this->archivo));

		$sql = "INSERT INTO gh_archivo (archivo_size, archivo_fecha) VALUES ('$archivo_size','$archivo_fecha')";

		$this->con->consultaSimple($sql);

		return '1';
	}

	function actArchivoCount()
	{
		$sql = "SELECT count(id) AS contar FROM gh_personal_activo";

		$conteo = $this->con->consultaRetorno($sql);

		$archivo_registros = $conteo->fetch();

		$sql = "UPDATE gh_archivo SET archivo_registros = '$archivo_registros[contar]' WHERE archivo_size <> '' ";

		$this->con->consultaSimple($sql);

		return '1';
	}

	function actPersonal()
	{
		$sql = "INSERT INTO ocm_personal (p00, nombre, cedula, ocm_nombre_id,  ocm_rol_id)  SELECT p00, nombre, cedula, oficina_id, posicion_id from gh_personal_activo WHERE not exists (SELECT p00 FROM ocm_personal WHERE ocm_personal.p00 = gh_personal_activo.p00) AND posicion_id <> '0' ";

		$this->con->consultaSimple($sql);

		$sql = "SELECT p00 as codigo from ocm_personal WHERE exists (SELECT p00 FROM gh_personal_activo WHERE ocm_personal.p00 = gh_personal_activo.p00)";

		$result = $this->con->consultaRetorno($sql);

		foreach ($result as $p) {
			$sql = "UPDATE ocm_personal SET estatus_id = '1' WHERE p00 = '$p[codigo]'";

			$this->con->consultaSimple($sql);

		}

		$sql = "SELECT p00 as codigo from ocm_personal WHERE not exists (SELECT p00 FROM gh_personal_activo WHERE ocm_personal.p00 = gh_personal_activo.p00)";

		$result = $this->con->consultaRetorno($sql);

		foreach ($result as $p) {
			$sql = "UPDATE ocm_personal SET estatus_id = '2' WHERE p00 = '$p[codigo]'";

			$this->con->consultaSimple($sql);

		}

		return '1';

	}

	function rolNo()
	{
		$sql = "SELECT count(id) AS contar FROM ocm_personal WHERE ocm_rol_id = '5'";

		$conteo = $this->con->consultaRetorno($sql);

		$personalsinrol = $conteo->fetch();

		return $personalsinrol['contar'];

	}

	function actTpa()
	{
		$sql = "UPDATE oficinas SET tpa = '$_REQUEST[tpa]' WHERE id = '$_REQUEST[id]' ";

		$this->datos = $this->con->consultaRetorno($sql);

		return $this->datos;

	}

	function ajustesColectivo()
	{
		$msj = '1';

		if($_REQUEST['selectIge']<>'1'){
			$sql = "UPDATE oficinas SET p_ige = '$_REQUEST[selectIge]' WHERE id = '$_REQUEST[id]' ";

			$this->con->consultaSimple($sql);

		}

		if($_REQUEST['selectEcu']<>'1'){
			$sql = "UPDATE oficinas SET p_ecu = '$_REQUEST[selectEcu]' WHERE id = '$_REQUEST[id]' ";

			$this->con->consultaSimple($sql);

		}

		if($_REQUEST['selectEcn']<>'1'){
			$sql = "UPDATE oficinas SET p_ecn = '$_REQUEST[selectEcn]' WHERE id = '$_REQUEST[id]' ";

			$this->con->consultaSimple($sql);

		}

		if($_REQUEST['selectRet']<>'1'){
			$sql = "UPDATE oficinas SET p_ret = '$_REQUEST[selectRet]' WHERE id = '$_REQUEST[id]' ";

			$this->con->consultaSimple($sql);

		}

		if($_REQUEST['selectVen']<>'1'){
			$sql = "UPDATE oficinas SET p_ven = '$_REQUEST[selectVen]' WHERE id = '$_REQUEST[id]' ";

			$this->con->consultaSimple($sql);

		}

		if($_REQUEST['selectFal']<>'1'){
			$sql = "UPDATE oficinas SET p_fal = '$_REQUEST[selectFal]' WHERE id = '$_REQUEST[id]' ";

			$this->con->consultaSimple($sql);

		}
		

		
		return $msj;

	}

	function indicadoresEsquema()
	{
		$sql = "SELECT
		e.nombre as indicador,
		e.indicador_valor_max as max,
		e.indicador_valor_med as med,
		e.indicador_valor_min as min,
		i.indicador_meta_max as pmax,
		i.indicador_meta_med as pmed,
		i.indicador_meta_min as pmin
		FROM
		rxp_indicadores_esquema as e,
		rxp_esquema_por_indicador as i
		WHERE
		e.esquema_por_indicador_id = i.id AND
		e.rxp_esquema_tipo_oficina = '$_REQUEST[id]' AND
		e.ocm_rol_id = '$_REQUEST[rol]'";

		$indi = $this->con->consultaRetorno($sql);

		$results = $indi->fetchAll(\PDO::FETCH_ASSOC);

		$json = json_encode($results);

		echo $json;
	}

	function actualizarEmp()
	{
		$sql = "UPDATE rxp_indicador_empresarial SET valor = '$_REQUEST[emp]'";

		$this->con->consultaSimple($sql);
		
		return 1;	
	}

	function logroEmpresarial()
	{
		$sql = "SELECT valor FROM rxp_indicador_empresarial";

		$this->datos = $this->con->consultaRetorno($sql);

		$datos = $this->datos->fetch();

		return $datos;	
	}

	function actualizarPersonal()
	{
		$sql = "UPDATE ocm_personal 
		set p00 = '$_REQUEST[codigo]', 
		nombre = '$_REQUEST[nombre]',
		cedula = '$_REQUEST[cedula]',
		ocm_rol_id = '$_REQUEST[rol]',
		ocm_nombre_id = '$_REQUEST[oficina]',
		estatus_id   = '$_REQUEST[estatus]'
		WHERE
		id = '$_REQUEST[id]'";

		$this->con->consultaSimple($sql);

		self::personalRol();
	}

	function mostrarPersonal()
	{
		$sql = "SELECT
		ocm.p00 AS p00,
		ocm.nombre AS nombre,
		ocm.cedula AS cedula,
		ocm.ocm_rol_id AS idrol,
		rol.rol AS rol,
		o.id AS idoficina,
		o.nombre AS oficina,
		e.estatus AS estatus, 
		e.id AS idestatus, 
		ocm.id AS id
		FROM
		ocm_personal AS ocm, 
		ocm_rol AS rol,
		oficinas AS o,
		ocm_personal_estatus AS e
		WHERE
		ocm.ocm_rol_id = rol.id AND
		ocm.ocm_nombre_id = o.id AND
		ocm.estatus_id = e.id";

		$this->datos = $this->con->consultaRetorno($sql);

		return $this->datos;	
	}

	function listarDirecciones(){

		$sql = "SELECT			
		id,
		nombre as direccion
		FROM
		direcciones";

		$this->datos = $this->con->consultaRetorno($sql);

		return $this->datos;
	}

	function listarGerencias($id){
		$sql = "SELECT
		id,
		nombre as gerencia
		FROM
		gerencias
		WHERE
		direcccion_id = '$id'";

		$this->datos = $this->con->consultaRetorno($sql);

		return $this->datos;
	}

	function listarOficinas($id){

		$sql = "SELECT			
		id,
		nombre as oficina
		FROM
		oficinas
		WHERE
		gerencia_id = '$id'";

		$this->datos = $this->con->consultaRetorno($sql);

		return $this->datos;
	}

	function indicadoresRol()
	{
		$sql = "SELECT 
		DISTINCT(ind.nombre)AS indicador, 
		ind.indicador_valor_max AS max, 
		ind.indicador_valor_med AS med, 
		ind.indicador_valor_min AS min,
		rol.rol AS rol
		FROM 
		rxp_indicadores_esquema AS ind,
		ocm_rol AS rol
		WHERE 
		ind.ocm_rol_id = '$_REQUEST[rol]' AND 
		ind.rxp_esquema_id = '1' AND
		ind.ocm_rol_id = rol.id";

		$this->datos = $this->con->consultaRetorno($sql);

		return $this->datos;

	}

	
}

?>