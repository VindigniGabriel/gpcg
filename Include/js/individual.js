$(document).ready(function(){
	$('#menutitulo').html('Ajuste Global Indicadores Individuales');
	$('#listarSeleccion').load('../Controllers/controllerIndividualOficinas.php');
});

$(function(){
  $(document).on('change', 'input[type="checkbox"]', function(e) {

    var oficina = '';
    var conteo = 0;

    $("input[name=oficina]").each(function (index) {

     if($(this).is(':checked')){

      oficina += '|'+$(this).val();
      conteo = conteo + 1;

    }

  });

    $('#primerFiltro').html(oficina);
    if(conteo<36){
     $( ":checkbox#selectO" ).prop( "checked", false );
   };
   if(oficina==''){
    $('.selectRol').addClass('d-none');
    $('#indicadoresRol').html('');
  }else{
    $('.selectRol').removeClass('d-none');
  };


});

});

$(function(){
  $(document).on('change', '#selectRol', function(e) {
    var rol = $(this).val();
    $.ajax({
      type:'post',
      data: {rol:rol},
      url: '../Controllers/controllerindicadoresRol.php',
      success: function(data){
        $('#indicadoresRol').html(data);
      },
    });
  });
});


$(function(){
  $(document).on('change', '.selectLogro', function(e) {
    var id = this.id;
    var logro = $('option:selected',this).text();
    $('.'+id).html(logro);
  });
});