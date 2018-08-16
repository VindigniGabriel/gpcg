<?php namespace Controllers;

require_once "../Autoload.php";

use Controllers\controllerApp as controllerApp;

$datos = new controllerApp;
$data = $datos->indicadoresRol();
$conteo = true;
$indicadores = '';
?>
<?php foreach ($data as $ind) { ?>
<?php if ($conteo): ?>
	<span>Indicador(es) Individual(es) para <?php echo "{$ind['rol']}"; $rol = str_replace('C', '', $ind['rol']); ?> </span>
<?php $conteo =false; endif ?>
<div class="mt-3">
	<span>Indicador <?php 
	$indclass = substr($ind['indicador'], 0,2);
	echo "{$ind['indicador']}"; $indicadores .= '<li>'.$ind['indicador'].'<span> -> <span> <span class="'.$indclass.'">Sin Ajuste</span></li>';?></span>
	<select class="custom-select custom-select-sm selectLogro" id="<?php echo "{$indclass}"; ?>">
		<option value="0" selected>Seleccionar Logro</option>
		<option value="0">Sin Logro</option>
		<option value='<?php echo "{$ind['min']}"; ?>'>Logro Mínimo</option>
		<option value='<?php echo "{$ind['med']}"; ?>'>Logro Medio</option>
		<option value='<?php echo "{$ind['max']}"; ?>'>Logro Máximo</option>
	</select>
	<?php } ?>
	<button class="btn btn-outline-deep-orange mt-3" type="button" data-toggle="modal" data-target="#procesarAjuste">Procesar Asjuste(s)</button>
</div>



<div class="modal fade mt-5" id="procesarAjuste" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header text-center">
					<h4 class="modal-title w-100 font-weight-bold">Detalles del Ajuste</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body mx-3 text-left">
					<span>Ajuste de las Oficina(s) seleccionada(s)</span>
					<ul>
						<li>
							<span>Rol: <?php echo "{$rol}"; ?></span>
						</li>
						<li>
						<span>Indicadore(s) </span>
							<ul>
								<?php echo "{$indicadores}"; ?>
							</ul>
						</li>
					</ul>
					<span>¿Esta seguro de procesar los ajustes detallados?</span>
				</div>
				<div class="modal-footer d-flex justify-content-center">
					<a class="btn btn-outline-deep-orange lighten-1 px-4 close" onclick="crear('actualizarpersonal',2)" id="btn-personal" data-dismiss="modal" aria-label="Close">Si. procesar</a>
				</div>
			</div>
		</div>
	</div>
