<?php namespace Controllers;

require_once "../Autoload.php";

use Controllers\controllerApp as controllerApp;

$datos = new controllerApp;
$EIAC = $datos->listarocmEIAC();
$EDQ = $datos->listarocmEDQ();
$EDS = $datos->listarocmEDS();
$EDH = $datos->listarocmEDH();
$esquemaEIAC = $datos->listaresquemaEIAC();
$esquemaEDQ = $datos->listaresquemaEDQ();
$esquemaEDS = $datos->listaresquemaEDS();
$esquemaEDH = $datos->listaresquemaEDH();
$esquemaCOL = $datos->listaresquemaCOL();
$esquemaCOLPESO = $datos->listaresquemaCOLPESO();
$logrosEiac = $datos->listarEiacLogros();
$logroEmpresarial = $datos->logroEmpresarial();
$conteo = "";

$rxpEDQ = "<table class='table table-sm'><thead><tr><th>P00</th><th>Nombre</th>";

foreach ($esquemaEDQ as $esq) {

	if($esq['esquema']=='1'){

		$value = $esq['indicador']."[]";
		$id = $esq['indicador'];

		$rxpEDQ .= "<th class='orange-text text-center'>{$esq['indicador']}</th>";

		$conteo .= "<td class='text-center'><input id='$id' class='form-control form-control-sm' type='text' min='0' max='{$esq['peso']}' name='{$value}'></td>";

	};

} 

$conteo .= "<td class='text-center'><input class='form-control form-control-sm' type='number' id='trxp' min='0' max='30'></td>";

$rxpEDQ .= "<th class='text-center'>RxP</th></tr></thead><tbody>";

foreach ($EDQ as $ocm) 
{	
	$rxpEDQ .= "<tr><td>{$ocm['codigo']}</td><td>{$ocm['nombre']}</td>{$conteo}</tr>";
} 

$rxpEDQ .= "</tbody></table>";

$conteo = "";

$rxpEDS = "<table class='table table-sm'><thead><tr><th>P00</th><th>Nombre</th>";

foreach ($esquemaEDS as $esq) {

	if($esq['esquema']=='1'){

		$value = $esq['indicador']."[]";
		$id = $esq['indicador'];

		$rxpEDS .= "<th class='orange-text text-center'>{$esq['indicador']}</th>";

		$conteo .= "<td class='text-center'><input id='$id' class='form-control form-control-sm' type='text' min='0' max='{$esq['peso']}' name='{$value}'></td>";

	};

} 

$conteo .= "<td class='text-center'><input class='form-control form-control-sm' type='number' id='trxp' min='0' max='30'></td>";

$rxpEDS .= "<th class='text-center'>RxP</th></tr></thead><tbody>";

foreach ($EDS as $ocm) 
{	
	$rxpEDS .= "<tr><td>{$ocm['codigo']}</td><td>{$ocm['nombre']}</td>{$conteo}</tr>";
} 

$rxpEDS .= "</tbody></table>";

$conteo = "";

$rxpEDH = "<table class='table table-sm'><thead><tr><th>P00</th><th>Nombre</th>";

foreach ($esquemaEDH as $esq) {

	if($esq['esquema']=='1'){

		$value = $esq['indicador']."[]";
		$id = $esq['indicador'];

		$rxpEDH .= "<th class='orange-text text-center'>{$esq['indicador']}</th>";

		$conteo .= "<td class='text-center'><input id='$id' class='form-control form-control-sm' type='text' min='0' max='{$esq['peso']}' name='{$value}'></td>";

	};
} 

$conteo .= "<td class='text-center'><input class='form-control form-control-sm' type='number' id='trxp' min='0' max='30'></td>";

$rxpEDH .= "<th class='text-center'>RxP</th></tr></thead><tbody>";

foreach ($EDH as $ocm) 
{	
	$rxpEDH .= "<tr><td>{$ocm['codigo']}</td><td>{$ocm['nombre']}</td>{$conteo}</tr>";
} 

$rxpEDH .= "</tbody></table>";

$conteo = "";

$rxpEIAC = "<table class='table table-sm'> <thead>
<tr><th class='' colspan='2'>P00</th>";

foreach ($esquemaEIAC as $esq) {

	if($esq['esquema']=='1'){
		$rxpEIAC .= "<th class='orange-text text-center' colspan='2'>% {$esq['indicador']}</th>";
	};

	
}
$conteo .= "<td class='text-center disabled'><input class='form-control form-control-sm' type='text' id='trxp' min='0' max='120'></td>"; 

$rxpEIAC .= "<th class='text-center'>RxP</th></tr></thead><tbody>";

foreach ($logrosEiac as $ocm) 
{	
	$rxpEIAC .= "<tr id='tablaEIAC'><td>{$ocm['p00']}</td><td id='idp' class='invisible'>{$ocm['id']}</td><td class='text-center'><input id='HC' class='form-control form-control-sm individual' type='number' min='0' max='50' value='{$ocm['hc']}' name='{$value}' step='0.5'></td><td><input class='form-control form-control-sm' value='{$ocm['phc']}' type='text' id='pHC' disabled/></td><td class='text-center'><input id='TPA' class='form-control form-control-sm individual tpa' type='number' min='0' max='50' value='{$ocm['tpa']}' name='{$value}' step='0.01'></td><td><input class='form-control form-control-sm' value='{$ocm['ptpa']}' type='text' id='pTPA' disabled/></td>{$conteo}</tr>";
} 
$rxpEIAC .= "</tbody></table>";

$pesoM = "";
foreach ($esquemaCOLPESO as $peso) {
	$pesoM .= "<p><span id='{$peso['indicador_nombre']}max'>{$peso['indicador_meta_max']}</span><span id='{$peso['indicador_nombre']}med'>{$peso['indicador_meta_med']}</span><span id='{$peso['indicador_nombre']}min'>{$peso['indicador_meta_min']}</span></p>";
};
?>

<div class="row mt-5">
	<div class="col-6">
		<h4 class="">AJUSTE - LOGROS</h4>

		<div class="row mt-3">
			<div class="col-6">
				<a class="btn btn-outline-amber mx-auto" data-toggle="modal" data-target="#" id="btn-actualizar">Individual</a>
			</div>
			<div class="col-6">
				<a class="btn btn-outline-cyan mx-auto" data-toggle="modal" data-target="#ajustecolectivo" id="btn-actualizar">Colectivo</a>
			</div>
		</div>
		
	</div>

	<div class="col-6">
		<h4 class="">Resultados - Empresarial y Colectivos</h4>
		<?php 
		$ventrango = $esquemaCOL['p_ven'] * 0.84;
		$reterango = $esquemaCOL['p_ret'] * 0.84;
		$emprrango = $logroEmpresarial['valor'] * 10;

		$tpaOficina = $esquemaCOL['tpa'];
		$tpaMes = $esquemaCOL['p_tpa'];
		$tparesult = $tpaOficina - $tpaMes;
		if($tparesult>=2){
			$tpa = 100;
			$bg = "background:#757575;";
		};
		if($tparesult>=0 && $tparesult<2){
			$tpa = 85;
			$bg = "background:#757575;";
		};
		if($tparesult>= -1.5 && $tparesult<0){
			$tpa = 70;
			$bg = "background:#757575;";
		};
		if($tparesult < -1.5){
			$tpa = 0;
			$bg = "background:#757575;";
		};
		?>
		<div class="row justify-content-around">
			<div class="col-1">
				<span>EMP</span>
				<div class="progress progress-bar-vertical">
					<div class="progress-bar" id="EMPCOLOR" style="<?php echo 'height:'.$emprrango.'%; background:#757575;'?>">
						<div class="progress-value" id="EMP"><?php echo $logroEmpresarial['valor'].'%';?></div>
					</div>
				</div>
			</div>
			<div class="col-1">
				<span>IGE</span>
				<div class="progress progress-bar-vertical">
					<div class="progress-bar" id="IGECOLOR" style="<?php echo 'height:'.$esquemaCOL['p_ige'].'%;'?>">
						<div class="progress-value" id="IGE"><?php echo $esquemaCOL['p_ige'].'%';?></div>
					</div>
				</div>
			</div>
			<div class="col-1">
				<span>ECU</span>
				<div class="progress progress-bar-vertical">
					<div class="progress-bar" id="ECUCOLOR" style="<?php echo 'height:'.$esquemaCOL['p_ecu'].'%;'?>">
						<div class="progress-value" id="ECU"><?php echo $esquemaCOL['p_ecu'].'%';?></div>
					</div>
				</div>
			</div>
			<div class="col-1">
				<span>ECN</span>
				<div class="progress progress-bar-vertical">
					<div class="progress-bar" id="ECNCOLOR" style="<?php echo 'height:'.$esquemaCOL['p_ecn'].'%; background:#757575;'?>">
						<div class="progress-value" id="ECN"><?php echo $esquemaCOL['p_ecn'].'%';?></div>
					</div>
				</div>
			</div>
			<div class="col-1" id="venedh">
				<span>VEN</span>
				<div class="progress progress-bar-vertical">
					<div class="progress-bar" id="VENCOLOR" style="<?php echo 'height:'.$ventrango.'%;'?>">
						<div class="progress-value" id="VEN"><?php echo $esquemaCOL['p_ven'].'%';?></div>
					</div>
				</div>
			</div>
			<div class="col-1" id="retedh">
				<span>RET</span>
				<div class="progress progress-bar-vertical">
					<div class="progress-bar" id="RETCOLOR" style="<?php echo 'height:'.$reterango.'%; background:#757575;'?>">
						<div class="progress-value" id="RET"><?php echo $esquemaCOL['p_ret'].'%';?></div>
					</div>
				</div>
			</div>
			<div class="col-1">
				<span>TPA</span>
				<div class="progress progress-bar-vertical">
					<div class="progress-bar" id="TPACOLOR" style="<?php echo 'height:'.$tpa.'%;'?>">
						<div class="progress-value" id="TPA"><?php echo $tpa.'%';?></div>
					</div>
				</div>
			</div>
			<div class="col-1">
				<span>FAL</span>
				<div class="progress progress-bar-vertical">
					<div class="progress-bar" id="FALCOLOR" style="<?php echo 'height:'.$esquemaCOL['p_fal'].'%; background:#757575;'?>">
						<div class="progress-value" id="FAL"><?php echo $esquemaCOL['p_fal'].'%';?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 


?>


<div class="row">
	<div class="col">
		<hr class="grey lighten-5">
		<h4 class="mt-5">RESULTADOS - INDIVIDUALES (40%)</h4>
	</div>
</div>

<div class="row mt-1 px-1">
	<div class="col-6">
		<h4 class="blue-grey-text">EDQ</h4>
		<div class="text-center cyan-text col-12">
			<span id="EdqIge"></span>
			<span id="EdqTpa"></span>
		</div>
		<?php echo $rxpEDQ; ?>
		<div class="mt-4">
			<h4 class="teal-text">EDS</h4>
			<div class="text-center cyan-text col-12">
				<span id="EdsIge"></span>
				<span id="EdsFal"></span>
			</div>
		</div>
		<?php echo $rxpEDS; ?>
		<div class="mt-4">
			<h4 class="blue-text">EDH</h4>
			<div class="text-center cyan-text col-12">
				<span id="EdhIge"></span>
				<span id="EdhTpa"></span>
				<span id="EdhVen"></span>
				<span id="EdhRet"></span>
			</div>
		</div>
		<?php echo $rxpEDH; ?>
	</div>
	<div class="col-6">
		<h4 class="amber-text">EIA</h4>
		<div class="text-center cyan-text col-12">
			<span id="EiaIge"></span>
			<span id="EiaEcu"></span>
			<span id="EiaEcn"></span>
		</div>
		<div class="text-center cyan-text col-12">
			<span id="EiaRet"></span>
			<span id="EiaVen"></span>
		</div>
		<?php echo $rxpEIAC; ?>
	</div>
</div>

<div class="row ">
	<div class="col">
		<?php echo $pesoM; ?>
	</div>
</div>


<!-- Central Modal Medium Info -->
<div class="modal fade left" id="ajustecolectivo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-full-height modal-left" role="document">
		<!--Content-->
		<div class="modal-content">
			<!--Header-->
			<div class="modal-header">
				<h5 id="ajustecOCM" class="text-center"></h5>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="white-text">&times;</span>
				</button>
			</div>

			<!--Body-->
			<div class="modal-body">
				<div class="text-center">
					<i class="far fa-chart-bar fa-2x mb-3 animated rotateIn"></i>
					<span class="cyan-text">Ajuste Logro Colectivo</span>
					<form id="ajustescolectivo">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">Indicador</th>
									<th scope="col">Logro Actual</th>
									<th scope="col">Ajustar Logro</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th>IGE</th>
									<td><?php echo $esquemaCOL['p_ige']; ?></td>
									<td><select class="custom-select selectcolectivo" name="selectIge">
										<option value="1" selected>No Ajustar</option>
										<option value="0" >Sin Logro (0%)</option>
										<option value="" id="IgeMi">Meta Mínima </option>
										<option value="" id="IgeMe">Meta Media </option>
										<option value="" id="IgeMa">Meta Máxima </option>
									</select></td>
								</tr>
								<tr>
									<th>ECU</th>
									<td><?php echo $esquemaCOL['p_ecu']; ?></td>
									<td><select class="custom-select selectcolectivo" name="selectEcu">
										<option value="1" selected>No Ajustar</option>
										<option value="0">Sin Logro (0%)</option>
										<option value="" id="EcuMi">Meta Mínima </option>
										<option value="" id="EcuMe">Meta Media </option>
										<option value="" id="EcuMa">Meta Máxima </option>
									</select></td>
								</tr>
								<tr>
									<th>ECN</th>
									<td><?php echo $esquemaCOL['p_ecn']; ?></td>
									<td><select class="custom-select selectcolectivo" name="selectEcn">
										<option value="1" selected>No Ajustar</option>
										<option value="0">Sin Logro (0%)</option>
										<option value="" id="EcnMi">Meta Mínima </option>
										<option value="" id="EcnMe">Meta Media </option>
										<option value="" id="EcnMa">Meta Máxima </option>
									</select></td>
								</tr>
								<tr id="retco">
									<th>RET</th>
									<td><?php echo $esquemaCOL['p_ret']; ?></td>
									<td><select class="custom-select selectcolectivo" name="selectRet">
										<option value="1" selected>No Ajustar</option>
										<option value="0">Sin Logro (0%)</option>
										<option value="" id="RetMi">Meta Mínima </option>
										<option value="" id="RetMe">Meta Media </option>
										<option value="" id="RetMa">Meta Máxima </option>
									</select></td>
								</tr>
								<tr id="venco">
									<th>VEN</th>
									<td><?php echo $esquemaCOL['p_ven']; ?></td>
									<td><select class="custom-select selectcolectivo" name="selectVen">
										<option value="1" selected>No Ajustar</option>
										<option value="0">Sin Logro (0%)</option>
										<option value="" id="VenMi">Meta Mínima </option>
										<option value="" id="VenMe">Meta Media </option>
										<option value="" id="VenMa">Meta Máxima </option>
									</select></td>
								</tr>
								<tr>
									<th>TPA</th>
									<td><?php echo $esquemaCOL['p_tpa']; ?></td>
									<td><select class="custom-select selectcolectivo" name="selectTpa">
										<option value="1" selected>No Ajustar</option>
										<option value="0">Sin Logro (0%)</option>
										<option value="" id="TpaMi">Meta Mínima </option>
										<option value="" id="TpaMe">Meta Media </option>
										<option value="" id="TpaMa">Meta Máxima </option>
									</select></td>
								</tr>
								<tr>
									<th>FAL (F. Precfact.)</th>
									<td><?php echo $esquemaCOL['p_fal']; ?></td>
									<td><select class="custom-select selectcolectivo" name="selectFal">
										<option value="1" selected>No Ajustar</option>
										<option value="0">Sin Logro (0%)</option>
										<option value="" id="FalMi">Meta Mínima </option>
										<option value="" id="FalMe">Meta Media </option>
										<option value="" id="FalMa">Meta Máxima </option>
									</select></td>
								</tr>
							</tbody>
						</table>
					</form>
				</div>
			</div>

			<!--Footer-->
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-outline-deep-orange lighten-1 px-4 close d-none" data-dismiss="modal" aria-label="Close" onclick="crear('ajustesColectivo',1)" id="btn-colectivo"><span class="white-text">Procesar</span></button>
			</div>
		</div>
		<!--/.Content-->
	</div>
</div>
<!-- Central Modal Medium Info-->


<script type="text/javascript" src="../Include/js/rxp.js"></script>
