$(document).ready(function(){
	$('#cargaModalId').load('iconCargaData.php');
	$('#menutitulo').html('Edición del Personal');
	$('#editpersonal').load('../Controllers/controllerpersonal.php');
	$('#buscarocm').attr("placeholder", "Buscar P00");

	$.post( "../Controllers/controllerPost.php", {function: "oficinas" })
	.done(function( data ) {
		var datos = JSON.parse(data);
		$.each(datos , function(e, value) { 
			$('#editofic')
			.append($("<option></option>")
				.attr("value", value.id)
				.text(value.nombre));
		});
	});
});

$('#filtrarRol').change(function(){
	 var rol, filter, table, tr, td, i;

  rol = $('#filtrarRol').val();

  if(rol=='1'){
  	rol = 'EIAC';
  };
  if(rol=='2'){
  	rol = 'EDQ';
  };
  if(rol=='3'){
  	rol = 'EDS';
  };
  if(rol=='4'){
  	rol = 'EDH';
  };
  if(rol=='5'){
  	rol = 'ND';
  };

  if(rol=='0'){
  	rol = 'Todos';
  	$('#editpersonal').load('../Controllers/controllerpersonal.php');
  };

  if(rol!='Todos'){

  table = document.getElementById("tablaocm");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(rol) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }

};

}); 