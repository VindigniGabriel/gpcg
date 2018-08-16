<?php namespace Controllers;

require_once "../Autoload.php";

use Controllers\controllerApp as controllerApp;

$datos = new controllerApp;
$data = $datos->mostrarPersonal();

?>


<div class="row mt-3 ">
	<div class="col">

		<div class="table-responsive-sm mt-3 mx-auto">
			<table class="table table-striped text-light" id="tablaocm">
				<thead>
					<tr>
						<th scope="col" class="text-center">P00</th>
						<th scope="col" class="text-center">Nombre</th>
						<th scope="col" class="text-center">Cédula</th>
						<th scope="col" class="text-center">Rol</th>
						<th scope="col" class="text-center">Oficina</th>
						<th scope="col" class="text-left">Estatus</th>
						<th>	</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data as $personal) {
						$datos = $personal['p00'].'|'.
						$personal['nombre'].'|'.
						$personal['idrol'].'|'.
						$personal['idoficina'].'|'.
						$personal['idestatus'].'|'.
						$personal['id'].'|'.
						$personal['cedula'];
						?>
					<tr id="personal">
						<td class="text-center"><?php echo $personal['p00']; ?></td>
						<td class="text-center"><?php echo $personal['nombre']; ?></td>
						<td class="text-center"><?php echo $personal['cedula']; ?></td>
						<td class="text-center"><?php echo $personal['rol']; ?></td>
						<td class="text-center"><?php echo $personal['oficina']; ?></td>
						<td class="text-center"><?php echo $personal['estatus']; ?></td>
						<td><a class="fas fa-user-edit" data-toggle="modal" data-target="#editarpersonal" onclick="crear('editarPersonal','<?php echo $datos; ?>')"></a></td>
					</tr>

					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>