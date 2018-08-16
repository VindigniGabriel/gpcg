
<div class="row">
	<div class="col d-flex justify-content-center"><button type="button" class="btn btn-outline-deep-orange lighten-1 waves-effect" onclick="crear('esquema',1)">EIAC</button><i class="far fa-check-circle fa-2x d-none" id="idrol1"></i></div>
	<div class="col d-flex justify-content-center"><button type="button" class="btn btn-outline-deep-orange lighten-1 waves-effect" onclick="crear('esquema',2)">EDQ</button><i class="far fa-check-circle fa-2x d-none" id="idrol2"></i></div>
	<div class="col d-flex justify-content-center"><button type="button" class="btn btn-outline-deep-orange lighten-1 waves-effect" onclick="crear('esquema',3)">EDS</button><i class="far fa-check-circle fa-2x d-none" id="idrol3"></i></div>
	<div class="col d-flex justify-content-center"><button type="button" class="btn btn-outline-deep-orange lighten-1 waves-effect" onclick="crear('esquema',4)">EDH</button><i class="far fa-check-circle fa-2x d-none" id="idrol4"></i></div>
</div>

<div class="row mt-4 d-none selecciontipo">
	<div class="col">
		<div class="input-group mb-3">
			<select class="browser-default" onchange="crear('esquemarxp',1)" id="selecciontipo">
				<option value="0" disabled selected>Seleccione tipo de Oficina</option>
				<option value="1">Comercial</option>
				<option value="2">Servicio</option>
			</select>
		</div>
		<span id="rol" class="d-none"></span>
	</div>
</div>

<div class="row mt-4">
	<div class="col-4">
		<div id="esquemaindividual"></div>
	</div>
	<div class="col-4">
		<div id="esquemacolectivo"></div>
	</div>
	<div class="col-4">
		<div id="esquemaempresarial"></div>
	</div>
</div>


<script type="text/javascript" src="../Include/js/funciones.js"></script>
<script type="text/javascript">
	//$('#contenedortablaocm').load('../Controllers/controllertablaocm.php');
	$('#menutitulo').html('Esquema RxP');
	$('#buscador').addClass('d-none');
</script>
