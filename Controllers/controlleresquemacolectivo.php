<?php namespace Controllers;

require_once "../Autoload.php";

use Controllers\controllerApp as controllerApp;

$datos = new controllerApp;
$data = $datos->esquemaColectivo();
$total = 0;

?>


<div class="row mt-3">


	<div class="col">

		<p class="font-weight-bold h2">Colectivo (50%)</p>

		<div class="table-responsive-sm mt-3 px-2">
			<table class="table table-striped text-light" id="">
				<thead>
					<tr>
						<th scope="col">Indicador</th>
						<th scope="col">Peso</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data as $ocm) { 
						$total += $ocm['indicador_valor_max'];?>
					<tr>
						<td><?php echo $ocm['nombre']; ?></td>
						<td><?php echo $ocm['indicador_valor_max']."%"; ?></td>
					</tr>

					<?php } ?>
					<tr>
						<td>Total</td>
						<td><?php echo $total."%"; ?></td>
					</tr>
				</tbody>
			</table>
		</div>

	</div>
</div>