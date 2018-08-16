<style type="text/css">
.load {
	background: rgba(237, 158, 59, 0.5);
}
.progress-bar {
	height: 100%;
	width: 0;
	color: #fff;
	background-color: #337ab7;
	transition: width .6s ease;
}

.progress {
	height: 1em;
	width: 100%;
	background-color: #f5f5f5;
	border-radius: 4px;
	box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
}
.input-group.md-form.form-sm.form-2 input {
	border: 1px solid #bdbdbd;
	border-top-left-radius: 0.25rem;
	border-bottom-left-radius: 0.25rem;
}
.input-group.md-form.form-sm.form-2 input.grey-border  {
	border: 1px solid #e9ecef;
}
.input-group input[type=text]:focus:not([readonly]) {
	box-shadow: none;
}
.form-2 .input-group-text {
	border: 1px solid #e9ecef;
}
</style>



<div class="row mt-3">
	<div class="col-12 d-flex justify-content-end">
		<a class="btn btn-outline-deep-orange lighten-1 px-4" onclick="crear('actulizardata',2)" data-toggle="modal" data-target="#modalEjecutarAct1" id="btn-actualizar">Actualizar Personal Activo</a>
	</div>
</div>

<div id="cargaModalId"></div>

<div class="d-none" id="procesarAct">

	<div class="row d-flex justify-content-center mt-5">

		<div class="col-3 text-center">
			<p><i class="fas fa-spinner fa-pulse fa-3x" id="paso1"></i></p>
			<p>Comprobando Archivo</p>
			<button type="button" class="btn btn-sm btn-outline-warning paso1 invisible" data-toggle="tooltip" data-placement="bottom" title="Detalle del archivo" id="detallePaso1">Detalle</button>
		</div>
		<div class="col-3 text-center">
			<p><i class="fas fa-spinner fa-pulse fa-3x invisible" id="paso2"></i></p>
			<p>Subiendo Data</p>
			<button type="button" class="btn btn-sm btn-outline-warning paso2 invisible" data-toggle="tooltip" data-placement="bottom" title="Registros" id="detallePaso2">Detalle</button>
		</div>
		<div class="col-3 text-center">
			<p><i class="fas fa-spinner fa-pulse fa-3x invisible" id="paso3"></i></p>
			<p>Actualizando Personal de OCM</p>
			<button type="button" class="btn btn-sm btn-outline-warning paso3 invisible" data-toggle="tooltip" data-placement="bottom" title="Detalle Personal Activo" id="detallePaso3">Detalle</button>
		</div>

	</div>

	<div class="row mt-5">
		<div class="col-2"></div>
		<div class="col-8">
			<div class="progress">
				<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 5%" id="anchoprogress"></div>
			</div>
		</div>
		<div class="col-2"></div>
	</div>

</div>

<div class="row ">
	<div class="col-12 d-flex justify-content-end"> <div>
		<label class="switch">
			<input type="checkbox" id="editarTpa" onclick="crear('editarTpa',1)">
			<span class="slider"></span>
		</label>
		Editar TPA
	</div></div>
</div>

<div id="contenedortablaocm"></div>

<!-- Modal Act Data -->
<div class="modal fade" id="modalEjecutarAct1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Actualizar Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Este proceso permitirá actualizar la data del personal de las OCM, desde el archivo enviado por la Gerencia de Gestión Humana.</p>
				<p><em>Compruebe que el archivo cumpla con la estructura de la data. Este debe tener formato .csv con separador ";" (punto y coma).</em></p>
			</div>
			<div class="modal-footer">
				<a href="" class="text-white" data-toggle="modal" data-target="#modalEjecutarAct2" id="siguiente">Siguiente <i class="fas fa-chevron-right"></i></a>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalEjecutarAct2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Actualizar Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Seleccione el archivo con la data del personal de OCM.</p>
				<form enctype="multipart/form-data" id="cargaOcm" method="post">
			<div class="form-group mt-3">
				<input type="file" id="file" name="ocm">
			</div>
		</form>
		<div class="alert alert-dismissible fade show msjCargaOcm d-none" role="alert">
		<span id="msjCargaOcm"></span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
			</div>
			<div class="modal-footer d-flex justify-content-between">
				<div><a href="" class="text-white" data-toggle="modal" data-target="#modalEjecutarAct2" id="anterior"><i class="fas fa-chevron-left"></i> Anterior</a></div>
				<div><a href="" class="text-white disabled" data-toggle="modal" data-target="#modalEjecutarAct2" id="siguiente1" onclick="crear('siguienteAct',2)">Procesar <i class="fas fa-chevron-right"></i></a></div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="../Include/js/funciones.js"></script>
<script type="text/javascript" src="../Include/js/actocm.js"></script>
<script type="text/javascript">
	$('#contenedortablaocm').load('../Controllers/controllertablaocm.php');
	$('#menutitulo').html('Información General de las Oficinas');
</script>
