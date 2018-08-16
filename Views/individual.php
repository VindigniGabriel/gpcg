	<div class="row">
		<div class="col-8">
			<h2 class="text-center">Oficinas</h2>
			<div id="listarSeleccion"></div>
		</div>
		<div class="col-4 text-center">
			<h2>Configuración</h2>
			<span>(Seleccione al menos una Oficina)</span>
			<div>
				<label class="switch text-left">
					<input type="checkbox" id="selectO" onclick="crear('seleccionOficina',2)">
					<span class="slider"></span>
				</label>
				<span>Seleccionar todas las Oficinas</span>
			</div>
			<div class="mt-5 justify-content-center mx-5 selectRol d-none">
				<select class="custom-select custom-select-sm" name="" id="selectRol" onkeyup="crear('primerFiltro',2)">
					<option value="0" selected>Seleccionar Rol</option>
					<option value="1">EIA</option>
					<option value="2">EDQ</option>
					<option value="3">EDS</option>
					<option value="4">EDH</option>
				</select>
			</div> 

			<div class="mt-3 justify-content-center mx-5">
				<div id="indicadoresRol"></div>
			</div>
		</div>
	</div>

	<script src="../Include/js/individual.js"></script>
	<script src="../Include/js/funciones.js"></script>