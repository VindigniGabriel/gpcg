$(document).ready(function(){
    $('[data-toggle="popover"]').popover(); 
    $('#pp').data('data-content','fffff');  
});

function crear(proceso, valor){
    var invoice = new Invoice;
    if(valor == 0){
        invoice.Ir(proceso);
    }else{
        var id = valor;
        invoice.Proceso(proceso, id);
    }
};

function Invoice(){

    Invoice.prototype.Ir = function (proceso){
        var component = proceso+'.php';
        //alert(component);
        
        $.ajax({url: component, success: function(data){
            $('#contenedor').html(data);
            $('#tpatitulo').html('');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
        
    });        
        
    };

    Invoice.prototype.Proceso = function (proceso, id){

        var component = proceso;

        var generarfunction = component+"('"+id+"')";

       // alert(proceso);

       var tmpFunc = new Function(generarfunction);
       tmpFunc();

   };

   var variable;

}

function editarTpa()
{
    if ($('#editarTpa').is(":checked"))
    {
        $(".tpa").prop('disabled', false);
        $(".tpa").css("color", "#212121");
    }else{
        $(".tpa").prop('disabled', true);
    }
}

function ajustesColectivo()
{
    var tpa = $('#tpaoficina').html();
    var id = $('#idoficina').html();
    var nombre = $('#ajustecOCM').html();
    var enviar = id+"||"+nombre+"||"+tpa;
    datalist = $('#ajustescolectivo').serialize()+'&id='+id+'&function='+'ajustesColectivo';
    $.ajax({
        type:'post',
        data: datalist,
        url: '../Controllers/controllerPost.php',
        success: function(data){
            if(data==1){
                alertify.confirm('GPCG', 'Desea Agregar un Memo?', function(){ 
                }
                , function(){ alertify.error('Solicitud cancelada')}).set('labels', {ok:'Aceptar', cancel:'Cancelar'});
                ocm(enviar); 
            }else{
                alertify.error('Error. No se logro Actualizar.');
            };
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
}

function ocm(d)
{
    //$('#cargaModal').modal('toggle');
    $('#opcionemp').addClass('d-none');
    var ocm = d.split('||');
    var id = ocm[0];
    var data = 'id='+ocm[0];
    var nombre = ocm[1];
    var tpa = parseFloat(ocm[2]); 
    $('#tpatitulo').html('TPA: '+tpa);
    $('#tpaoficina').html(tpa);
    $.ajax({
        type:'post',
        data: data,
        url: '../Controllers/controllertablaocmselect.php',
        success: function(data){
            //$('#cargaModal').modal('toggle');   
            $('#contenedor').html(data);
            $('#buscador').addClass('d-none');
            $('#idoficina').html(id);
            $('#menutitulo').html('OCM '+nombre);
            $('#ajustecOCM').html(nombre);

            if(id=='1'){
                $('#venedh').addClass('d-none');
                $('#venedhi').addClass('d-none');
                $('#retedh').addClass('d-none');
                $('#retedhi').addClass('d-none');
                $('#retco').addClass('d-none');
                $('#venco').addClass('d-none');
            };

            if(id=='1'){
                idO = '2';
            }else{
                idO = '1';
            };

            $.post( "../Controllers/controllerPost.php", { id: idO, rol: "1", function: "indicadoresEsquema" })
            .done(function( data ) {

             var dat = JSON.parse(data);
             $.each(dat,function(name,value) {

              if(value.indicador=='IGE'){
                var igemax = value.max;
                var igemed = value.med;
                var igemin = value.min;
                var igepmax = value.pmax;
                var igepmed = value.pmed;
                var igepmin = value.pmin;
                var valorreal = parseFloat($("#IGE").html().replace('%',''));
                if(valorreal>=igepmax){
                    $('#EiaIge').html(value.indicador+' - '+igemax+'%');
                };
                if(valorreal>=igepmed && valorreal<igepmax){
                    $('#EiaIge').html(value.indicador+' - '+igemed+'%');
                };
                if(valorreal>=igepmin && valorreal<igepmed){
                    $('#EiaIge').html(value.indicador+' - '+igemin+'%');
                };
                if(valorreal<igepmin){
                    $('#EiaIge').html(value.indicador+' - 0.00%');
                };
            }

            if(value.indicador=='ECUF'){
                var ecumax = value.max;
                var ecumed = value.med;
                var ecumin = value.min;
                var ecupmax = value.pmax;
                var ecupmed = value.pmed;
                var ecupmin = value.pmin;

                var valorreal = parseFloat($("#ECU").html().replace('%',''));

                if(valorreal>=ecupmax){
                    $('#EiaEcu').html(' | '+value.indicador+' - '+ecumax+'%');
                };
                if(valorreal>=ecupmed && valorreal<ecupmax){
                    $('#EiaEcu').html(' | '+value.indicador+' - '+ecumed+'%');
                };
                if(valorreal>=ecupmin && valorreal<ecupmed){
                    $('#EiaEcu').html(' | '+value.indicador+' - '+ecumin+'%');
                };
                if(valorreal<ecupmin){
                    $('#EiaEcu').html(' | '+value.indicador+' - 0.00%');
                };
            }

            if(value.indicador=='ECN'){
                var ecnmax = value.max;
                var ecnmed = value.med;
                var ecnmin = value.min;
                var ecnpmax = value.pmax;
                var ecnpmed = value.pmed;
                var ecnpmin = value.pmin;

                var valorreal = parseFloat($("#ECN").html().replace('%',''));

                if(valorreal>=ecnpmax){
                    $('#EiaEcn').html(' | '+value.indicador+' - '+ecnmax+'%');
                };
                if(valorreal>=ecnpmed && valorreal<ecnpmax){
                    $('#EiaEcn').html(' | '+value.indicador+' - '+ecnmed+'%');
                };
                if(valorreal>=ecnpmin && valorreal<ecnpmed){
                    $('#EiaEcn').html(' | '+value.indicador+' - '+ecnmin+'%');
                };
                if(valorreal<ecnpmin){
                    $('#EiaEcn').html(' | '+value.indicador+' - 0.00%');
                };
            }

            if(value.indicador=='Retencion'){
                var retmax = value.max;
                var retmed = value.med;
                var retmin = value.min;
                var retpmax = value.pmax;
                var retpmed = value.pmed;
                var retpmin = value.pmin;
                value.indicador = value.indicador.toUpperCase();
                value.indicador = value.indicador.substr(0,3);

                var valorreal = parseFloat($("#RET").html().replace('%',''));

                if(valorreal>=retpmax){
                    $('#EiaRet').html(' | '+value.indicador+' - '+retmax+'%');
                };
                if(valorreal>=retpmed && valorreal<retpmax){
                    $('#EiaRet').html(' | '+value.indicador+' - '+retmed+'%');
                };
                if(valorreal>=retpmin && valorreal<retpmed){
                    $('#EiaRet').html(' | '+value.indicador+' - '+retmin+'%');
                };
                if(valorreal<retpmin){
                    $('#EiaRet').html(' | '+value.indicador+' - 0.00%');
                };
            }

            if(value.indicador=='Ventas'){
                var venmax = value.max;
                var venmed = value.med;
                var venmin = value.min;
                var venpmax = value.pmax;
                var venpmed = value.pmed;
                var venpmin = value.pmin;
                value.indicador = value.indicador.toUpperCase();
                value.indicador = value.indicador.substr(0,3);

                var valorreal = parseFloat($("#VEN").html().replace('%',''));

                if(valorreal>=venpmax){
                    $('#EiaVen').html(' | '+value.indicador+' - '+venmax+'%');
                };
                if(valorreal>=venpmed && valorreal<venpmax){
                    $('#EiaVen').html(' | '+value.indicador+' - '+venmed+'%');
                };
                if(valorreal>=venpmin && valorreal<venpmed){
                    $('#EiaVen').html(' | '+value.indicador+' - '+venmin+'%');
                };
                if(valorreal<venpmin){
                    $('#EiaVen').html(' | '+value.indicador+' - 0.00%');
                };
            }

        });

});

$.post( "../Controllers/controllerPost.php", { id: "3", rol: "2", function: "indicadoresEsquema" })
.done(function( data ) {

 var dat = JSON.parse(data);
 $.each(dat,function(name,value) {

  if(value.indicador=='IGE'){
    var igemax = value.max;
    var igemed = value.med;
    var igemin = value.min;
    var igepmax = value.pmax;
    var igepmed = value.pmed;
    var igepmin = value.pmin;
    var valorreal = parseFloat($("#IGE").html().replace('%',''));

    if(valorreal>=igepmax){
        $('#EdqIge').html(value.indicador+' - '+igemax+'%');
    };
    if(valorreal>=igepmed && valorreal<igepmax){
        $('#EdqIge').html(value.indicador+' - '+igemed+'%');
    };
    if(valorreal>=igepmin && valorreal<igepmed){
        $('#EdqIge').html(value.indicador+' - '+igemin+'%');
    };
    if(valorreal<igepmin){
        $('#EdqIge').html(value.indicador+' - 0.00%');
    };
}

if(value.indicador=='TPA'){
    var max = value.max;
    var med = value.med;
    var min = value.min;
    var pmax = value.pmax;
    var pmed = value.pmed;
    var pmin = value.pmin;
    value.indicador = value.indicador.toUpperCase();
    value.indicador = value.indicador.substr(0,3);

    var valorreal = parseFloat($("#TPA").html().replace('%',''));

    if(valorreal>=pmax){
        $('#EdqTpa').html(' | '+value.indicador+' - '+max+'%');
    };
    if(valorreal>=pmed && valorreal<pmax){
        $('#EdqTpa').html(' | '+value.indicador+' - '+med+'%');
    };
    if(valorreal>=pmin && valorreal<pmed){
        $('#EdqTpa').html(' | '+value.indicador+' - '+min+'%');
    };
    if(valorreal<pmin){
        $('#EdqTpa').html(' | '+value.indicador+' - 0.00%');
    };
}

});

});


$.post( "../Controllers/controllerPost.php", { id: "3", rol: "3", function: "indicadoresEsquema" })
.done(function( data ) {

 var dat = JSON.parse(data);
 $.each(dat,function(name,value) {

  if(value.indicador=='IGE'){
    var igemax = value.max;
    var igemed = value.med;
    var igemin = value.min;
    var igepmax = value.pmax;
    var igepmed = value.pmed;
    var igepmin = value.pmin;
    var valorreal = parseFloat($("#IGE").html().replace('%',''));
    if(valorreal>=igepmax){
        $('#EdsIge').html(value.indicador+' - '+igemax+'%');
    };
    if(valorreal>=igepmed && valorreal<igepmax){
        $('#EdsIge').html(value.indicador+' - '+igemed+'%');
    };
    if(valorreal>=igepmin && valorreal<igepmed){
        $('#EdsIge').html(value.indicador+' - '+igemin+'%');
    };
    if(valorreal<igepmin){
        $('#EdsIge').html(value.indicador+' - 0.00%');
    };
}

if(value.indicador=='Fallas'){
    var max = value.max;
    var med = value.med;
    var min = value.min;
    var pmax = value.pmax;
    var pmed = value.pmed;
    var pmin = value.pmin;
    value.indicador = value.indicador.toUpperCase();
    value.indicador = value.indicador.substr(0,3);

    var valorreal = parseFloat($("#FAL").html().replace('%',''));


    if(valorreal>=pmax){
        $('#EdsFal').html(' | '+value.indicador+' - '+max+'%');
    };
    if(valorreal>=pmed && valorreal<pmax){
        $('#EdsFal').html(' | '+value.indicador+' - '+med+'%');
    };
    if(valorreal>=pmin && valorreal<pmed){
        $('#EdsFal').html(' | '+value.indicador+' - '+min+'%');
    };
    if(valorreal<pmin){
        $('#EdsFal').html(' | '+value.indicador+' - 0.00%');
    };
}

});

});

$.post( "../Controllers/controllerPost.php", { id: idO, rol: "4", function: "indicadoresEsquema" })
.done(function( data ) {

 var dat = JSON.parse(data);
 $.each(dat,function(name,value) {

  if(value.indicador=='IGE'){
    var igemax = value.max;
    var igemed = value.med;
    var igemin = value.min;
    var igepmax = value.pmax;
    var igepmed = value.pmed;
    var igepmin = value.pmin;
    var valorreal = parseFloat($("#IGE").html().replace('%',''));

    if(valorreal>=igepmax){
        $('#EdhIge').html(value.indicador+' - '+igemax+'%');
    };
    if(valorreal>=igepmed && valorreal<igepmax){
        $('#EdhIge').html(value.indicador+' - '+igemed+'%');
    };
    if(valorreal>=igepmin && valorreal<igepmed){
        $('#EdhIge').html(value.indicador+' - '+igemin+'%');
    };
    if(valorreal<igepmin){
        $('#EdhIge').html(value.indicador+' - 0.00%');
    };
}

if(value.indicador=='Retencion'){
    var retmax = value.max;
    var retmed = value.med;
    var retmin = value.min;
    var retpmax = value.pmax;
    var retpmed = value.pmed;
    var retpmin = value.pmin;
    value.indicador = value.indicador.toUpperCase();
    value.indicador = value.indicador.substr(0,3);

    var valorreal = parseFloat($("#RET").html().replace('%',''));

    if(valorreal>=retpmax){
        $('#EdhRet').html(' | '+value.indicador+' - '+retmax+'%');
    };
    if(valorreal>=retpmed && valorreal<retpmax){
        $('#EdhRet').html(' | '+value.indicador+' - '+retmed+'%');
    };
    if(valorreal>=retpmin && valorreal<retpmed){
        $('#EdhRet').html(' | '+value.indicador+' - '+retmin+'%');
    };
    if(valorreal<retpmin){
        $('#EdhRet').html(' | '+value.indicador+' - 0.00%');
    };
}

if(value.indicador=='Ventas'){
    var venmax = value.max;
    var venmed = value.med;
    var venmin = value.min;
    var venpmax = value.pmax;
    var venpmed = value.pmed;
    var venpmin = value.pmin;
    value.indicador = value.indicador.toUpperCase();
    value.indicador = value.indicador.substr(0,3);

    var valorreal = parseFloat($("#VEN").html().replace('%',''));

    if(valorreal>=venpmax){
        $('#EdhVen').html(' | '+value.indicador+' - '+venmax+'%');
    };
    if(valorreal>=venpmed && valorreal<venpmax){
        $('#EdhVen').html(' | '+value.indicador+' - '+venmed+'%');
    };
    if(valorreal>=venpmin && valorreal<venpmed){
        $('#EdhVen').html(' | '+value.indicador+' - '+venmin+'%');
    };
    if(valorreal<venpmin){
        $('#EdhVen').html(' | '+value.indicador+' - 0.00%');
    };
}

if(value.indicador=='TPA'){
    var max = value.max;
    var med = value.med;
    var min = value.min;
    var pmax = value.pmax;
    var pmed = value.pmed;
    var pmin = value.pmin;
    value.indicador = value.indicador.toUpperCase();
    value.indicador = value.indicador.substr(0,3);

    var valorreal = parseFloat($("#TPA").html().replace('%',''));

    if(valorreal>=pmax){
        $('#EdhTpa').html(' | '+value.indicador+' - '+max+'%');
    };
    if(valorreal>=pmed && valorreal<pmax){
        $('#EdhTpa').html(' | '+value.indicador+' - '+med+'%');
    };
    if(valorreal>=pmin && valorreal<pmed){
        $('#EdhTpa').html(' | '+value.indicador+' - '+min+'%');
    };
    if(valorreal<pmin){
        $('#EdhTpa').html(' | '+value.indicador+' - 0.00%');
    };
}

});

});
},
error: function (jqXHR, textStatus, errorThrown) {
    alert(errorThrown);
   // $('#cargaModal').modal('toggle');
}
});   
}

function esquema(id)
{   
    $('.selecciontipo').addClass('d-none');
    $('#idrol1').addClass('d-none');
    $('#idrol2').addClass('d-none');
    $('#idrol3').addClass('d-none');
    $('#idrol4').addClass('d-none');
    p = 'idrol'+id;
    $('#'+p).removeClass('d-none');
    $('#esquemaindividual').html('');
    $('#esquemacolectivo').html('');
    $('#esquemaempresarial').html('');
    $('#selecciontipo').val('0');
    $('#rol').html(id);
    if(id=='1' || id == '4')
    {
        $('.selecciontipo').removeClass('d-none');
    }else{
        esquemarxpambas();
    }
}

function esquemarxp()
{
    var tipo = $('#selecciontipo').val();
    var rol = $('#rol').html();
    var data = 'tipo='+tipo+'&rol='+rol;
    $.ajax({
        type:'post',
        data: data,
        url: '../Controllers/controlleresquemacolectivo.php',
        success: function(data){
            $('#esquemacolectivo').html(data);
            var data = 'tipo='+tipo+'&rol='+rol;
            $.ajax({
                type:'post',
                data: data,
                url: '../Controllers/controlleresquemaempresarial.php',
                success: function(data){
                    $('#esquemaempresarial').html(data);
                    var data = 'tipo='+tipo+'&rol='+rol;
                    $.ajax({
                        type:'post',
                        data: data,
                        url: '../Controllers/controlleresquemaindividual.php',
                        success: function(data){
                            $('#esquemaindividual').html(data);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert(errorThrown);
                        }
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
}

function habilitarEmpresarial()
{
    $('.emp').toggle( "slow" );
}

function editarPersonal(data)
{
    $("#editofic").val('');
    $("#editestatus").val('');
    var personal = data.split('|');
    $('#editp').val(personal[0]);
    $('#editnombre').val(personal[1]);
    $('#editid').val(personal[5]);
    $('#editcedula').val(personal[6]);
    $("#editofic").val(personal[3]);
    $("#editestatus").val(personal[4]);
    $("#editrol").val(personal[2]);
}

function establecerEmpresarial()
{
    var emp = $('#selectEmp').val();
    $.post( "../Controllers/controllerPost.php", {emp: emp, function: "actualizarEmp" })
    .done(function( data ) {
        if(data==1){
            alertify.success('Ha establecido el indicador Empresarial en '+emp+'%.');
        }else{
            alert(data);
        }
    });
}

function actualizarpersonal()
{
    $('#cargaModal').modal('toggle');
    datalist = $('#editarpersonaloficina').serialize()+'&function='+'actualizarPersonal';
    $.ajax({
        type:'post',
        data: datalist,
        url: '../Controllers/controllerPost.php',
        success: function(data){
         if(data=='')
         {   
            var codigo = $('#editp').val();
            $('#editpersonal').load('../Controllers/controllerpersonal.php');
            $('#msjpersonal').append('<div class="alert alert-warning alert-dismissible fade show" role="alert"> P00 ' + codigo + ' actualizado con Éxito!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            $('#cargaModal').modal('toggle');
            $('#btn-personal').addClass('disabled');
        }else
        {
            //$('#editpersonal').load('../Controllers/controllerpersonal.php');
            alertify.error('La actualización no pudo ser procesada.');
            $('#cargaModal').modal('toggle');
            $('#btn-personal').addClass('disabled');
        }
    },
    error: function (jqXHR, textStatus, errorThrown) {
        alert(errorThrown);
    }
});
}

function esquemarxpambas()
{
    var tipo = '3';
    var rol = $('#rol').html();
    var data = 'tipo='+tipo+'&rol='+rol;
    $.ajax({
        type:'post',
        data: data,
        url: '../Controllers/controlleresquemacolectivo.php',
        success: function(data){
            $('#esquemacolectivo').html(data);
            var data = 'tipo='+tipo+'&rol='+rol;
            $.ajax({
                type:'post',
                data: data,
                url: '../Controllers/controlleresquemaempresarial.php',
                success: function(data){
                    $('#esquemaempresarial').html(data);
                    var data = 'tipo='+tipo+'&rol='+rol;
                    $.ajax({
                        type:'post',
                        data: data,
                        url: '../Controllers/controlleresquemaindividual.php',
                        success: function(data){
                            $('#esquemaindividual').html(data);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert(errorThrown);
                        }
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
}

function siguienteAct()
{   
    $('#btn-actualizar').addClass('disabled');
    $('#modalEjecutarAct').modal('hide');
    $('#procesarAct').removeClass('d-none');

    var data = 'function='+'validarArchivo';
    // Verifica si el archivo es leible desde Upload/ocm.csv 
    // Se elimina data de gh_archivo (info del archivo cargado) y se llena la data (archivo_size, archivo_fecha)
    $.ajax({
        type:'post',
        data: data,
        url: '../Controllers/controllerPost.php',
        success: function(data){
            if(data=='1'){
                var data = 'function='+'detalleCsv';
                // Trae json con los datos de gh_archivo (info del archivo cargado)
                $.ajax({
                    type:'post',
                    data: data,
                    url: '../Controllers/controllerPost.php',
                    success: function(data){
                        var archivo = JSON.parse(data);
                        $.each(archivo,function(name,value) {
                            $('#detallePaso1').prop('title', 'Tamaño: '+value.archivo_size+' Kb. de Fecha: '+value.archivo_fecha);
                        });
                        $('#paso1').removeClass('fa-spinner fa-pulse');
                        $('#paso1').addClass('fa-check');
                        $('.paso1').removeClass('invisible');
                        $('#anchoprogress').css( "width", "33.33%" );
                        $('#paso2').removeClass('invisible');
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
                var data = 'function='+'subirData';
                // Metodo subirData
                // Se elimina la data de gh_personal_activo
                // Se elimina la data de ocm_personal_eiac
                // Se sube data con load infile en tabla gh_personal_activo
                // Metodo actualizarNombresOcm
                // Se actualiza Id de las Oficinas en gh_personal_activo
                // Inserta registros a ocm_personal_eiac desde ocm_personal
                // Actualiza en gh_personal_activo los roles de EIA de Comercial y Especiliazada 
                // Actualiza el personal activo con count desde gh_archivo
                $.ajax({
                    type:'post',
                    data: data,
                    url: '../Controllers/controllerPost.php',
                    success: function(data){
                        if(data=='1'){
                         var data = 'function='+'detalleCsv';
                         //  Trae json con los datos de gh_archivo (info del archivo cargado)
                         $.ajax({
                            type:'post',
                            data: data,
                            url: '../Controllers/controllerPost.php',
                            success: function(data){
                                var archivo = JSON.parse(data);
                                $.each(archivo,function(name,value) {
                                    $('#detallePaso2').prop('title', 'No. de Registros: '+value.archivo_registros);
                                });
                                $('#paso2').removeClass('fa-spinner fa-pulse');
                                $('#paso2').addClass('fa-check');
                                $('.paso2').removeClass('invisible');
                                $('#anchoprogress').css( "width", "66.66%" );
                                $('#paso3').removeClass('invisible');
                                var data = 'function='+'actPersonal';
                                // Inserta registros nuevos en ocm_personal desde gh_personal_activo
                                // Actualiza estatus en ocm_personal desde gh_personal_activo
                                $.ajax({
                                    type:'post',
                                    data: data,
                                    url: '../Controllers/controllerPost.php',
                                    success: function(data){
                                     $('#anchoprogress').css( "width", "90%" );
                                     var data = 'function='+'personalActivo';
                                     //  Trae json con el personal activo desde ocm_personal
                                     $.ajax({
                                        type:'post',
                                        data: data,
                                        url: '../Controllers/controllerPost.php',
                                        success: function(data){
                                           var archivo = JSON.parse(data);
                                           $.each(archivo,function(name,value) {
                                            $('#detallePaso3').prop('title', '# Personal Activo: '+value.activo);
                                        });  
                                           $('#paso3').removeClass('fa-spinner fa-pulse');
                                           $('#paso3').addClass('fa-check');
                                           $('.paso3').removeClass('invisible');
                                           $('#anchoprogress').css( "width", "100%" );
                                           var data = 'function='+'rolNo';
                                           // Cuenta todo el personal con rol No Definido
                                           $.ajax({
                                            type:'post',
                                            data: data,
                                            url: '../Controllers/controllerPost.php',
                                            success: function(data){
                                                if(data == 0){
                                                   $('#btn-actualizar').html('Completado');
                                                   $('#procesarAct').html('<div class="alert alert-dismissible alert-success mt-4 text-black-50"><button type="button" class="close" data-dismiss="alert">&times;</button>Procesado con Éxito!.</div>');
                                                   $('#contenedortablaocm').load('../Controllers/controllertablaocm.php');
                                               }else{
                                                $('#procesarAct').html('<div class="alert alert-dismissible alert-warning mt-4 text-black-50"><button type="button" class="close" data-dismiss="alert">&times;</button>Importante! Existe(n) '+data+' trabajador(es) sin rol definido. Actualice las plantillas en Personal OCM/ROL.</div>');
                                                $('#btn-actualizar').html('Completado');
                                                $('#contenedortablaocm').load('../Controllers/controllertablaocm.php');
                                            };
                                        },
                                        error: function (jqXHR, textStatus, errorThrown) {
                                            alert(errorThrown);
                                        }
                                    });
                                       },
                                       error: function (jqXHR, textStatus, errorThrown) {
                                        alert(errorThrown);
                                    }
                                });
                                 },
                                 error: function (jqXHR, textStatus, errorThrown) {
                                    alert(errorThrown);
                                }
                            });

                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                alert(errorThrown);
                            }
                        });
}else{
    $('#procesarAct').html('<div class="alert alert-dismissible alert-danger mt-4"><button type="button" class="close" data-dismiss="alert">&times;</button>Error. No es posible subir el archivo. Verifique el formato de la data.</div>');
};
},
error: function (jqXHR, textStatus, errorThrown) {
    alert(errorThrown);
}
});
}else{
    $('#procesarAct').html('<div class="alert alert-dismissible alert-danger mt-4"><button type="button" class="close" data-dismiss="alert">&times;</button>Error. No se ecuentra el archivo Data.csv en el directorio Escritorio/appRxp/Data.csv </div>');
}
},
error: function (jqXHR, textStatus, errorThrown) {
    alert(errorThrown);
}
});
}

$(function(){
  $(document).on('blur', '.tpa', function() {
   var tpa =  $(this).parents('#ocm').eq(0).find( "#ocmtpa" ).val();
   var oficina =  $(this).parents('#ocm').eq(0).find( "#ocmnombre" ).html();
   var id =  $(this).parents('#ocm').eq(0).find( "#ocmid" ).html();
   var data = 'tpa='+tpa+'&oficina='+oficina+'&id='+id+'&function='+'actTpa';
   $.ajax({
    type:'post',
    data: data,
    url: '../Controllers/controllerPost.php',
    success: function(data){


    },
    error: function (jqXHR, textStatus, errorThrown) {
        alert(errorThrown);
    }
});
});
});

$( ".editarPersonal" ).change(function() {
  $('#btn-personal').removeClass('disabled');
});

$("#siguiente").click(function(){
    $("#modalEjecutarAct1").modal('toggle');
});

$("#anterior").click(function(){
    $("#modalEjecutarAct2").modal('toggle');
    $("#modalEjecutarAct1").modal('toggle');
});

function seleccionOficina(){
    if ($('#selectO').is(":checked"))
    {
        $( ":checkbox.seleccionOficina" ).prop( "checked", true );
        $('.selectRol').removeClass('d-none');
    }else{
        $( ":checkbox.seleccionOficina" ).prop( "checked", false );
        $('.selectRol').addClass('d-none');
    }
};

$('#btn-global-individual-uno').click(function(){
    alert('ddd');
});