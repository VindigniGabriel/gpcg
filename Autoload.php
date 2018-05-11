<?php namespace Config;

	class Autoload{

		public static function run (){
			spl_autoload_register(function($class){
				$ruta = str_replace("\\", "/", $class). ".php";
				$ruta = $ruta;
				if (!empty($ruta)){
					include_once $ruta;
				};
			});
		}



	}

//Rutas Sistema --------------------------------------------------------- Unix

define("ruta_general", "/Users/gabrielmedinavindigni/Desktop/Archivos_Metas/");

define("ruta_entrada", "/Users/gabrielmedinavindigni/Desktop/Archivos_Metas/Metas2.xls");

define("ruta_salida", "/Users/gabrielmedinavindigni/Desktop/Archivos_Metas/Metas");

define("ruta_cumplimiento", "/Users/gabrielmedinavindigni/Desktop/Archivos_Metas/Metas_vs_Cumplimiento");

define("ruta_respaldo", "/Users/gabrielmedinavindigni/Desktop/Archivos_Metas/Respaldos/");

define("ruta_respaldo_metas", "/Users/gabrielmedinavindigni/Desktop/Archivos_Metas/Metas/");

define("ruta_respaldo_metasvscumpli", "/Users/gabrielmedinavindigni/Desktop/Archivos_Metas/Metas_vs_Cumplimiento/");

define("ruta_temp", "/Users/gabrielmedinavindigni/Desktop/Archivos_Metas/Temp/");

//Rutas rxp -------------------------------------------------------------

//Rutas rxp -------------------------------------------------------------

define("ruta_rxp1", "/Users/");

define("ruta_rxp2", "/Desktop/ArchivosRxP/Personal.csv");

/*

//Rutas Sistema --------------------------------------------------------- Windows

define("ruta_general", "D:\Users\Gmedin01\Desktop\Archivos_Metas");

define("ruta_entrada", "D:\Users\Gmedin01\Desktop\Archivos_Metas\Metas2.xls");

define("ruta_salida", "D:\Users\Gmedin01\Desktop\Archivos_Metas\Metas");

define("ruta_cumplimiento", "D:\Users\Gmedin01\Desktop\Archivos_Metas\Metas_vs_Cumplimiento");

define("ruta_respaldo", "D:\Users\Gmedin01\Desktop\Archivos_Metas\Respaldos\\");

define("ruta_respaldo_metas", "D:\Users\Gmedin01\Desktop\Archivos_Metas\Metas\\");

define("ruta_respaldo_metasvscumpli", "D:\Users\Gmedin01\Desktop\Archivos_Metas\Metas_vs_Cumplimiento\\");

define("ruta_temp", "D:\Users\Gmedin01\Desktop\Archivos_Metas\Temp\\");

//Rutas rxp -------------------------------------------------------------

define("ruta_rxp1", "D:\Users\\");

define("ruta_rxp2", "\ArchivosRxP\Personal.csv");

*/

Autoload::run();

 ?>