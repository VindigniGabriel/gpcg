<div class="row mt-3">
	<div class="col-2 d-flex justify-content-center">
	<select class="custom-select custom-select-sm" name="" id="filtrarRol" onkeyup="filtrarRol()">
			<option value="0" selected>Mostrar Todos los Roles</option>
			<option value="1">EIA</option>
			<option value="2">EDQ</option>
			<option value="3">EDS</option>
			<option value="4">EDH</option>
			<option value="5">ND (No definido)</option>
		</select>
	</div>
</div>

<div class="row mt-3">
	<div class="col-12 d-flex justify-content-center">
		<div id="msjpersonal"></div>
	</div>
	<div class="col-12 d-flex justify-content-center">
		<div id="editpersonal"></div>
	</div>
</div>

<div id="cargaModalId"></div>

<div class="modal fade mt-5" id="editarpersonal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Editar Personal</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body mx-3">
				<form id="editarpersonaloficina">
					<div class="md-form mb-4 d-none">
						<input type="text" id="editid" name="id" class="form-control text-white">
						<label class="active text-white" for="editid"></label>
					</div>

					<div class="row">
						<div class="col-3">
							<div class="md-form mb-1">
								<input type="text" id="editp" name="codigo" class="form-control text-white editarPersonal">
								<label class="active text-white" for="editp">P00</label>
							</div>
						</div>
						<div class="col-9">
							<div class="md-form mb-1">
								<input type="text" id="editnombre" name="nombre" class="form-control text-white editarPersonal">
								<label class="active text-white" for="editnombre">Nombre</label>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-6">
							<div class="md-form mb-4">
								<label class="active text-white" for="editrol">Rol</label>
								<select id="editrol" name="rol" class="custom-select editarPersonal">
									<option value="1">EIA</option>
									<option value="2">EDQ</option>
									<option value="3">EDS</option>
									<option value="4">EDH</option>
									<option value="5">ND (No definido)</option>
								</select>
							</div>
						</div>
						<div class="col-6">
							<div class="md-form mb-4">
								<input type="text" id="editcedula" name="cedula" class="form-control text-white">
								<label class="active text-white editarPersonal" for="editcedula">Cédula</label>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-6">
							<label>Oficina</label>
							<select class="custom-select editarPersonal" id="editofic" name="oficina">

							</select>
						</div>
						<div class="col-6">
							<label class="active text-white" for="editestatus">Estatus</label>
							<select class="custom-select editarPersonal" id="editestatus" name="estatus">
								<option value="1">Activo</option>
								<option value="2">Inactivo</option>
							</select>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer d-flex justify-content-center">
				<a class="btn btn-outline-deep-orange lighten-1 px-4 close disabled" onclick="crear('actualizarpersonal',2)" id="btn-personal" data-dismiss="modal" aria-label="Close">Procesar</a>
			</div>
		</div>
	</div>
</div>

<script src="../Include/js/personal.js"></script>
<script src="../Include/js/funciones.js"></script>