<?php namespace Controllers;

require_once "../Autoload.php";

use Controllers\controllerApp as controllerApp;

$datos = new controllerApp;
$data = $datos->listarocm();

?>


<div class="row mt-3">
	<div class="col">

		<div class="table-responsive-sm mt-3">
			<table class="table table-striped text-light" id="tablaocm">
				<thead>
					<tr>
						<th scope="col" class="text-center">#</th>
						<th scope="col" class="text-center">OCM</th>
						<th scope="col" class="text-center">Gerencia</th>
						<th scope="col" class="text-center">Dirección</th>
						<th scope="col" class="text-left">T.P.A.</th>
						<th scope="col" class="amber-text text-center">EIA</th>
						<th scope="col" class="teal-text">EDS</th>
						<th scope="col" class="blue-grey-text text-center">EDQ</th>
						<th scope="col" class="blue-text text-center">EDH</th>
						<th scope="col" class="text-center">RxP</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data as $ocm) { 
						$o = $ocm['id']."||".$ocm['nombre']."||".$ocm['tpa'];?>
					<tr id="ocm">
						<th scope="row" class="text-center" id="ocmid" ><?php echo $ocm['id']; ?></th>
						<td class="text-center" id="ocmnombre" ><?php echo $ocm['nombre']; ?></td>
						<td class="text-center"><?php echo $ocm['gerencia']; ?></td>
						<td class="text-center"><?php echo $ocm['direccion']; ?></td>
						<td class="text-center"><input id="ocmtpa" class="form-control form-control-sm tpa" type="text" style="color:#fff; max-width: 40%;" value="<?php echo $ocm['tpa']; ?>" disabled></td>
						<td class="text-center"><?php echo $ocm['eia']; ?></td>
						<td class="text-center"><?php echo $ocm['eds']; ?></td>
						<td class="text-center"><?php echo $ocm['edq']; ?></td>
						<td class="text-center"><?php echo $ocm['edh']; ?></td>
						<td class="white-text text-center"><i class="fas fa-users-cog" style="cursor: pointer;" onclick="crear('ocm',<?php echo "'$o'"; ?>);"></i></td>
					</tr>

					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>