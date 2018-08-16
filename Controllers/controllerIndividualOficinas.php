<?php namespace Controllers;

require_once "../Autoload.php";

use Controllers\controllerApp as controllerApp;

$datos = new controllerApp;
$dir = $datos->listarDirecciones();

?>

<?php foreach ($dir as $dir) { 
	$contenido = '<tbody>';
	?>
	<div class="col-12 h3">
		<?php echo "{$dir['direccion']}"; ?>
		<hr>
	</div>
	<div class="col-12 h5">
		<table class="table table-borderless">
			<thead>

			</thead>
			<?php
			$ger = $datos->listarGerencias($dir['id']);
			foreach ($ger as $ger) {
				$contenido .= "<td class='grey-text h5' style='width:40%;'>{$ger['gerencia']}</td>";
				$ofi = $datos->listarOficinas($ger['id']);

				foreach ($ofi as $ofi) {
					$contenido .= "<td><input class='seleccionOficina' type='checkbox' name='oficina' value='{$ofi['id']}' /> {$ofi['oficina']}</td>";
				}

				$contenido .= '</tbody>';

			}
			?>
			
			<?php echo "{$contenido}"; ?>

		</table>

	</div>
	<?php } ?>
