<?php namespace Views;

require_once "../Autoload.php";

use Controllers\controllerApp as controllerApp;

$datos = new controllerApp;
$data = $datos->listarocm();

?>

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
</style>

<div class="row mt-3">
	<div class="col-12 d-flex justify-content-end">
		<a class="btn btn-outline-primary px-4" onclick="crear('actulizardata',2)" data-toggle="modal" data-target="#modalEjecutarAct" id="btn-actualizar">Actualizar</a>
	</div>
</div>

<div class="d-none" id="procesarAct">

<div class="row d-flex justify-content-center">

	<div class="col-3 text-center">
		<p><i class="fas fa-spinner fa-pulse fa-3x" id="paso1"></i></p>
		<p>Comprobando Archivo Data.csv</p>
		<button type="button" class="btn btn-sm btn-outline-warning paso1 invisible" data-toggle="tooltip" data-placement="bottom" title="Detalle del Data.csv" id="detallePaso1">Detalle</button>
	</div>
	<div class="col-3 text-center">
		<p><i class="fas fa-spinner fa-pulse fa-3x invisible" id="paso2"></i></p>
		<p>Subiendo Data</p>
		<button type="button" class="btn btn-sm btn-outline-warning paso2 invisible" data-toggle="tooltip" data-placement="bottom" title="Regsitros en Data.csv" id="detallePaso2">Detalle</button>
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

<div class="row mt-3">
	<div class="col">
		<div class="table-responsive-sm">
			<table class="table table-striped text-light" id="tablaocm">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">OCM</th>
						<th scope="col">Gerencia</th>
						<th scope="col">Dirección</th>
						<th scope="col">EIA</th>
						<th scope="col">EDS</th>
						<th scope="col">EDQ</th>
						<th scope="col">EDH</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data as $ocm) { ?>

					<tr>
						<th scope="row"><?php echo $ocm['id']; ?></th>
						<td><?php echo $ocm['nombre']; ?></td>
						<td><?php echo $ocm['gerencia']; ?></td>
						<td><?php echo $ocm['direccion']; ?></td>
						<td><?php echo $ocm['eia']; ?></td>
						<td><?php echo $ocm['eds']; ?></td>
						<td><?php echo $ocm['edq']; ?></td>
						<td><?php echo $ocm['edh']; ?></td>
					</tr>

					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
 
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalEjecutarAct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" onclick="crear('siguienteAct',2)">Iniciar</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="../Include/js/funciones.js"></script>
<script type="text/javascript">
</script>
