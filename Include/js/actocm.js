$('#buscador').removeClass('d-none');
$('#cargaModalId').load('iconCargaData.php');

function buscarocm() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("buscarocm");
  filter = input.value.toUpperCase();
  table = document.getElementById("tablaocm");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

$(function(){
    $(document).on('change', 'input[type="file"]', function(e) {
        $('.msjCargaOcm').addClass('d-none');
        $('.msjCargaOcm').removeClass('alert-success');
        $('.msjCargaOcm').removeClass('alert-danger');
        e.preventDefault();
        var f = $(this);
        var formData = new FormData(document.getElementById("cargaOcm"));
        formData.append("dato", "valor");
        $.ajax({
            url: "../Controllers/controllerSubirOcm.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
        .done(function(res){
           if(res=='1'){
              $('.msjCargaOcm').removeClass('d-none');
              $('.msjCargaOcm').addClass('alert-success');
              $('#siguiente1').removeClass('disabled');
              $('#msjCargaOcm').html('Archivo Válido. Clic en el botón procesar para continuar el proceso.');
           }else{
              $('.msjCargaOcm').removeClass('d-none');
              $('.msjCargaOcm').addClass('alert-danger');
              $('#siguiente1').addClass('disabled');
              $('#msjCargaOcm').html('Archivo No Válido. Favor verifique el formato del archivo.');
           };
        });
    });
});