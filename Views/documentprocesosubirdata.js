// Verifica si el archivo es leible desde Upload/ocm.csv 
// Se elimina data de gh_archivo (info del archivo cargado) y se llena la data (archivo_size, archivo_fecha)
// Trae json con los datos de gh_archivo (info del archivo cargado)
// Metodo subirData
// Se elimina la data de gh_personal_activo
// Se elimina la data de ocm_personal_eiac
// Se sube data con load infile en tabla gh_personal_activo
// Metodo actualizarNombresOcm
// Se actualiza Id de las Oficinas en gh_personal_activo
// Inserta registros a ocm_personal_eiac desde ocm_personal
// Actualiza en gh_personal_activo los roles de EIA de Comercial y Especiliazada 
// Actualiza el personal activo con count desde gh_archivo
// Trae json con los datos de gh_archivo (info del archivo cargado)
// Inserta registros nuevos en ocm_personal desde gh_personal_activo
// Actualiza estatus en ocm_personal desde gh_personal_activo
// Trae json con el personal activo desde ocm_personal
// Cuenta todo el personal con rol No Definido
                                           
SELECT p00
  FROM ocm_personal
 WHERE p00 NOT IN (SELECT p00
                       FROM gh_personal_activo)


 <div class="col-2 d-flex justify-content-center d-none">
		<select class="custom-select custom-select-sm" name="" id="filtrarRol" onkeyup="filtrarRol()">
			<option value="0" selected>Mostrar Todos los Roles</option>
			<option value="1">EIA</option>
			<option value="2">EDQ</option>
			<option value="3">EDS</option>
			<option value="4">EDH</option>
			<option value="5">ND (No definido)</option>
		</select>
	</div>