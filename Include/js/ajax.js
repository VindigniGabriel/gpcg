 $.ajax({
        type:'post',
        data: datalist,
        url: '',
        success: function(data){
           
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });



 $.post( "../Controllers/controllerPost.php", {tpa: tpa, function: "actualizarEiac" })
    .done(function( data ) {
    });